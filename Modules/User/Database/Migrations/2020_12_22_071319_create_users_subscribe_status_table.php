<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersSubscribeStatusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users_subscribe_status', function (Blueprint $table) {
            $table->increments('id');
            $table->string('user_id');
           // $table->foreign('user_id')->references('uuid')->on('users')->onDelete('cascade');
            $table->integer('package');
            $table->string('status')->nullable();
            $table->dateTime('lastcharge');
            $table->dateTime('nextcharge');
            $table->integer('token');
            $table->integer('token_status');
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
        Schema::dropIfExists('users_subscribe_status');
    }
}
