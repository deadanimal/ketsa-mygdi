<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSenaraiDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('senarai_data', function (Blueprint $table) {
            $table->id();

            $table->string('kategori',50)->nullable();
            $table->string('subkategori', 50)->nullable();
            $table->string('lapisan_data', 50)->nullable();
            $table->string('kategori_pemohon',50)->nullable();
            $table->string('kelas', 50)->nullable();
            $table->string('status', 25)->nullable();
            $table->string('harga_data', 50)->nullable();

            $table->foreignId('data_id')->nullable();

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
        Schema::dropIfExists('senarai_data');
    }
}
