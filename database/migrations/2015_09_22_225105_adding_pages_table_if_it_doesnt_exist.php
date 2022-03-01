<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddingPagesTableIfItDoesntExist extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		if (!Schema::hasTable('pages')){
			 Schema::create('pages', function($table) {
		    $table->increments('id');
		    $table->string('title');
		    $table->string('slug')->unique();
		    $table->string('description')->unique();
		    $table->timestamps();
				$table->integer('user_id')->unsigned();
				$table->foreign('user_id')->references('id')->on('user_types');
			}); 
		}
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		if(Schema::hasTable('pages')){
			 Schema::drop('pages');
		}
	}

}
