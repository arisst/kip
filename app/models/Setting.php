<?php
/**
* Aris Setyono
*/
class Setting extends Eloquent
{
	protected $table = 'setting';
	public $timestamps = false;
	protected $fillable = array('key','value');
	
}