<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAppSettingsTable extends Migration {

	public function up()
	{
		Schema::create('app_settings', function(Blueprint $table) {
			$table->timestamps();
			$table->increments('id');
		});
	}

	public function down()
	{
		Schema::drop('app_settings');
	}
}