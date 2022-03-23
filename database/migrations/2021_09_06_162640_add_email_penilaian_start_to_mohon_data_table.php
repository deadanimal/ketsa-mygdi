<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddEmailPenilaianStartToMohonDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('mohon_data', function (Blueprint $table) {
            $table->string('emailPenilaianStart')->nullable();
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
            $table->dropColumn(['emailPenilaianStart']);
        });
    }
}
