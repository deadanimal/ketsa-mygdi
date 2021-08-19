<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAkuanPelajarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('akuan_pelajars', function (Blueprint $table) {
            $table->id();

            $table->string('title')->nullable();

            $table->string('peta_topo_a')->nullable();
            $table->string('peta_topo_b')->nullable();
            $table->string('peta_topo_c')->nullable();

            $table->string('foto_udara_a')->nullable();
            $table->string('foto_udara_b')->nullable();
            $table->string('foto_udara_c')->nullable();

            $table->string('lain_a')->nullable();
            $table->string('lain_b')->nullable();
            $table->string('lain_c')->nullable();

            $table->string('digital_sign')->nullable();

            $table->foreignId('permohonan_id')->nullable();

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
        Schema::dropIfExists('akuan_pelajars');
    }
}
