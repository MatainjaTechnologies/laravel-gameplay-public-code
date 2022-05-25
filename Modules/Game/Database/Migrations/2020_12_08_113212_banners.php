<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Banners extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('banners')){
            Schema::create('banners', function (Blueprint $table) {
                $table->increments('id');
                $table->string('image');
                $table->unsignedInteger('game_id')->index();
                $table->foreign('game_id')->references('id')->on('games')->onDelete('cascade');
                $table->string('position');
                $table->tinyInteger('status')->default('1');
                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
