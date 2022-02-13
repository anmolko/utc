<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddStatusToSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('settings', function (Blueprint $table) {
            $table->string('customer_served')->nullable();
            $table->string('visa_approved')->nullable();
            $table->string('success_stories')->nullable();
            $table->string('happy_customers')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('settings', function (Blueprint $table) {
            $table->dropColumn('customer_served');
            $table->dropColumn('visa_approved');
            $table->dropColumn('success_stories');
            $table->dropColumn('happy_customers');
        });
    }
}
