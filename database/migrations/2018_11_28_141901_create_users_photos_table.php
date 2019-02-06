<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUsersPhotosTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users_photos', function(Blueprint $table)
		{
			$table->increments('id');
			$table->timestamps();
			$table->integer('userid')->unsigned();
			$table->string('extention', 4)->default('');
			$table->boolean('private')->default(0)->comment('1 = private');
			$table->boolean('is_profilepic')->default(0);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('users_photos');
	}

}
