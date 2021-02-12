<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMovieModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('movie_models', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('movie_title');
            $table->string('productionYear');
            $table->string('thumbnail');
            $table->string('duration');
            $table->string('genre');
            $table->string('synopsis');
            $table->string('description');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('movie_models');
    }
}
