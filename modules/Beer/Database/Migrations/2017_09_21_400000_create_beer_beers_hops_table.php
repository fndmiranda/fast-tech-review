<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBeerBeersHopsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('beer_beers_hops', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('beer_id');
            $table->foreign('beer_id')->references('id')->on('beer_ingredients')->onDelete('cascade');
            $table->integer('ingredient_id');
            $table->foreign('ingredient_id')->references('id')->on('beer_ingredients')->onDelete('cascade');
            $table->jsonb('amount')->nullable();
            $table->string('add')->nullable();
            $table->string('attribute')->nullable();
            $table->softDeletes();
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
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('beer_beers_hops');
        Schema::enableForeignKeyConstraints();
    }
}
