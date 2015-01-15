<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProProjectTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
    Schema::create('pro_project', function(Blueprint $table)
    {
      $table->increments('id');
      $table->integer('pro_id')->unsigned();
      $table->integer('project_id')->unsigned();
      $table->string('pid');
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
    Schema::drop('pro_project');
	}

}
