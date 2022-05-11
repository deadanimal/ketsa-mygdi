<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class EditSuratBalasanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('surat_balasans', function (Blueprint $table) {
            $table->dropColumn('nama_alamat');
            $table->string('nama')->nullable();
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
        Schema::table('surat_balasans', function (Blueprint $table) {
            $table->string('nama_alamat');
            $table->dropColumn('nama');
            $table->dropColumn('alamat');
        });
    }
}
