<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCartsTable extends Migration {

	public function up()
	{
		Schema::create('carts', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->integer('product_id');
			$table->integer('client_id');
			$table->integer('quantity');
			$table->string('product_price');
			$table->string('total_price');
		});
	}

	public function down()
	{
		Schema::drop('carts');
	}
}