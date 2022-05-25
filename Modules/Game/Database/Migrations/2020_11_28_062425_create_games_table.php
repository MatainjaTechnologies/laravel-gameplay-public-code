<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGamesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if ( !Schema::hasTable('games') ) {
            Schema::create('games', function (Blueprint $table) {
                $table->increments('id');
                $table->uuid('uuid');
                $table->string('name');
                $table->longText('description');
                $table->longText('rule');
                $table->unsignedInteger('category_id')->index();
                $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
                $table->bigInteger('coin');
                $table->bigInteger('version');
                $table->boolean('is_home');
                $table->string('image');
                $table->string('url');
                $table->timestamps();
                $table->boolean('is_deleted')->nullable();
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
        Schema::dropIfExists('games');
        Schema::dropIfExists('categories');
    }
}
