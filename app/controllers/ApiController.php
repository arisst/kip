<?php

class ApiController extends \BaseController {

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
