<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateElemenMetadataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('elemen_metadata', function (Blueprint $table) {
            $table->id();
            $table->string('elemen')->nullable();
            $table->string('kategori')->nullable();
            $table->string('label')->nullable();
            $table->string('tajuk')->nullable();
            $table->string('sub_tajuk')->nullable();
            $table->string('status')->nullable();
            $table->string('data_type')->nullable();
            $table->string('created_by')->nullable();
            $table->string('updated_by')->nullable();
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
        Schema::dropIfExists('elemen_metadata');
    }
}
