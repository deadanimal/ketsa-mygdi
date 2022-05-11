<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMDataQualityTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('m_data_quality', function (Blueprint $table) {
            $table->id();
            $table->string('dq_scope')->nullable();
            $table->text('data_history')->nullable();
            $table->dateTime('date')->nullable();
            $table->string('completeness_commission__scope')->nullable();
            $table->string('completeness_commission__result')->nullable();
            $table->string('completeness_commission__comply_level')->nullable();
            $table->string('completeness_commission__conform_result')->nullable();
            $table->dateTime('completeness_commission__date')->nullable();
            $table->string('completeness_omission__scope')->nullable();
            $table->string('completeness_omission__result')->nullable();
            $table->string('completeness_omission__comply_level')->nullable();
            $table->string('completeness_omission__conform_result')->nullable();
            $table->dateTime('completeness_omission__date')->nullable();
            $table->string('consistency_concept__scope')->nullable();
            $table->string('consistency_concept__result')->nullable();
            $table->string('consistency_concept__comply_level')->nullable();
            $table->string('consistency_concept__conform_result')->nullable();
            $table->dateTime('consistency_concept__date')->nullable();
            $table->string('consistency_domain__scope')->nullable();
            $table->string('consistency_domain__result')->nullable();
            $table->string('consistency_domain__comply_level')->nullable();
            $table->string('consistency_domain__conform_result')->nullable();
            $table->dateTime('consistency_domain__date')->nullable();
            $table->string('consistency_format__scope')->nullable();
            $table->string('consistency_format__result')->nullable();
            $table->string('consistency_format__comply_level')->nullable();
            $table->string('consistency_format__conform_result')->nullable();
            $table->dateTime('consistency_format__date')->nullable();
            $table->string('consistency_topo__scope')->nullable();
            $table->string('consistency_topo__result')->nullable();
            $table->string('consistency_topo__comply_level')->nullable();
            $table->string('consistency_topo__conform_result')->nullable();
            $table->dateTime('consistency_topo__date')->nullable();
            $table->string('posi_accu_abso_or_ext__scope')->nullable();
            $table->string('posi_accu_abso_or_ext__result')->nullable();
            $table->string('posi_accu_abso_or_ext__comply_level')->nullable();
            $table->string('posi_accu_abso_or_ext__conform_result')->nullable();
            $table->dateTime('posi_accu_abso_or_ext__date')->nullable();
            $table->string('posi_accu_rela_or_int__scope')->nullable();
            $table->string('posi_accu_rela_or_int__result')->nullable();
            $table->string('posi_accu_rela_or_int__comply_level')->nullable();
            $table->string('posi_accu_rela_or_int__conform_result')->nullable();
            $table->dateTime('posi_accu_rela_or_int__date')->nullable();
            $table->string('posi_accu_gridded_data__scope')->nullable();
            $table->string('posi_accu_gridded_data__result')->nullable();
            $table->string('posi_accu_gridded_data__comply_level')->nullable();
            $table->string('posi_accu_gridded_data__conform_result')->nullable();
            $table->dateTime('posi_accu_gridded_data__date')->nullable();
            $table->string('temp_accu_time_measure__scope')->nullable();
            $table->string('temp_accu_time_measure__result')->nullable();
            $table->string('temp_accu_time_measure__comply_level')->nullable();
            $table->string('temp_accu_time_measure__conform_result')->nullable();
            $table->dateTime('temp_accu_time_measure__date')->nullable();
            $table->string('temp_accu_temp_consistency__scope')->nullable();
            $table->string('temp_accu_temp_consistency__result')->nullable();
            $table->string('temp_accu_temp_consistency__comply_level')->nullable();
            $table->string('temp_accu_temp_consistency__conform_result')->nullable();
            $table->dateTime('temp_accu_temp_consistency__date')->nullable();
            $table->string('temp_accu_temp_validity__scope')->nullable();
            $table->string('temp_accu_temp_validity__result')->nullable();
            $table->string('temp_accu_temp_validity__comply_level')->nullable();
            $table->string('temp_accu_temp_validity__conform_result')->nullable();
            $table->dateTime('temp_accu_temp_validity__date')->nullable();
            $table->string('them_accu_class_correct__scope')->nullable();
            $table->string('them_accu_class_correct__result')->nullable();
            $table->string('them_accu_class_correct__comply_level')->nullable();
            $table->string('them_accu_class_correct__conform_result')->nullable();
            $table->dateTime('them_accu_class_correct__date')->nullable();
            $table->string('them_accu_non_quant_attr_correct__scope')->nullable();
            $table->string('them_accu_non_quant_attr_correct__result')->nullable();
            $table->string('them_accu_non_quant_attr_correct__compy_level')->nullable();
            $table->string('them_accu_non_quant_attr_correct__conform_result')->nullable();
            $table->dateTime('them_accu_non_quant_attr_correct__date')->nullable();
            $table->string('them_accu_quant_attr_correct__scope')->nullable();
            $table->string('them_accu_quant_attr_correct__result')->nullable();
            $table->string('them_accu_quant_attr_correct__comply_level')->nullable();
            $table->string('them_accu_quant_attr_correct__conform_result')->nullable();
            $table->dateTime('them_accu_quant_attr_correct__date')->nullable();
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
        Schema::dropIfExists('m_data_quality');
    }
}
