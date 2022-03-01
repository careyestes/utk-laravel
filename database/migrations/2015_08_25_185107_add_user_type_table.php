<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddUserTypeTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('user_type', function($table)
		{
		    $table->increments('id');
		    $table->string('type');
		
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		// Schema::table('locations', function($table) {
		// 	$table->dropForeign('locations_user_id_foreign');
		// });
		Schema::dropIfExists('user_type');
	}

}
