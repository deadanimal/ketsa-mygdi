<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddBahagianToAgensiOrganisasiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('agensi_organisasi', function (Blueprint $table) {
            $table->string('bahagian')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('agensi_organisasi', function (Blueprint $table) {
            $table->dropColumn(['bahagian']);
        });
    }
}
