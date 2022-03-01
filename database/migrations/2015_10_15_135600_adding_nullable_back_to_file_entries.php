<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddingNullableBackToFileEntries extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('file_entries', function($table) {

			$table->string('caption')->nullable();
	    $table->string('alt')->nullable();
	    $table->string('title')->nullable();

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

			$table->dropColumn('caption');
			$table->dropColumn('alt');
			$table->dropColumn('title');

		});
	}

}
