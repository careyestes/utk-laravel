<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('events', function($table)
    {
        $table->increments('id');
        $table->string('title');
        $table->string('slug')->unique();
        $table->mediumText('description');
        $table->dateTime('start_date');
        $table->dateTime('end_date');
        $table->dateTime('start_time');
        $table->dateTime('end_time');
        $table->string('contact_name');
        $table->string('contact_email');
        $table->string('contact_phone');
        $table->string('contact_url');
        $table->integer('location_id')->unsigned();
        $table->boolean('is_approved');
        $table->boolean('is_published');
        $table->timestamps();

        $table->foreign('location_id')->references('id')->on('locations')->onDelete('cascade');
    });
	}

	public function down()
	{
	    Schema::drop('events');
	}

}
