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
			->paginate($perpage);
	}

	public static function findRequest($id)
	{
		return DB::table('requests')
			->join('users','requests.user_id','=','users.id')
			->select(DB::raw('requests.*, users.name'))
			->where('requests.id','=',$id)
			->get();
	}
}