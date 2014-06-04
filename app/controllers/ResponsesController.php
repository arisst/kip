<?php

class ResponsesController extends \BaseController {

	
	public function index()
	{
		//
	}

	public function create()
	{
		//
	}

	public function store()
	{
		$request_id = Input::get('request_id');
		$request_status = Input::get('request_status');

		$respon = new Responses();
		$respon->user_id = Auth::user()->id;
		$respon->request_id = $request_id;
		$respon->title = Input::get('title');
		$respon->description = Input::get('description');
		$respon->file_attach = 0;//Input::get('file_attach');
		$respon->added_on = date('Y-m-d H:i:s');
		$respon->save();

		$request = Requests::find($request_id);
		$request->status = $request_status;
		$request->save();

		Session::flash('message', 'Respon success!');
		return Redirect::route('admin.responses.index');
	}

	public function show($id)
	{
		//
	}

	public function edit($id)
	{
		//
	}

	public function update($id)
	{
		
	}

	public function destroy($id)
	{
		//
	}


}
