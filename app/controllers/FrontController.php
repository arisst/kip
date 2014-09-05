<?php
/**
* Aris Setyono
* arisst.com
*/

class FrontController extends BaseController
{

	function __construct() 
	{
		$this->theme = Theme::uses(Config::get('setting.site_theme'))->layout('default');
		$this->theme->setMenu($this->menu());
	}

	function menu()
	{
		$information = Informations::distinct()->get(array('category'));
		$category = '';
		foreach ($information as $key) 
		{
			$category[] = $key->category;
		}

		$page_menu = Pages::get(array('title','cat'));
		foreach ($page_menu as $key) 
		{
			if($key->cat==1){
			}
			switch ($key->cat) {
				case 1:
					$page_prosedur[] = $key->title;
					break;
				case 2:
					$page_faq[] = $key->title;
					break;
				case 3:
					$page_about[] = $key->title;
					break;
				case 4:
					$page_berita[] = $key->title;
					break;
				default:
					# code...
					break;
			}
		}

		$page_berita = (isset($page_berita)) ? $page_berita : '' ;
		return array(
			array('head'=>'informasi', 'headLink'=>'#','subhead'=>'DATA INFORMASI', 'list'=>$category),
			array('head'=>'prosedur', 'headLink'=>'#','subhead'=>'Prosedur PERMOHONAN INFORMASI', 'list'=>$page_prosedur),
			array('head'=>'berita','headLink'=>'#', 'list'=>$page_berita),
			array('head'=>'faq','headLink'=>'#','subhead'=>'Frequently Asked Questions', 'list'=>$page_faq),
			// array('head'=>'kontak','headLink'=>'contact'),
			array('head'=>'tentang','headLink'=>'#', 'subhead'=>'Tentang KIP','list'=>$page_about),
			array('head'=>'kontak-kami','headLink'=>'kontak-kami'),
		);
	}

	public function showIndex()
	{
		$ber = Pages::where('cat','=','4')/*->where('attachment','!=','')*/->orderBy('updated_at','desc')->take(3)->get();
		$this->theme->setBerita($ber);
		$pros = Pages::where('cat','=','1')/*->where('attachment','!=','')*/->orderBy('updated_at','desc')->take(5)->get();
		$this->theme->setProsedur($pros);

		$view = array('subtitle' => 'Home | ');
		return $this->theme->of('front.home', $view)->render();
	}

	public function informationList($category)
	{
		$information = Informations::where('category', '=', str_replace('-', ' ', $category))->get();
		$this->theme->setList($information);

		$view = array('page'=>'list', 'subtitle'=> 'Informasi '.$category.' | ');
		return $this->theme->of('front.home', $view)->render();
	}	

	public function informationDetail($category, $slug)
	{
		$information = Informations::where('slug', '=', $slug)->get();
		$this->theme->setDetail($information);
		foreach ($information as $key);

		if(Auth::check())
		{
			$request = Requests::where('information_id','=',$key->id)
								->where('user_id','=',Auth::user()->id)
								->get();
			$this->theme->setRequest($request);
		}
		
		$view = array('page'=>'detail', 'subtitle'=>$key->title.' | ');
		return $this->theme->of('front.information.detail', $view)->render();
	}

	public function pageDetail($slug = 'faq')
	{
		$page = Pages::where('slug', '=', $slug)->get();
		foreach($page as $key);
		$this->theme->setDetail($page);
		
		$view = array('page'=>'detail', 'subtitle'=>$key->title.' | ');
		return $this->theme->of('front.page.detail', $view)->render();
	}

	public function showRequest($id, $slug)
	{
		$information = Informations::where('id', '=', $id)
									->where('slug', '=', $slug)
									->get();
		$this->theme->setRequest($information);
		foreach ($information as $key);
		
		$view = array('id'=>$id, 'page'=>'request', 'subtitle'=>'Request "'.$key->title.'" - ');
		return $this->theme->of('front.home', $view)->render();
	}

	public function postRequest($id, $slug)
	{
		$rules = array(
			'title'=>'required',
			'description'=>'required'
			);

		$message = array('required'=>'Harus diisi!');
		$validator = Validator::make(Input::all(), $rules, $message);

		if ($validator->fails()) 
		{
			return Redirect::back()->withErrors($validator)->withInput(Input::all());
		}
		else
		{
			$requests = new Requests();
			$requests->user_id = Auth::user()->id;
			$requests->information_id = $id;
			$requests->title = Input::get('title');
			$requests->description = Input::get('description');
			$requests->status = 0;
			$requests->added_on = date('Y-m-d H:i:s');
			$requests->save();

			$emailadmin = User::whereIn('level', array('1','2'))->get(array('name','email'));

			// Send email to all admin user
			foreach ($emailadmin as $key) {
				Mail::queue('emails.request', 
					array(
						'link'=> URL::to('admin/requests/'.$requests->id), 
						'name' => Auth::user()->name
						), 
					function($message) use ($key){
						$message->to($key->email, Config::get('setting.site_name'))->subject('Request baru - '.Config::get('setting.site_name'));
				});
			}

			Session::flash('message', 'Request informasi berhasil');
			return Redirect::route('user-request-list');
		}
	}

	public function listRequest()
	{
		$request = Requests::listRequest();
		$this->theme->setRequest($request);

		$view = array('page'=>'request_list','subtitle'=>'My Request | ');
		return $this->theme->of('front.home', $view)->render();
	}

	public function getDownload()
	{
		$id = Crypt::decrypt(Input::get('sess'));
		$information = Informations::where('id', '=', $id)->get();
		foreach ($information as $key);

		return Response::download(public_path().'/uploads/'.$key->attachment, Str::slug($key->title));
	}


}