<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSpotlightsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('spotlights', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('title');
			$table->string('subtitle');
			$table->integer('featured_image')->nullable()->unsigned();
			$table->foreign('featured_image')->references('id')->on('file_entries')->onDelete('set null');
			$table->integer('user_id')->unsigned();
			$table->foreign('user_id')->references('id')->on('user_types');
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
		Schema::drop('spotlights');
	}

}
