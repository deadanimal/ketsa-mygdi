<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMReferenceSystemInformationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('m_reference_system_information', function (Blueprint $table) {
            $table->id();
            $table->string('identifier')->nullable();
            $table->string('projection')->nullable();
            $table->string('ellipsoid')->nullable();
            $table->string('semi_major_axis')->nullable();
            $table->string('axis_units')->nullable();
            $table->string('denominator_flat_ratio')->nullable();
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
        Schema::dropIfExists('m_reference_system_information');
    }
}
