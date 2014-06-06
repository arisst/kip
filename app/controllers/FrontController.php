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
		foreach ($information as $key) 
		{
			$category[] = $key->category;
		}

		return array(
			array('head'=>'informasi', 'subhead'=>'DATA INFORMASI', 'list'=>$category)
		);
	}

	public function showIndex()
	{
		return $this->theme->watch('front.home')->render();
	}

	public function showList($category)
	{
		$information = Informations::where('category', '=', str_replace('-', ' ', $category))->get();
		$this->theme->setList($information);

		$view = array('page'=>'list', 'subtitle'=> 'Informasi '.$category.' - ');
		return $this->theme->of('front.home', $view)->render();
	}	

	public function showDetail($category, $slug)
	{
		$information = Informations::where('slug', '=', $slug)->get();
		$this->theme->setDetail($information);

		if(Auth::check())
		{
			foreach ($information as $key);
			$request = Requests::where('information_id','=',$key->id)
								->where('user_id','=',Auth::user()->id)
								->get();
			$this->theme->setRequest($request);
		}
		
		$view = array('page'=>'detail', 'subtitle'=>' - ');
		return $this->theme->of('front.home', $view)->render();
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

		$message = array('required'=>':attribute harus diisi!');
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

			Session::flash('message', 'Request informasi berhasil');
			return Redirect::route('home');
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
		$id = Input::get('information_id');
		$information = Informations::where('id', '=', $id)->get();
		foreach ($information as $key);

		return Response::download(public_path().'/uploads/'.$key->attachment, Str::slug($key->title));
	}


}