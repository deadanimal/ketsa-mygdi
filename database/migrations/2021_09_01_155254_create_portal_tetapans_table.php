<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePortalTetapansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('portal_tetapans', function (Blueprint $table) {
            $table->id();

            $table->string('name')->nullable();
            $table->string('address')->nullable();
            $table->string('email_admin')->nullable();
            $table->string('contact')->nullable();
            $table->string('operation_time')->nullable();

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
        Schema::dropIfExists('portal_tetapans');
    }
}
