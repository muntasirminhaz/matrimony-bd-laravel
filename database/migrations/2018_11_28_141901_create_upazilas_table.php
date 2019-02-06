<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUpazilasTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('upazilas', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('district_id')->unsigned()->index('district_id');
			$table->string('name', 30);
			$table->string('bn_name', 50);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('upazilas');
	}

}
