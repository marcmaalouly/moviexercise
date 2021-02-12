<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReviewModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('review_models', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('title');
            $table->timestamp('reviewDate')->nullable();
            $table->string('description');
            $table->unsignedInteger('user_id');
            $table->unsignedInteger('movie_id');
            $table->foreign('user_id')->references('id')->on('user_models');
            $table->foreign('movie_id')->references('id')->on('movie_models');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('review_models');
    }
}
