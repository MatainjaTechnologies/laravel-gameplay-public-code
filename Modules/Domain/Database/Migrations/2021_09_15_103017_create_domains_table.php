<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDomainsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('domains')) {
            Schema::create('domains', function (Blueprint $table) {
                $table->id();
                $table->string('domian_name')->unique();
                $table->text('logo')->nullable();
                $table->longText('source_path')->nullable();
                $table->longText('destination_path')->nullable();
                $table->longText('subscribe_notify_url')->nullable();
                $table->longText('unsubscribe_notify_url')->nullable();
                $table->boolean('status')->default('1');
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
        Schema::dropIfExists('domains');
    }
}
