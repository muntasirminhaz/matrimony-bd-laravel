<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUsersProfileViewedTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users_profile_viewed', function(Blueprint $table)
		{
			$table->increments('id');
			$table->timestamps();
			$table->integer('userid');
			$table->integer('viewed_user_id');
			$table->unique(['userid','viewed_user_id'], 'userid');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('users_profile_viewed');
	}

}
