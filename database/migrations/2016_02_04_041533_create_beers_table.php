<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBeersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('beers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('api_id');
            $table->string('name');
            $table->integer('style_id');
            $table->string('brewery_id');
            $table->float('abv');
            $table->text('description');
            $table->string('logo_url');
            $table->string('logo_small_url');
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
        Schema::drop('beers');
    }
}
