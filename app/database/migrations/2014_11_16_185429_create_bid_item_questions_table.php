<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBidItemQuestionsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('item_questions', function ($table) {
			$table->increments('id');
			$table->string('content',512);
			$table->string('answer',512);
			$table->integer('userId')->unsigned();
			$table->foreign('userId')->references('id')->on('users');
			$table->integer('itemId')->unsigned();
			$table->foreign('itemId')->references('id')->on('items');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('item_questions');
	}

}
