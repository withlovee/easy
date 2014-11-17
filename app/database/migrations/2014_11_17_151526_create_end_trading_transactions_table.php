<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEndTradingTransactionsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('end_trading_transactions', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('buyerId')->unsigned()->nullable();
			$table->integer('paymentId')->unsigned()->nullable();
			$table->integer('shipingId')->unsigned()->nullable();
			$table->string('status');
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
		Schema::drop('end_trading_transactions');
	}

}
