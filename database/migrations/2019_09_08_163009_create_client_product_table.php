<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateClientProductTable extends Migration {

	public function up()
	{
		Schema::create('client_product', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->integer('client_id');
			$table->integer('product_id');
			$table->integer('rate');
			$table->text('comment');
		});
	}

	public function down()
	{
		Schema::drop('client_product');
	}
}