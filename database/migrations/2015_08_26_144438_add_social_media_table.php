<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddSocialMediaTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('social_media_types', function($table)
		{
		    $table->increments('id');
		    $table->string('social_media_name');
		});


		Schema::create('social_media_feeds', function($table)
		{
		    $table->increments('id');
		    $table->integer('feed_type')->unsigned();
		    $table->timestamps();

		    $table->foreign('feed_type')->references('id')->on('social_media_types')->onDelete('cascade');
		
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('social_media_feeds');
		Schema::dropIfExists('social_media_types');
	}

}
