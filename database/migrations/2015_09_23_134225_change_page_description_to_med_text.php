<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangePageDescriptionToMedText extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('pages', function($table) {
			$table->dropColumn('description');
		});

		Schema::table('pages', function($table) {
			$table->mediumText('description');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{

		Schema::table('pages', function($table) {
			$table->dropColumn('description');
		});

		Schema::table('pages', function($table) {
			$table->string('description');
		});
	}

}
