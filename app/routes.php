<?php

Route::get('image/{use}/{dir}/{size}/{file?}','BaseController@image');

Route::get('/', array('as'=>'home','uses'=>'FrontController@showIndex'));
// Route::post('/', array('as'=>'login-api','uses'=>'ApiController@login'));

Route::get('informasi/{category}', array('as'=>'information-list','uses'=>'FrontController@informationList'));
Route::get('informasi/{category}/{slug}', array('as'=>'information-detail','uses'=>'FrontController@informationDetail'));
Route::get('prosedur/{slug}', array('as'=>'page-detail','uses'=>'FrontController@pageDetail'));
Route::get('faq/{slug}', array('as'=>'about-detail','uses'=>'FrontController@pageDetail'));
Route::get('tentang/{slug}', array('as'=>'about-detail','uses'=>'FrontController@pageDetail'));
Route::get('berita/{slug}', array('as'=>'about-detail','uses'=>'FrontController@pageDetail'));
Route::get('kontak-kami', array('as'=>'contact','uses'=>'ContactController@show'));
Route::post('kontak-kami', array('before'=>'csrf','as'=>'contact-submit','uses'=>'ContactController@doSubmit'));

Route::get('login', array('as'=>'login-form', 'before'=>'guest', 'uses'=>'AccountController@showLogin'));
Route::post('login', array('before'=>'csrf','as'=>'login-submit','uses'=>'AccountController@doLogin'));
Route::get('logout', array('as'=>'logout','uses'=>'AccountController@doLogout'));
Route::post('register', array('before'=>'csrf','as'=>'register-submit','uses'=>'AccountController@doRegister'));

Route::controller('password', 'RemindersController');

Route::get('account/activate/{code}', array(
	'as'=>'account-activate',
	'uses'=>'AccountController@getActivate'
));

//User Route
Route::group(array('before'=>'auth'), function()
{
	Route::get('request/{id}-{slug}', array('as'=>'information-request','uses'=>'FrontController@showRequest'));
	Route::post('request/{id}-{slug}', array('as'=>'request-post','uses'=>'FrontController@postRequest'));
	Route::get('profile',array('as'=>'user-profile-form','uses'=>'AccountController@showProfile'));
	Route::post('profile',array('before'=>'csrf','as'=>'user-profile-form','uses'=>'AccountController@doProfile'));
	Route::get('request',array('as'=>'user-request-list','uses'=>'FrontController@listRequest'));
	Route::post('download',array('before'=>'csrf','as'=>'user-download','uses'=>'FrontController@getDownload'));
});

//Admin Route
Route::group(array('prefix'=>'admin', 'before'=>'auth.admin'), function()
{
	Route::get('/', array('as'=>'admin-index',function()
	{
		return View::make('dashboard.index');
	}));

	Route::get('email',function(){
		return View::make('emails.auth.activate2');
	});

	Route::resource('users', 'UsersController');
	Route::resource('informations', 'InformationsController');
	Route::resource('pages', 'PagesController');
	Route::resource('requests', 'RequestsController');
	Route::resource('responses', 'ResponsesController');
	Route::get('profile', array('as'=>'admin-profile-form','uses'=>'AccountController@showProfile'));
	Route::post('profile', array('as'=>'admin-profile-submit','uses'=>'AccountController@doProfile'));
	Route::get('setting', array('as'=>'admin-setting-index','uses'=>'SettingController@index'));
	Route::post('setting', array('as'=>'admin-setting-update','uses'=>'SettingController@update'));
});

//Api Route
Route::group(array('prefix'=>'api/v1'), function ()
{
	Route::post('login', 'ApiController@login');
	Route::post('register', 'ApiController@register');
	Route::resource('informations', 'ApiController');

});
