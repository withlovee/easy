<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DeletePaymentsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::drop('payments');
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::create('payments', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('creditCardNumber');
			$table->string('cvv');
			$table->string('endMonth');
			$table->string('endYear');
			$table->string('cardType');
		});
	}

}
