<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBrewerysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('brewerys', function (Blueprint $table) {
            $table->increments('id');
            $table->string('breweryId');
            $table->string('name');
            $table->string('shortName');
            $table->text('description');
            $table->string('website');
            $table->integer('established');
            $table->string('logo_small');
            $table->string('logo');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('brewerys');
    }
}
