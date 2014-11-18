<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItemsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('items', function ($table) {
			$table->increments('id');
			$table->string('name');
			$table->string('picture')->nullable();
			$table->double('price');
			$table->string('brand')->nullable();
			$table->string('model')->nullable();
			$table->double('volumn')->nullable();
			$table->string('property',2048)->nullable();
			$table->string('size')->nullable();
			$table->integer('quantity')->nullable();
			$table->string('quality')->nullable();
			$table->string('defect')->nullable();
			$table->string('returnPolicy',512)->nullable();
			$table->double('returnFee')->nullable();
			$table->string('shipping',2048)->nullable();
			$table->double('tax');
			$table->string('others',2048)->nullable();
			$table->string('type')->nullable();
			$table->dateTime('endDateTime')->nullable();
			$table->integer('bidManagerId')->unsigned()->nullable();
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

		Schema::drop('items');
	}

}
