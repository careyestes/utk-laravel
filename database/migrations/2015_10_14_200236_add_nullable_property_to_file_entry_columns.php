<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddNullablePropertyToFileEntryColumns extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('file_entries', function($table) {

			$table->dropColumn('caption');
			$table->dropColumn('alt');
			$table->dropColumn('title');

		});

	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{

		Schema::table('file_entries', function($table) {

			$table->string('caption');
	    $table->string('alt');
	    $table->string('title');
		
		});
		

	}

}
