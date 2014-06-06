<?php
/**
* Aris Setyono
* arisst.com
*/
class Requests extends Eloquent
{
	public $timestamps = false;

	public static function getRequest($perpage)
	{
		return DB::table('requests')
			->join('users','requests.user_id','=','users.id')
			->select(DB::raw('requests.*, users.name'))
			->orderBy('requests.added_on','desc')
			->paginate($perpage);
	}

	public static function findRequest($id)
	{
		return DB::table('requests')
			->join('users','requests.user_id','=','users.id')
			->join('informations','requests.information_id','=','informations.id')
			->select(DB::raw('requests.*, users.name, users.email, users.phone, users.address, users.ktp, informations.title as ititle, informations.attachment as ifile, informations.category as icategory'))
			->where('requests.id','=',$id)
			->get();
	}

	public static function listRequest() //FrontEnd
	{
		return DB::table('requests')
			->join('informations','requests.information_id','=','informations.id')
			->select(DB::raw('requests.*, informations.category, informations.title as ititle, informations.slug, informations.id as iid'))
			->where('requests.user_id','=',Auth::user()->id)
			->orderBy('requests.added_on','desc')
			->get();
	}
}