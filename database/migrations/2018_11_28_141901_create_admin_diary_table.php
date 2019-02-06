<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAdminDiaryTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('admin_diary', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->timestamps();
			$table->integer('adminid');
			$table->integer('userid');
			$table->text('diary_text', 65535);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('admin_diary');
	}

}
