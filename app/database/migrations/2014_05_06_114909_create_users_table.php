<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('name', 200);
			$table->string('email', 200)->unique();
			$table->string('phone', 200)->nullable();
			$table->string('address', 255)->nullable();
			$table->string('ktp', 100)->nullable();
			$table->smallInteger('level');
			$table->smallInteger('status');
			$table->string('password', 100);
			$table->string('remember_token', 100)->nullable();
			$table->string('activate_key', 100)->nullable();
			$table->timestamps();

		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('users');
	}

}
