<?php

class SettingController extends BaseController {

	public function index()
	{
		return View::make('dashboard.setting');
	}
	
	public function update()
	{
		$rules = array(
			'site_name'=>'required',
			'logo' => 'mimes:jpeg,bmp,png',
			'site_theme'=>'required',
			'per_page'=>'required|numeric|between:5,100',
			'mail_driver'=>'required',
			'mail_host'=>'required',
			'mail_encryption'=>'required',
			'mail_port'=>'required|numeric|between:1,65535',
			'mail_username'=>'required',
			'mail_password'=>'required',
			);

		$validator = Validator::make(Input::all(), $rules);

		if ($validator->fails()) {
			return Redirect::back()->withErrors($validator);
		}
		else
		{
/*			DB::statement("UPDATE setting SET value = 
				CASE 
					WHEN 'key'='site_name'
					THEN '".Input::get('site_name')."' 
					WHEN 'key'='site_theme'
					THEN '".Input::get('site_theme')."' 
					WHEN 'key'='per_page'
					THEN '".Input::get('per_page')."' 
					WHEN 'key'='mail_driver'
					THEN '".Input::get('mail_driver')."' 
					WHEN 'key'='mail_host'
					THEN '".Input::get('mail_host')."' 
					WHEN 'key'='mail_port'
					THEN '".Input::get('mail_port')."'
					WHEN 'key'='mail_username'
					THEN '".Input::get('mail_username')."' 
					WHEN 'key'='mail_password'
					THEN '".Input::get('mail_password')."'
					ELSE 'key'
				END

					");*/

			$logo = '';
			if(Input::hasFile('logo'))
			{
				$file = Input::file('logo'); 
				$destinationPath = public_path().'/assets/images';
				$filename = $file->getClientOriginalName();
				if(!File::exists($destinationPath)) File::makeDirectory($destinationPath);
				Image::make($file->getRealPath())->save($destinationPath.'/'.$filename, 60);
				$logo = $filename;
			}

			if(Input::has('removedFile'))
			{
				File::delete(public_path().'/assets/images/'.Config::get('setting.logo'));
				$location = '';
			}

			DB::table('setting')->where('key','=','site_name')->update(array('value'=>Input::get('site_name')));
			DB::table('setting')->where('key','=','logo')->update(array('value'=>$logo));
			DB::table('setting')->where('key','=','address')->update(array('value'=>Input::get('address')));
			DB::table('setting')->where('key','=','site_theme')->update(array('value'=>Input::get('site_theme')));
			DB::table('setting')->where('key','=','per_page')->update(array('value'=>Input::get('per_page')));
			DB::table('setting')->where('key','=','mail_driver')->update(array('value'=>Input::get('mail_driver')));
			DB::table('setting')->where('key','=','mail_host')->update(array('value'=>Input::get('mail_host')));
			DB::table('setting')->where('key','=','mail_encryption')->update(array('value'=>Input::get('mail_encryption')));
			DB::table('setting')->where('key','=','mail_port')->update(array('value'=>Input::get('mail_port')));
			DB::table('setting')->where('key','=','mail_username')->update(array('value'=>Input::get('mail_username')));
			DB::table('setting')->where('key','=','mail_password')->update(array('value'=>Crypt::encrypt(Input::get('mail_password'))));

			return Redirect::back()->with('message', 'Setting update succefully!');
		}
	}

}
