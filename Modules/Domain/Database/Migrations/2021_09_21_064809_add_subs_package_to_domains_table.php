<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddSubsPackageToDomainsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('domains', function (Blueprint $table) {
            $table->longText('daily_subs_url')->nullable()->after('destination_path');
            $table->longText('weekly_subs_url')->nullable();
            $table->longText('monthly_subs_url')->nullable();
            $table->longText('yearly_subs_url')->nullable();
            $table->longText('renew_subs_url')->nullable();
        });
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('domains', function (Blueprint $table) {
            $table->dropColumn('daily_subs_url');
            $table->dropColumn('weekly_subs_url');
            $table->dropColumn('monthly_subs_url');
            $table->dropColumn('yearly_subs_url');
            $table->dropColumn('renew_subs_url');
        });
    }
} 

