<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWinnersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if ( !Schema::hasTable('winners') ) {
            Schema::create('winners', function (Blueprint $table) {
                $table->increments('id');
                $table->bigInteger('competition_id');
                $table->foreign('competition_id')->references('id')->on('competitions')->onDelete('cascade');
                $table->date('competition_start_date');
                $table->date('competition_end_date');
                $table->string('game_uuid');
                $table->bigInteger('user_id');
                $table->date('date_of_users_played');
                $table->bigInteger('game_score');
                $table->string('position');
                $table->string('prize_image');
                $table->string('cron_type');

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
        Schema::dropIfExists('winners');
    }
}
