<?php

class InformationsController extends BaseController {

	public function index()
	{
		$perpage = Config::get('setting.per_page');
		if(Input::get('search'))
		{
			$term = Input::get('search');
			$query = DB::table('informations');
				$query->where('title', 'LIKE', '%'.$term.'%')
				->orWhere('description', 'LIKE', '%'.$term.'%')
				->orderBy('updated_at','desc');
			$results = $query->paginate($perpage);
			return View::make('information.index')->with('informations', $results)->with('keyword', $term);
		}
		else
		{
			$informations = Informations::orderBy('updated_at','desc')->paginate($perpage);
			return View::make('information.index')->with('informations', $informations);
		}
	}

	public function create()
	{
		return View::make('information.form')->with('act', 'add');
	}

	public function store()
	{
		$rules = array(
			'category' => 'required',
			'title' => 'required|unique:informations',
			'description' => 'required',
			'attachment' => 'mimes:jpeg,bmp,png,pdf,zip,rar,doc,docx,odt,ods,xls,xlsx,ppt',
		);
		$messages = array(
			'required' => ':attribute harus diisi!',
			'unique' => ':attribute ini sudah ada!'
		);
		$validator = Validator::make(Input::all(), $rules, $messages);


		if ($validator->fails()) 
		{
			return Redirect::back()->withErrors($validator)->withInput(Input::except('attachment'));
		} 
		else 
		{
			$location = '';
			if(Input::hasFile('attachment'))
			{
				$file = Input::file('attachment'); 
				$destinationPath = str_random(8);
				$filename = $file->getClientOriginalName();
				$uploadSuccess = Input::file('attachment')->move(public_path().'/uploads/'.$destinationPath, $filename);
				$location = $destinationPath.'/'.$filename;
			}

			$informations = new Informations;
			$informations->category = Input::get('category');
			$informations->title = Input::get('title');
			$informations->slug = Str::slug(Input::get('title'), '-');
			$informations->description = Input::get('description');
			$informations->attachment = $location;
			$informations->save();

			Session::flash('message', 'Successfully created information!');
			return Redirect::route('admin.informations.index');
		}
	}

	public function show($id)
	{
		$information = Informations::find($id);
		return View::make('information.show')->with('information', $information);
	}

	public function edit($id)
	{
		$informations = Informations::find($id);
		return View::make('information.form')->with('informations', $informations)->with('act', 'edit');
	}

	public function update($id)
	{
		$rules = array(
			'category' => 'required',
			'title' => 'required|unique:informations,title,'.$id,
			'description' => 'required',
			'attachment' => 'max:2000000|mimes:jpeg,bmp,png,pdf,zip,rar,doc,docx,odt,ods,xls,xlsx,ppt',
		);
		$messages = array(
			'required' => ':attribute harus diisi!',
			'unique' => ':attribute ini sudah ada!'
		);
		$validator = Validator::make(Input::all(), $rules, $messages);


		if ($validator->fails()) 
		{
			return Redirect::back()->withErrors($validator)->withInput(Input::except('attachment'));
		} 
		else 
		{
			$location = '';
			if(Input::hasFile('attachment'))
			{
				$file = Input::file('attachment'); 
				$destinationPath = str_random(8);
				$filename = $file->getClientOriginalName();
				$uploadSuccess = Input::file('attachment')->move(public_path().'/uploads/'.$destinationPath, $filename);
				$location = $destinationPath.'/'.$filename;
			}

			if(Input::has('removedFile'))
			{
				$file = Informations::find($id);
				File::delete(public_path().'/uploads/'.$file->attachment);
				$location = '';
			}

			$informations = Informations::find($id);
			$informations->category = Input::get('category');
			$informations->title = Input::get('title');
			$informations->slug = Str::slug(Input::get('title'), '-');
			$informations->description = Input::get('description');
			if(Input::hasFile('attachment') || Input::has('removedFile')) $informations->attachment = $location;
			$informations->save();

			Session::flash('message', 'Successfully updated information!');
			return Redirect::route('admin.informations.index');
		}
	}

	public function destroy($id)
	{
		$informations = Informations::find($id);
		File::delete(public_path().'/uploads/'.$informations->attachment);
		$informations->delete();

		Session::flash('message', 'Successfully deleted the informations!');
		return Redirect::back();
	}


}
