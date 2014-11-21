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
			$table->integer('bidderId')->unsigned();
		    $table->string('shipping');
		    $table->decimal('shippingCost');
			$table->string('others',2048)->nullable();
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
