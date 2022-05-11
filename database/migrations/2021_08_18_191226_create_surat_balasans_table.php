<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSuratBalasansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('surat_balasans', function (Blueprint $table) {
            $table->id();

            $table->string('no_rujukan')->nullable();
            $table->string('tajuk_surat')->nullable();
            $table->string('no_rujukan_mohon')->nullable();
            $table->timestamp('date_mohon')->nullable();

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
        Schema::dropIfExists('surat_balasans');
    }
}
