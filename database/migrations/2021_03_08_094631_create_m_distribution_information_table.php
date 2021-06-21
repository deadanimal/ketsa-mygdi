<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMDistributionInformationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('m_distribution_information', function (Blueprint $table) {
            $table->id();
            $table->string('dist_format')->nullable();
            $table->string('version')->nullable();
            $table->string('distributor')->nullable();
            $table->string('medium')->nullable();
            $table->string('dist_order_process_dist_unit')->nullable();
            $table->string('dist_order_process_size')->nullable();
            $table->string('dist_order_process_fees')->nullable();
            $table->string('dist_order_process_link')->nullable();
            $table->string('dist_order_process_order_instruct')->nullable();
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
        Schema::dropIfExists('m_distribution_information');
    }
}
