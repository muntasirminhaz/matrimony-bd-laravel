<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToDistrictsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('districts', function(Blueprint $table)
		{
			$table->foreign('division_id', 'districts_ibfk_1')->references('id')->on('divisions')->onUpdate('CASCADE')->onDelete('CASCADE');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('districts', function(Blueprint $table)
		{
			$table->dropForeign('districts_ibfk_1');
		});
	}

}
