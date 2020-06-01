<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ImageTableMigration extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public final function up() : void
    {
        Schema::create('images', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('superhero_id')->unsigned();
            $table->foreign('superhero_id')->references('id')->on('superheroes');
            $table->string('image_name')->default('default_avatar.png');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public final function down() : void
    {
        Schema::dropIfExists('images');
    }
}
