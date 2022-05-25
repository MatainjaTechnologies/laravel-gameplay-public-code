<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubscriberTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('subscriber')) {
            Schema::create('subscriber', function (Blueprint $table) {
                $table->id();
                $table->integer('user_id');
                // $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
                $table->string('msisdn')->nullable();
                $table->string('package')->nullable();
                $table->string('trxid')->nullable();
                $table->string('event')->nullable();
                $table->dateTime('start_date')->nullable();
                $table->dateTime('end_date')->nullable();
                $table->dateTime('recharge_date')->nullable();
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
        Schema::dropIfExists('subscriber');
    }
}
