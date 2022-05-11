<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddKetsaColumnsToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('nric')->nullable();
            $table->string('agensi_organisasi')->nullable();
            $table->string('bahagian')->nullable();
            $table->string('sektor')->nullable()->comment('1=kerajaan,2=swasta');
            $table->string('phone_pejabat')->nullable();
            $table->string('phone_bimbit')->nullable();
            $table->string('surat_sokongan')->nullable();
            $table->string('disahkan')->default(0)->comment('0=belum disahkan,1=sudah disahkan,2=pengesahan ditolak');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn([
                'nric',
                'agensi_organisasi',
                'bahagian',
                'sektor',
                'phone_pejabat',
                'phone_bimbit',
                'surat_sokongan',
            ]);
        });
    }
}
