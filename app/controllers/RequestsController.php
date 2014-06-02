<?php
class RequestsController extends BaseController {

	public function index()
	{
		$perpage = Config::get('setting.per_page');
		if(Input::get('search'))
		{
			$term = Input::get('search');
			$query = DB::table('requests')
				->join('users','requests.user_id','=','users.id')
				->select(DB::raw('requests.*, users.name'))
				->where('users.name', 'LIKE', '%'.$term.'%')
				->orWhere('requests.title', 'LIKE', '%'.$term.'%')
				->orWhere('requests.description', 'LIKE', '%'.$term.'%');
			$results = $query->paginate($perpage);
			return View::make('request.index')->with('requests', $results)->with('keyword', $term);
		}
		else
		{
			$requests = Requests::getRequest($perpage);
			return View::make('request.index')->with('requests', $requests);
		}
	}

	public function create()
	{
		return View::make('request.form')->with('act', 'add');
	}

/*	public function store()
	{
		$rules = array(
			'name' => 'required',
			'email' => 'required|email|unique:requests',
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
			return Redirect::to('admin/requests/create')->withErrors($validator)->withInput(Input::except('password'));
		} 
		else 
		{
			$request = new request;
			$request->name = Input::get('name');
			$request->email = Input::get('email');
			$request->level = Input::get('level');
			$request->status = 1;
			$request->password = Hash::make(Input::get('password'));
			$request->save();

			Session::flash('message', 'Successfully created request!');
			return Redirect::to('admin/requests');
		}
	}*/

	public function show($id)
	{
		$request = Requests::findRequest($id);
		return View::make('request.show')->with('request', $request);
	}

/*	public function edit($id)
	{
		$request = request::find($id);
		return View::make('request.form')->with('request', $request)->with('act', 'edit');
	}*/

/*	public function update($id)
	{
		$rules = array(
			'name' => 'required',
			'email' => 'required|email|unique:requests,email,'.$id,
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
			$request = request::find($id);
			$request->name = Input::get('name');
			$request->email = Input::get('email');
			$request->level = Input::get('level');
			if(Input::get('password')) $request->password = Hash::make(Input::get('password'));
			$request->save();

			Session::flash('message', 'Successfully updated request!');
			return Redirect::to('admin/requests');
		}
	}*/

	public function destroy($id)
	{
		$request = Requests::find($id);
		$request->delete();

		Session::flash('message', 'Successfully deleted the request!');
		return Redirect::to('admin/requests');
	}

}
