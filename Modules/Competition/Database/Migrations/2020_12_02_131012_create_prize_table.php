<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePrizeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if ( !Schema::hasTable('prize') ) {
            Schema::create('prize', function (Blueprint $table) {
                $table->id()->unsigned();
                $table->bigInteger('schedule_id')->unsigned();
                $table->string('prize_name');
                $table->string('prize_text');
                $table->integer('prize_coins');
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
        Schema::dropIfExists('prize');
    }
}
