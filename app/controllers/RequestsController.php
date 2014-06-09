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

	public function show($id)
	{
		$request = Requests::findRequest($id);
		return View::make('request.show')->with('request', $request);
	}

	public function destroy($id)
	{
		$request = Requests::find($id);
		$request->delete();

		Session::flash('message', 'Successfully deleted the request!');
		return Redirect::back();
	}

}
