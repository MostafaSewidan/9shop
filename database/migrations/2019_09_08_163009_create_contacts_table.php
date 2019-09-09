<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateContactsTable extends Migration {

	public function up()
	{
		Schema::create('contacts', function(Blueprint $table) {
			$table->increments('id');
			$table->string('name')->nullable();
			$table->string('email')->nullable();
			$table->integer('client_id')->nullable();
			$table->string('body');
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('contacts');
	}
}