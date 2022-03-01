<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddSiteInfoSubtitle extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('site_infos', function(Blueprint $table) {
			$table->string('homepage_subtitle')->after('id')->nullable();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('site_infos', function(Blueprint $table) {
			$table->dropColumn('homepage_subtitle');
		});
	}

}
