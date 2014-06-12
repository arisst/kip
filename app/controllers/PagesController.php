<?php

class PagesController extends \BaseController {

	public function index()
	{
		$perpage = Config::get('setting.per_page');
		if(Input::get('search'))
		{
			$term = Input::get('search');
			$query = DB::table('pages');
				$query->where('title', 'LIKE', '%'.$term.'%')
				->orWhere('description', 'LIKE', '%'.$term.'%')
				->orderBy('updated_at','desc');
			$results = $query->paginate($perpage);
			return View::make('page.index')->with('pages', $results)->with('keyword', $term);
		}
		else
		{
			$pages = Pages::orderBy('updated_at','desc')->paginate($perpage);
			return View::make('page.index')->with('pages', $pages);
		}
	}

	public function create()
	{
		return View::make('page.form')->with('act', 'add');
	}

	public function store()
	{
		$rules = array(
			'cat' => 'required',
			'title' => 'required|unique:pages',
			'description' => 'required',
			'attachment' => 'mimes:jpeg,bmp,png',
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
				$destinationPath = public_path().'/assets/images/'.Str::slug(Input::get('title'), '-');
				$filename = $file->getClientOriginalName();
				if(!File::exists($destinationPath)) File::makeDirectory($destinationPath);
				Image::make($file->getRealPath())->save($destinationPath.'/'.$filename, 60);
				$location = $filename;
			}

			$pages = new Pages;
			$pages->cat = Input::get('cat');
			$pages->title = Input::get('title');
			$pages->slug = Str::slug(Input::get('title'), '-');
			$pages->description = Input::get('description');
			$pages->attachment = $location;
			$pages->save();

			Session::flash('message', 'Successfully created page!');
			return Redirect::route('admin.pages.index');
		}
	}

	public function show($id)
	{
		$page = Pages::find($id);
		return View::make('page.show')->with('page', $page);
	}

	public function edit($id)
	{
		$pages = Pages::find($id);
		return View::make('page.form')->with('pages', $pages)->with('act', 'edit');
	}

	public function update($id)
	{
		$rules = array(
			'cat' => 'required',
			'title' => 'required|unique:pages,title,'.$id,
			'description' => 'required',
			'attachment' => 'mimes:jpeg,bmp,png',
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
				$destinationPath = public_path().'/assets/images/'.Input::get('slug');
				$filename = $file->getClientOriginalName();
				if(!File::exists($destinationPath)) File::makeDirectory($destinationPath);
				Image::make($file->getRealPath())->save($destinationPath.'/'.$filename, 60);
				$location = $filename;
			}

			if(Input::has('removedFile'))
			{
				$file = Pages::find($id);
				File::deleteDirectory(public_path().'/assets/images/'.$file->slug);
				$location = '';
			}

			$pages = Pages::find($id);
			$pages->cat = Input::get('cat');
			$pages->title = Input::get('title');
			// $pages->slug = Str::slug(Input::get('title'), '-');
			$pages->description = Input::get('description');
			if(Input::hasFile('attachment') || Input::has('removedFile')) $pages->attachment = $location;
			$pages->save();

			Session::flash('message', 'Successfully updated page!');
			return Redirect::route('admin.pages.index');
		}
	}

	public function destroy($id)
	{
		$pages = Pages::find($id);
		File::deleteDirectory(public_path().'/assets/images/'.$pages->slug);
		$pages->delete();

		Session::flash('message', 'Successfully deleted the pages!');
		return Redirect::back();
	}


}
