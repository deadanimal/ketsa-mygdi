<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeKawasanDataToTextAtSenaraiKawasanDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('senarai_kawasan_data', function (Blueprint $table) {
            $table->text('kawasan_data')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('senarai_kawasan_data', function (Blueprint $table) {
            $table->string('kawasan_data')->nullable()->change();
        });
    }
}
