<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateProductsTable extends Migration {

	public function up()
	{
		Schema::create('products', function(Blueprint $table) {
			$table->increments('id');
			$table->string('name');
			$table->integer('color_id');
			$table->string('price');
			$table->text('description');
			$table->string('offer_price')->nullable();
			$table->dateTime('offer_time')->nullable();
			$table->timestamps();
			$table->integer('rate')->default('0');
			$table->integer('trend')->default('0');
		});
	}

	public function down()
	{
		Schema::drop('products');
	}
}