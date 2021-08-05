<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSenaraiKawasanDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('senarai_kawasan_data', function (Blueprint $table) {
            $table->id();

            $table->string('lapisan_data', 50);
            $table->string('kategori',50);
            $table->string('subkategori', 50);
            $table->string('kawasan_data', 50);

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
        Schema::dropIfExists('senarai_kawasan_data');
    }
}
