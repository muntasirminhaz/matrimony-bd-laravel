<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUsersMessagesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users_messages', function(Blueprint $table)
		{
			$table->increments('id');
			$table->timestamps();
			$table->integer('sender_id');
			$table->integer('receiver_id');
			$table->text('title', 65535);
			$table->text('message', 65535);
			$table->boolean('mail_read')->default(0);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('users_messages');
	}

}
