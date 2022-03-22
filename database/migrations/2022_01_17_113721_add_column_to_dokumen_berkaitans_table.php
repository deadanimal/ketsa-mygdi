<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnToDokumenBerkaitansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('dokumen_berkaitans', function (Blueprint $table) {
            $table->string('no_rujukan')->nullable();
            $table->timestamp('date_surat')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('dokumen_berkaitans', function (Blueprint $table) {
            $table->dropColumn('no_rujukan');
            $table->dropColumn('date_surat');
        });
    }
}
