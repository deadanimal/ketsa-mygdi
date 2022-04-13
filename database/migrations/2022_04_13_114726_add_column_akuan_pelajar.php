<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnAkuanPelajar extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('akuan_pelajars', function (Blueprint $table) {
            $table->string('nama1')->nullable();
            $table->string('nric')->nullable();
            $table->string('agensi_organisasi')->nullable();
            $table->string('nama2')->nullable();
            $table->string('tarikh')->nullable();
            $table->string('alamat')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('akuan_pelajars', function (Blueprint $table) {
            $table->dropColumn('nama1');
            $table->dropColumn('nric');
            $table->dropColumn('agensi_organisasi');
            $table->dropColumn('nama2');
            $table->dropColumn('tarikh');
            $table->dropColumn('alamat');
        });
    }
}
