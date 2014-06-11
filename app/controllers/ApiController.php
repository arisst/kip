<?php

class ApiController extends \BaseController {

	public function login()
	{
		$userdata = array('email' => Input::get('email'),'password' => Input::get('password'),'status'=>1);
		if (Auth::attempt($userdata)) 
		{
			return Response::json(array(
				'tag' => 'login',
				'success' => 1,
				'error' => 0,
				'uid' => Auth::user()->id,
				'user' => array(
					'name' => Auth::user()->name,
					'email' => Auth::user()->email,
					'created_at' => Auth::user()->created_at,
					'updated_at' => Auth::user()->updated_at
					)
			),200);
		}
		else
		{
			return Response::json(array(
				'tag' => 'login',
				'success' => 0,
				'error' => 1,
				'error_msg' => "Email atau password salah!"
			),200);
		}
	}

	/*
{
    "tag": "login",
    "success": 1,
    "error": 0,
    "uid": "4f074eca601fb8.88015924",
    "user": {
        "name": "Ravi Tamada",
        "email": "ravi8x@gmail.com",
        "created_at": "2012-01-07 01:03:53",
        "updated_at": null
    }
}

{
    "tag": "login",
    "success": 0,
    "error": 1,
    "error_msg": "Incorrect email or password!"
}
	*/

	public function index()
	{
		$perpage = Config::get('setting.per_page');
		$informations = Informations::select('id', 'category', 'title')->paginate($perpage);
		return Response::json(array(
			'error' => false,
			'informations' => $informations->toArray()
			),200);
	}

	public function create()
	{
		//
	}

	public function store()
	{
		//
	}

	public function show($id)
	{
		$information = Informations::select('id','category','title','description')->find($id);
		return Response::json(array(
			'error' => false,
			'information' => $information->toArray()
			),200);	
	}

	public function edit($id)
	{
		//
	}

	public function update($id)
	{
		//
	}

	public function destroy($id)
	{
		//
	}
}
