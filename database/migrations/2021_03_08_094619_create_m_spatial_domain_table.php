<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMSpatialDomainTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('m_spatial_domain', function (Blueprint $table) {
            $table->id();
            $table->string('west_bound_long')->nullable();
            $table->string('east_bound_long')->nullable();
            $table->string('north_bound_lat')->nullable();
            $table->string('south_bound_lat')->nullable();
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
        Schema::dropIfExists('m_spatial_domain');
    }
}
