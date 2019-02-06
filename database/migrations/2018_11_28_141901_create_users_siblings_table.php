<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUsersSiblingsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users_siblings', function(Blueprint $table)
		{
			$table->increments('id');
			$table->timestamps();
			$table->integer('userid')->unsigned();
			$table->boolean('sibling_position')->comment('koto number brother or sister');
			$table->boolean('gender')->comment('1 brother and 2 sister');
			$table->boolean('living_status');
			$table->boolean('marital_status')->nullable()->default(0);
			$table->integer('sibling_profession')->unsigned()->nullable();
			$table->boolean('sibling_profession_details')->nullable()->default(0);
			$table->string('sibling_designation', 191)->nullable()->default('');
			$table->string('sibling_organization', 191)->nullable()->default('');
			$table->boolean('sibling_spouse_living_status')->nullable();
			$table->integer('sibling_spouse_profession')->nullable();
			$table->boolean('sibling_spouse_profession_details')->default(0);
			$table->string('sibling_spouse_designation', 191)->nullable();
			$table->string('sibling_spouse_organization', 191)->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('users_siblings');
	}

}
