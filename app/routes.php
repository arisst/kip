<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', array('as'=>'home','uses'=>'FrontController@showIndex'));
Route::get('informasi/{category}', array('as'=>'information-list','uses'=>'FrontController@showList'));
Route::get('informasi/{category}/{slug}', array('as'=>'information-detail','uses'=>'FrontController@showDetail'));

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
Route::group(array('before'=>'auth'), function(){
	// Route::get('download/{id}', array('as'=>'information-download','uses'=>'FrontController@getDownload'));
	Route::get('request/{id}-{slug}', array('as'=>'information-request','uses'=>'FrontController@showRequest'));
	Route::post('request/{id}-{slug}', array('as'=>'request-post','uses'=>'FrontController@postRequest'));
});

//Admin Route
Route::group(array('prefix'=>'admin', 'before'=>'auth.admin'), function(){
	Route::get('/', array(function(){
		return View::make('dashboard.index');
	}));
	Route::resource('users', 'UsersController');
	Route::resource('informations', 'InformationsController');
	Route::resource('requests', 'RequestsController');
	Route::get('profile', array('uses'=>'AccountController@showProfile'));
	Route::post('profile', array('uses'=>'AccountController@doProfile'));
	Route::get('setting', 'SettingController@index');
	Route::post('setting', 'SettingController@update');
});
