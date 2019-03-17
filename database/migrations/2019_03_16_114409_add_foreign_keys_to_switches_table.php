<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToSwitchesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('switches', function(Blueprint $table)
		{
			$table->foreign('destination', 'switches_ibfk_1')->references('destination')->on('travels')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('username', 'switches_ibfk_2')->references('username')->on('users')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('switches', function(Blueprint $table)
		{
			$table->dropForeign('switches_ibfk_1');
			$table->dropForeign('switches_ibfk_2');
		});
	}

}
