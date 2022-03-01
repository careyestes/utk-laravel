<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TweakColumnsInLocations extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		// Schema::table('locations', function($table) {
		// 	$table->timestamps();
		// 	$table->integer('user_id')->unsigned();
		// 	$table->foreign('user_id')->references('id')->on('user_types');
		// });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		// Schema::table('locations', function($table) {
		// 	$table->string('is_published');

		// 	$table->dropColumn('user_id');
		// 	$table->dropColumn('created_at');
		// 	$table->dropColumn('updated_at');
		// });
	}

}
