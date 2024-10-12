<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateClientNotifactionTable extends Migration {

	public function up()
	{
		Schema::create('client_notifaction', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->string('is_read');
			$table->integer('client_id');
			$table->integer('notifacation_id');
		});
	}

	public function down()
	{
		Schema::drop('client_notifaction');
	}
}