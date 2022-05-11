<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSektorToAgensiOrganisasiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('agensi_organisasi', function (Blueprint $table) {
            $table->string('sektor')->nullable()->comment('1=kerajaan, 2=swasta');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('agensi_organisasi', function (Blueprint $table) {
            $table->dropColumn(['sektor']);
        });
    }
}
