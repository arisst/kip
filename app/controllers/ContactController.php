<?php 
/**
* 
*/
class ContactController extends FrontController
{
	public function show()
	{
		$view = array('page'=>'contact', 'subtitle'=>'Kontak Kami - ');
		return $this->theme->of('front.home', $view)->render();
	}

	public function doSubmit()
	{
		$rules = array('nama'=>'required','email'=>'required|email','pesan'=>'required');
		$validator = Validator::make(Input::all(), $rules);

		if ($validator->fails()) 
		{
			return Redirect::back()->withErrors($validator)->withInput(Input::all());
		} 
		else 
		{
			$emailadmin = User::whereIn('level', array('1','2'))->get(array('name','email'));

			// Send email to all admin user
			foreach ($emailadmin as $key) {
				Mail::queue('emails.contact', 
					array(
						'nama'=> Input::get('nama'), 
						'email'=> Input::get('email'), 
						'pesan'=> Input::get('pesan'), 
						), 
					function($message) use ($key){
						$message->to($key->email, Config::get('setting.site_name'))->subject('Pesan baru - '.Config::get('setting.site_name'));
				});
			}

			Session::flash('message', 'Pesan berhasil dikirim, terimakasih.');
			return Redirect::back();
		}
	}
}