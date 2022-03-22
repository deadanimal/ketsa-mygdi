<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMaklumBalasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('maklum_balas', function (Blueprint $table) {
            $table->id();
            $table->string('category')->nullable();
            $table->string('pertanyaan')->nullable();
            $table->string('email')->nullable();
            $table->string('status')->nullable()->comment('0=unchecked,1=checked');
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
        Schema::dropIfExists('maklum_balas');
    }
}
