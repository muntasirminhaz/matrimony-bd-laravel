<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUsersPrivacyTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users_privacy', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('userid')->unique('userid');
			$table->boolean('display_name');
			$table->boolean('phone');
			$table->boolean('income');
			$table->boolean('visitors_settings');
			$table->boolean('short_list');
			$table->boolean('dont_distrub');
			$table->boolean('profile_privacy');
			$table->boolean('web_notifications');
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
		Schema::drop('users_privacy');
	}

}
