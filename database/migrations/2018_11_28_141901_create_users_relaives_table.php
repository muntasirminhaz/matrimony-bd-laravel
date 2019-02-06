<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUsersRelaivesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users_relaives', function(Blueprint $table)
		{
			$table->increments('id');
			$table->timestamps();
			$table->integer('userid')->unsigned();
			$table->boolean('relative_side')->nullable()->comment('paternal or maternal relative');
			$table->boolean('gender')->comment('gender/ uncle or aunty');
			$table->boolean('living_status');
			$table->boolean('marital_status')->nullable();
			$table->integer('relative_profession')->unsigned()->nullable();
			$table->boolean('relative_profession_details')->nullable()->default(0);
			$table->string('relative_designation', 191)->nullable()->default('');
			$table->string('relative_organization', 191)->nullable()->default('');
			$table->boolean('relative_spouse_living_status')->nullable();
			$table->integer('relative_spouse_profession')->nullable();
			$table->boolean('relative_spouse_profession_details')->default(0);
			$table->string('relative_spouse_designation', 191)->nullable();
			$table->string('relative_spouse_organization', 191)->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('users_relaives');
	}

}
