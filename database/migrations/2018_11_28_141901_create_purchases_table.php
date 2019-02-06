<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePurchasesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('purchases', function(Blueprint $table)
		{
			$table->increments('id');
			$table->timestamp('purchase_date')->default(DB::raw('CURRENT_TIMESTAMP'));
			$table->text('package_name', 65535);
			$table->integer('package_id');
			$table->text('package_price', 65535);
			$table->integer('userid');
			$table->boolean('paymentmethid');
			$table->text('transactionid', 65535);
			$table->text('mobaccno', 65535);
			$table->boolean('status')->default(0)->comment('0 = waiting for approval, 1 = approved , 2 = not approved');
			$table->dateTime('status_updated_at')->nullable();
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
		Schema::drop('purchases');
	}

}
