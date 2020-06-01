<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class SuperpowersTableMigration extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public final function up() : void
    {
        Schema::create('superpowers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('superhero_id')->unsigned();
            $table->foreign('superhero_id')->references('id')->on('superheroes');
            $table->string('superpower_name');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public final function down() : void
    {
        Schema::dropIfExists('superpowers');
    }
}
