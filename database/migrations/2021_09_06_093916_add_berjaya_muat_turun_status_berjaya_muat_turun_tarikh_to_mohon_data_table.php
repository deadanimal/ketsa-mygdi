<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddBerjayaMuatTurunStatusBerjayaMuatTurunTarikhToMohonDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('mohon_data', function (Blueprint $table) {
            $table->string('berjayaMuatTurunStatus')->default(0)->comment('0=belum berjaya,1=berjaya');
            $table->string('berjayaMuatTurunTarikh')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('mohon_data', function (Blueprint $table) {
            $table->dropColumn(['berjayaMuatTurunStatus','berjayaMuatTurunTarikh']);
        });
    }
}
