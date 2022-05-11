<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddHargaFizikalToSenaraiDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('senarai_data', function (Blueprint $table) {
            $table->string('harga_data_fizikal')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('senarai_data', function (Blueprint $table) {
            $table->dropColumn('harga_data_fizikal');
        });
    }
}
