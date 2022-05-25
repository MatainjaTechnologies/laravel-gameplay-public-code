<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompetitionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('competitions', function (Blueprint $table) {
           $table->id();
            $table->bigInteger('id_competitiongame');
            $table->integer('competition_type');
            $table->string('prize_image1');
            $table->integer('prize_coins1')->nullable();  ;
            $table->string('prize_image2');
            $table->integer('prize_coins2')->nullable();
            $table->string('prize_image3');
            $table->integer('prize_coins3')->nullable();
            $table->date('start_date');
            $table->date('end_date');
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
        Schema::dropIfExists('competitions');
    }
}
