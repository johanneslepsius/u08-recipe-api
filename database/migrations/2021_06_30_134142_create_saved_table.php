<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSavedTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('saved', function (Blueprint $table) {
            // $table->unsignedBigInteger('user_id');
            $table->id();
            $table->unsignedBigInteger('recipelist_id');
            $table->unsignedBigInteger('recipe_id');
            $table->timestamps();

            // $table->primary(['recipelist_id', 'recipe_id']);
            // $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('recipelist_id')->references('id')->on('recipelists');
            $table->foreign('recipe_id')->references('id')->on('recipes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('saved');
    }
}
