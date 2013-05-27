<?php

use Illuminate\Database\Migrations\Migration;

class InitialSchema extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('words', function($table)
		{
			$table->increments('id');
			$table->string('word',15)->unique();
			$table->integer('length')->unsigned()->index();
			$table->string('alphagram',15)->index();
			foreach( Word::$letters as $letter )
			{
				$table->integer($letter)->unsigned()->index()->default(0);
			}
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('words');
	}

}
