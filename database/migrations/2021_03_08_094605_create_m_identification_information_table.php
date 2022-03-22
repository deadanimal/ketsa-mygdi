<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMIdentificationInformationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('m_identification_information', function (Blueprint $table) {
            $table->id();
            $table->string('metadata_name')->nullable();
            $table->string('product_type')->nullable();
            $table->text('abstract')->nullable();
            $table->string('contact_person_name')->nullable();
            $table->string('contact_person_address_1')->nullable();
            $table->string('contact_person_address_2')->nullable();
            $table->string('contact_person_address_3')->nullable();
            $table->string('contact_person_address_4')->nullable();
            $table->string('contact_person_state')->nullable();
            $table->string('contact_person_country')->nullable();
            $table->string('contact_person_email')->nullable();
            $table->string('contact_person_phone_office')->nullable();
            $table->string('contact_person_phone_mobile')->nullable();
            $table->string('contact_person_fax')->nullable();
            $table->string('contact_person_website')->nullable();
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
        Schema::dropIfExists('m_identification_information');
    }
}
