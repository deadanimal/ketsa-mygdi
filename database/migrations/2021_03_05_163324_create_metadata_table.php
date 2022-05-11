<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMetadataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('metadata', function (Blueprint $table) {
            $table->id();
            $table->string('m_category')->nullable();
            $table->string('general_info__content_info')->nullable();
            $table->integer('m_identification_information')->nullable();
            $table->integer('m_spatial_domain')->nullable();
            $table->string('browse_info__file_name')->nullable();
            $table->string('browse_info__url')->nullable();
            $table->integer('m_distribution_information')->nullable();
            $table->integer('m_data_set_identification')->nullable();
            $table->integer('m_reference_system_information')->nullable();
            $table->integer('m_constraints')->nullable();
            $table->integer('m_data_quality')->nullable();
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
        Schema::dropIfExists('metadata');
    }
}
