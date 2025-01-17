<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDonationRequestsTable extends Migration {

	public function up()
	{
		Schema::create('donation_requests', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->string('patient_name');
			$table->string('patient_phone');
			$table->integer('city_id');
			$table->string('hospital_name');
			$table->integer('blood_type_id');
			$table->integer('patient_age');
			$table->string('hospital_address');
			$table->string('details');
			$table->decimal('latitude', 10,8)->nullable();
			$table->decimal('longitude', 10,8)->nullable();
			$table->integer('client_id');
            $table->integer('bags_num');
		});
	}

	public function down()
	{
		Schema::drop('donation_requests');
	}
}
