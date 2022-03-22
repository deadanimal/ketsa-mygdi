<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReferenceSystemIdentifierTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reference_system_identifier', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('projection')->nullable();
            $table->string('axis_units')->nullable();
            $table->string('semi_major_axis')->nullable();
            $table->string('datum')->nullable();
            $table->string('ellipsoid')->nullable();
            $table->string('denominator_flattening_ratio')->nullable();
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
        Schema::dropIfExists('reference_system_identifier');
    }
}
