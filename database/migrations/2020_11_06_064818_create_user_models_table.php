<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_models', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('Fname');
            $table->string('Lname');
            $table->String('Email')->unique();
            $table->string('Password');
            $table->unsignedInteger('role_id');
            $table->foreign('role_id')->references('id')->on('role_models');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_models');
    }
}
