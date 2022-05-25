<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('post', function (Blueprint $table) {
            $table->increments('id');
                $table->uuid('uuid');
                $table->string('name');
                $table->unsignedInteger('category_id')->index();
                $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
                $table->string('rating');
                $table->longText('description');
                $table->boolean('is_home');
                $table->string('image');
                $table->string('file')->nullable();
                $table->string('post_type');
                $table->string('application_type')->nullable();
                $table->string('application_platform')->nullable();
                $table->string('top_chart');
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
        Schema::dropIfExists('post');
    }
}
