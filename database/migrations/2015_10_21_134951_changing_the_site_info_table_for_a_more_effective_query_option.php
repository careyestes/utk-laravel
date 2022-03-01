<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangingTheSiteInfoTableForAMoreEffectiveQueryOption extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::dropIfExists('site_infos');

		Schema::create('site_infos', function(Blueprint $table)
		{
			$table->string('site_info_key');
			$table->string('site_info_value');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{

		Schema::dropIfExists('site_infos');


		Schema::create('site_infos', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('homepage_subtext');
			$table->string('homepage_subtitle')->after('id')->nullable();
			$table->timestamps();
		});
	}

}
