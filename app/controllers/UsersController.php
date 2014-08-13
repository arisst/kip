<?php
class UsersController extends BaseController {

	public function index()
	{
		$perpage = Config::get('setting.per_page');
		if(Input::get('search'))
		{
			$term = Input::get('search');
			$query = DB::table('users');
				$query->where('name', 'LIKE', '%'.$term.'%')
				->orWhere('email', 'LIKE', '%'.$term.'%');
			$results = $query->paginate($perpage);
			return View::make('user.index')->with('users', $results)->with('keyword', $term);
		}
		else
		{
			$users = User::paginate($perpage);
			return View::make('user.index')->with('users', $users);
		}
	}

	public function create()
	{
		return View::make('user.form')->with('act', 'add');
	}

	public function store()
	{
		$rules = array(
			'name' => 'required',
			'email' => 'required|email|unique:users',
			'level' => 'required|numeric',
			'password' => 'required|min:6|same:passconf',
			'passconf' => 'required'
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
			return Redirect::route('admin.users.create')->withErrors($validator)->withInput(Input::except('password'));
		} 
		else 
		{
			$user = new User;
			$user->name = Input::get('name');
			$user->email = Input::get('email');
			$user->level = Input::get('level');
			$user->status = 1;
			$user->password = Hash::make(Input::get('password'));
			$user->save();

			Session::flash('message', 'Successfully created user!');
			return Redirect::route('admin.users.index');
		}
	}

	public function show($id)
	{
		$user = User::find($id);
		return View::make('user.show')->with('user', $user);
	}

	public function edit($id)
	{
		$user = User::find($id);
		return View::make('user.form')->with('user', $user)->with('act', 'edit');
	}

	public function update($id)
	{
		$rules = array(
			'name' => 'required',
			'email' => 'required|email|unique:users,email,'.$id,
			'level' => 'required|numeric',
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
			$user = User::find($id);
			$user->name = Input::get('name');
			$user->email = Input::get('email');
			$user->level = Input::get('level');
			if(Input::get('password')) $user->password = Hash::make(Input::get('password'));
			$user->save();

			Session::flash('message', 'Successfully updated user!');
			return Redirect::route('admin.users.index');
		}
	}

	public function destroy($id)
	{
		$user = User::find($id);
		$user->delete();

		Session::flash('message', 'Successfully deleted the user!');
		return Redirect::route('admin.users.index');
	}

}
