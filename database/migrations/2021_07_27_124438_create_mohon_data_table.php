<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMohonDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mohon_data', function (Blueprint $table) {
            $table->id();

            $table->string('name');
            $table->timestamp('date');
            $table->string('tujuan');
            $table->string('dihantar')->nullable();
            $table->string('status')->nullable();
            $table->string('download')->nullable();
            $table->string('penilaian')->nullable();
            $table->string('assign_admin')->nullable();
            $table->string('catatan')->nullable();

            $table->foreignId('user_id');

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
        Schema::dropIfExists('mohon_data');
    }
}
