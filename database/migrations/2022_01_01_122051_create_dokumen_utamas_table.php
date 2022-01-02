<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDokumenUtamasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dokumen_utamas', function (Blueprint $table) {
            $table->id();

            $table->text('content')->default('-')->nullable();
            $table->string('doc_path')->nullable();
            $table->string('doc_name')->nullable();
            $table->string('doc_type')->nullable();

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
        Schema::dropIfExists('dokumen_utamas');
    }
}
