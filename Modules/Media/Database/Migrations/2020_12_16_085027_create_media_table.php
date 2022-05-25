<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMediaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('media', function (Blueprint $table) {
            $table->increments('id');
            $table->string('post_type');
            $table->unsignedInteger('post_id')->index()->nullable;
            $table->foreign('post_id')->references('id')->on('post')->onDelete('cascade');
            $table->string('media',300);
            $table->tinyInteger('status')->default('1');
            $table->timestamps();
            $table->boolean('is_deleted')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('media');
    }
}
