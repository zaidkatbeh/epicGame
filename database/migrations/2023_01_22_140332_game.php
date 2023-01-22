<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('games',function(Blueprint $table){
            $table->id();
            $table->string('game_name');
            $table->string('game_description');
            $table->string('game_img');
            $table->integer('game_discount');
            $table->integer('game_price');
            $table->string('game_categore');
            $table->string('game_state');
            $table->rememberToken();
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
        Schema::drop('games');
    }
};
