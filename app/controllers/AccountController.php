<?php
class AccountController extends FrontController {

	public function showLogin()
	{
		$view = array('page'=>'login', 'subtitle'=>'Login - ');
		return $this->theme->of('front.home', $view)->render();
	}

	public function doLogin()
	{
		$rules = array('email'=>'required|email','password'=>'required');
		$validator = Validator::make(Input::all(), $rules);

		if ($validator->fails()) 
		{
			return Redirect::route('login-form')->withErrors($validator)->withInput(Input::except('password'));
		} 
		else 
		{
			$userdata = array('email' => Input::get('email'),'password' => Input::get('password'),'status'=>1);
			if (Auth::attempt($userdata)) 
			{
				if(Auth::user()->level==1 || Auth::user()->level==2)
				{
					// return Redirect::route('admin-index');
					return Redirect::intended('admin');
				}
				else
				{
					return Redirect::intended('/');
				}
			} 
			else 
			{
				return Redirect::route('login-form')->withInput(Input::except('password'))->with('error', 'Login error :<br> Email atau password anda salah.');
			}
			
		}
	}

	public function doRegister()
	{
		$rules = array(
			'rname' => 'required',
			'remail' => 'required|email|unique:users,email',
			'rphone' => 'required|numeric',
			'raddress' => 'required',
			'rktp' => 'required|numeric',
			'rpassword' => 'required|min:6|same:rpassconf',
			'rpassconf' => 'required'
		);
		$messages = array(
			'required' => 'harus diisi!',
			'min' => 'minimal :min karakter!',
			'unique' => 'alamat email ini sudah dipakai!',
			'same' => 'tidak sama dengan konfirmasi!',
			'numeric' => 'angka tidak valid'
		);
		$validator = Validator::make(Input::all(), $rules, $messages);

		if ($validator->fails()) 
		{
			return Redirect::route('login-form')->withErrors($validator)->withInput(Input::except('rpassword'));
		} 
		else 
		{
			$name = Input::get('rname');
			$email = Input::get('remail');
			$phone = Input::get('rphone');
			$address = Input::get('raddress');
			$ktp = Input::get('rktp');
			$password = Input::get('rpassword');
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

			Mail::send('emails.auth.activate', 
				array(
					'link'=> URL::route('account-activate', $activate_key), 
					'name' => $name, 
					'email' => $email, 
					'phone' => $phone, 
					'address' => $address, 
					'ktp' => $ktp), 
				function($message) use ($user) {
					$message->to($user->email, $user->name)->subject('Aktivasi akun '.Config::get('setting.site_name'));
			});

			Session::flash('message', 'Pendaftaran berhasil, silahkan periksa email anda untuk aktivasi.');
			return Redirect::route('login-form');
		}
	}

	public function getActivate($code)
	{
		$user = User::where('activate_key', '=', $code)->where('status', '=', 0);

		if ($user->count()) 
		{
			$user = $user->first();
			$user->status = 1;
			$user->activate_key = '';

			$user->save();

			if($user->save())
			{
				return Redirect::route('login-form')->with('message', 'Akun telah aktif, silahkan login!');
			}
		}
		return Redirect::route('login-form')->with('error', 'Gagal mengaktifkan / akun anda telah aktif sebelumnya, silahkan coba lagi!');
	}

	public function showProfile()
	{
		$profile = User::find(Auth::user()->id);
		if(Auth::user()->level==1 || Auth::user()->level==2) //Admin
		{
			return View::make('user.form')->with('profile', $profile)->with('act', 'profile');
		}
		else
		{
			$this->theme->setProfile($profile);
			$view = array('page'=>'profile', 'subtitle'=>'Profile | ');
			return $this->theme->of('front.home', $view)->render();
		}
	}

	public function doProfile()
	{
		$rules = array(
			'name' => 'required',
			'email' => 'sometimes|required|email|unique:users,email,'.Auth::user()->id,
			'password' => 'min:6|same:passconf'
		);
		$messages = array(
			'required' => ':attribute harus diisi!',
			'min' => ':attribute minimal :min karakter!',
			'unique' => ':attribute ini sudah dipakai!',
			'same' => ':attribute tidak sama dengan konfirmasi!'
		);
		$validator = Validator::make(Input::all(), $rules, $messages);

		if ($validator->fails()) 
		{
			return Redirect::back()->withErrors($validator)->withInput(Input::except('password'));
		} 
		else 
		{
			$user = User::find(Auth::user()->id);
			$user->name = Input::get('name');

			if(Auth::user()->level==1 || Auth::user()->level==2) //Admin
			{
				$user->email = Input::get('email');
			}
			else
			{
				$user->phone = Input::get('phone');
				$user->address = Input::get('address');
				$user->ktp = Input::get('ktp');
			}

			if(Input::get('password')) $user->password = Hash::make(Input::get('password'));
			$user->save();

			Session::flash('message', 'Update profile berhasil!');
			return Redirect::back();
		}
	}

	public function doLogout()
	{
		Auth::logout();
		return Redirect::route('login-form');
	}

}
