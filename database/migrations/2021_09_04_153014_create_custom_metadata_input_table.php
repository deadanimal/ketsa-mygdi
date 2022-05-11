<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomMetadataInputTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('custom_metadata_input', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('input_type')->nullable();
            $table->string('data')->nullable();
            $table->string('mandatory')->nullable();
            $table->string('status')->nullable();
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
        Schema::dropIfExists('custom_metadata_input');
    }
}
