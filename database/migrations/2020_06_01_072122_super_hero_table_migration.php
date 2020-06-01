<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class SuperHeroTableMigration extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public final function up() : void
    {
        Schema::create('superheroes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nickname');
            $table->string('real_name');
            $table->longText('origin_description');
            $table->string('catch_phrase');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public final function down() : void
    {
        Schema::dropIfExists('superheroes');
    }
}
