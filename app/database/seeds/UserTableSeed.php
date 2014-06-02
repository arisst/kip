<?php
// app/database/seeds/UserTableSeeder.php

class UserTableSeed extends Seeder
{

	public function run()
	{
		// DB::table('users')->delete();
		User::create(array(
			'name'     => 'Aris Setyono',
			'email' => 'me@arisst.com',
			'level'    => '1',
			'status'    => '1',
			'phone'    => '085259838599',
			'ktp'    => '900000000323423',
			'address'    => 'Jalan Raya Ragunan, Pasar Minggu, Jakarta Selatan, Indonesia',
			'password' => Hash::make('aris'),
		));
	}

}