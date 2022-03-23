<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTajukTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tajuk', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('kategori')->nullable();
            $table->string('label')->nullable();
            $table->string('sub_tajuk')->nullable();
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
        Schema::dropIfExists('tajuk');
    }
}
