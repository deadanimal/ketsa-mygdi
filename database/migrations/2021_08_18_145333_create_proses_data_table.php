<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProsesDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('proses_data', function (Blueprint $table) {
            $table->id();

            $table->string('pautan_data')->nullable();
            $table->timestamp('tempoh')->nullable();
            $table->string('total_harga')->nullable();

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
        Schema::dropIfExists('proses_data');
    }
}
