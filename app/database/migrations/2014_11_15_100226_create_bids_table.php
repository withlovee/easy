<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBidsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('bids', function ($table) {
			$table->increments('id');
			$table->double('maxBid');
			$table->double('increment');
			$table->double('bid');
			$table->string('type');
			$table->integer('bidManagerId')->unsigned();
			// $table->foreign('bidManagerId')->references('id')->on('bid_managers');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('bids');
		
	}

}
