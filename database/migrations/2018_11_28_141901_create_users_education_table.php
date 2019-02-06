<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUsersEducationTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users_education', function(Blueprint $table)
		{
			$table->increments('id');
			$table->timestamps();
			$table->integer('userid')->unsigned();
			$table->integer('education_level')->unsigned();
			$table->string('education_area', 191);
			$table->string('degree_name', 191);
			$table->string('institution_name', 191);
			$table->boolean('status')->default(0);
			$table->string('semester')->nullable()->default('');
			$table->unique(['userid','education_level'], 'userid');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('users_education');
	}

}
