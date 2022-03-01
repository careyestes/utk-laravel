<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFileentriesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('file_entries', function($table)
		{
		    $table->increments('id');
		    $table->string('filename');
		    $table->string('mime');
		    $table->string('caption');
		    $table->string('alt');
		    $table->string('title');
		    $table->string('original_filename');
				$table->timestamps();
		
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('file_entries');
	}

}
