<?php
/**
* Aris Setyono
*/
class Responses extends Eloquent
{
	public $timestamps = false;
	
	public static function getResponse($perpage)
	{
		return DB::table('responses')
			->join('users','responses.user_id','=','users.id')
			->join('requests','responses.request_id','=','requests.id')
			->select(DB::raw('responses.*, users.name, requests.status'))
			->orderBy('responses.added_on','desc')
			->paginate($perpage);
	}

	public static function findResponse($id)
	{
		return DB::table('responses')
			->join('users','responses.user_id','=','users.id')
			->join('requests','responses.request_id','=','requests.id')
			->select(DB::raw('responses.*, users.name, users.email, users.phone, users.address, users.ktp, requests.status'))
			->where('responses.id','=',$id)
			->get();
	}
}