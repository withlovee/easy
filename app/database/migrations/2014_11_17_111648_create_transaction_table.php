<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransactionTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('transactions', function ($table) {
			$table->increments('id');
			$table->integer('amount');
			$table->decimal('price');
			$table->string('shipping');
			$table->decimal('shippingCost');
			$table->string('status');
			$table->integer('buyerId')->unsigned();
			$table->integer('itemId')->unsigned();
			$table->integer('buyerFeedbackId')->unsigned()->nullable();
			$table->integer('sellerFeedbackId')->unsigned()->nullable();
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
		Schema::drop('transactions');
	}

}
