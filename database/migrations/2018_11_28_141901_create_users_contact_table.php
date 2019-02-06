<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUsersContactTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users_contact', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->timestamps();
			$table->integer('userid');
			$table->integer('contact_id');
			$table->integer('is_interest');
			$table->integer('is_direct');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('users_contact');
	}

}
