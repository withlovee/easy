<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DeleteEndTradingTransactionsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
		Schema::drop('end_trading_transactions');
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		//
		Schema::create('end_trading_transactions', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('buyerId')->unsigned();
			$table->integer('paymentId')->unsigned()->nullable();
			$table->integer('shippingId')->unsigned()->nullable();
			$table->string('status');
			$table->double('price');
			$table->timestamps();
		});
	}

}
