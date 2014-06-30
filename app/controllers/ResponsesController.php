<?php

class ResponsesController extends \BaseController {

	
	public function index()
	{
		$perpage = Config::get('setting.per_page');
		if(Input::get('search'))
		{
			$term = Input::get('search');
			$query = DB::table('responses')
				->join('users','responses.user_id','=','users.id')
				->join('requests','responses.request_id','=','requests.id')
				->select(DB::raw('responses.*, users.name, requests.status'))
				->where('users.name', 'LIKE', '%'.$term.'%')
				->orWhere('responses.title', 'LIKE', '%'.$term.'%')
				->orWhere('responses.description', 'LIKE', '%'.$term.'%');
			$results = $query->paginate($perpage);
			return View::make('response.index')->with('responses', $results)->with('keyword', $term);
		}
		else
		{
			$responses = Responses::getResponse($perpage);
			return View::make('response.index')->with('responses', $responses);
		}	
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

		Requests::setStatus($request_id, $request_status);
		$req = Requests::findRequest($request_id);
		foreach ($req as $request);
		// $request->status = $request_status;
		// $request->save();

		//Kirim email
		Mail::queue('emails.response', 
					array(
						'link'=> URL::to('request#request'.$request->id), 
						'name' => $request->name
						), 
					function($message) use ($request){
						$message->to($request->email, $request->name)->subject('Respon admin - '.Config::get('setting.site_name'));
				});

		Session::flash('message', 'Respon success!');
		return Redirect::to('admin/requests/'.$request_id);//route('admin.responses.index');
	}

	public function show($id)
	{
		$responses = Responses::findResponse($id);
		return View::make('response.show')->with('response', $responses);
	}

	public function destroy($id)
	{
		$response = Responses::find($id);
		$response->delete();

		Session::flash('message', 'Successfully deleted the response!');
		return Redirect::back();
	}


}
