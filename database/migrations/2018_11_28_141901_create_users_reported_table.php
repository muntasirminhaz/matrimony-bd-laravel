<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUsersReportedTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users_reported', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('reported_by');
			$table->integer('reported_user');
			$table->text('report_message', 65535);
			$table->timestamps();
			$table->boolean('status')->default(0);
			$table->integer('checked_by_admin')->default(0);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('users_reported');
	}

}
