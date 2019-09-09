<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateClientsTable extends Migration {

	public function up()
	{
		Schema::create('clients', function(Blueprint $table) {
			$table->increments('id');
			$table->string('name');
			$table->integer('city_id');
			$table->string('email');
			$table->string('phone');
			$table->string('activation')->default('true');
			$table->integer('pin_code');
			$table->string('password');
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('clients');
	}
}