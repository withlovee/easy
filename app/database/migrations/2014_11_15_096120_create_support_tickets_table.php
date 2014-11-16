<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSupportTicketsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('support_tickets', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('reporterId')->unsigned();
			$table->foreign('reporterId')->references('id')->on('users');
			$table->integer('reporteeId')->unsigned();
			$table->foreign('reporteeId')->references('id')->on('users');
			$table->integer('administratorId')->unsigned()->nullable();
			$table->foreign('administratorId')->references('id')->on('administrators');
			$table->string('title');
			$table->string('content');
			$table->string('answer');
			$table->timestamp('answered_at');
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
		Schema::drop('support_tickets');
	}

}
