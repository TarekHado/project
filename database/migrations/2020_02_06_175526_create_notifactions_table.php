<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateNotifactionsTable extends Migration {

	public function up()
	{
		Schema::create('notifactions', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->integer('donation_request_id');
			$table->string('title');
			$table->string('content');
			$table->boolean('is_read');
		});
	}

	public function down()
	{
		Schema::drop('notifactions');
	}
}