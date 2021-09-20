<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddNameBmToCustomMetadataInputTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('custom_metadata_input', function (Blueprint $table) {
            $table->string('name_bm')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('custom_metadata_input', function (Blueprint $table) {
            $table->dropColumn(['name_bm']);
        });
    }
}
