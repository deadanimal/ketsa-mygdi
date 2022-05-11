<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDokumenBerkaitansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dokumen_berkaitans', function (Blueprint $table) {
            $table->id();

            $table->string('tajuk_dokumen')->nullable();
            $table->string('nama_fail')->nullable();
            $table->string('file_path')->nullable();

            $table->foreignId('permohonan_id');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dokumen_berkaitans');
    }
}
