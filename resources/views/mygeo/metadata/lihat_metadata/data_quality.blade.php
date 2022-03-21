<div class="card card-primary mb-4 div_c15" id="div_c15">
    <div class="card-header">
        <a href="#collapse15" data-toggle="collapse">
            <h4 class="card-title">
                <?php echo __('lang.accord_15'); ?>
            </h4>
        </a>
    </div>
    <div id="collapse15" class="panel-collapse collapse in show" data-parent="#div_c15">
        <div class="card-body">
            <div class="form-group row col-xl-6">
                <b>Data Quality Information</b>
            </div>
            <div class="pl-lg-2">
                <div class="row mb-2">
                    <?php
                    foreach($template->template[strtolower($catSelected)]['accordion15'] as $key=>$val){
                        if($val['status'] == "customInput"){
                            ?>
                            <div <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                                <div class="col-xl-2">
                                    <label class="form-control-label float-right" for="input-datahistory">
                                        {{ $val['label_'.$langSelected] }}</label>
                                </div>
                                <div class="col-md-2">
                                    <?php echo $dataHist; ?>
                                </div>  

                                <div class="row mb-2 sortIt">
                                    <div class="col-3 pl-5">
                                        <label class="form-control-label mr-4 customInput_label" for="uname">{{ $val['label_'.$langSelected] }}</label>
                                        <label class="float-right">:</label>
                                    </div>
                                    <div class="col-8">
                                        {{ $metadataxml->customInputs->accordion15->$key }}
                                    </div>
                                </div>
                            </div>
                            <?php
                        }
                        if($key == "c15_data_quality_info"){
                            $dqScope = "";
                            if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->scope->DQ_Scope->level->MD_ScopeCode) && $metadataxml->dataQualityInfo->DQ_DataQuality->scope->DQ_Scope->level->MD_ScopeCode != "") {
                                $dqScope = ucwords(trim($metadataxml->dataQualityInfo->DQ_DataQuality->scope->DQ_Scope->level->MD_ScopeCode));
                            }
                            if($dqScope == "AttributeType"){
                                $dqScope = "Attribute Type";
                            }elseif($dqScope == "CollectionSession"){
                                $dqScope = "Collection Session";
                            }elseif($dqScope == "NonGeographicDataset"){
                                $dqScope = "Non Geographic Data Set";
                            }elseif($dqScope == "DimensionGroup"){
                                $dqScope = "Dimension Group";
                            }elseif($dqScope == "FeatureType"){
                                $dqScope = "Feature Type";
                            }elseif($dqScope == "PropertyType"){
                                $dqScope = "Property Type";
                            }elseif($dqScope == "FieldSession"){
                                $dqScope = "Field Session";
                            }
                            if($dqScope != ""){
                                ?>
                                <div class="col-xl-1" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                                    <label class="form-control-label" for="input-DQscope">
                                        DQ Scope
                                    </label>
                                </div>
                                <div class="col-xl-3" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                                    <?php echo trim($dqScope); ?>
                                </div>
                                <?php 
                            }
                        }
                        if($key == "c15_data_history"){
                            $dataHist = "";
                            if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->lineage->LI_Lineage->statement->CharacterString) && $metadataxml->dataQualityInfo->DQ_DataQuality->lineage->LI_Lineage->statement->CharacterString != "") {
                                $dataHist = $metadataxml->dataQualityInfo->DQ_DataQuality->lineage->LI_Lineage->statement->CharacterString;
                            }
                            if($dataHist != ""){
                                ?>
                                <div class="col-xl-2" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                                    <label class="form-control-label float-right" for="input-datahistory">
                                        Data History</label>
                                </div>
                                <div class="col-md-2" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                                    <?php echo $dataHist; ?>
                                </div>      
                                <?php
                            }
                        }
                        if($key == "c15_date"){
                            $dqDate = "";
                            if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_Element->dateTime->Date) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_Element->dateTime->Date != "") {
                                $dqDate = trim($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_Element->dateTime->Date);
                            }
                            if($dqDate != ""){
                                ?>
                                <div class="col-xl-1" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                                    <label class="form-control-label  float-right" for="input-date">
                                        Date
                                    </label>
                                </div>
                                <div class="col-xl-3" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                                    <?php echo date('d/m/Y',strtotime(trim($dqDate))); ?>
                                </div>
                                <?php
                            }
                        }
                    }
                    ?>
                </div>
            </div>

            &nbsp;&nbsp;&nbsp;
            <div class="form-group row col-xl-12 divDataQualityTabs">
                <div class="card card-primary card-outline card-outline-tabs">
                    <div class="card-header p-0 border-bottom-0">
                        <ul class="nav nav-tabs" id="custom-tabs-four-tab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="tab_completeness" data-toggle="pill" href="#completeness" role="tab" aria-controls="completeness" aria-selected="true">Completeness</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="tab_consistency" data-toggle="pill" href="#consistency" role="tab" aria-controls="consistency" aria-selected="false">Consistency</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="tab_position_accuracy" data-toggle="pill" href="#position_accuracy" role="tab" aria-controls="position_accuracy" aria-selected="false">Positional Accuracy</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="tab_temp_accuracy" data-toggle="pill" href="#temp_accuracy" role="tab" aria-controls="temp_accuracy" aria-selected="false">Temporal Accuracy</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="tab_thematic_accuracy" data-toggle="pill" href="#thematic_accuracy" role="tab" aria-controls="thematic_accuracy" aria-selected="false">Thematic Accuracy</a>
                            </li>
                        </ul>
                    </div>
                    <div class="card-body">
                        <div class="tab-content" id="custom-tabs-four-tabContent">
                            <div class="tab-pane fade active show" id="completeness" role="tabpanel" aria-labelledby="tab_completeness">
                                <div class="form-group row">
                                    <div class="d-flex flex-wrap bd-highlight">
                                        <div class="table-responsive">
                                            <table class="table-borderless">
                                                <tbody>
                                                    <tr>
                                                        <td>
                                                            <label class="form-check-label" for="c15_t1_complete_comm_or_omit" style="margin-right:50px;">
                                                                <input type="radio" name="c15_t1_complete_comm_or_omit" id='completeness_comission' value='Completeness Commission' checked>&nbsp;Completeness Commission
                                                            </label>
                                                        </td>
                                                        <td>
                                                            <label class="form-check-label" for="c15_t1_complete_comm_or_omit" style="margin-right:50px;">
                                                                <input type="radio" name="c15_t1_complete_comm_or_omit" value='Completeness Omission'>&nbsp;Completeness Omission
                                                            </label>
                                                        </td>
                                                    </tr>
                                                    <?php //================= ?>
                                                    <?php
                                                    foreach($template->template[strtolower($catSelected)]['accordion15'] as $key=>$val){
                                                        if($key == "c15_t1_scope"){
                                                            $t1Scope = "";
                                                            if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_CompletenessCommission->compCommissScope->compCommissScopeItem->CharacterString) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_CompletenessCommission->compCommissScope->compCommissScopeItem->CharacterString != "") {
                                                                $t1Scope = trim($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_CompletenessCommission->compCommissScope->compCommissScopeItem->CharacterString);
                                                            }
                                                            if($t1Scope != ""){
                                                                ?>
                                                                <tr class="Completeness_Commission">
                                                                    <td>
                                                                        <label class="form-check-label" for="c3_1" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                                                                            <b>Scope:</b>
                                                                            <?php echo trim($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_CompletenessCommission->compCommissScope->compCommissScopeItem->CharacterString); ?>
                                                                        </label>
                                                                    </td>
                                                                </tr>
                                                                <?php
                                                            }
                                                        }
                                                        if($key == "c15_t1_comply_level"){
                                                            $compLvl = "";
                                                            if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_CompletenessCommission->compCommissComplLevel->CharacterString) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_CompletenessCommission->compCommissComplLevel->CharacterString != "") {
                                                                $compLvl = $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_CompletenessCommission->compCommissComplLevel->CharacterString;
                                                            }
                                                            if($compLvl != ""){
                                                                ?>
                                                                 <tr class="Completeness_Commission">
                                                                    <td>
                                                                        <label class="form-check-label" for="c3_3" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                                                                            <b>Compliance Level:</b>
                                                                            <?php echo $compLvl; ?>
                                                                        </label>
                                                                    </td>
                                                                </tr>
                                                                <?php
                                                            }
                                                        }
                                                        if($key == "c15_t1_date"){
                                                            $t1Date = "";
                                                            if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_CompletenessCommission->dateTime->Date) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_CompletenessCommission->dateTime->Date != "") {
                                                                $t1Date = trim($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_CompletenessCommission->dateTime->Date);
                                                            }
                                                            if($t1Date != ""){
                                                                ?>
                                                                <tr class="Completeness_Commission">
                                                                    <td>
                                                                        <label class="form-check-label" for="c15_t1_commission_date" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                                                                            <b>Date:</b>
                                                                            <?php echo date('d/m/Y',strtotime(trim($t1Date))); ?>
                                                                        </label>
                                                                    </td>
                                                                </tr>
                                                                <?php
                                                            }
                                                        }
                                                        if($key == "c15_t1_result"){
                                                            $t1Res = "";
                                                            if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_CompletenessCommission->result->DQ_ConformanceResult->pass->Boolean) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_CompletenessCommission->result->DQ_ConformanceResult->pass->Boolean != "") {
                                                                $t1Res = ucwords(trim($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_CompletenessCommission->result->DQ_ConformanceResult->pass->Boolean));
                                                            }
                                                            if($t1Res == "Passed"){
                                                                $t1Res = "Pass";
                                                            }elseif($t1Res == "NotRelevant"){
                                                                $t1Res = "Not Relevant";
                                                            }
                                                            if($t1Res != ""){
                                                                ?>
                                                                <tr class="Completeness_Commission">
                                                                    <td>
                                                                        <label class="form-check-label" for="c3_2" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                                                                            <b>Result:</b>
                                                                            <?php echo trim($t1Res); ?>
                                                                        </label>
                                                                    </td>
                                                                </tr>
                                                                <?php
                                                            }
                                                        }
                                                        if($key == "c15_t1_conform_result"){
                                                            $conformRes = "";
                                                            if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_CompletenessCommission->result->DQ_ConformanceResult->explanation->CharacterString) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_CompletenessCommission->result->DQ_ConformanceResult->explanation->CharacterString != "") {
                                                                $conformRes = $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_CompletenessCommission->result->DQ_ConformanceResult->explanation->CharacterString;
                                                            }
                                                            if($conformRes != ""){
                                                                ?>
                                                                <tr class="Completeness_Commission">
                                                                    <td>
                                                                        <label class="form-check-label" for="c15_t1_conform_result" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                                                                            <b>Conformance Result:</b>
                                                                            <?php echo $conformRes; ?>
                                                                        </label>
                                                                    </td>
                                                                </tr>
                                                                <?php
                                                            }
                                                        }
                                                    }
                                                    ?>
                                                    <?php //================= ?>
                                                    <?php
                                                    foreach($template->template[strtolower($catSelected)]['accordion15'] as $key=>$val){
                                                        if($key == "c15_t1_scope_2"){
                                                            $t1Scope = "";
                                                            if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_CompletenessOmission->compOmissScope->compOmissScopeItem->CharacterString) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_CompletenessOmission->compOmissScope->compOmissScopeItem->CharacterString != "") {
                                                                $t1Scope = trim($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_CompletenessOmission->compOmissScope->compOmissScopeItem->CharacterString);
                                                            }
                                                            if($t1Scope != ""){
                                                                ?>
                                                                <tr class="Completeness_Omission">
                                                                    <td>
                                                                        <label class="form-check-label" for="c3_1" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                                                                            <b>Scope:</b>
                                                                            <?php echo trim($t1Scope); ?>
                                                                        </label>
                                                                    </td>
                                                                </tr>
                                                                <?php
                                                            }
                                                        }
                                                        if($key == "c15_t1_comply_level_2"){
                                                            $compLvl = "";
                                                            if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_CompletenessOmission->compOmissComplLevel->CharacterString) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_CompletenessOmission->compOmissComplLevel->CharacterString != "") {
                                                                $compLvl = $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_CompletenessOmission->compOmissComplLevel->CharacterString;
                                                            }
                                                            if($compLvl != ""){
                                                                ?>
                                                                <tr class="Completeness_Omission">
                                                                    <td>
                                                                        <label class="form-check-label" for="c3_3" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                                                                            <b>Compliance Level:</b>
                                                                            <?php echo $compLvl; ?>
                                                                        </label>
                                                                    </td>
                                                                </tr>
                                                                <?php
                                                            }
                                                        }
                                                        if($key == "c15_t1_date_2"){
                                                            $t1Date = "";
                                                            if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_CompletenessOmission->dateTime->Date) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_CompletenessOmission->dateTime->Date != "") {
                                                                $t1Date = $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_CompletenessOmission->dateTime->Date;
                                                            }
                                                            if($t1Date != ""){
                                                                ?>
                                                                <tr class="Completeness_Omission">
                                                                    <td>
                                                                        <label class="form-check-label" for="c15_t1_commission_date" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                                                                            <b>Date:</b>
                                                                            <?php echo date('d/m/Y',strtotime(trim($t1Date))); ?>
                                                                        </label>
                                                                    </td>
                                                                </tr>
                                                                <?php
                                                            }
                                                        }
                                                        if($key == "c15_t1_result_2"){
                                                            $t1Res = "";
                                                            if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_CompletenessOmission->result->DQ_ConformanceResult->pass->Boolean) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_CompletenessOmission->result->DQ_ConformanceResult->pass->Boolean != "") {
                                                                $t1Res = trim($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_CompletenessOmission->result->DQ_ConformanceResult->pass->Boolean);
                                                            }
                                                            if($t1Res != ""){
                                                                ?>
                                                                <tr class="Completeness_Omission">
                                                                    <td>
                                                                        <label class="form-check-label" for="c3_2" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                                                                            <b>Result:</b>
                                                                            <?php echo trim($t1Res); ?>
                                                                        </label>
                                                                    </td>
                                                                </tr>
                                                                <?php
                                                            }
                                                        }
                                                        if($key == "c15_t1_conform_result_2"){
                                                            $conformRes = "";
                                                            if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_CompletenessOmission->result->DQ_ConformanceResult->explanation->CharacterString) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_CompletenessOmission->result->DQ_ConformanceResult->explanation->CharacterString != "") {
                                                                $conformRes = $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_CompletenessOmission->result->DQ_ConformanceResult->explanation->CharacterString;
                                                            }
                                                            if($conformRes != ""){
                                                                ?>
                                                                <tr class="Completeness_Omission">
                                                                    <td>
                                                                        <label class="form-check-label" for="c3_4" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                                                                            <b>Conformance Result:</b>
                                                                            <?php echo $conformRes; ?>
                                                                        </label>
                                                                    </td>
                                                                </tr>
                                                                <?php
                                                            }
                                                        }
                                                    }
                                                    ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>    
                            <div class="tab-pane fade" id="consistency" role="tabpanel" aria-labelledby="tab_consistency">
                                <div class="form-group row">
                                    <div class="d-flex flex-wrap bd-highlight">
                                        <div class="table-responsive">
                                            <table class="table-borderless">
                                                <tbody>
                                                    <tr>
                                                        <td>
                                                            <label class="form-check-label" for="c15_t2_type" style="margin-right:50px;">
                                                                <input type="radio" name="c15_t2_type" id='conceptual' value="Conceptual" checked>&nbsp;Conceptual Consistency
                                                            </label>
                                                        </td>
                                                        <td>
                                                            <label class="form-check-label" for="c15_t2_type" style="margin-right:50px;">
                                                                <input type="radio" name="c15_t2_type" value="Domain">&nbsp;Domain Consistency
                                                            </label>
                                                        </td>
                                                        <td>
                                                            <label class="form-check-label" for="c15_t2_type" style="margin-right:50px;">
                                                                <input type="radio" name="c15_t2_type" value="Format">&nbsp;Format Consistency
                                                            </label>
                                                        </td>
                                                        <td>
                                                            <label class="form-check-label" for="c15_t2_type" style="margin-right:50px;">
                                                                <input type="radio" name="c15_t2_type" value="Topological">&nbsp;Topological Consistency
                                                            </label>
                                                        </td>
                                                    </tr>
                                                    <?php //================= ?>
                                                    <?php
                                                    foreach($template->template[strtolower($catSelected)]['accordion14'] as $key=>$val){
                                                        if($key == "c15_t2_scope"){
                                                            $t2Scope = "";
                                                            if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_ConceptualConsistency->consistConceptScope->consistConceptScopeItem->CharacterString) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_ConceptualConsistency->consistConceptScope->consistConceptScopeItem->CharacterString != "") {
                                                                $t2Scope = trim($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_ConceptualConsistency->consistConceptScope->consistConceptScopeItem->CharacterString);
                                                            }
                                                            if($t2Scope != ""){
                                                                ?>
                                                                <tr class='Conceptual'>
                                                                    <td>
                                                                        <label class="form-check-label" for="c15_t2_scope" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                                                                            <b>Scope:</b>
                                                                            <?php echo trim($t2Scope); ?>
                                                                        </label>
                                                                    </td>
                                                                </tr>
                                                                <?php
                                                            }
                                                        }
                                                        if($key == "c15_t2_comply_level"){
                                                            $compLvl = "";
                                                            if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_ConceptualConsistency->compOmissLevel->CharacterString) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_ConceptualConsistency->compOmissLevel->CharacterString != "") {
                                                                $compLvl = $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_ConceptualConsistency->compOmissLevel->CharacterString;
                                                            }
                                                            if($compLvl != ""){
                                                                ?>
                                                                <tr class='Conceptual'>
                                                                    <td>
                                                                        <label class="form-check-label" for="c15_t2_comply_level" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                                                                            <b>Compliance Level:</b>
                                                                            <?php echo $compLvl; ?>
                                                                        </label>
                                                                    </td>
                                                                </tr>
                                                                <?php
                                                            }
                                                        }
                                                        if($key == "c15_t2_date"){
                                                            $t2Date = "";
                                                            if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_ConceptualConsistency->dateTime->Date) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_ConceptualConsistency->dateTime->Date != "") {
                                                                $t2Date = $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_ConceptualConsistency->dateTime->Date;
                                                            }
                                                            if($t2Date != ""){
                                                                ?>
                                                                <tr class='Conceptual'>
                                                                    <td>
                                                                        <label class="form-check-label" for="c15_t2_date" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                                                                            <b>Date:</b>
                                                                            <?php echo date('d/m/Y',strtotime(trim($t2Date))); ?>
                                                                        </label>
                                                                    </td>
                                                                </tr>
                                                                <?php
                                                            }
                                                        }
                                                        if($key == "c15_t2_result"){
                                                            $t2Res = "";
                                                            if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_ConceptualConsistency->result->DQ_ConformanceResult->pass->Boolean) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_ConceptualConsistency->result->DQ_ConformanceResult->pass->Boolean != "") {
                                                                $t2Res = trim($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_ConceptualConsistency->result->DQ_ConformanceResult->pass->Boolean);
                                                            }
                                                            if($t2Res != ""){
                                                                ?>
                                                                <tr class='Conceptual'>
                                                                    <td>
                                                                        <label class="form-check-label" for="c15_t2_result" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                                                                            <b>Result:</b>
                                                                            <?php echo trim($t2Res); ?>
                                                                        </label>
                                                                    </td>
                                                                </tr>
                                                                <?php
                                                            }
                                                        }
                                                        if($key == "c15_t2_conform_result"){
                                                            $t2Res = "";
                                                            if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_ConceptualConsistency->result->DQ_ConformanceResult->pass->Boolean) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_ConceptualConsistency->result->DQ_ConformanceResult->pass->Boolean != "") {
                                                                $t2Res = trim($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_ConceptualConsistency->result->DQ_ConformanceResult->pass->Boolean);
                                                            }
                                                            if($t2Res != ""){
                                                                ?>
                                                                <tr class='Conceptual'>
                                                                    <td>
                                                                        <label class="form-check-label" for="c15_t2_conform_result" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                                                                            <b>Conformance Result:</b>
                                                                            <?php echo $t2Res; ?>
                                                                        </label>
                                                                    </td>
                                                                </tr>
                                                                <?php
                                                            }
                                                        }
                                                        //=================
                                                        if($key == "c15_t2_scope_2"){
                                                            $t2Scope = "";
                                                            if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_DomainConsistency->consistDomainScope->consistConceptScopeItem->CharacterString) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_DomainConsistency->consistDomainScope->consistConceptScopeItem->CharacterString != "") {
                                                                $t2Scope = trim($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_DomainConsistency->consistDomainScope->consistConceptScopeItem->CharacterString);
                                                            }
                                                            if($t2Scope != ""){
                                                                ?>
                                                                <tr class='Domain'>
                                                                    <td>
                                                                        <label class="form-check-label" for="c3_1" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                                                                            <b>Scope:</b>
                                                                            <?php echo trim($t2Scope); ?>
                                                                        </label>
                                                                    </td>
                                                                </tr>
                                                                <?php
                                                            }
                                                        }
                                                        if($key == "c15_t2_comply_level_2"){
                                                            $compLvl = "";
                                                            if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_DomainConsistency->compDomainLevel->CharacterString) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_DomainConsistency->compDomainLevel->CharacterString != "") {
                                                                $compLvl = $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_DomainConsistency->compDomainLevel->CharacterString;
                                                            }
                                                            if($compLvl != ""){
                                                                ?>
                                                                <tr class='Domain'>
                                                                    <td>
                                                                        <label class="form-check-label" for="c3_3" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                                                                            <b>Compliance Level:</b>
                                                                            <?php echo $compLvl; ?>
                                                                        </label>
                                                                    </td>
                                                                </tr>
                                                                <?php
                                                            }
                                                        }
                                                        if($key == "c15_t2_date_2"){
                                                            $t2Date = "";
                                                            if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_DomainConsistency->dateTime->Date) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_DomainConsistency->dateTime->Date != "") {
                                                                $t2Date = $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_DomainConsistency->dateTime->Date;
                                                            }
                                                            if($t2Date != ""){
                                                                ?>
                                                                <tr class='Domain'>
                                                                    <td>
                                                                        <label class="form-check-label" for="c15_t2_conceptual_date" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                                                                            <b>Date:</b>
                                                                            <?php echo date('d/m/Y',strtotime(trim($t2Date))); ?>
                                                                        </label>
                                                                    </td>
                                                                </tr>
                                                                <?php
                                                            }
                                                        }
                                                        if($key == "c15_t2_result_2"){
                                                            $t2Res = "";
                                                            if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_DomainConsistency->result->DQ_ConformanceResult->pass->Boolean) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_DomainConsistency->result->DQ_ConformanceResult->pass->Boolean != "") {
                                                                $t2Res = trim($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_DomainConsistency->result->DQ_ConformanceResult->pass->Boolean);
                                                            }
                                                            if($t2Res != ""){
                                                                ?>
                                                                <tr class='Domain'>
                                                                    <td>
                                                                        <label class="form-check-label" for="c3_2" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                                                                            <b>Result:</b>
                                                                            <?php echo trim($t2Res); ?>
                                                                        </label>
                                                                    </td>
                                                                </tr>
                                                                <?php
                                                            }
                                                        }
                                                        if($key == "c15_t2_conform_result_2"){
                                                            $t2ConformRes = "";
                                                            if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_DomainConsistency->result->DQ_ConformanceResult->explanation->CharacterString) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_DomainConsistency->result->DQ_ConformanceResult->explanation->CharacterString != "") {
                                                                $t2ConformRes = $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_DomainConsistency->result->DQ_ConformanceResult->explanation->CharacterString;
                                                            }
                                                            if($t2ConformRes != ""){
                                                                ?>
                                                                <tr class='Domain'>
                                                                    <td>
                                                                        <label class="form-check-label" for="c3_4" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                                                                            <b>Conformance Result:</b>
                                                                            <?php echo $t2ConformRes; ?>
                                                                        </label>
                                                                    </td>
                                                                </tr>
                                                                <?php
                                                            }
                                                        }
                                                        //=================
                                                        if($key == "c15_t2_scope_3"){
                                                            $t2Scope = "";
                                                            if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_FormatConsistency->consistFormatScope->consistFormatScopeItem->CharacterString) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_FormatConsistency->consistFormatScope->consistFormatScopeItem->CharacterString != "") {
                                                                $t2Scope = trim($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_FormatConsistency->consistFormatScope->consistFormatScopeItem->CharacterString);
                                                            }
                                                            if($t2Scope != ""){
                                                                ?>
                                                                <tr class='Format'>
                                                                    <td>
                                                                        <label class="form-check-label" for="c3_1" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                                                                            <b>Scope:</b>
                                                                            <?php echo trim($t2Scope); ?>
                                                                        </label>
                                                                    </td>
                                                                </tr>
                                                                <?php
                                                            }
                                                        }
                                                        if($key == "c15_t2_comply_level_3"){
                                                            $compLvl = "";
                                                            if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_FormatConsistency->compFormatLevel->CharacterString) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_FormatConsistency->compFormatLevel->CharacterString != "") {
                                                                $compLvl = $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_FormatConsistency->compFormatLevel->CharacterString;
                                                            }
                                                            if($compLvl != ""){
                                                                ?>
                                                                <tr class='Format'>
                                                                    <td>
                                                                        <label class="form-check-label" for="c3_3" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                                                                            <b>Compliance Level:</b>
                                                                            <?php echo $compLvl; ?>
                                                                        </label>
                                                                    </td>
                                                                </tr>
                                                                <?php
                                                            }
                                                        }
                                                        if($key == "c15_t2_date_3"){
                                                            $t2Date = "";
                                                            if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_FormatConsistency->dateTime->Date) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_FormatConsistency->dateTime->Date != "") {
                                                                $t2Date = $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_FormatConsistency->dateTime->Date;
                                                            }
                                                            if($t2Date != ""){
                                                                ?>
                                                                <tr class='Format'>
                                                                    <td>
                                                                        <label class="form-check-label" for="c15_t2_conceptual_date" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                                                                            <b>Date:</b>
                                                                            <?php echo date('d/m/Y',strtotime(trim($t2Date))); ?>
                                                                        </label>
                                                                    </td>
                                                                </tr>
                                                                <?php
                                                            }
                                                        }
                                                        if($key == "c15_t2_result_3"){
                                                            $t2Res = "";
                                                            if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_FormatConsistency->result->DQ_ConformanceResult->pass->Boolean) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_FormatConsistency->result->DQ_ConformanceResult->pass->Boolean != "") {
                                                                $t2Res = trim($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_FormatConsistency->result->DQ_ConformanceResult->pass->Boolean);
                                                            }
                                                            if($t2Res != ""){
                                                                ?>
                                                                <tr class='Format'>
                                                                    <td>
                                                                        <label class="form-check-label" for="c3_2" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                                                                            <b>Result:</b>
                                                                            <?php echo trim($t2Res); ?>
                                                                        </label>
                                                                    </td>
                                                                </tr>
                                                                <?php
                                                            }
                                                        }
                                                        if($key == "c15_t2_conform_result_3"){
                                                            $t2ConformRes = "";
                                                            if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_FormatConsistency->result->DQ_ConformanceResult->explanation->CharacterString) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_FormatConsistency->result->DQ_ConformanceResult->explanation->CharacterString != "") {
                                                                $t2ConformRes = $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_FormatConsistency->result->DQ_ConformanceResult->explanation->CharacterString;
                                                            }
                                                            if($t2ConformRes != ""){
                                                                ?>
                                                                <tr class='Format'>
                                                                    <td>
                                                                        <label class="form-check-label" for="c3_4" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                                                                            <b>Conformance Result:</b>
                                                                            <?php echo $t2ConformRes; ?>
                                                                        </label>
                                                                    </td>
                                                                </tr>
                                                                <?php
                                                            }
                                                        }
                                                        //=================
                                                        if($key == "c15_t2_scope_4"){
                                                            $t2Scope = "";
                                                            if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_TopologicalConsistency->consistTopoScope->consistTopoScopeItem->CharacterString) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_TopologicalConsistency->consistTopoScope->consistTopoScopeItem->CharacterString != "") {
                                                                $t2Scope = trim($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_TopologicalConsistency->consistTopoScope->consistTopoScopeItem->CharacterString);
                                                            }
                                                            if($t2Scope != ""){
                                                                ?>
                                                                <tr class='Topological'>
                                                                    <td>
                                                                        <label class="form-check-label" for="c3_1" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                                                                            <b>Scope:</b>
                                                                            <?php echo trim($t2Scope); ?>
                                                                        </label>
                                                                    </td>
                                                                </tr>
                                                                <?php
                                                            }
                                                        }
                                                        if($key == "c15_t2_comply_level_4"){
                                                            $compLvl = "";
                                                            if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_TopologicalConsistency->compTopoLevel->CharacterString) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_TopologicalConsistency->compTopoLevel->CharacterString != "") {
                                                                $compLvl = $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_TopologicalConsistency->compTopoLevel->CharacterString;
                                                            }
                                                            if($compLvl != ""){
                                                                ?>
                                                                <tr class='Topological'>
                                                                    <td>
                                                                        <label class="form-check-label" for="c3_3" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                                                                            <b>Compliance Level:</b>
                                                                            <?php echo $compLvl; ?>
                                                                        </label>
                                                                    </td>
                                                                </tr>
                                                                <?php
                                                            }
                                                        }
                                                        if($key == "c15_t2_date_4"){
                                                            $t2Date = "";
                                                            if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_TopologicalConsistency->dateTime->Date) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_TopologicalConsistency->dateTime->Date != "") {
                                                                $t2Date = $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_TopologicalConsistency->dateTime->Date;
                                                            }
                                                            if($t2Date != ""){
                                                                ?>
                                                                <tr class='Topological'>
                                                                    <td>
                                                                        <label class="form-check-label" for="c15_t2_conceptual_date" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                                                                            <b>Date:</b>
                                                                            <?php echo date('d/m/Y',strtotime(trim($t2Date))); ?>
                                                                        </label>
                                                                    </td>
                                                                </tr>
                                                                <?php
                                                            }
                                                        }
                                                        if($key == "c15_t2_result_4"){
                                                            $t2Res = "";
                                                            if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_TopologicalConsistency->result->DQ_ConformanceResult->pass->Boolean) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_TopologicalConsistency->result->DQ_ConformanceResult->pass->Boolean != "") {
                                                                $t2Res = trim($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_TopologicalConsistency->result->DQ_ConformanceResult->pass->Boolean);
                                                            }
                                                            if($t2Res != ""){
                                                                ?>
                                                                <tr class='Topological'>
                                                                    <td>
                                                                        <label class="form-check-label" for="c3_2" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                                                                            <b>Result:</b>
                                                                            <?php echo trim($t2Res); ?>
                                                                        </label>
                                                                    </td>
                                                                </tr>
                                                                <?php
                                                            }
                                                        }
                                                        if($key == "c15_t2_conform_result_4"){
                                                            $t2ConformRes = "";
                                                            if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_TopologicalConsistency->result->DQ_ConformanceResult->explanation->CharacterString) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_TopologicalConsistency->result->DQ_ConformanceResult->explanation->CharacterString != "") {
                                                                $t2ConformRes = $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_TopologicalConsistency->result->DQ_ConformanceResult->explanation->CharacterString;
                                                            }
                                                            if($t2ConformRes != ""){
                                                                ?>
                                                                <tr class='Topological'>
                                                                    <td>
                                                                        <label class="form-check-label" for="c3_4" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                                                                            <b>Conformance Result:</b>
                                                                            <?php echo $t2ConformRes; ?>  
                                                                        </label>
                                                                    </td>
                                                                </tr>
                                                                <?php
                                                            }
                                                        }
                                                    }
                                                    ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="position_accuracy" role="tabpanel" aria-labelledby="tab_position_accuracy">
                                <div class="form-group row">
                                    <div class="d-flex flex-wrap bd-highlight">
                                        <div class="table-responsive">
                                            <table class="table-borderless">
                                                <tbody>
                                                    <tr>
                                                        <td>
                                                            <label class="form-check-label" for="c15_t3_type" style="margin-right:50px;">
                                                                <input type="radio" name="c15_t3_type" id='AbsoluteOrExternal' value="Absolute or External" checked>&nbsp;Absolute or External Accuracy
                                                            </label>
                                                        </td>
                                                        <td>
                                                            <label class="form-check-label" for="c15_t3_type" style="margin-right:50px;">
                                                                <input type="radio" name="c15_t3_type" value="Relative or Internal">&nbsp;Relative or Internal Accuracy
                                                            </label>
                                                        </td>
                                                        <td>
                                                            <label class="form-check-label" for="c15_t3_type" style="margin-right:50px;">
                                                                <input type="radio" name="c15_t3_type" value="Gridded Data">&nbsp;Gridded Data Accuracy
                                                            </label>
                                                        </td>
                                                    </tr>
                                                    <?php //================= ?>
                                                    <?php
                                                    foreach($template->template[strtolower($catSelected)]['accordion15'] as $key=>$val){
                                                        if($key == "c15_t3_scope"){
                                                            $t3Scope = "";
                                                            if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_AbsoluteExternalPositionalAccuracy->posAccAbsoluteScope->posAccAbsoluteScopeItem->CharacterString) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_AbsoluteExternalPositionalAccuracy->posAccAbsoluteScope->posAccAbsoluteScopeItem->CharacterString != "") {
                                                                $t3Scope = trim($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_AbsoluteExternalPositionalAccuracy->posAccAbsoluteScope->posAccAbsoluteScopeItem->CharacterString);
                                                            }
                                                            if($t3Scope != ""){
                                                                ?>
                                                                <tr class='AbsoluteorExternal'>
                                                                    <td>
                                                                        <label class="form-check-label" for="c15_t3_scope" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                                                                            <b>Scope:</b>
                                                                            <?php echo trim($t3Scope); ?>
                                                                        </label>
                                                                    </td>
                                                                </tr>
                                                                <?php
                                                            }
                                                        }
                                                        if($key == "c15_t3_comply_level"){
                                                            $t3CompLvl = "";
                                                            if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_AbsoluteExternalPositionalAccuracy->compPosAccAbsoluteLevel->CharacterString) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_AbsoluteExternalPositionalAccuracy->compPosAccAbsoluteLevel->CharacterString != "") {
                                                                $t3CompLvl = $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_AbsoluteExternalPositionalAccuracy->compPosAccAbsoluteLevel->CharacterString;
                                                            }
                                                            if($t3CompLvl != ""){
                                                                ?>
                                                                <tr class='AbsoluteorExternal'>
                                                                    <td>
                                                                        <label class="form-check-label" for="c15_t3_comply_level" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                                                                            <b>Compliance Level:</b>
                                                                            <?php echo $t3CompLvl; ?>
                                                                        </label>
                                                                    </td>
                                                                </tr>
                                                                <?php
                                                            }
                                                        }
                                                        if($key == "c15_t3_date"){
                                                            $t3Date = "";
                                                            if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_AbsoluteExternalPositionalAccuracy->dateTime->Date) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_AbsoluteExternalPositionalAccuracy->dateTime->Date != "") {
                                                                $t3Date = $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_AbsoluteExternalPositionalAccuracy->dateTime->Date;
                                                            }
                                                            if($t3Date != ""){
                                                                ?>
                                                                <tr class='AbsoluteorExternal'>
                                                                    <td>
                                                                        <label class="form-check-label" for="c15_t3_date" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                                                                            <b>Date:</b>
                                                                            <?php echo date('d/m/Y',strtotime(trim($t3Date))); ?>
                                                                        </label>
                                                                    </td>
                                                                </tr>
                                                                <?php
                                                            }
                                                        }
                                                        if($key == "c15_t3_result"){
                                                            $t3Res = "";
                                                            if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_AbsoluteExternalPositionalAccuracy->result->DQ_ConformanceResult->pass->Boolean) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_AbsoluteExternalPositionalAccuracy->result->DQ_ConformanceResult->pass->Boolean != "") {
                                                                $t3Res = trim($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_AbsoluteExternalPositionalAccuracy->result->DQ_ConformanceResult->pass->Boolean);
                                                            }
                                                            if($t3Res != ""){
                                                                ?>
                                                                <tr class='AbsoluteorExternal'>
                                                                    <td>
                                                                        <label class="form-check-label" for="c15_t3_result" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                                                                            <b>Result:</b>
                                                                            <?php echo trim($t3Res); ?>
                                                                        </label>
                                                                    </td>
                                                                </tr>
                                                                <?php
                                                            }
                                                        }
                                                        if($key == "c15_t3_conform_result"){
                                                            $t3ConformRes = "";
                                                            if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_AbsoluteExternalPositionalAccuracy->result->DQ_ConformanceResult->explanation->CharacterString) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_AbsoluteExternalPositionalAccuracy->result->DQ_ConformanceResult->explanation->CharacterString != "") {
                                                                $t3ConformRes = $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_AbsoluteExternalPositionalAccuracy->result->DQ_ConformanceResult->explanation->CharacterString;
                                                            }
                                                            if($t3ConformRes != ""){
                                                                ?>
                                                                <tr class='AbsoluteorExternal'>
                                                                    <td>
                                                                        <label class="form-check-label" for="c15_t3_conform_result" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                                                                            <b>Conformance Result:</b>
                                                                            <?php echo $t3ConformRes; ?>
                                                                        </label>
                                                                    </td>
                                                                </tr>
                                                                <?php
                                                            }
                                                        }
                                                        //=================
                                                        if($key == "c15_t3_scope_2"){
                                                            $t3Scope = "";
                                                            if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_RelativeInternalPositionalAccuracy->posAccRelativeScope->posAccRelativeScopeItem->CharacterString) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_RelativeInternalPositionalAccuracy->posAccRelativeScope->posAccRelativeScopeItem->CharacterString != "") {
                                                                $t3Scope = trim($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_RelativeInternalPositionalAccuracy->posAccRelativeScope->posAccRelativeScopeItem->CharacterString);
                                                            }
                                                            if($t3Scope != ""){
                                                                ?>
                                                                <tr class='RelativeorInternal'>
                                                                    <td>
                                                                        <label class="form-check-label" for="c15_t3_scope_2" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                                                                            <b>Scope:</b>
                                                                            <?php echo trim($t3Scope); ?>
                                                                        </label>
                                                                    </td>
                                                                </tr>
                                                                <?php
                                                            }
                                                        }
                                                        if($key == "c15_t3_comply_level_2"){
                                                            $t3CompLvl = "";
                                                            if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_RelativeInternalPositionalAccuracy->posAccRelativeLevel->CharacterString) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_RelativeInternalPositionalAccuracy->posAccRelativeLevel->CharacterString != "") {
                                                                $t3CompLvl = $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_RelativeInternalPositionalAccuracy->posAccRelativeLevel->CharacterString;
                                                            }
                                                            if($t3CompLvl != ""){
                                                                ?>
                                                                <tr class='RelativeorInternal'>
                                                                    <td>
                                                                        <label class="form-check-label" for="c15_t3_comply_level_2" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                                                                            <b>Compliance Level:</b>
                                                                            <?php echo $t3CompLvl; ?>
                                                                        </label>
                                                                    </td>
                                                                </tr>
                                                                <?php
                                                            }
                                                        }
                                                        if($key == "c15_t3_date_2"){
                                                            $t3Date = "";
                                                            if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_RelativeInternalPositionalAccuracy->dateTime->Date) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_RelativeInternalPositionalAccuracy->dateTime->Date != "") {
                                                                $t3Date = $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_RelativeInternalPositionalAccuracy->dateTime->Date;
                                                            }
                                                            if($t3Date != ""){
                                                                ?>
                                                                <tr class='RelativeorInternal'>
                                                                    <td>
                                                                        <label class="form-check-label" for="c15_t3_date_2" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                                                                            <b>Date:</b>
                                                                            <?php echo date('d/m/Y',strtotime(trim($t3Date))); ?>
                                                                        </label>
                                                                    </td>
                                                                </tr>
                                                                <?php
                                                            }
                                                        }
                                                        if($key == "c15_t3_result_2"){
                                                            $t3Res = "";
                                                            if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_RelativeInternalPositionalAccuracy->result->DQ_ConformanceResult->pass->Boolean) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_RelativeInternalPositionalAccuracy->result->DQ_ConformanceResult->pass->Boolean != "") {
                                                                $t3Res = trim($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_RelativeInternalPositionalAccuracy->result->DQ_ConformanceResult->pass->Boolean);
                                                            }
                                                            if($t3Res != ""){
                                                                ?>
                                                                <tr class='RelativeorInternal'>
                                                                    <td>
                                                                        <label class="form-check-label" for="c15_t3_result_2" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                                                                            <b>Result:</b>
                                                                            <?php echo trim($t3Res); ?>
                                                                        </label>
                                                                    </td>
                                                                </tr>
                                                                <?php
                                                            }
                                                        }
                                                        if($key == "c15_t3_conform_result_2"){
                                                            $t3ConformRes = "";
                                                            if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_RelativeInternalPositionalAccuracy->result->DQ_ConformanceResult->explanation->CharacterString) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_RelativeInternalPositionalAccuracy->result->DQ_ConformanceResult->explanation->CharacterString != "") {
                                                                $t3ConformRes = $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_RelativeInternalPositionalAccuracy->result->DQ_ConformanceResult->explanation->CharacterString;
                                                            }
                                                            if($t3ConformRes != ""){
                                                                ?>
                                                                <tr class='RelativeorInternal'>
                                                                    <td>
                                                                        <label class="form-check-label" for="c15_t3_conform_result_2" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                                                                            <b>Conformance Result:</b>
                                                                            <?php echo $t3ConformRes; ?>
                                                                        </label>
                                                                    </td>
                                                                </tr>
                                                                <?php
                                                            }
                                                        }
                                                        //=================
                                                        if($key == "c15_t3_scope_3"){
                                                            $t3Scope = "";
                                                            if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_GriddedDataPositionalAccuracy->posAccGridScope->posAccGridScopeItem->CharacterString) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_GriddedDataPositionalAccuracy->posAccGridScope->posAccGridScopeItem->CharacterString != "") {
                                                                $t3Scope = trim($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_GriddedDataPositionalAccuracy->posAccGridScope->posAccGridScopeItem->CharacterString);
                                                            }
                                                            if($t3Scope != ""){
                                                                ?>
                                                                <tr class='GriddedData'>
                                                                    <td>
                                                                        <label class="form-check-label" for="c15_t3_scope_3" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                                                                            <b>Scope:</b>
                                                                            <?php echo trim($t3Scope); ?>
                                                                        </label>
                                                                    </td>
                                                                </tr>
                                                                <?php
                                                            }
                                                        }
                                                        if($key == "c15_t3_comply_level_3"){
                                                            $t3CompLvl = "";
                                                            if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_GriddedDataPositionalAccuracy->posAccGridLevel->CharacterString) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_GriddedDataPositionalAccuracy->posAccGridLevel->CharacterString != "") {
                                                                $t3CompLvl = $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_GriddedDataPositionalAccuracy->posAccGridLevel->CharacterString;
                                                            }
                                                            if($t3CompLvl != ""){
                                                                ?>
                                                                <tr class='GriddedData'>
                                                                    <td>
                                                                        <label class="form-check-label" for="c15_t3_comply_level_3" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                                                                            <b>Compliance Level:</b>
                                                                            <?php echo $t3CompLvl; ?>
                                                                        </label>
                                                                    </td>
                                                                </tr>
                                                                <?php
                                                            }
                                                        }
                                                        if($key == "c15_t3_date_3"){
                                                            $t3Date = "";
                                                            if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_GriddedDataPositionalAccuracy->dateTime->Date) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_GriddedDataPositionalAccuracy->dateTime->Date != "") {
                                                                $t3Date = $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_GriddedDataPositionalAccuracy->dateTime->Date;
                                                            }
                                                            if($t3Date != ""){
                                                                ?>
                                                                <tr class='GriddedData'>
                                                                    <td>
                                                                        <label class="form-check-label" for="c15_t3_date_3" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                                                                            <b>Date:</b>
                                                                            <?php echo date('d/m/Y',strtotime(trim($t3Date))); ?>
                                                                        </label>
                                                                    </td>
                                                                </tr>
                                                                <?php
                                                            }
                                                        }
                                                        if($key == "c15_t3_result_3"){
                                                            $t3Res = "";
                                                            if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_GriddedDataPositionalAccuracy->result->DQ_ConformanceResult->pass->Boolean) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_GriddedDataPositionalAccuracy->result->DQ_ConformanceResult->pass->Boolean != "") {
                                                                $t3Res = trim($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_GriddedDataPositionalAccuracy->result->DQ_ConformanceResult->pass->Boolean);
                                                            }
                                                            if($t3Res != ""){
                                                                ?>
                                                                <tr class='GriddedData'>
                                                                    <td>
                                                                        <label class="form-check-label" for="c15_t3_result_3" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                                                                            <b>Result:</b>
                                                                            <?php echo trim($t3Res); ?>
                                                                        </label>
                                                                    </td>
                                                                </tr>
                                                                <?php
                                                            }
                                                        }
                                                        if($key == "c15_t3_conform_result_3"){
                                                            $t3ConformRes = "";
                                                            if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_GriddedDataPositionalAccuracy->result->DQ_ConformanceResult->explanation->CharacterString) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_GriddedDataPositionalAccuracy->result->DQ_ConformanceResult->explanation->CharacterString != "") {
                                                                $t3ConformRes = $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_GriddedDataPositionalAccuracy->result->DQ_ConformanceResult->explanation->CharacterString;
                                                            }
                                                            if($t3ConformRes != ""){
                                                                ?>
                                                                <tr class='GriddedData'>
                                                                    <td>
                                                                        <label class="form-check-label" for="c15_t3_conform_result_3" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                                                                            <b>Conformance Result:</b>
                                                                            <?php echo $t3ConformRes; ?>
                                                                        </label>
                                                                    </td>
                                                                </tr>
                                                                <?php
                                                            }
                                                        }
                                                    }
                                                    ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="temp_accuracy" role="tabpanel" aria-labelledby="tab_temp_accuracy">
                                <div class="form-group row">
                                    <div class="bd-highlight">
                                        <div class="table-responsive">
                                            <table class="table-borderless">
                                                <tbody>
                                                    <tr>
                                                        <td>
                                                            <label class="form-check-label" for="c15_t4_type" style="margin-right:50px;">
                                                                <input type="radio" name="c15_t4_type" id='AccuracyorTimeMeasurement' value="Accuracy or Time Measurement" checked>&nbsp;Accuracy or Time Measurement
                                                            </label>
                                                        </td>
                                                        <td>
                                                            <label class="form-check-label" for="c15_t4_type" style="margin-right:50px;">
                                                                <input type="radio" name="c15_t4_type" value="Temporal Consistency">&nbsp;Temporal Consistency
                                                            </label>
                                                        </td>
                                                        <td>
                                                            <label class="form-check-label" for="c15_t4_type" style="margin-right:50px;">
                                                                <input type="radio" name="c15_t4_type" value="Temporal Validity">&nbsp;Temporal Validity
                                                            </label>
                                                        </td>
                                                    </tr>
                                                    <?php //================= ?>
                                                    <?php
                                                    foreach($template->template[strtolower($catSelected)]['accordion15'] as $key=>$val){
                                                        if($key == "c15_t4_scope"){
                                                            $t4Scope = "";
                                                            if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_AccuracyOfATimeMeasurement->AccuracyOfATimeMeasurementScope->AccuracyOfATimeMeasurementItem->CharacterString) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_AccuracyOfATimeMeasurement->AccuracyOfATimeMeasurementScope->AccuracyOfATimeMeasurementItem->CharacterString != "") {
                                                                $t4Scope = trim($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_AccuracyOfATimeMeasurement->AccuracyOfATimeMeasurementScope->AccuracyOfATimeMeasurementItem->CharacterString);
                                                            }
                                                            if($t4Scope != ""){
                                                                ?>
                                                                <tr class='AccuracyorTimeMeasurement'>
                                                                    <td>
                                                                        <label class="form-check-label" for="c15_t4_accuTimeMeasure_scope" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                                                                            <b>Scope:</b>
                                                                            <?php echo trim($t4Scope); ?>
                                                                        </label>
                                                                    </td>
                                                                </tr>
                                                                <?php
                                                            }
                                                        }
                                                        if($key == "c15_t4_comply_level"){
                                                            $t4CompLvl = "";
                                                            if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_AccuracyOfATimeMeasurement->AccuracyOfATimeMeasurementLevel->CharacterString) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_AccuracyOfATimeMeasurement->AccuracyOfATimeMeasurementLevel->CharacterString != "") {
                                                                $t4CompLvl = $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_AccuracyOfATimeMeasurement->AccuracyOfATimeMeasurementLevel->CharacterString;
                                                            }
                                                            if($t4CompLvl != ""){
                                                                ?>
                                                                <tr class='AccuracyorTimeMeasurement'>
                                                                    <td>
                                                                        <label class="form-check-label" for="c3_3" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                                                                            <b>Compliance Level:</b>
                                                                            <?php echo $t4CompLvl; ?>
                                                                        </label>
                                                                    </td>
                                                                </tr>
                                                                <?php
                                                            }
                                                        }
                                                        if($key == "c15_t4_date"){
                                                            $t4Date = "";
                                                            if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_AccuracyOfATimeMeasurement->dateTime->Date) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_AccuracyOfATimeMeasurement->dateTime->Date != "") {
                                                                $t4Date = $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_AccuracyOfATimeMeasurement->dateTime->Date;
                                                            }
                                                            if($t4Date != ""){
                                                                ?>
                                                                <tr class='AccuracyorTimeMeasurement'>
                                                                    <td>
                                                                        <label class="form-check-label" for="c15_t4_accuTimeMeasure_date" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                                                                            <b>Date:</b>
                                                                            <?php echo date('d/m/Y',strtotime(trim($t4Date))); ?>
                                                                        </label>
                                                                    </td>
                                                                </tr>
                                                                <?php
                                                            }
                                                        }
                                                        if($key == "c15_t4_result"){
                                                            $t4Res = "";
                                                            if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_AccuracyOfATimeMeasurement->result->DQ_ConformanceResult->pass->Boolean) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_AccuracyOfATimeMeasurement->result->DQ_ConformanceResult->pass->Boolean != "") {
                                                                $t4Res = trim($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_AccuracyOfATimeMeasurement->result->DQ_ConformanceResult->pass->Boolean);
                                                            }
                                                            if($t4Res != ""){
                                                                ?>
                                                                <tr class='AccuracyorTimeMeasurement'>
                                                                    <td>
                                                                        <label class="form-check-label" for="c3_2" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                                                                            <b>Result:</b>
                                                                            <?php echo trim($t4Res); ?>
                                                                        </label>
                                                                    </td>
                                                                </tr>
                                                                <?php
                                                            }
                                                        }
                                                        if($key == "c15_t4_conform_result"){
                                                            $t4ConformRes = "";
                                                            if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_AccuracyOfATimeMeasurement->result->DQ_ConformanceResult->explanation->CharacterString) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_AccuracyOfATimeMeasurement->result->DQ_ConformanceResult->explanation->CharacterString != "") {
                                                                $t4ConformRes = $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_AccuracyOfATimeMeasurement->result->DQ_ConformanceResult->explanation->CharacterString;
                                                            }
                                                            if($t4ConformRes != ""){
                                                                ?>
                                                                <tr class='AccuracyorTimeMeasurement'>
                                                                    <td>
                                                                        <label class="form-check-label" for="c3_4" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                                                                            <b>Conformance Result:</b>
                                                                            <?php echo $t4ConformRes; ?>
                                                                        </label>
                                                                    </td>
                                                                </tr>
                                                                <?php
                                                            }
                                                        }
                                                        //=================
                                                        if($key == "c15_t4_scope_2"){
                                                            $t4Scope = "";
                                                            if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_TemporalConsistency->TemporalConsistencyScope->TemporalConsistencyItem->CharacterString) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_TemporalConsistency->TemporalConsistencyScope->TemporalConsistencyItem->CharacterString != "") {
                                                                $t4Scope = trim($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_TemporalConsistency->TemporalConsistencyScope->TemporalConsistencyItem->CharacterString);
                                                            }
                                                            if($t4Scope != ""){
                                                                ?>
                                                                <tr class='TemporalConsistency'>
                                                                    <td>
                                                                        <label class="form-check-label" for="c15_t4_scope_2" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                                                                            <b>Scope:</b>
                                                                            <?php echo trim($t4Scope); ?>
                                                                        </label>
                                                                    </td>
                                                                </tr>
                                                                <?php
                                                            }
                                                        }
                                                        if($key == "c15_t4_comply_level_2"){
                                                            $t4CompLvl = "";
                                                            if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_TemporalConsistency->TemporalConsistencyLevel->CharacterString) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_TemporalConsistency->TemporalConsistencyLevel->CharacterString != "") {
                                                                $t4CompLvl = $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_TemporalConsistency->TemporalConsistencyLevel->CharacterString;
                                                            }
                                                            if($t4CompLvl != ""){
                                                                ?>
                                                                <tr class='TemporalConsistency'>
                                                                    <td>
                                                                        <label class="form-check-label" for="c15_t4_comply_level_2" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                                                                            <b>Compliance Level:</b>
                                                                            <?php echo $t4CompLvl; ?>
                                                                        </label>
                                                                    </td>
                                                                </tr>
                                                                <?php
                                                            }
                                                        }
                                                        if($key == "c15_t4_date_2"){
                                                            $t4Date = "";
                                                            if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_TemporalConsistency->dateTime->Date) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_TemporalConsistency->dateTime->Date != "") {
                                                                $t4Date = $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_TemporalConsistency->dateTime->Date;
                                                            }
                                                            if($t4Date != ""){
                                                                ?>
                                                                <tr class='TemporalConsistency'>
                                                                    <td>
                                                                        <label class="form-check-label" for="c15_t4_date_2" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                                                                            <b>Date:</b>
                                                                            <?php echo date('d/m/Y',strtotime(trim($t4Date))); ?>
                                                                        </label>
                                                                    </td>
                                                                </tr>
                                                                <?php
                                                            }
                                                        }
                                                        if($key == "c15_t4_result_2"){
                                                            $t4Res = "";
                                                            if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_TemporalConsistency->result->DQ_ConformanceResult->pass->Boolean) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_TemporalConsistency->result->DQ_ConformanceResult->pass->Boolean != "") {
                                                                $t4Res = trim($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_TemporalConsistency->result->DQ_ConformanceResult->pass->Boolean);
                                                            }
                                                            if($t4Res != ""){
                                                                ?>
                                                                <tr class='TemporalConsistency'>
                                                                    <td>
                                                                        <label class="form-check-label" for="c15_t4_conform_result_2" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                                                                            <b>Result:</b>
                                                                            <?php echo trim($t4Res); ?>
                                                                        </label>
                                                                    </td>
                                                                </tr>
                                                                <?php
                                                            }
                                                        }
                                                        if($key == "c15_t4_conform_result_2"){
                                                            $t4ConformRes = "";
                                                            if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_TemporalConsistency->result->DQ_ConformanceResult->explanation->CharacterString) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_TemporalConsistency->result->DQ_ConformanceResult->explanation->CharacterString != "") {
                                                                $t4ConformRes = $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_TemporalConsistency->result->DQ_ConformanceResult->explanation->CharacterString;
                                                            }
                                                            if($t4ConformRes != ""){
                                                                ?>
                                                                <tr class='TemporalConsistency'>
                                                                    <td>
                                                                        <label class="form-check-label" for="c15_t4_conform_result_2" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                                                                            <b>Conformance Result:</b>
                                                                            <?php echo $t4ConformRes; ?>
                                                                        </label>
                                                                    </td>
                                                                </tr>
                                                                <?php
                                                            }
                                                        }
                                                        //=================
                                                        if($key == "c15_t4_scope_3"){
                                                            $t4Scope = "";
                                                            if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_TemporalValidity->TemporalValidityScope->TemporalValidityItem->CharacterString) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_TemporalValidity->TemporalValidityScope->TemporalValidityItem->CharacterString != "") {
                                                                $t4Scope = trim($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_TemporalValidity->TemporalValidityScope->TemporalValidityItem->CharacterString);
                                                            }
                                                            if($t4Scope != ""){
                                                                ?>
                                                                <tr class='TemporalValidity'>
                                                                    <td>
                                                                        <label class="form-check-label" for="c15_t4_accuTimeMeasure_scope" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                                                                            <b>Scope:</b>
                                                                            <?php echo trim($t4Scope); ?>
                                                                        </label>
                                                                    </td>
                                                                </tr>
                                                                <?php
                                                            }
                                                        }
                                                        if($key == "c15_t4_comply_level_3"){
                                                            $t4CompLvl = "";
                                                            if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_TemporalValidity->TemporalValidityLevel->CharacterString) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_TemporalValidity->TemporalValidityLevel->CharacterString != "") {
                                                                $t4CompLvl = $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_TemporalValidity->TemporalValidityLevel->CharacterString;
                                                            }
                                                            if($t4CompLvl != ""){
                                                                ?>
                                                                <tr class='TemporalValidity'>
                                                                    <td>
                                                                        <label class="form-check-label" for="c15_t4_comply_level_3" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                                                                            <b>Compliance Level:</b>
                                                                            <?php echo $t4CompLvl; ?>
                                                                        </label>
                                                                    </td>
                                                                </tr>
                                                                <?php
                                                            }
                                                        }
                                                        if($key == "c15_t4_date_3"){
                                                            $t4Date = "";
                                                            if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_TemporalValidity->dateTime->Date) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_TemporalValidity->dateTime->Date != "") {
                                                                $t4Date = $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_TemporalValidity->dateTime->Date;
                                                            }
                                                            if($t4Date != ""){
                                                                ?>
                                                                <tr class='TemporalValidity'>
                                                                    <td>
                                                                        <label class="form-check-label" for="c15_t4_date_3" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                                                                            <b>Date:</b>
                                                                            <?php echo $t4Date; ?>
                                                                        </label>
                                                                    </td>
                                                                </tr>
                                                                <?php
                                                            }
                                                        }
                                                        if($key == "c15_t4_result_3"){
                                                            $t4Res = "";
                                                            if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_TemporalValidity->result->DQ_ConformanceResult->pass->Boolean) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_TemporalValidity->result->DQ_ConformanceResult->pass->Boolean != "") {
                                                                $t4Res = trim($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_TemporalValidity->result->DQ_ConformanceResult->pass->Boolean);
                                                            }
                                                            if($t4Res != ""){
                                                                ?>
                                                                <tr class='TemporalValidity'>
                                                                    <td>
                                                                        <label class="form-check-label" for="c15_t4_result_3" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                                                                            <b>Result:</b>
                                                                            <?php echo $t4Res; ?>
                                                                        </label>
                                                                    </td>
                                                                </tr>
                                                                <?php
                                                            }
                                                        }
                                                        if($key == "c15_t4_conform_result_3"){
                                                            $t4ConformRes = "";
                                                            if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_TemporalValidity->result->DQ_ConformanceResult->explanation->CharacterString) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_TemporalValidity->result->DQ_ConformanceResult->explanation->CharacterString != "") {
                                                                $t4ConformRes = $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_TemporalValidity->result->DQ_ConformanceResult->explanation->CharacterString;
                                                            }
                                                            if($t4ConformRes != ""){
                                                                ?>
                                                                <tr class='TemporalValidity'>
                                                                    <td>
                                                                        <label class="form-check-label" for="c15_t4_conform_result_3" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                                                                            <b>Conformance Result:</b>
                                                                            <?php echo $t4ConformRes; ?>
                                                                        </label>
                                                                    </td>
                                                                </tr>
                                                                <?php
                                                            }
                                                        }
                                                    }
                                                    ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="thematic_accuracy" role="tabpanel" aria-labelledby="tab_thematic_accuracy">
                                <div class="form-group row">
                                    <div class="d-flex flex-wrap bd-highlight">
                                        <div class="table-responsive">
                                            <table class="table-borderless">
                                                <tbody>
                                                    <tr>
                                                        <td>
                                                            <label class="form-check-label" for="c15_t5_type" style="margin-right:50px;">
                                                                <input type="radio" name="c15_t5_type" value="Classification Correctness" checked>&nbsp;<?php echo __('lang.classificationCorrectness'); ?>
                                                            </label>
                                                        </td>
                                                        <td>
                                                            <label class="form-check-label" for="c15_t5_type" style="margin-right:50px;">
                                                                <input type="radio" name="c15_t5_type" value="Non Quantitative Attribute Correctness">&nbsp;<?php echo __('lang.nonQuantitativeAttributeCorrectness'); ?>
                                                            </label>
                                                        </td>
                                                        <td>
                                                            <label class="form-check-label" for="c15_t5_type" style="margin-right:50px;">
                                                                <input type="radio" name="c15_t5_type" value="Quantitative Attribute Accuracy">&nbsp;<?php echo __('lang.quantitativeAttributeCorrectness'); ?>
                                                            </label>
                                                        </td>
                                                    </tr>
                                                    <?php //================= ?>
                                                    <?php 
                                                    foreach($template->template[strtolower($catSelected)]['accordion15'] as $key=>$val){
                                                        if($key == "c15_t5_scope"){
                                                            $t5Scope = "";
                                                            if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_ThematicClassificationCorrectness->ThematicClassificationCorrectnessScope->ThematicClassificationCorrectnessItem->CharacterString) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_ThematicClassificationCorrectness->ThematicClassificationCorrectnessScope->ThematicClassificationCorrectnessItem->CharacterString != "") {
                                                                $t5Scope = trim($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_ThematicClassificationCorrectness->ThematicClassificationCorrectnessScope->ThematicClassificationCorrectnessItem->CharacterString);
                                                            }
                                                            if($t5Scope != ""){
                                                                ?>
                                                                <tr class='classificationCorrectness'>
                                                                    <td>
                                                                        <label class="form-check-label" for="c15_t5_classCorrect_scope" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                                                                            <b>Scope:</b>
                                                                            <?php echo $t5Scope; ?>
                                                                        </label>
                                                                    </td>
                                                                </tr>
                                                                <?php
                                                            }
                                                        }
                                                        if($key == "c15_t5_comply_level"){
                                                            $t5CompLvl = "";
                                                            if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_ThematicClassificationCorrectness->ThematicClassificationCorrectnessLevel->CharacterString) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_ThematicClassificationCorrectness->ThematicClassificationCorrectnessLevel->CharacterString != "") {
                                                                $t5CompLvl = $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_ThematicClassificationCorrectness->ThematicClassificationCorrectnessLevel->CharacterString;
                                                            }
                                                            if($t5CompLvl != ""){
                                                                ?>
                                                                <tr class='classificationCorrectness'>
                                                                    <td>
                                                                        <label class="form-check-label" for="c3_3" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                                                                            <b>Compliance Level:</b>
                                                                            <?php echo $t5CompLvl; ?>
                                                                        </label>
                                                                    </td>
                                                                </tr>
                                                                <?php
                                                            }
                                                        }
                                                        if($key == "c15_t5_date"){
                                                            $t5Date = "";
                                                            if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_ThematicClassificationCorrectness->dateTime->Date) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_ThematicClassificationCorrectness->dateTime->Date != "") {
                                                                $t5Date = $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_ThematicClassificationCorrectness->dateTime->Date;
                                                            }
                                                            if($t5Date != ""){
                                                                ?>
                                                                <tr class='classificationCorrectness'>
                                                                    <td>
                                                                        <label class="form-check-label" for="c15_t5_classCorrect_date" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                                                                            <b>Date:</b>
                                                                            <?php echo $t5Date; ?>
                                                                        </label>
                                                                    </td>
                                                                </tr>
                                                                <?php
                                                            }
                                                        }
                                                        if($key == "c15_t5_result"){
                                                            $t5Res = "";
                                                            if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_ThematicClassificationCorrectness->result->DQ_ConformanceResult->pass->Boolean) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_ThematicClassificationCorrectness->result->DQ_ConformanceResult->pass->Boolean != "") {
                                                                $t5Res = trim($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_ThematicClassificationCorrectness->result->DQ_ConformanceResult->pass->Boolean);
                                                            }
                                                            if($t5Res != ""){
                                                                ?>
                                                                <tr class='classificationCorrectness'>
                                                                    <td>
                                                                        <label class="form-check-label" for="c3_2" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                                                                            <b>Result:</b>
                                                                            <?php echo $t5Res; ?>
                                                                        </label>
                                                                    </td>
                                                                </tr>
                                                                <?php
                                                            }
                                                        }
                                                        if($key == "c15_t5_conform_result"){
                                                            $t5ConformRes = "";
                                                            if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_ThematicClassificationCorrectness->result->DQ_ConformanceResult->explanation->CharacterString) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_ThematicClassificationCorrectness->result->DQ_ConformanceResult->explanation->CharacterString != "") {
                                                                $t5ConformRes = $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_ThematicClassificationCorrectness->result->DQ_ConformanceResult->explanation->CharacterString;
                                                            }
                                                            if($t5ConformRes != ""){
                                                                ?>
                                                                <tr class='classificationCorrectness'>
                                                                    <td>
                                                                        <label class="form-check-label" for="c3_4" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                                                                            <b>Conformance Result:</b>
                                                                            <?php echo $t5ConformRes; ?>
                                                                        </label>
                                                                    </td>
                                                                </tr>
                                                                <?php
                                                            }
                                                        }
                                                        //=================
                                                        if($key == "c15_t5_scope_2"){
                                                            $t5Scope = "";
                                                            if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_NonQuantitativeAttributeAccuracy->NonQuantitativeAttributeAccuracyScope->NonQuantitativeAttributeAccuracyScopeItem->CharacterString) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_NonQuantitativeAttributeAccuracy->NonQuantitativeAttributeAccuracyScope->NonQuantitativeAttributeAccuracyScopeItem->CharacterString != "") {
                                                                $t5Scope = trim($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_NonQuantitativeAttributeAccuracy->NonQuantitativeAttributeAccuracyScope->NonQuantitativeAttributeAccuracyScopeItem->CharacterString);
                                                                echo $t5Scope;
                                                            }
                                                            if($t5Scope != ""){
                                                                ?>
                                                                <tr class='nonQuantitativeAttributeCorrectness'>
                                                                    <td>
                                                                        <label class="form-check-label" for="c15_t5_classCorrect_scope" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                                                                            <b>Scope:</b>
                                                                            <?php echo $t5Scope; ?>
                                                                        </label>
                                                                    </td>
                                                                </tr>
                                                                <?php
                                                            }
                                                        }
                                                        if($key == "c15_t5_comply_level_2"){
                                                            $t5CompLvl = "";
                                                            if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_NonQuantitativeAttributeAccuracy->NonQuantitativeAttributeAccuracyLevel->CharacterString) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_NonQuantitativeAttributeAccuracy->NonQuantitativeAttributeAccuracyLevel->CharacterString != "") {
                                                                $t5CompLvl = $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_NonQuantitativeAttributeAccuracy->NonQuantitativeAttributeAccuracyLevel->CharacterString;
                                                            }
                                                            if($t5CompLvl != ""){
                                                                ?>
                                                                <tr class='nonQuantitativeAttributeCorrectness'>
                                                                    <td>
                                                                        <label class="form-check-label" for="c3_3" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                                                                            <b>Compliance Level:</b>
                                                                            <?php echo $t5CompLvl; ?>
                                                                        </label>
                                                                    </td>
                                                                </tr>
                                                                <?php
                                                            }
                                                        }
                                                        if($key == "c15_t5_date_2"){
                                                            $t5Date = "";
                                                            if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_NonQuantitativeAttributeAccuracy->dateTime->Date) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_NonQuantitativeAttributeAccuracy->dateTime->Date != "") {
                                                                $t5Date = $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_NonQuantitativeAttributeAccuracy->dateTime->Date;
                                                            }
                                                            if($t5Date != ""){
                                                                ?>
                                                                <tr class='nonQuantitativeAttributeCorrectness'>
                                                                    <td>
                                                                        <label class="form-check-label" for="c15_t5_classCorrect_date" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                                                                            <b>Date:</b>
                                                                            <?php echo $t5Date; ?>
                                                                        </label>
                                                                    </td>
                                                                </tr>
                                                                <?php
                                                            }
                                                        }
                                                        if($key == "c15_t5_result_2"){
                                                            $t5Res = "";
                                                            if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_NonQuantitativeAttributeAccuracy->result->DQ_ConformanceResult->pass->Boolean) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_NonQuantitativeAttributeAccuracy->result->DQ_ConformanceResult->pass->Boolean != "") {
                                                                $t5Res = trim($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_NonQuantitativeAttributeAccuracy->result->DQ_ConformanceResult->pass->Boolean);
                                                            }
                                                            if($t5Res != ""){
                                                                ?>
                                                                <tr class='nonQuantitativeAttributeCorrectness'>
                                                                    <td>
                                                                        <label class="form-check-label" for="c3_2" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                                                                            <b>Result:</b>
                                                                            <?php echo $t5Res; ?>
                                                                        </label>
                                                                    </td>
                                                                </tr>
                                                                <?php
                                                            }
                                                        }
                                                        if($key == "c15_t5_conform_result_2"){
                                                            $t5ConformRes = "";
                                                            if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_ThematicClassificationCorrectness->result->DQ_ConformanceResult->explanation->CharacterString) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_ThematicClassificationCorrectness->result->DQ_ConformanceResult->explanation->CharacterString != "") {
                                                                $t5ConformRes = $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_ThematicClassificationCorrectness->result->DQ_ConformanceResult->explanation->CharacterString;
                                                            }
                                                            if($t5ConformRes != ""){
                                                                ?>
                                                                <tr class='nonQuantitativeAttributeCorrectness'>
                                                                    <td>
                                                                        <label class="form-check-label" for="c3_4" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                                                                            <b>Conformance Result:</b>
                                                                            <?php echo $t5ConformRes; ?>
                                                                        </label>
                                                                    </td>
                                                                </tr>
                                                                <?php
                                                            }
                                                        }
                                                        //=================
                                                        if($key == "c15_t5_scope_3"){
                                                            $t5Scope = "";
                                                            if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_QuantitativeAttributeAccuracy->QuantitativeAttributeAccuracyScope->QuantitativeAttributeAccuracyItem->CharacterString) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_QuantitativeAttributeAccuracy->QuantitativeAttributeAccuracyScope->QuantitativeAttributeAccuracyItem->CharacterString != "") {
                                                                $t5Scope = trim($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_QuantitativeAttributeAccuracy->QuantitativeAttributeAccuracyScope->QuantitativeAttributeAccuracyItem->CharacterString);
                                                                echo $t5Scope;
                                                            }
                                                            if($t5Scope != ""){
                                                                ?>
                                                                <tr class='quantitativeAttributeCorrectness'>
                                                                    <td>
                                                                        <label class="form-check-label" for="c15_t5_classCorrect_scope" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                                                                            <b>Scope:</b>
                                                                            <?php echo $t5Scope; ?>
                                                                        </label>
                                                                    </td>
                                                                </tr>
                                                                <?php
                                                            }
                                                        }
                                                        if($key == "c15_t5_comply_level_3"){
                                                            $t5CompLvl = "";
                                                            if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_QuantitativeAttributeAccuracy->QuantitativeAttributeAccuracyLevel->CharacterString) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_QuantitativeAttributeAccuracy->QuantitativeAttributeAccuracyLevel->CharacterString != "") {
                                                                $t5CompLvl = $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_QuantitativeAttributeAccuracy->QuantitativeAttributeAccuracyLevel->CharacterString;
                                                            }
                                                            if($t5CompLvl != ""){
                                                                ?>
                                                                <tr class='quantitativeAttributeCorrectness'>
                                                                    <td>
                                                                        <label class="form-check-label" for="c3_3" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                                                                            <b>Compliance Level:</b>
                                                                            <?php echo $t5CompLvl; ?>
                                                                        </label>
                                                                    </td>
                                                                </tr>
                                                                <?php
                                                            }
                                                        }
                                                        if($key == "c15_t5_date_3"){
                                                            $t5Date = "";
                                                            if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_QuantitativeAttributeAccuracy->dateTime->Date) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_QuantitativeAttributeAccuracy->dateTime->Date != "") {
                                                                $t5Date = $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_QuantitativeAttributeAccuracy->dateTime->Date;
                                                            }
                                                            if($t5Date != ""){
                                                                ?>
                                                                <tr class='quantitativeAttributeCorrectness'>
                                                                    <td>
                                                                        <label class="form-check-label" for="c15_t5_classCorrect_date" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                                                                            <b>Date:</b>
                                                                            <?php echo $t5Date; ?>
                                                                        </label>
                                                                    </td>
                                                                </tr>
                                                                <?php
                                                            }
                                                        }
                                                        if($key == "c15_t5_result_3"){
                                                            $t5Res = "";
                                                            if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_QuantitativeAttributeAccuracy->result->DQ_ConformanceResult->pass->Boolean) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_QuantitativeAttributeAccuracy->result->DQ_ConformanceResult->pass->Boolean != "") {
                                                                $t5Res = trim($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_QuantitativeAttributeAccuracy->result->DQ_ConformanceResult->pass->Boolean);
                                                            }
                                                            if($t5Res != ""){
                                                                ?>
                                                                <tr class='quantitativeAttributeCorrectness'>
                                                                    <td>
                                                                        <label class="form-check-label" for="c3_2" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                                                                            <b>Result:</b>
                                                                            <?php echo $t5Res; ?>
                                                                        </label>
                                                                    </td>
                                                                </tr>
                                                                <?php
                                                            }
                                                        }
                                                        if($key == "c15_t5_conform_result_3"){
                                                            $t5ConformRes = "";
                                                            if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_QuantitativeAttributeAccuracy->result->DQ_ConformanceResult->explanation->CharacterString) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_QuantitativeAttributeAccuracy->result->DQ_ConformanceResult->explanation->CharacterString != "") {
                                                                $t5ConformRes = $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_QuantitativeAttributeAccuracy->result->DQ_ConformanceResult->explanation->CharacterString;
                                                            }
                                                            if($t5ConformRes != ""){
                                                                ?>
                                                                <tr class='quantitativeAttributeCorrectness'>
                                                                    <td>
                                                                        <label class="form-check-label" for="c3_4" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                                                                            <b>Conformance Result:</b>
                                                                            <?php echo $t5ConformRes; ?>
                                                                        </label>
                                                                    </td>
                                                                </tr>
                                                                <?php
                                                            }
                                                        }
                                                    }
                                                    ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

    <script>
        $(document).ready(function () {
            //t1
            $('.Completeness_Commission').hide();
            $('.Completeness_Omission').hide();
//            $("#completeness_comission").prop("checked", true);
            //t2
            $('.Conceptual').hide();
            $('.Domain').hide();
            $('.Format').hide();
            $('.Topological').hide();
//            $("#conceptual").prop("checked", true);
            //t3
            $('.AbsoluteorExternal').hide();
            $('.RelativeorInternal').hide();
            $('.GriddedData').hide();
//            $("#AbsoluteOrExternal").prop("checked", true);
            //t4
            $('.AccuracyorTimeMeasurement').hide();
            $('.TemporalConsistency').hide();
            $('.TemporalValidity').hide();
//            $("#AccuracyorTimeMeasurement").prop("checked", true);
            //t5
            $('.classificationCorrectness').hide();
            $('.nonQuantitativeAttributeCorrectness').hide();
            $('.quantitativeAttributeCorrectness').hide();
//            $("#ClassificationCorrectness").prop("checked", true);
        });

        $('input:radio[name="c15_t1_complete_comm_or_omit"]').change(function () {
            if ($(this).val() == 'Completeness Commission') {
                $('.Completeness_Commission').show();
                $('.Completeness_Omission').hide();
            } else if ($(this).val() == 'Completeness Omission') {
                $('.Completeness_Commission').hide();
                $('.Completeness_Omission').show();
            }
        });
        $('input:radio[name="c15_t2_type"]').change(function () {
            if ($(this).val() == 'Conceptual') {
                $('.Conceptual').show();
                $('.Domain').hide();
                $('.Format').hide();
                $('.Topological').hide();
            } else if ($(this).val() == 'Domain') {
                $('.Conceptual').hide();
                $('.Domain').show();
                $('.Format').hide();
                $('.Topological').hide();
            } else if ($(this).val() == 'Format') {
                $('.Conceptual').hide();
                $('.Domain').hide();
                $('.Format').show();
                $('.Topological').hide();
            } else if ($(this).val() == 'Topological') {
                $('.Conceptual').hide();
                $('.Domain').hide();
                $('.Format').hide();
                $('.Topological').show();
            }
        });
        $('input:radio[name="c15_t3_type"]').change(function () {
            if ($(this).val() == 'Absolute or External') {
                $('.AbsoluteorExternal').show();
                $('.RelativeorInternal').hide();
                $('.GriddedData').hide();
            } else if ($(this).val() == 'Relative or Internal') {
                $('.AbsoluteorExternal').hide();
                $('.RelativeorInternal').show();
                $('.GriddedData').hide();
            } else if ($(this).val() == 'Gridded Data') {
                $('.AbsoluteorExternal').hide();
                $('.RelativeorInternal').hide();
                $('.GriddedData').show();
            }
        });
        $('input:radio[name="c15_t4_type"]').change(function () {
            if ($(this).val() == 'Accuracy or Time Measurement') {
                $('.AccuracyorTimeMeasurement').show();
                $('.TemporalConsistency').hide();
                $('.TemporalValidity').hide();
            } else if ($(this).val() == 'Temporal Consistency') {
                $('.AccuracyorTimeMeasurement').hide();
                $('.TemporalConsistency').show();
                $('.TemporalValidity').hide();
            } else if ($(this).val() == 'Temporal Validity') {
                $('.AccuracyorTimeMeasurement').hide();
                $('.TemporalConsistency').hide();
                $('.TemporalValidity').show();
            }
        });
        $('input:radio[name="c15_t5_type"]').change(function() {
            if ($(this).val() == 'Classification Correctness') {
                $('.classificationCorrectness').show();
                $('.nonQuantitativeAttributeCorrectness').hide();
                $('.quantitativeAttributeCorrectness').hide();
            } else if ($(this).val() == 'Non Quantitative Attribute Correctness') {
                $('.classificationCorrectness').hide();
                $('.nonQuantitativeAttributeCorrectness').show();
                $('.quantitativeAttributeCorrectness').hide();
            } else if ($(this).val() == 'Quantitative Attribute Accuracy') {
                $('.classificationCorrectness').hide();
                $('.nonQuantitativeAttributeCorrectness').hide();
                $('.quantitativeAttributeCorrectness').show();
            }
        });
    </script>