<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCallactionsToSettings extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('settings', function (Blueprint $table) {
            $table->text('callaction1_heading')->nullable();
            $table->string('callaction1_button')->nullable();
            $table->string('callaction1_button_link')->nullable();
            $table->string('callaction1_image')->nullable();
            $table->text('callaction2_heading')->nullable();
            $table->text('callaction2_subheading')->nullable();
            $table->string('callaction2_button')->nullable();
            $table->string('callaction2_button_link')->nullable();
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
            $table->dropColumn('callaction1_heading');
            $table->dropColumn('callaction1_button');
            $table->dropColumn('callaction1_button_link');
            $table->dropColumn('callaction1_image');
            $table->dropColumn('callaction2_heading');
            $table->dropColumn('callaction2_subheading');
            $table->dropColumn('callaction2_button');
            $table->dropColumn('callaction2_button_link');

        });
    }
}
