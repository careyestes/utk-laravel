<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateUserTypeFkToCascade extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		// Schema::table('users', function(Blueprint $table) {
			// $table->dropForeign('users_user_id_foreign');
			// $table->dropColumn('user_id');
		// });

	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{

		// Schema::table('users', function(Blueprint $table) {
			// $table->integer('user_id')->unsigned();
		// });
	}

}
