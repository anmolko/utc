<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddIntroToSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('settings', function (Blueprint $table) {
            $table->string('intro_heading')->nullable();
            $table->string('intro_subheading')->nullable();
            $table->text('intro_description')->nullable();
            $table->string('intro_image')->nullable();
            $table->string('intro_button')->nullable();
            $table->string('intro_button_link')->nullable();

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
            $table->dropColumn('intro_heading');
            $table->dropColumn('intro_subheading');
            $table->dropColumn('intro_description');
            $table->dropColumn('intro_image');
            $table->dropColumn('intro_button');
            $table->dropColumn('intro_button_link');
        });
    }
}
