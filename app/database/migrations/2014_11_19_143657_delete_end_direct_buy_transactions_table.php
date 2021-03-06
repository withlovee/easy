<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DeleteEndDirectBuyTransactionsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
		Schema::drop('end_direct_buy_transactions');
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		//
		Schema::create('end_direct_buy_transactions', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('amount')->unsigned();
			$table->string('shippingType');
			$table->integer('endTradingTransactionId')->unsigned();
			// $table->foreign('endTradingTransactionId')->references('id')->on('end_trading_transactions');
			$table->integer('itemId')->unsigned();
			// $table->foreign('itemId')->references('id')->on('items');
			$table->timestamps();
		});
	}

}
