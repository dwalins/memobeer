<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBeerBeerslistPivotTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('beer_beerslist', function (Blueprint $table) {
            $table->integer('beer_id')->unsigned()->index();
            $table->foreign('beer_id')->references('id')->on('beers')->onDelete('cascade');
            $table->integer('beerslist_id')->unsigned()->index();
            $table->boolean('favorite');
            /*$table->timestamps();*/
            $table->timestamp('updated_at')->useCurrent();
            $table->timestamp('created_at')->useCurrent();
            $table->foreign('beerslist_id')->references('id')->on('beerslists')->onDelete('cascade');
            $table->primary(['beer_id', 'beerslist_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('beer_beerslist');
    }
}
