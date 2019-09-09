<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCategoryProductTable extends Migration {

	public function up()
	{
		Schema::create('category_product', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('category_id');
			$table->integer('product_id');
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('category_product');
	}
}