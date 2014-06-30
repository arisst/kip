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
			->orderBy('requests.status','asc')
			->orderBy('requests.added_on','desc')
			// ->where('requests.status','=','0')
			->paginate($perpage);
	}

	public static function findRequest_($id) //.backup
	{
		return DB::table('requests')
			->join('users','requests.user_id','=','users.id')
			->join('informations','requests.information_id','=','informations.id')
			->leftJoin('responses','responses.request_id','=','requests.id')
			->select(DB::raw('requests.*, users.name, users.email, users.phone, users.address, users.ktp, informations.title as ititle, informations.attachment as ifile, informations.category as icategory'))
			->where('requests.id','=',$id)
			->get();
	}

	public static function findRequest($id)
	{
		return DB::select('SELECT requests.*, 
			users.name, users.email, users.phone, users.address, users.ktp, 
			informations.title as ititle, informations.attachment as ifile, informations.category as icategory,
			responses.title rtitle, responses.description rdescription, responses.added_on rtanggal,responses.name as rname
			FROM requests 
			join users on (requests.user_id=users.id) 
			join informations on (requests.information_id=informations.id)
			left join (select title,description,added_on,user_id,request_id,users.name from responses join users on (users.id=responses.user_id)) responses on (responses.request_id=requests.id) where requests.id= ?', array($id));
	}

	public static function listRequest() //FrontEnd
	{
		return DB::table('requests')
			->join('informations','requests.information_id','=','informations.id')
			->leftJoin('responses','responses.request_id','=','requests.id')
			->select(DB::raw('requests.*, informations.category, informations.title as ititle, informations.slug, informations.id as iid, responses.title rtitle, responses.description rdescription, responses.added_on rtanggal'))
			->where('requests.user_id','=',Auth::user()->id)
			->orderBy('requests.added_on','desc')
			->get();
	}

	public static function setStatus($id, $status)
	{
		return DB::table('requests')->where('id','=',$id)->update(array('status'=>$status));
	}
}