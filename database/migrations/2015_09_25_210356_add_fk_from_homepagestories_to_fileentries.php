<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFkFromHomepagestoriesToFileentries extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('homepage_stories', function(Blueprint $table) {
			$table->dropColumn('featured_image');
		});

		Schema::table('homepage_stories', function(Blueprint $table) {
			$table->integer('featured_image')->nullable()->unsigned();
			$table->foreign('featured_image')->references('id')->on('file_entries')->onDelete('set null');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{

		Schema::table('homepage_stories', function(Blueprint $table) {
			$table->dropForeign('homepage_stories_featured_image_foreign');
			$table->dropColumn('featured_image');
		});


		Schema::table('homepage_stories', function(Blueprint $table) {
			$table->string('featured_image');
		});
	}

}
