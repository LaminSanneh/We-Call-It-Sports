<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompetitionsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('competitions', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('name', 150);
			$table->string('abbreviation', 150);
			$table->string('short_name', 150);
			$table->boolean('is_tournament');
			$table->integer('sport_id');
			$table->integer('country_id');
			$table->timestamps();

			// $table->foreign('sport_id')->references('id')->on('sports');
			// $table->foreign('country_id')->references('id')->on('countries');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('competitions');
	}

}
