<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFeaturedToHomepageStories extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('homepage_stories', function(Blueprint $table)
		{
		$table->tinyInteger('featured')->nullable();		
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('homepage_stories', function(Blueprint $table)
		{
		$table->dropColumn('featured');	
		});
	}

}
