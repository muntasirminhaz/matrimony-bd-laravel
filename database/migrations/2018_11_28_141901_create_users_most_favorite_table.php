<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUsersMostFavoriteTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users_most_favorite', function(Blueprint $table)
		{
			$table->increments('id');
			$table->timestamps();
			$table->integer('userid');
			$table->integer('favorite_userid');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('users_most_favorite');
	}

}
