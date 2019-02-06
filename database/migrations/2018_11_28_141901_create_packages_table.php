<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePackagesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('packages', function(Blueprint $table)
		{
			$table->increments('id');
			$table->timestamps();
			$table->text('package_name', 65535);
			$table->text('package_price', 65535);
			$table->text('package_nrb_price', 65535);
			$table->text('package_image', 65535);
			$table->integer('package_active_days')->nullable();
			$table->boolean('top_in_search');
			$table->boolean('post_photo');
			$table->integer('direct_contact_information');
			$table->text('privacy_set', 65535);
			$table->integer('send_message')->nullable();
			$table->integer('daily_message');
			$table->integer('total_interest_express');
			$table->integer('daily_interest_express');
			$table->integer('interest_approve');
			$table->integer('total_interest_approve');
			$table->integer('daily_interest_approve');
			$table->boolean('send_profile');
			$table->integer('add_favorite');
			$table->integer('most_favorite');
			$table->integer('block_profile');
			$table->integer('counselling');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('packages');
	}

}
