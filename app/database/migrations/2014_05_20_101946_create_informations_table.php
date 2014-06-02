<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInformationsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('informations', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('category', 255);
			$table->string('title', 255);
			$table->string('slug', 255);
			$table->text('description');
			$table->string('attachment', 500)->nullable();
			$table->integer('stats')->nullable();
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
		Schema::drop('informations');
	}

}
