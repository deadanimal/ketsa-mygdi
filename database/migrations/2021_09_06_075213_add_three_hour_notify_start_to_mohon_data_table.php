<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddThreeHourNotifyStartToMohonDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('mohon_data', function (Blueprint $table) {
            $table->string('threeHourNotifyStart')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('mohon_data', function (Blueprint $table) {
            $table->dropColumn(['threeHourNotifyStart']);
        });
    }
}
