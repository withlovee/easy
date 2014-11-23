<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBidManagersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('bid_managers', function ($table) {
			$table->increments('id');
			$table->double('currentBid');
			$table->double('maxBid');
			$table->double('increment');
			$table->integer('bidderId')->unsigned()->nullable();
		    $table->string('shipping')->nullable();
		    $table->decimal('shippingCost')->nullable();
			$table->integer('service')->unsigned()->nullable();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		
		Schema::drop('bid_managers');
	}

}
