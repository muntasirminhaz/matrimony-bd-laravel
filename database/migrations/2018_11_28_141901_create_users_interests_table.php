<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUsersInterestsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users_interests', function(Blueprint $table)
		{
			$table->increments('id');
			$table->timestamps();
			$table->integer('sender_id');
			$table->integer('receiver_id');
			$table->boolean('message');
			$table->integer('received_status')->default(0)->comment('0 = pending, 1 = approved');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('users_interests');
	}

}
