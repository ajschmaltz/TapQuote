<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
    Schema::create('projects', function(Blueprint $table)
    {
      $table->increments('id');
      $table->json('photos');
      $table->string('tag');
      $table->text('desc');
      $table->string('zip');
      $table->string('cell');
      $table->integer('relay_id')->unsigned();
      $table->integer('status')->default(1)->unsigned();
      $table->timestamps();
    });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('projects');
	}

}
