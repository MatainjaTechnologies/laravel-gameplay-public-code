<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNotificationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if ( !Schema::hasTable('notifications') ) {
            Schema::create('notifications', function (Blueprint $table) {
                $table->increments('id');
                $table->string('title');
                $table->longText('description');
                $table->unsignedInteger('uid')->index();
                $table->foreign('uid')->references('id')->on('user')->onDelete('cascade');
                $table->string('type');
                $table->timestamps();
                $table->dateTime('deleted_at')->nullable();;
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
        Schema::dropIfExists('notifications');
    }
}
