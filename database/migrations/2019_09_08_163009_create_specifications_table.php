<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSpecificationsTable extends Migration {

	public function up()
	{
		Schema::create('specifications', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('product_id');
			$table->string('name');
			$table->string('value');
			$table->string('unit')->nullable();
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('specifications');
	}
}