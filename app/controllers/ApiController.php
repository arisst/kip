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

	public function register()
	{
		$rules = array(
			'name' => 'required',
			'email' => 'required|email|unique:users,email',
			'phone' => 'required|numeric',
			'address' => 'required',
			'ktp' => 'required|numeric',
			'password' => 'required|min:6'
		);
		$messages = array(
			'required' => 'harus diisi!',
			'min' => 'minimal :min karakter!',
			'unique' => 'alamat email ini sudah dipakai!',
			'numeric' => 'angka tidak valid'
		);
		$validator = Validator::make(Input::all(), $rules, $messages);

		if ($validator->fails()) 
		{
			// return Redirect::route('login-form')->withErrors($validator)->withInput(Input::except('rpassword'));
			return Response::json(array(
				'tag' => 'register',
				'success' => 2,
				'error' => 1,
				'error_msg' => $validator->messages()->toJson()
			),200);
		} 
		else 
		{
			$name = Input::get('name');
			$email = Input::get('email');
			$phone = Input::get('phone');
			$address = Input::get('address');
			$ktp = Input::get('ktp');
			$password = Input::get('password');
			$activate_key = Str::random(60);

			$user = new User();
			$user->name = $name;
			$user->email = $email;
			$user->phone = $phone;
			$user->address = $address;
			$user->ktp = $ktp;
			$user->password = Hash::make($password);
			$user->level = 3; //Guest Account
			$user->status = 0; //Pending
			$user->activate_key = $activate_key;
			$user->save();

			Mail::send('emails.auth.activate', array('link'=> URL::route('account-activate', $activate_key), 'name' => $name, 'email' => $email, 'phone' => $phone, 'address' => $address, 'ktp' => $ktp), function($message) use ($user) {
					$message->to($user->email, $user->name)->subject('Aktivasi akun KIP');
			});

			return Response::json(array(
				'tag' => 'register',
				'success' => 1,
				'error' => 0,
				'message' => "Pendaftaran berhasil, silakan konfirmasi email anda!"
			),200);
		}
	}


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
