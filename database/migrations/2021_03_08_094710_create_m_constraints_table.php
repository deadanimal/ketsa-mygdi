<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMConstraintsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('m_constraints', function (Blueprint $table) {
            $table->id();
            $table->string('legal_access_constraint')->nullable();
            $table->string('legal_use_constraint')->nullable();
            $table->string('security_classification')->nullable();
            $table->string('security_reference')->nullable();
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
        Schema::dropIfExists('m_constraints');
    }
}
