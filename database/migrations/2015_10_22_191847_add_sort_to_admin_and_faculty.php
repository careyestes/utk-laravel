<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddSortToAdminAndFaculty extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('user_types', function(Blueprint $table) {
			$table->integer('sort');
		});

		Schema::table('admin_roles', function(Blueprint $table) {
			$table->integer('sort');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('user_types', function(Blueprint $table) {
			$table->dropColumn('sort');
		});

		Schema::table('admin_roles', function(Blueprint $table) {
			$table->dropColumn('sort');
		});
	}

}
