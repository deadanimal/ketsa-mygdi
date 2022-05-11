<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePenilaiansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('penilaians', function (Blueprint $table) {
            $table->id();

            $table->string('kategori')->nullable();
            $table->string('info_data')->nullable();

            $table->string('bhg_b_a')->nullable();
            $table->string('bhg_b_b')->nullable();
            $table->string('bhg_b_c')->nullable();
            $table->string('bhg_b_d')->nullable();
            $table->string('bhg_b_e')->nullable();
            $table->string('bhg_b_f')->nullable();
            $table->string('bhg_b_g')->nullable();

            $table->string('bhg_c_1')->nullable();
            $table->string('bhg_c_2')->nullable();
            $table->string('bhg_c_3')->nullable();
            $table->string('bhg_c_4_file_path')->nullable();
            $table->string('komen_cadangan')->nullable();

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
        Schema::dropIfExists('penilaians');
    }
}
