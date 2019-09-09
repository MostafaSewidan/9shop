<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateProductsTable extends Migration {

	public function up()
	{
		Schema::create('products', function(Blueprint $table) {
			$table->increments('id');
			$table->string('name');
			$table->string('price');
			$table->text('description');
			$table->string('offer_price')->nullable();
			$table->string('offer_time')->nullable();
			$table->timestamps();
			$table->integer('rete')->default('0');
		});
	}

	public function down()
	{
		Schema::drop('products');
	}
}