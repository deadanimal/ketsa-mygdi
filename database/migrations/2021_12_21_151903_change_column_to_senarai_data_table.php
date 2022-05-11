<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeColumnToSenaraiDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('senarai_data', function (Blueprint $table) {

            $table->string('kategori')->nullable()->change();
            $table->string('subkategori')->nullable()->change();
            $table->string('lapisan_data')->nullable()->change();
            $table->string('kategori_pemohon')->nullable()->change();
            $table->string('kelas')->nullable()->change();
            $table->string('status')->nullable()->change();
            $table->string('harga_data')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('senarai_data', function (Blueprint $table) {
            //
        });
    }
}
