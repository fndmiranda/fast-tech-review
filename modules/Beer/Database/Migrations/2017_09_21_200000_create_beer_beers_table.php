<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBeerBeersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('beer_beers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('tagline');
            $table->date('first_brewed');
            $table->text('description');
            $table->string('image_url');
            $table->string('yeast');
            $table->float('abv');
            $table->float('ibu');
            $table->integer('target_fg');
            $table->float('target_og');
            $table->integer('ebc')->nullable();
            $table->float('srm')->nullable();
            $table->float('ph')->nullable();
            $table->float('attenuation_level');
            $table->jsonb('volume');
            $table->jsonb('boil_volume');
            $table->jsonb('method');
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
        Schema::dropIfExists('beer_beers');
        Schema::enableForeignKeyConstraints();
    }
}
