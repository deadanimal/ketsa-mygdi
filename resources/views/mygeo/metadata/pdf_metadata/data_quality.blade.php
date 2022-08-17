<?php $flag = 1; ?>
<style>

</style>
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
                <label class="form-control-label float-right" for="input-datahistory"><b>Data Quality Information</b></label>
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
                                        {{ (isset($metadataxml->customInputs->accordion15->$key) ? $metadataxml->customInputs->accordion15->$key:"") }}
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
                                $flag *= 0;
                                ?>
                                <div class="col-xl-1" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                                    <label class="form-control-label" for="input-DQscope">
                                        DQ Scope:
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
                                        Data History:</label>
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
                                        Date :
                                    </label>
                                </div>
                                <div class="col-xl-3" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                                    <?php echo date('d/m/Y',strtotime(trim($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_Element->dateTime->Date))); ?>
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
                <div class="card card-primary card-outline card-outline-tabs col-xl-12">
                    <div class="card-header p-0 border-bottom-0">
                        <ul class="nav nav-tabs" id="custom-tabs-four-tab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="tab_completeness" data-toggle="pill" href="#completeness" role="tab" aria-controls="completeness" aria-selected="true">DQ 1 COMPLETENESS</a>
                            </li>
                        </ul>
                    </div>
                    <div class="card-body">
                        <div class="tab-content" id="custom-tabs-four-tabContent">
                            <div class="tab-pane fade active show" id="completeness" role="tabpanel" aria-labelledby="tab_completeness">
                                <div class="form-group row">
                                    <div class="d-flex flex-wrap bd-highlight">
                                        <div class="table-responsive">
                                            <table class="table table-borderless">
                                                <tbody>
                                                    <tr>
                                                        <td>
                                                            <label class="form-control-label"><b>Sub DQ 1.1 Completeness Commission</b></label>
                                                        </td>
                                                        <td>
                                                            <label class="form-control-label"><b>Sub DQ 1.2 Completeness Omission</b></label>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <?php //================= ?>
                                                            <?php
                                                            foreach($template->template[strtolower($catSelected)]['accordion15'] as $key=>$val){
                                                                if($key == "c15_t1_scope"){
                                                                    $t1Scope = "";
                                                                    if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_CompletenessCommission->compCommissScope->compCommissScopeItem->CharacterString) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_CompletenessCommission->compCommissScope->compCommissScopeItem->CharacterString != "") {
                                                                        $t1Scope = trim($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_CompletenessCommission->compCommissScope->compCommissScopeItem->CharacterString);
                                                                    }
                                                                    if($t1Scope != ""){
                                                                        $flag *= 0;
                                                                        ?>
                                                                        <div class="form-group" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                                                                                <p>
                                                                                    <label class="form-control-label">Scope:</label>
                                                                                    <?php echo trim($t1Scope); ?>
                                                                                </p>
                                                                        </div>
                                                                        <?php
                                                                    }
                                                                }
                                                                if($key == "c15_t1_comply_level"){
                                                                    $compLvl = "";
                                                                    if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_CompletenessCommission->compCommissComplLevel->CharacterString) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_CompletenessCommission->compCommissComplLevel->CharacterString != "") {
                                                                        $compLvl = $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_CompletenessCommission->compCommissComplLevel->CharacterString;
                                                                    }
                                                                    if($compLvl != ""){
                                                                        $flag *= 0;
                                                                        ?>
                                                                        <div class="form-group" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                                                                            <p>
                                                                                <label class="form-control-label">Compliance Level:</label>
                                                                                <?php echo $compLvl; ?>
                                                                            </p>
                                                                        </div>
                                                                        <?php
                                                                    }
                                                                }
                                                                if($key == "c15_t1_date"){
                                                                    $t1Date = "";
                                                                    if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_CompletenessCommission->dateTime->Date) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_CompletenessCommission->dateTime->Date != "") {
                                                                        $t1Date = trim($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_CompletenessCommission->dateTime->Date);
                                                                    }
                                                                    if($t1Date != ""){
                                                                        $flag *= 0;
                                                                        ?>
                                                                        <div class="form-group" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                                                                            <p>
                                                                                <label class="form-control-label">Date:</label>
                                                                                <?php echo date('d/m/Y',strtotime(trim($t1Date))); ?>
                                                                            </p>
                                                                        </div>
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
                                                                        $flag *= 0;
                                                                        ?>
                                                                        <div class="form-group" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                                                                            <p>
                                                                                <label class="form-control-label">Result:</label>
                                                                                <?php echo trim($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_CompletenessCommission->result->DQ_ConformanceResult->pass->Boolean); ?>
                                                                            </p>
                                                                        </div>
                                                                        <?php
                                                                    }
                                                                }
                                                                if($key == "c15_t1_conform_result"){
                                                                    $conformRes = "";
                                                                    if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_CompletenessCommission->result->DQ_ConformanceResult->explanation->CharacterString) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_CompletenessCommission->result->DQ_ConformanceResult->explanation->CharacterString != "") {
                                                                        $conformRes = $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_CompletenessCommission->result->DQ_ConformanceResult->explanation->CharacterString;
                                                                    }
                                                                    if($conformRes != ""){
                                                                        $flag *= 0;
                                                                        ?>
                                                                        <div class="form-group" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                                                                            <p>
                                                                                <label class="form-control-label">Conformance Result:</label>
                                                                                <?php echo $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_CompletenessCommission->result->DQ_ConformanceResult->explanation->CharacterString; ?>
                                                                            </p>
                                                                        </div>
                                                                        <?php
                                                                    }
                                                                }
                                                            }
                                                            ?>
                                                        </td>
                                                        <td>
                                                            <?php //================= ?>
                                                            <?php
                                                            foreach($template->template[strtolower($catSelected)]['accordion15'] as $key=>$val){
                                                                if($key == "c15_t1_scope_2"){
                                                                    $t1Scope = "";
                                                                    if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_CompletenessOmission->compOmissScope->compOmissScopeItem->CharacterString) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_CompletenessOmission->compOmissScope->compOmissScopeItem->CharacterString != "") {
                                                                        $t1Scope = trim($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_CompletenessOmission->compOmissScope->compOmissScopeItem->CharacterString);
                                                                    }
                                                                    if($t1Scope != ""){
                                                                        $flag *= 0;
                                                                        ?>
                                                                        <div class="form-group" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                                                                            <p>
                                                                                <label class="form-control-label">Scope:</label>
                                                                                <?php echo trim($t1Scope); ?>
                                                                            </p>
                                                                        </div>
                                                                        <?php
                                                                    }
                                                                }
                                                                if($key == "c15_t1_comply_level_2"){
                                                                    $compLvl = "";
                                                                    if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_CompletenessOmission->compOmissComplLevel->CharacterString) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_CompletenessOmission->compOmissComplLevel->CharacterString != "") {
                                                                        $compLvl = $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_CompletenessOmission->compOmissComplLevel->CharacterString;
                                                                    }
                                                                    if($compLvl != ""){
                                                                        $flag *= 0;
                                                                        ?>
                                                                        <div class="form-group" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                                                                            <p>
                                                                                <label class="form-control-label">Compliance Level:</label>
                                                                                <?php echo $compLvl; ?>
                                                                            </p>
                                                                        </div>
                                                                        <?php
                                                                    }
                                                                }
                                                                if($key == "c15_t1_date_2"){
                                                                    $t1Date = "";
                                                                    if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_CompletenessOmission->dateTime->Date) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_CompletenessOmission->dateTime->Date != "") {
                                                                        $t1Date = $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_CompletenessOmission->dateTime->Date;
                                                                    }
                                                                    if($t1Date != ""){
                                                                        $flag *= 0;
                                                                        ?>
                                                                        <div class="form-group" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                                                                            <p>
                                                                                <label class="form-control-label">Date:</label>
                                                                                <?php echo date('d/m/Y',strtotime(trim($t1Date))); ?>
                                                                            </p>
                                                                        </div>
                                                                        <?php
                                                                    }
                                                                }
                                                                if($key == "c15_t1_result_2"){
                                                                    $t1Res = "";
                                                                    if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_CompletenessOmission->result->DQ_ConformanceResult->pass->Boolean) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_CompletenessOmission->result->DQ_ConformanceResult->pass->Boolean != "") {
                                                                        $t1Res = trim($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_CompletenessOmission->result->DQ_ConformanceResult->pass->Boolean);
                                                                    }
                                                                    if($t1Res != ""){
                                                                        $flag *= 0;
                                                                        ?>
                                                                        <div class="form-group" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                                                                            <p>
                                                                                <label class="form-control-label">Result:</label>
                                                                                <?php echo trim($t1Res); ?>
                                                                            </p>
                                                                        </div>
                                                                        <?php
                                                                    }
                                                                }
                                                                if($key == "c15_t1_conform_result_2"){
                                                                    $conformRes = "";
                                                                    if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_CompletenessOmission->result->DQ_ConformanceResult->explanation->CharacterString) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_CompletenessOmission->result->DQ_ConformanceResult->explanation->CharacterString != "") {
                                                                        $conformRes = $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_CompletenessOmission->result->DQ_ConformanceResult->explanation->CharacterString;
                                                                    }
                                                                    if($conformRes != ""){
                                                                        $flag *= 0;
                                                                        ?>
                                                                        <div class="form-group" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                                                                            <p>
                                                                                <label class="form-control-label">Conformance Result:</label>
                                                                                <?php echo $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_CompletenessOmission->result->DQ_ConformanceResult->explanation->CharacterString; ?>
                                                                            </p>
                                                                        </div>
                                                                        <?php
                                                                    }
                                                                }
                                                            }
                                                            ?>
                                                        </td>
                                                    </tr>
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
            &nbsp;&nbsp;&nbsp;
            <div class="form-group row col-xl-12 divDataQualityTabs">
                <div class="card card-primary card-outline card-outline-tabs col-xl-12">
                    <div class="card-header p-0 border-bottom-0">
                        <ul class="nav nav-tabs" id="custom-tabs-four-tab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="tab_consistency" data-toggle="pill" href="#consistency" role="tab" aria-controls="consistency" aria-selected="false">DQ 2 LOGICAL CONSISTENCY</a>
                            </li>
                        </ul>
                    </div>
                    <div class="card-body">
                        <div class="tab-content" id="custom-tabs-four-tabContent">
                            <div class="tab-pane fade active show" id="consistency" role="tabpanel" aria-labelledby="tab_consistency">
                                <div class="form-group row">
                                    <div class="d-flex flex-wrap bd-highlight">
                                        <div class="table-responsive">
                                            <table class="table table-borderless">
                                                <tbody>
                                                    <tr>
                                                        <td>
                                                            <label class="form-control-label"><b>Sub DQ 2.1 Conceptual Consistency</b></label>
                                                        </td>
                                                        <td>
                                                            <label class="form-control-label"><b>Sub DQ 2.2 Domain Consistency</b></label>
                                                        </td>
                                                        <td>
                                                            <label class="form-control-label"><b>Sub DQ 2.3 Format Consistency</b></label>
                                                        </td>
                                                        <td>
                                                            <label class="form-control-label"><b>Sub DQ 2.4 Topological Consistency</b></label>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <?php
                                                            foreach($template->template[strtolower($catSelected)]['accordion15'] as $key=>$val){
                                                                if($key == "c15_t2_scope"){
                                                                    $t2Scope = "";
                                                                    if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_ConceptualConsistency->consistConceptScope->consistConceptScopeItem->CharacterString) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_ConceptualConsistency->consistConceptScope->consistConceptScopeItem->CharacterString != "") {
                                                                        $t2Scope = trim($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_ConceptualConsistency->consistConceptScope->consistConceptScopeItem->CharacterString);
                                                                    }
                                                                    if($t2Scope != ""){
                                                                        $flag *= 0;
                                                                        ?>
                                                                        <div class="form-group" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                                                                            <p>
                                                                                <label class="form-control-label">Scope:</label>
                                                                                <?php echo trim($t2Scope); ?>
                                                                            </p>
                                                                        </div>
                                                                        <?php
                                                                    }
                                                                }
                                                                if($key == "c15_t2_comply_level"){
                                                                    $compLvl = "";
                                                                    if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_ConceptualConsistency->compOmissLevel->CharacterString) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_ConceptualConsistency->compOmissLevel->CharacterString != "") {
                                                                        $compLvl = $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_ConceptualConsistency->compOmissLevel->CharacterString;
                                                                    }
                                                                    if($compLvl != ""){
                                                                        $flag *= 0;
                                                                        ?>
                                                                        <div class="form-group" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                                                                            <p>
                                                                                <label class="form-control-label">Compliance Level:</label>
                                                                                <?php echo $compLvl; ?>
                                                                            </p>
                                                                        </div>
                                                                        <?php
                                                                    }
                                                                }
                                                                if($key == "c15_t2_date"){
                                                                    $t2Date = "";
                                                                    if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_ConceptualConsistency->dateTime->Date) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_ConceptualConsistency->dateTime->Date != "") {
                                                                        $t2Date = $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_ConceptualConsistency->dateTime->Date;
                                                                    }
                                                                    if($t2Date != ""){
                                                                        $flag *= 0;
                                                                        ?>
                                                                        <div class="form-group" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                                                                            <p>
                                                                                <label class="form-control-label">Date:</label>
                                                                                <?php echo date('d/m/Y',strtotime(trim($t2Date))); ?>
                                                                            </p>
                                                                        </div>
                                                                        <?php
                                                                    }
                                                                }
                                                                if($key == "c15_t2_result"){
                                                                    $t2Res = "";
                                                                    if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_ConceptualConsistency->result->DQ_ConformanceResult->pass->Boolean) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_ConceptualConsistency->result->DQ_ConformanceResult->pass->Boolean != "") {
                                                                        $t2Res = trim($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_ConceptualConsistency->result->DQ_ConformanceResult->pass->Boolean);
                                                                    }
                                                                    if($t2Res != ""){
                                                                        $flag *= 0;
                                                                        ?>
                                                                        <div class="form-group" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                                                                            <p>
                                                                                <label class="form-control-label">Result:</label>
                                                                                <?php echo trim($t2Res); ?>
                                                                            </p>
                                                                        </div>
                                                                        <?php
                                                                    }
                                                                }
                                                                if($key == "c15_t2_conform_result"){
                                                                    $t2Res = "";
                                                                    if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_ConceptualConsistency->result->DQ_ConformanceResult->pass->Boolean) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_ConceptualConsistency->result->DQ_ConformanceResult->pass->Boolean != "") {
                                                                        $t2Res = trim($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_ConceptualConsistency->result->DQ_ConformanceResult->pass->Boolean);
                                                                    }
                                                                    if($t2Res != ""){
                                                                        $flag *= 0;
                                                                        ?>
                                                                        <div class="form-group" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                                                                            <p>
                                                                                <label class="form-control-label">Conformance Result:</label>
                                                                                <?php echo $t2Res; ?>
                                                                            </p>
                                                                        </div>
                                                                        <?php
                                                                    }
                                                                }
                                                            }
                                                            ?>
                                                        </td>
                                                        <td>
                                                            <?php
                                                            foreach($template->template[strtolower($catSelected)]['accordion14'] as $key=>$val){
                                                                if($key == "c15_t2_scope_2"){
                                                                    $t2Scope = "";
                                                                    if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_DomainConsistency->consistDomainScope->consistConceptScopeItem->CharacterString) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_DomainConsistency->consistDomainScope->consistConceptScopeItem->CharacterString != "") {
                                                                        $t2Scope = trim($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_DomainConsistency->consistDomainScope->consistConceptScopeItem->CharacterString);
                                                                    }
                                                                    if($t2Scope != ""){
                                                                        $flag *= 0;
                                                                        ?>
                                                                        <div class="form-group" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                                                                            <p>
                                                                                <label class="form-control-label">Scope:</label>
                                                                                <?php echo trim($t2Scope); ?>
                                                                            </p>
                                                                        </div>
                                                                        <?php
                                                                    }
                                                                }
                                                                if($key == "c15_t2_comply_level_2"){
                                                                    $compLvl = "";
                                                                    if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_DomainConsistency->compDomainLevel->CharacterString) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_DomainConsistency->compDomainLevel->CharacterString != "") {
                                                                        $compLvl = $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_DomainConsistency->compDomainLevel->CharacterString;
                                                                    }
                                                                    if($compLvl != ""){
                                                                        $flag *= 0;
                                                                        ?>
                                                                        <div class="form-group" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                                                                            <p>
                                                                                <label class="form-control-label">Compliance Level:</label>
                                                                                <?php echo $compLvl; ?>
                                                                            </p>
                                                                        </div>
                                                                        <?php
                                                                    }
                                                                }
                                                                if($key == "c15_t2_date_2"){
                                                                    $t2Date = "";
                                                                    if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_DomainConsistency->dateTime->Date) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_DomainConsistency->dateTime->Date != "") {
                                                                        $t2Date = $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_DomainConsistency->dateTime->Date;
                                                                    }
                                                                    if($t2Date != ""){
                                                                        $flag *= 0;
                                                                        ?>
                                                                        <div class="form-group" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                                                                            <p>
                                                                                <label class="form-control-label">Date:</label>
                                                                                <?php echo date('d/m/Y',strtotime(trim($t2Date))); ?>
                                                                            </p>
                                                                        </div>
                                                                        <?php
                                                                    }
                                                                }
                                                                if($key == "c15_t2_result_2"){
                                                                    $t2Res = "";
                                                                    if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_DomainConsistency->result->DQ_ConformanceResult->pass->Boolean) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_DomainConsistency->result->DQ_ConformanceResult->pass->Boolean != "") {
                                                                        $t2Res = trim($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_DomainConsistency->result->DQ_ConformanceResult->pass->Boolean);
                                                                    }
                                                                    if($t2Res != ""){
                                                                        $flag *= 0;
                                                                        ?>
                                                                        <div class="form-group" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                                                                            <p>
                                                                                <label class="form-control-label">Result:</label>
                                                                                <?php echo trim($t2Res); ?>
                                                                            </p>
                                                                        </div>
                                                                        <?php
                                                                    }
                                                                }
                                                                if($key == "c15_t2_conform_result_2"){
                                                                    $t2ConformRes = "";
                                                                    if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_DomainConsistency->result->DQ_ConformanceResult->explanation->CharacterString) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_DomainConsistency->result->DQ_ConformanceResult->explanation->CharacterString != "") {
                                                                        $t2ConformRes = $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_DomainConsistency->result->DQ_ConformanceResult->explanation->CharacterString;
                                                                    }
                                                                    if($t2ConformRes != ""){
                                                                        $flag *= 0;
                                                                        ?>
                                                                        <div class="form-group" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                                                                            <p>
                                                                                <label class="form-control-label">Conformance Result:</label>
                                                                                <?php echo $t2ConformRes; ?>
                                                                            </p>
                                                                        </div>
                                                                        <?php
                                                                    }
                                                                }
                                                            }
                                                            ?>
                                                        </td>
                                                        <td>
                                                            <?php
                                                            foreach($template->template[strtolower($catSelected)]['accordion14'] as $key=>$val){
                                                                if($key == "c15_t2_scope_3"){
                                                                    $t2Scope = "";
                                                                    if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_FormatConsistency->consistFormatScope->consistFormatScopeItem->CharacterString) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_FormatConsistency->consistFormatScope->consistFormatScopeItem->CharacterString != "") {
                                                                        $t2Scope = trim($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_FormatConsistency->consistFormatScope->consistFormatScopeItem->CharacterString);
                                                                    }
                                                                    if($t2Scope != ""){
                                                                        $flag *= 0;
                                                                        ?>
                                                                        <div class="form-group" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                                                                            <p>
                                                                                <label class="form-control-label">Scope:</label>
                                                                                <?php echo trim($t2Scope); ?>
                                                                            </p>
                                                                        </div>
                                                                        <?php
                                                                    }
                                                                }
                                                                if($key == "c15_t2_comply_level_3"){
                                                                    $compLvl = "";
                                                                    if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_FormatConsistency->compFormatLevel->CharacterString) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_FormatConsistency->compFormatLevel->CharacterString != "") {
                                                                        $compLvl = $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_FormatConsistency->compFormatLevel->CharacterString;
                                                                    }
                                                                    if($compLvl != ""){
                                                                        $flag *= 0;
                                                                        ?>
                                                                        <div class="form-group" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                                                                            <p>
                                                                                <label class="form-control-label"><b>Compliance Level:</b></label>
                                                                                <?php echo $compLvl; ?>
                                                                            </p>
                                                                        </div>
                                                                        <?php
                                                                    }
                                                                }
                                                                if($key == "c15_t2_date_3"){
                                                                    $t2Date = "";
                                                                    if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_FormatConsistency->dateTime->Date) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_FormatConsistency->dateTime->Date != "") {
                                                                        $t2Date = $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_FormatConsistency->dateTime->Date;
                                                                    }
                                                                    if($t2Date != ""){
                                                                        $flag *= 0;
                                                                        ?>
                                                                        <div class="form-group" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                                                                            <p>
                                                                                <label class="form-control-label"><b>Date:</b></label>
                                                                                <?php echo date('d/m/Y',strtotime(trim($t2Date))); ?>
                                                                            </p>
                                                                        </div>
                                                                        <?php
                                                                    }
                                                                }
                                                                if($key == "c15_t2_result_3"){
                                                                    $t2Res = "";
                                                                    if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_FormatConsistency->result->DQ_ConformanceResult->pass->Boolean) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_FormatConsistency->result->DQ_ConformanceResult->pass->Boolean != "") {
                                                                        $t2Res = trim($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_FormatConsistency->result->DQ_ConformanceResult->pass->Boolean);
                                                                    }
                                                                    if($t2Res != ""){
                                                                        $flag *= 0;
                                                                        ?>
                                                                        <div class="form-group" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                                                                            <p>
                                                                                <label class="form-control-label"><b>Result:</b></label>
                                                                                <?php echo trim($t2Res); ?>
                                                                            </p>
                                                                        </div>
                                                                        <?php
                                                                    }
                                                                }
                                                                if($key == "c15_t2_conform_result_3"){
                                                                    $t2ConformRes = "";
                                                                    if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_FormatConsistency->result->DQ_ConformanceResult->explanation->CharacterString) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_FormatConsistency->result->DQ_ConformanceResult->explanation->CharacterString != "") {
                                                                        $t2ConformRes = $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_FormatConsistency->result->DQ_ConformanceResult->explanation->CharacterString;
                                                                    }
                                                                    if($t2ConformRes != ""){
                                                                        $flag *= 0;
                                                                        ?>
                                                                        <div class="form-group" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                                                                            <p>
                                                                                <label class="form-control-label"><b>Conformance Result:</b></label>
                                                                                <?php echo $t2ConformRes; ?>
                                                                            </p>
                                                                        </div>
                                                                        <?php
                                                                    }
                                                                }
                                                            }
                                                            ?>
                                                        </td>
                                                        <td>
                                                            <?php
                                                            foreach($template->template[strtolower($catSelected)]['accordion14'] as $key=>$val){
                                                                if($key == "c15_t2_scope_4"){
                                                                    $t2Scope = "";
                                                                    if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_TopologicalConsistency->consistTopoScope->consistTopoScopeItem->CharacterString) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_TopologicalConsistency->consistTopoScope->consistTopoScopeItem->CharacterString != "") {
                                                                        $t2Scope = trim($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_TopologicalConsistency->consistTopoScope->consistTopoScopeItem->CharacterString);
                                                                    }
                                                                    if($t2Scope != ""){
                                                                        $flag *= 0;
                                                                        ?>
                                                                        <div class="form-group" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                                                                            <p>
                                                                                <label class="form-control-label"><b>Scope:</b></label>
                                                                                <?php echo trim($t2Scope); ?>
                                                                            </p>
                                                                        </div>
                                                                        <?php
                                                                    }
                                                                }
                                                                if($key == "c15_t2_comply_level_4"){
                                                                    $compLvl = "";
                                                                    if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_TopologicalConsistency->compTopoLevel->CharacterString) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_TopologicalConsistency->compTopoLevel->CharacterString != "") {
                                                                        $compLvl = $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_TopologicalConsistency->compTopoLevel->CharacterString;
                                                                    }
                                                                    if($compLvl != ""){
                                                                        $flag *= 0;
                                                                        ?>
                                                                        <div class="form-group" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                                                                            <p>
                                                                                <label class="form-control-label"><b>Compliance Level:</b></label>
                                                                                <?php echo $compLvl; ?>
                                                                            </p>
                                                                        </div>
                                                                        <?php
                                                                    }
                                                                }
                                                                if($key == "c15_t2_date_4"){
                                                                    $t2Date = "";
                                                                    if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_TopologicalConsistency->dateTime->Date) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_TopologicalConsistency->dateTime->Date != "") {
                                                                        $t2Date = $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_TopologicalConsistency->dateTime->Date;
                                                                    }
                                                                    if($t2Date != ""){
                                                                        $flag *= 0;
                                                                        ?>
                                                                        <div class="form-group" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                                                                            <p>
                                                                                <label class="form-control-label"><b>Date:</b></label>
                                                                                <?php echo date('d/m/Y',strtotime(trim($t2Date))); ?>
                                                                            </p>
                                                                        </div>
                                                                        <?php
                                                                    }
                                                                }
                                                                if($key == "c15_t2_result_4"){
                                                                    $t2Res = "";
                                                                    if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_TopologicalConsistency->result->DQ_ConformanceResult->pass->Boolean) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_TopologicalConsistency->result->DQ_ConformanceResult->pass->Boolean != "") {
                                                                        $t2Res = trim($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_TopologicalConsistency->result->DQ_ConformanceResult->pass->Boolean);
                                                                    }
                                                                    if($t2Res != ""){
                                                                        $flag *= 0;
                                                                        ?>
                                                                        <div class="form-group" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                                                                            <p>
                                                                                <label class="form-control-label"><b>Result:</b></label>
                                                                                <?php echo trim($t2Res); ?>
                                                                            </p>
                                                                        </div>
                                                                        <?php
                                                                    }
                                                                }
                                                                if($key == "c15_t2_conform_result_4"){
                                                                    $t2ConformRes = "";
                                                                    if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_TopologicalConsistency->result->DQ_ConformanceResult->explanation->CharacterString) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_TopologicalConsistency->result->DQ_ConformanceResult->explanation->CharacterString != "") {
                                                                        $t2ConformRes = $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_TopologicalConsistency->result->DQ_ConformanceResult->explanation->CharacterString;
                                                                    }
                                                                    if($t2ConformRes != ""){
                                                                        $flag *= 0;
                                                                        ?>
                                                                        <div class="form-group" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                                                                            <p>
                                                                                <label class="form-control-label"><b>Conformance Result:</b></label>
                                                                                <?php echo $t2ConformRes; ?>
                                                                            </p>
                                                                        </div>
                                                                        <?php
                                                                    }
                                                                }
                                                            }
                                                            ?>
                                                        </td>
                                                    </tr>
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
            &nbsp;&nbsp;&nbsp;
            <div class="form-group row col-xl-12 divDataQualityTabs">
                <div class="card card-primary card-outline card-outline-tabs col-xl-12">
                    <div class="card-header p-0 border-bottom-0">
                        <ul class="nav nav-tabs" id="custom-tabs-four-tab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="tab_position_accuracy" data-toggle="pill" href="#position_accuracy" role="tab" aria-controls="position_accuracy" aria-selected="false">DQ 3 POSITIONAL ACCURACY</a>
                            </li>
                        </ul>
                    </div>
                    <div class="card-body">
                        <div class="tab-content" id="custom-tabs-four-tabContent">
                            <div class="tab-pane fade active show" id="position_accuracy" role="tabpanel" aria-labelledby="tab_position_accuracy">
                                <div class="form-group row">
                                    <div class="d-flex flex-wrap bd-highlight">
                                        <div class="table-responsive">
                                            <table class="table table-borderless">
                                                <tbody>
                                                    <tr>
                                                        <td>
                                                            <label class="form-control-label"><b>Sub DQ 3.1 Absolute or External Accuracy</b></label>
                                                        </td>
                                                        <td>
                                                            <label class="form-control-label"><b>Sub DQ 3.2 Relative or Internal Accuracy</b></label>
                                                        </td>
                                                        <td>
                                                            <label class="form-control-label"><b>Sub DQ 3.3 Gridded Data Accuracy</b></label>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <?php
                                                            foreach($template->template[strtolower($catSelected)]['accordion15'] as $key=>$val){
                                                                if($key == "c15_t3_scope"){
                                                                    $t3Scope = "";
                                                                    if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_AbsoluteExternalPositionalAccuracy->posAccAbsoluteScope->posAccAbsoluteScopeItem->CharacterString) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_AbsoluteExternalPositionalAccuracy->posAccAbsoluteScope->posAccAbsoluteScopeItem->CharacterString != "") {
                                                                        $t3Scope = trim($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_AbsoluteExternalPositionalAccuracy->posAccAbsoluteScope->posAccAbsoluteScopeItem->CharacterString);
                                                                    }
                                                                    if($t3Scope != ""){
                                                                        $flag *= 0;
                                                                        ?>
                                                                        <div class="form-group" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                                                                            <p>
                                                                                <label class="form-control-label"><b>Scope:</b></label>
                                                                                <?php echo trim($t3Scope); ?>
                                                                            </p>
                                                                        </div>
                                                                        <?php
                                                                    }
                                                                }
                                                                if($key == "c15_t3_comply_level"){
                                                                    $t3CompLvl = "";
                                                                    if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_AbsoluteExternalPositionalAccuracy->compPosAccAbsoluteLevel->CharacterString) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_AbsoluteExternalPositionalAccuracy->compPosAccAbsoluteLevel->CharacterString != "") {
                                                                        $t3CompLvl = $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_AbsoluteExternalPositionalAccuracy->compPosAccAbsoluteLevel->CharacterString;
                                                                    }
                                                                    if($t3CompLvl != ""){
                                                                        $flag *= 0;
                                                                        ?>
                                                                        <div class="form-group" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                                                                            <p>
                                                                                <label class="form-control-label"><b>Compliance Level:</b></label>
                                                                                <?php echo $t3CompLvl; ?>
                                                                            </p>
                                                                        </div>
                                                                        <?php
                                                                    }
                                                                }
                                                                if($key == "c15_t3_date"){
                                                                    $t3Date = "";
                                                                    if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_AbsoluteExternalPositionalAccuracy->dateTime->Date) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_AbsoluteExternalPositionalAccuracy->dateTime->Date != "") {
                                                                        $t3Date = $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_AbsoluteExternalPositionalAccuracy->dateTime->Date;
                                                                    }
                                                                    if($t3Date != ""){
                                                                        $flag *= 0;
                                                                        ?>
                                                                        <div class="form-group" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                                                                            <p>
                                                                                <label class="form-control-label"><b>Date:</b></label>
                                                                                <?php echo date('d/m/Y',strtotime(trim($t3Date))); ?>
                                                                            </p>
                                                                        </div>
                                                                        <?php
                                                                    }
                                                                }
                                                                if($key == "c15_t3_result"){
                                                                    $t3Res = "";
                                                                    if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_AbsoluteExternalPositionalAccuracy->result->DQ_ConformanceResult->pass->Boolean) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_AbsoluteExternalPositionalAccuracy->result->DQ_ConformanceResult->pass->Boolean != "") {
                                                                        $t3Res = trim($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_AbsoluteExternalPositionalAccuracy->result->DQ_ConformanceResult->pass->Boolean);
                                                                    }
                                                                    if($t3Res != ""){
                                                                        $flag *= 0;
                                                                        ?>
                                                                        <div class="form-group" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                                                                            <p>
                                                                                <label class="form-control-label"><b>Result:</b></label>
                                                                                <?php echo trim($t3Res); ?>
                                                                            </p>
                                                                        </div>
                                                                        <?php
                                                                    }
                                                                }
                                                                if($key == "c15_t3_conform_result"){
                                                                    $t3ConformRes = "";
                                                                    if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_AbsoluteExternalPositionalAccuracy->result->DQ_ConformanceResult->explanation->CharacterString) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_AbsoluteExternalPositionalAccuracy->result->DQ_ConformanceResult->explanation->CharacterString != "") {
                                                                        $t3ConformRes = $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_AbsoluteExternalPositionalAccuracy->result->DQ_ConformanceResult->explanation->CharacterString;
                                                                    }
                                                                    if($t3ConformRes != ""){
                                                                        $flag *= 0;
                                                                        ?>
                                                                        <div class="form-group" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                                                                            <p>
                                                                                <label class="form-control-label"><b>Conformance Result:</b></label>
                                                                                <?php echo $t3ConformRes; ?>
                                                                            </p>
                                                                        </div>
                                                                        <?php
                                                                    }
                                                                }
                                                            }
                                                            ?>
                                                        </td>
                                                        <td>
                                                            <?php
                                                            foreach($template->template[strtolower($catSelected)]['accordion15'] as $key=>$val){
                                                                if($key == "c15_t3_scope_2"){
                                                                    $t3Scope = "";
                                                                    if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_RelativeInternalPositionalAccuracy->posAccRelativeScope->posAccRelativeScopeItem->CharacterString) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_RelativeInternalPositionalAccuracy->posAccRelativeScope->posAccRelativeScopeItem->CharacterString != "") {
                                                                        $t3Scope = trim($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_RelativeInternalPositionalAccuracy->posAccRelativeScope->posAccRelativeScopeItem->CharacterString);
                                                                    }
                                                                    if($t3Scope != ""){
                                                                        $flag *= 0;
                                                                        ?>
                                                                        <div class="form-group" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                                                                            <p>
                                                                                <label class="form-control-label"><b>Scope:</b></label>
                                                                                <?php echo trim($t3Scope); ?>
                                                                            </p>
                                                                        </div>
                                                                        <?php
                                                                    }
                                                                }
                                                                if($key == "c15_t3_comply_level_2"){
                                                                    $t3CompLvl = "";
                                                                    if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_RelativeInternalPositionalAccuracy->posAccRelativeLevel->CharacterString) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_RelativeInternalPositionalAccuracy->posAccRelativeLevel->CharacterString != "") {
                                                                        $t3CompLvl = $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_RelativeInternalPositionalAccuracy->posAccRelativeLevel->CharacterString;
                                                                    }
                                                                    if($t3CompLvl != ""){
                                                                        $flag *= 0;
                                                                        ?>
                                                                        <div class="form-group" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                                                                            <p>
                                                                                <label class="form-control-label"><b>Compliance Level:</b></label>
                                                                                <?php echo $t3CompLvl; ?>
                                                                            </p>
                                                                        </div>
                                                                        <?php
                                                                    }
                                                                }
                                                                if($key == "c15_t3_date_2"){
                                                                    $t3Date = "";
                                                                    if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_RelativeInternalPositionalAccuracy->dateTime->Date) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_RelativeInternalPositionalAccuracy->dateTime->Date != "") {
                                                                        $t3Date = $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_RelativeInternalPositionalAccuracy->dateTime->Date;
                                                                    }
                                                                    if($t3Date != ""){
                                                                        $flag *= 0;
                                                                        ?>
                                                                        <div class="form-group" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                                                                            <p>
                                                                                <label class="form-control-label"><b>Date:</b></label>
                                                                                <?php echo date('d/m/Y',strtotime(trim($t3Date))); ?>
                                                                            </p>
                                                                        </div>
                                                                        <?php
                                                                    }
                                                                }
                                                                if($key == "c15_t3_result_2"){
                                                                    $t3Res = "";
                                                                    if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_RelativeInternalPositionalAccuracy->result->DQ_ConformanceResult->pass->Boolean) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_RelativeInternalPositionalAccuracy->result->DQ_ConformanceResult->pass->Boolean != "") {
                                                                        $t3Res = trim($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_RelativeInternalPositionalAccuracy->result->DQ_ConformanceResult->pass->Boolean);
                                                                    }
                                                                    if($t3Res != ""){
                                                                        $flag *= 0;
                                                                        ?>
                                                                        <div class="form-group" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                                                                            <p>
                                                                                <label class="form-control-label"><b>Result:</b></label>
                                                                                <?php echo trim($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_RelativeInternalPositionalAccuracy->result->DQ_ConformanceResult->pass->Boolean); ?>
                                                                            </p>
                                                                        </div>
                                                                        <?php
                                                                    }
                                                                }
                                                                if($key == "c15_t3_conform_result_2"){
                                                                    $t3ConformRes = "";
                                                                    if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_RelativeInternalPositionalAccuracy->result->DQ_ConformanceResult->explanation->CharacterString) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_RelativeInternalPositionalAccuracy->result->DQ_ConformanceResult->explanation->CharacterString != "") {
                                                                        $t3ConformRes = $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_RelativeInternalPositionalAccuracy->result->DQ_ConformanceResult->explanation->CharacterString;
                                                                    }
                                                                    if($t3ConformRes != ""){
                                                                        $flag *= 0;
                                                                        ?>
                                                                        <div class="form-group" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                                                                            <p>
                                                                                <label class="form-control-label"><b>Conformance Result:</b></label>
                                                                                <?php echo $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_RelativeInternalPositionalAccuracy->result->DQ_ConformanceResult->explanation->CharacterString; ?>
                                                                            </p>
                                                                        </div>
                                                                        <?php
                                                                    }
                                                                }
                                                            }
                                                            ?>
                                                        </td>
                                                        <td>
                                                            <?php
                                                            foreach($template->template[strtolower($catSelected)]['accordion15'] as $key=>$val){
                                                                if($key == "c15_t3_scope_3"){
                                                                    $t3Scope = "";
                                                                    if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_GriddedDataPositionalAccuracy->posAccGridScope->posAccGridScopeItem->CharacterString) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_GriddedDataPositionalAccuracy->posAccGridScope->posAccGridScopeItem->CharacterString != "") {
                                                                        $t3Scope = trim($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_GriddedDataPositionalAccuracy->posAccGridScope->posAccGridScopeItem->CharacterString);
                                                                    }
                                                                    if($t3Scope != ""){
                                                                        $flag *= 0;
                                                                        ?>
                                                                        <div class="form-group" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                                                                            <p>
                                                                                <label class="form-control-label"><b>Scope:</b></label>
                                                                                <?php echo trim($t3Scope); ?>
                                                                            </p>
                                                                        </div>
                                                                        <?php
                                                                    }
                                                                }
                                                                if($key == "c15_t3_comply_level_3"){
                                                                    $t3CompLvl = "";
                                                                    if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_GriddedDataPositionalAccuracy->posAccGridLevel->CharacterString) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_GriddedDataPositionalAccuracy->posAccGridLevel->CharacterString != "") {
                                                                        $t3CompLvl = $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_GriddedDataPositionalAccuracy->posAccGridLevel->CharacterString;
                                                                    }
                                                                    if($t3CompLvl != ""){
                                                                        $flag *= 0;
                                                                        ?>
                                                                        <div class="form-group" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                                                                            <p>
                                                                                <label class="form-control-label"><b>Compliance Level:</b></label>
                                                                                <?php echo $t3CompLvl; ?>
                                                                            </p>
                                                                        </div>
                                                                        <?php
                                                                    }
                                                                }
                                                                if($key == "c15_t3_date_3"){
                                                                    $t3Date = "";
                                                                    if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_GriddedDataPositionalAccuracy->dateTime->Date) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_GriddedDataPositionalAccuracy->dateTime->Date != "") {
                                                                        $t3Date = $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_GriddedDataPositionalAccuracy->dateTime->Date;
                                                                    }
                                                                    if($t3Date != ""){
                                                                        $flag *= 0;
                                                                        ?>
                                                                        <div class="form-group" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                                                                            <p>
                                                                                <label class="form-control-label"><b>Date:</b></label>
                                                                                <?php echo date('d/m/Y',strtotime(trim($t3Date))); ?>
                                                                            </p>
                                                                        </div>
                                                                        <?php
                                                                    }
                                                                }
                                                                if($key == "c15_t3_result_3"){
                                                                    $t3Res = "";
                                                                    if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_GriddedDataPositionalAccuracy->result->DQ_ConformanceResult->pass->Boolean) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_GriddedDataPositionalAccuracy->result->DQ_ConformanceResult->pass->Boolean != "") {
                                                                        $t3Res = trim($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_GriddedDataPositionalAccuracy->result->DQ_ConformanceResult->pass->Boolean);
                                                                    }
                                                                    if($t3Res != ""){
                                                                        $flag *= 0;
                                                                        ?>
                                                                        <div class="form-group" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                                                                            <p>
                                                                                <label class="form-control-label"><b>Result:</b></label>
                                                                                <?php echo trim($t3Res); ?>
                                                                            </p>
                                                                        </div>
                                                                        <?php
                                                                    }
                                                                }
                                                                if($key == "c15_t3_conform_result_3"){
                                                                    $t3ConformRes = "";
                                                                    if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_GriddedDataPositionalAccuracy->result->DQ_ConformanceResult->explanation->CharacterString) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_GriddedDataPositionalAccuracy->result->DQ_ConformanceResult->explanation->CharacterString != "") {
                                                                        $t3ConformRes = $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_GriddedDataPositionalAccuracy->result->DQ_ConformanceResult->explanation->CharacterString;
                                                                    }
                                                                    if($t3ConformRes != ""){
                                                                        $flag *= 0;
                                                                        ?>
                                                                        <div class="form-group" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                                                                            <p>
                                                                                <label class="form-control-label"><b>Conformance Result:</b></label>
                                                                                <?php echo $t3ConformRes; ?>
                                                                            </p>
                                                                        </div>
                                                                        <?php
                                                                    }
                                                                }
                                                            }
                                                            ?>
                                                        </td>
                                                    </tr>
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
            &nbsp;&nbsp;&nbsp;
            <div class="form-group row col-xl-12 divDataQualityTabs">
                <div class="card card-primary card-outline card-outline-tabs col-xl-12">
                    <div class="card-header p-0 border-bottom-0">
                        <ul class="nav nav-tabs" id="custom-tabs-four-tab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="tab_temp_accuracy" data-toggle="pill" href="#temp_accuracy" role="tab" aria-controls="temp_accuracy" aria-selected="false">DQ 4 TEMPORAL ACCURACY</a>
                            </li>
                        </ul>
                    </div>
                    <div class="card-body">
                        <div class="tab-content" id="custom-tabs-four-tabContent">
                            <div class="tab-pane fade active show" id="temp_accuracy" role="tabpanel" aria-labelledby="tab_temp_accuracy">
                                <div class="form-group row">
                                    <div class="bd-highlight">
                                        <div class="table-responsive">
                                            <table class="table table-borderless">
                                                <tbody>
                                                    <tr>
                                                        <td>
                                                            <label class="form-control-label"><b>Sub DQ 4.1 Accuracy or Time Measurement</b></label>
                                                        </td>
                                                        <td>
                                                            <label class="form-control-label"><b>Sub DQ 4.2 Temporal Consistency</b></label>
                                                        </td>
                                                        <td>
                                                            <label class="form-control-label"><b>Sub DQ 4.3 Temporal Validity</b></label>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <?php
                                                            foreach($template->template[strtolower($catSelected)]['accordion15'] as $key=>$val){
                                                                if($key == "c15_t4_scope"){
                                                                    $t4Scope = "";
                                                                    if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_AccuracyOfATimeMeasurement->AccuracyOfATimeMeasurementScope->AccuracyOfATimeMeasurementItem->CharacterString) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_AccuracyOfATimeMeasurement->AccuracyOfATimeMeasurementScope->AccuracyOfATimeMeasurementItem->CharacterString != "") {
                                                                        $t4Scope = trim($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_AccuracyOfATimeMeasurement->AccuracyOfATimeMeasurementScope->AccuracyOfATimeMeasurementItem->CharacterString);
                                                                    }
                                                                    if($t4Scope != ""){
                                                                        $flag *= 0;
                                                                        ?>
                                                                        <div class="form-group" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                                                                            <p>
                                                                                <label class="form-control-label"><b>Scope:</b></label>
                                                                                <?php echo trim($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_AccuracyOfATimeMeasurement->AccuracyOfATimeMeasurementScope->AccuracyOfATimeMeasurementItem->CharacterString); ?>
                                                                            </p>
                                                                        </div>
                                                                        <?php
                                                                    }
                                                                }
                                                                if($key == "c15_t4_comply_level"){
                                                                    $t4CompLvl = "";
                                                                    if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_AccuracyOfATimeMeasurement->AccuracyOfATimeMeasurementLevel->CharacterString) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_AccuracyOfATimeMeasurement->AccuracyOfATimeMeasurementLevel->CharacterString != "") {
                                                                        $t4CompLvl = $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_AccuracyOfATimeMeasurement->AccuracyOfATimeMeasurementLevel->CharacterString;
                                                                    }
                                                                    if($t4CompLvl != ""){
                                                                        $flag *= 0;
                                                                        ?>
                                                                        <div class="form-group" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                                                                            <p>
                                                                                <label class="form-control-label"><b>Compliance Level:</b></label>
                                                                                <?php echo $t4CompLvl; ?>
                                                                            </p>
                                                                        </div>
                                                                        <?php
                                                                    }
                                                                }
                                                                if($key == "c15_t4_date"){
                                                                    $t4Date = "";
                                                                    if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_AccuracyOfATimeMeasurement->dateTime->Date) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_AccuracyOfATimeMeasurement->dateTime->Date != "") {
                                                                        $t4Date = $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_AccuracyOfATimeMeasurement->dateTime->Date;
                                                                    }
                                                                    if($t4Date != ""){
                                                                        $flag *= 0;
                                                                        ?>
                                                                        <div class="form-group" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                                                                            <p>
                                                                                <label class="form-control-label"><b>Date:</b></label>
                                                                                <?php echo date('d/m/Y',strtotime(trim($t4Date))); ?>
                                                                            </p>
                                                                        </div>
                                                                        <?php
                                                                    }
                                                                }
                                                                if($key == "c15_t4_result"){
                                                                    $t4Res = "";
                                                                    if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_AccuracyOfATimeMeasurement->result->DQ_ConformanceResult->pass->Boolean) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_AccuracyOfATimeMeasurement->result->DQ_ConformanceResult->pass->Boolean != "") {
                                                                        $t4Res = trim($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_AccuracyOfATimeMeasurement->result->DQ_ConformanceResult->pass->Boolean);
                                                                    }
                                                                    if($t4Res != ""){
                                                                        $flag *= 0;
                                                                        ?>
                                                                        <div class="form-group" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                                                                            <p>
                                                                                <label class="form-control-label"><b>Result:</b></label>
                                                                                <?php echo trim($t4Res); ?>
                                                                            </p>
                                                                        </div>
                                                                        <?php
                                                                    }
                                                                }
                                                                if($key == "c15_t4_conform_result"){
                                                                    $t4ConformRes = "";
                                                                    if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_AccuracyOfATimeMeasurement->result->DQ_ConformanceResult->explanation->CharacterString) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_AccuracyOfATimeMeasurement->result->DQ_ConformanceResult->explanation->CharacterString != "") {
                                                                        $t4ConformRes = $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_AccuracyOfATimeMeasurement->result->DQ_ConformanceResult->explanation->CharacterString;
                                                                    }
                                                                    if($t4ConformRes != ""){
                                                                        $flag *= 0;
                                                                        ?>
                                                                        <div class="form-group" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                                                                            <p>
                                                                                <label class="form-control-label"><b>Conformance Result:</b></label>
                                                                                <?php echo $t4ConformRes; ?>
                                                                            </p>
                                                                        </div>
                                                                        <?php
                                                                    }
                                                                }
                                                            }
                                                            ?>
                                                        </td>
                                                        <td>
                                                            <?php
                                                            foreach($template->template[strtolower($catSelected)]['accordion15'] as $key=>$val){
                                                                if($key == "c15_t4_scope_2"){
                                                                    $t4Scope = "";
                                                                    if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_TemporalConsistency->TemporalConsistencyScope->TemporalConsistencyItem->CharacterString) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_TemporalConsistency->TemporalConsistencyScope->TemporalConsistencyItem->CharacterString != "") {
                                                                        $t4Scope = trim($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_TemporalConsistency->TemporalConsistencyScope->TemporalConsistencyItem->CharacterString);
                                                                    }
                                                                    if($t4Scope != ""){
                                                                        $flag *= 0;
                                                                        ?>
                                                                        <div class="form-group" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                                                                            <p>
                                                                                <label class="form-control-label"><b>Scope:</b></label>
                                                                                <?php echo trim($t4Scope); ?>
                                                                            </p>
                                                                        </div>
                                                                        <?php
                                                                    }
                                                                }
                                                                if($key == "c15_t4_comply_level_2"){
                                                                    $t4CompLvl = "";
                                                                    if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_TemporalConsistency->TemporalConsistencyLevel->CharacterString) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_TemporalConsistency->TemporalConsistencyLevel->CharacterString != "") {
                                                                        $t4CompLvl = $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_TemporalConsistency->TemporalConsistencyLevel->CharacterString;
                                                                    }
                                                                    if($t4CompLvl != ""){
                                                                        $flag *= 0;
                                                                        ?>
                                                                        <div class="form-group" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                                                                            <p>
                                                                                <label class="form-control-label"><b>Compliance Level:</b></label>
                                                                                <?php echo $t4CompLvl; ?>
                                                                            </p>
                                                                        </div>
                                                                        <?php
                                                                    }
                                                                }
                                                                if($key == "c15_t4_date_2"){
                                                                    $t4Date = "";
                                                                    if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_TemporalConsistency->dateTime->Date) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_TemporalConsistency->dateTime->Date != "") {
                                                                        $t4Date = $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_TemporalConsistency->dateTime->Date;
                                                                    }
                                                                    if($t4Date != ""){
                                                                        $flag *= 0;
                                                                        ?>
                                                                        <div class="form-group" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                                                                            <p>
                                                                                <label class="form-control-label"><b>Date:</b></label>
                                                                                <?php echo date('d/m/Y',strtotime(trim($t4Date))); ?>
                                                                            </p>
                                                                        </div>
                                                                        <?php
                                                                    }
                                                                }
                                                                if($key == "c15_t4_result_2"){
                                                                    $t4Res = "";
                                                                    if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_TemporalConsistency->result->DQ_ConformanceResult->pass->Boolean) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_TemporalConsistency->result->DQ_ConformanceResult->pass->Boolean != "") {
                                                                        $t4Res = trim($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_TemporalConsistency->result->DQ_ConformanceResult->pass->Boolean);
                                                                    }
                                                                    if($t4Res != ""){
                                                                        $flag *= 0;
                                                                        ?>
                                                                        <div class="form-group" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                                                                            <p>
                                                                                <label class="form-control-label"><b>Result:</b></label>
                                                                                <?php echo trim($t4Res); ?>
                                                                            </p>
                                                                        </div>
                                                                        <?php
                                                                    }
                                                                }
                                                                if($key == "c15_t4_conform_result_2"){
                                                                    $t4ConformRes = "";
                                                                    if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_TemporalConsistency->result->DQ_ConformanceResult->explanation->CharacterString) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_TemporalConsistency->result->DQ_ConformanceResult->explanation->CharacterString != "") {
                                                                        $t4ConformRes = $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_TemporalConsistency->result->DQ_ConformanceResult->explanation->CharacterString;
                                                                    }
                                                                    if($t4ConformRes != ""){
                                                                        $flag *= 0;
                                                                        ?>
                                                                        <div class="form-group" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                                                                            <p>
                                                                                <label class="form-control-label"><b>Conformance Result:</b></label>
                                                                                <?php echo $t4ConformRes; ?>
                                                                            </p>
                                                                        </div>
                                                                        <?php
                                                                    }
                                                                }
                                                            }
                                                            ?>
                                                        </td>
                                                        <td>
                                                            <?php
                                                            foreach($template->template[strtolower($catSelected)]['accordion15'] as $key=>$val){
                                                                if($key == "c15_t4_scope_3"){
                                                                    $t4Scope = "";
                                                                    if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_TemporalValidity->TemporalValidityScope->TemporalValidityItem->CharacterString) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_TemporalValidity->TemporalValidityScope->TemporalValidityItem->CharacterString != "") {
                                                                        $t4Scope = trim($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_TemporalValidity->TemporalValidityScope->TemporalValidityItem->CharacterString);
                                                                    }
                                                                    if($t4Scope != ""){
                                                                        $flag *= 0;
                                                                        ?>
                                                                        <div class="form-group" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                                                                            <p>
                                                                                <label class="form-control-label"><b>Scope:</b></label>
                                                                                <?php echo trim($t4Scope); ?>
                                                                            </p>
                                                                        </div>
                                                                        <?php
                                                                    }
                                                                }
                                                                if($key == "c15_t4_comply_level_3"){
                                                                    $t4CompLvl = "";
                                                                    if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_TemporalValidity->TemporalValidityLevel->CharacterString) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_TemporalValidity->TemporalValidityLevel->CharacterString != "") {
                                                                        $t4CompLvl = $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_TemporalValidity->TemporalValidityLevel->CharacterString;
                                                                    }
                                                                    if($t4CompLvl != ""){
                                                                        $flag *= 0;
                                                                        ?>
                                                                        <div class="form-group" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                                                                            <p>
                                                                                <label class="form-control-label"><b>Compliance Level:</b></label>
                                                                                <?php echo $t4CompLvl; ?>
                                                                            </p>
                                                                        </div>
                                                                        <?php
                                                                    }
                                                                }
                                                                if($key == "c15_t4_date_3"){
                                                                    $t4Date = "";
                                                                    if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_TemporalValidity->dateTime->Date) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_TemporalValidity->dateTime->Date != "") {
                                                                        $t4Date = $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_TemporalValidity->dateTime->Date;
                                                                    }
                                                                    if($t4Date != ""){
                                                                        $flag *= 0;
                                                                        ?>
                                                                        <div class="form-group" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                                                                            <p>
                                                                                <label class="form-control-label"><b>Date:</b></label>
                                                                                <?php
                                                                                echo date('d/m/Y',strtotime(trim($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_TemporalValidity->dateTime->Date)));
                                                                                ?>
                                                                            </p>
                                                                        </div>
                                                                        <?php
                                                                    }
                                                                }
                                                                if($key == "c15_t4_result_3"){
                                                                    $t4Res = "";
                                                                    if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_TemporalValidity->result->DQ_ConformanceResult->pass->Boolean) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_TemporalValidity->result->DQ_ConformanceResult->pass->Boolean != "") {
                                                                        $t4Res = trim($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_TemporalValidity->result->DQ_ConformanceResult->pass->Boolean);
                                                                    }
                                                                    if($t4Res != ""){
                                                                        $flag *= 0;
                                                                        ?>
                                                                        <div class="form-group" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                                                                            <p>
                                                                                <label class="form-control-label"><b>Result:</b></label>
                                                                                <?php echo trim($t4Res); ?>
                                                                            </p>
                                                                        </div>
                                                                        <?php
                                                                    }
                                                                }
                                                                if($key == "c15_t4_conform_result_3"){
                                                                    $t4ConformRes = "";
                                                                    if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_TemporalValidity->result->DQ_ConformanceResult->explanation->CharacterString) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_TemporalValidity->result->DQ_ConformanceResult->explanation->CharacterString != "") {
                                                                        $t4ConformRes = $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_TemporalValidity->result->DQ_ConformanceResult->explanation->CharacterString;
                                                                    }
                                                                    if($t4ConformRes != ""){
                                                                        $flag *= 0;
                                                                        ?>
                                                                        <div class="form-group" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                                                                            <p>
                                                                                <label class="form-control-label"><b>Conformance Result:</b></label>
                                                                                <?php echo $t4ConformRes; ?>
                                                                            </p>
                                                                        </div>
                                                                        <?php
                                                                    }
                                                                }
                                                            }
                                                            ?>
                                                        </td>
                                                    </tr>
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
            &nbsp;&nbsp;&nbsp;
            <div class="form-group row col-xl-12 divDataQualityTabs">
                <div class="card card-primary card-outline card-outline-tabs col-xl-12">
                    <div class="card-header p-0 border-bottom-0">
                        <ul class="nav nav-tabs" id="custom-tabs-four-tab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="tab_thematic_accuracy" data-toggle="pill" href="#thematic_accuracy" role="tab" aria-controls="thematic_accuracy" aria-selected="false">DQ 5 THEMATIC ACCURACY</a>
                            </li>
                        </ul>
                    </div>
                    <div class="card-body">
                        <div class="tab-content" id="custom-tabs-four-tabContent">
                            <div class="tab-pane fade active show" id="thematic_accuracy" role="tabpanel" aria-labelledby="tab_thematic_accuracy">
                                <div class="form-group row">
                                    <div class="d-flex flex-wrap bd-highlight">
                                        <div class="table-responsive">
                                            <table class="table table-borderless">
                                                <tbody>
                                                    <tr>
                                                        <td>
                                                            <label class="form-control-label"><b><?php echo __('lang.classificationCorrectness'); ?></b></label>
                                                        </td>
                                                        <td>
                                                            <label class="form-control-label"><b><?php echo __('lang.nonQuantitativeAttributeCorrectness'); ?></b></label>
                                                        </td>
                                                        <td>
                                                            <label class="form-control-label"><b><?php echo __('lang.quantitativeAttributeCorrectness'); ?></b></label>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <?php
                                                            foreach($template->template[strtolower($catSelected)]['accordion15'] as $key=>$val){
                                                                if($key == "c15_t5_scope"){
                                                                    $t5Scope = "";
                                                                    if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_ThematicClassificationCorrectness->ThematicClassificationCorrectnessScope->ThematicClassificationCorrectnessItem->CharacterString) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_ThematicClassificationCorrectness->ThematicClassificationCorrectnessScope->ThematicClassificationCorrectnessItem->CharacterString != "") {
                                                                        $t5Scope = trim($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_ThematicClassificationCorrectness->ThematicClassificationCorrectnessScope->ThematicClassificationCorrectnessItem->CharacterString);
                                                                    }
                                                                    if($t5Scope != ""){
                                                                        $flag *= 0;
                                                                        ?>
                                                                        <div class="form-group" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                                                                            <p>
                                                                                <label class="form-control-label"><b>Scope:</b></label>
                                                                                <?php echo trim($t5Scope); ?>
                                                                            </p>
                                                                        </div>
                                                                        <?php
                                                                    }
                                                                }
                                                                if($key == "c15_t5_comply_level"){
                                                                    $t5CompLvl = "";
                                                                    if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_ThematicClassificationCorrectness->ThematicClassificationCorrectnessLevel->CharacterString) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_ThematicClassificationCorrectness->ThematicClassificationCorrectnessLevel->CharacterString != "") {
                                                                        $t5CompLvl = $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_ThematicClassificationCorrectness->ThematicClassificationCorrectnessLevel->CharacterString;
                                                                    }
                                                                    if($t5CompLvl != ""){
                                                                        $flag *= 0;
                                                                        ?>
                                                                        <div class="form-group" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                                                                            <p>
                                                                                <label class="form-control-label"><b>Compliance Level:</b></label>
                                                                                <?php echo $t5CompLvl; ?>
                                                                            </p>
                                                                        </div>
                                                                        <?php
                                                                    }
                                                                }
                                                                if($key == "c15_t5_date"){
                                                                    $t5Date = "";
                                                                    if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_ThematicClassificationCorrectness->dateTime->Date) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_ThematicClassificationCorrectness->dateTime->Date != "") {
                                                                        $t5Date = $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_ThematicClassificationCorrectness->dateTime->Date;
                                                                    }
                                                                    if($t5Date != ""){
                                                                        $flag *= 0;
                                                                        ?>
                                                                        <div class="form-group" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                                                                            <p>
                                                                                <label class="form-control-label"><b>Date:</b></label>
                                                                                <?php echo date('d/m/Y',strtotime(trim($t5Date))); ?>
                                                                            </p>
                                                                        </div>
                                                                        <?php
                                                                    }
                                                                }
                                                                if($key == "c15_t5_result"){
                                                                    $t5Res = "";
                                                                    if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_ThematicClassificationCorrectness->result->DQ_ConformanceResult->pass->Boolean) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_ThematicClassificationCorrectness->result->DQ_ConformanceResult->pass->Boolean != "") {
                                                                        $t5Res = trim($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_ThematicClassificationCorrectness->result->DQ_ConformanceResult->pass->Boolean);
                                                                    }
                                                                    if($t5Res != ""){
                                                                        $flag *= 0;
                                                                        ?>
                                                                        <div class="form-group" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                                                                            <p>
                                                                                <label class="form-control-label"><b>Result:</b></label>
                                                                                <?php echo trim($t5Res); ?>
                                                                            </p>
                                                                        </div>
                                                                        <?php
                                                                    }
                                                                }
                                                                if($key == "c15_t5_conform_result"){
                                                                    $t5ConformRes = "";
                                                                    if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_ThematicClassificationCorrectness->result->DQ_ConformanceResult->explanation->CharacterString) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_ThematicClassificationCorrectness->result->DQ_ConformanceResult->explanation->CharacterString != "") {
                                                                        $t5ConformRes = $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_ThematicClassificationCorrectness->result->DQ_ConformanceResult->explanation->CharacterString;
                                                                    }
                                                                    if($t5ConformRes != ""){
                                                                        $flag *= 0;
                                                                        ?>
                                                                        <div class="form-group" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                                                                            <p>
                                                                                <label class="form-control-label"><b>Conformance Result:</b></label>
                                                                                <?php echo $t5ConformRes; ?>
                                                                            </p>
                                                                        </div>
                                                                        <?php
                                                                    }
                                                                }
                                                            }
                                                            ?>
                                                        </td>
                                                        <td>
                                                            <?php
                                                            foreach($template->template[strtolower($catSelected)]['accordion15'] as $key=>$val){
                                                                if($key == "c15_t5_scope_2"){
                                                                    $t5Scope = "";
                                                                    if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_NonQuantitativeAttributeAccuracy->NonQuantitativeAttributeAccuracyScope->NonQuantitativeAttributeAccuracyScopeItem->CharacterString) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_NonQuantitativeAttributeAccuracy->NonQuantitativeAttributeAccuracyScope->NonQuantitativeAttributeAccuracyScopeItem->CharacterString != "") {
                                                                        $t5Scope = trim($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_NonQuantitativeAttributeAccuracy->NonQuantitativeAttributeAccuracyScope->NonQuantitativeAttributeAccuracyScopeItem->CharacterString);
                                                                        echo $t5Scope;
                                                                    }
                                                                    if($t5Scope != ""){
                                                                        $flag *= 0;
                                                                        ?>
                                                                        <div class="form-group" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                                                                            <p>
                                                                                <label class="form-control-label"><b>Scope:</b></label>
                                                                                <?php echo trim($t5Scope); ?>
                                                                            </p>
                                                                        </div>
                                                                        <?php
                                                                    }
                                                                }
                                                                if($key == "c15_t5_comply_level_2"){
                                                                    $t5CompLvl = "";
                                                                    if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_NonQuantitativeAttributeAccuracy->NonQuantitativeAttributeAccuracyLevel->CharacterString) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_NonQuantitativeAttributeAccuracy->NonQuantitativeAttributeAccuracyLevel->CharacterString != "") {
                                                                        $t5CompLvl = $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_NonQuantitativeAttributeAccuracy->NonQuantitativeAttributeAccuracyLevel->CharacterString;
                                                                    }
                                                                    if($t5CompLvl != ""){
                                                                        $flag *= 0;
                                                                        ?>
                                                                        <div class="form-group" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                                                                            <p>
                                                                                <label class="form-control-label"><b>Compliance Level:</b></label>
                                                                                <?php echo $t5CompLvl; ?>
                                                                            </p>
                                                                        </div>
                                                                        <?php
                                                                    }
                                                                }
                                                                if($key == "c15_t5_date_2"){
                                                                    $t5Date = "";
                                                                    if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_NonQuantitativeAttributeAccuracy->dateTime->Date) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_NonQuantitativeAttributeAccuracy->dateTime->Date != "") {
                                                                        $t5Date = $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_NonQuantitativeAttributeAccuracy->dateTime->Date;
                                                                    }
                                                                    if($t5Date != ""){
                                                                        $flag *= 0;
                                                                        ?>
                                                                        <div class="form-group" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                                                                            <p>
                                                                                <label class="form-control-label"><b>Date:</b></label>
                                                                                <?php echo date('d/m/Y',strtotime(trim($t5Date))); ?>
                                                                            </p>
                                                                        </div>
                                                                        <?php
                                                                    }
                                                                }
                                                                if($key == "c15_t5_result_2"){
                                                                    $t5Res = "";
                                                                    if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_NonQuantitativeAttributeAccuracy->result->DQ_ConformanceResult->pass->Boolean) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_NonQuantitativeAttributeAccuracy->result->DQ_ConformanceResult->pass->Boolean != "") {
                                                                        $t5Res = trim($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_NonQuantitativeAttributeAccuracy->result->DQ_ConformanceResult->pass->Boolean);
                                                                    }
                                                                    if($t5Res != ""){
                                                                        $flag *= 0;
                                                                        ?>
                                                                        <div class="form-group" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                                                                            <p>
                                                                                <label class="form-control-label"><b>Result:</b></label>
                                                                                <?php echo trim($t5Res); ?>
                                                                            </p>
                                                                        </div>
                                                                        <?php
                                                                    }
                                                                }
                                                                if($key == "c15_t5_conform_result_2"){
                                                                    $t5ConformRes = "";
                                                                    if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_ThematicClassificationCorrectness->result->DQ_ConformanceResult->explanation->CharacterString) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_ThematicClassificationCorrectness->result->DQ_ConformanceResult->explanation->CharacterString != "") {
                                                                        $t5ConformRes = $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_ThematicClassificationCorrectness->result->DQ_ConformanceResult->explanation->CharacterString;
                                                                    }
                                                                    if($t5ConformRes != ""){
                                                                        $flag *= 0;
                                                                        ?>
                                                                        <div class="form-group" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                                                                            <p>
                                                                                <label class="form-control-label"><b>Conformance Result:</b></label>
                                                                                <?php echo $t5ConformRes; ?>
                                                                            </p>
                                                                        </div>
                                                                        <?php
                                                                    }
                                                                }
                                                            }
                                                            ?>
                                                        </td>
                                                        <td>
                                                            <?php
                                                            foreach($template->template[strtolower($catSelected)]['accordion15'] as $key=>$val){
                                                                if($key == "c15_t5_scope_3"){
                                                                    $t5Scope = "";
                                                                    if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_QuantitativeAttributeAccuracy->QuantitativeAttributeAccuracyScope->QuantitativeAttributeAccuracyItem->CharacterString) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_QuantitativeAttributeAccuracy->QuantitativeAttributeAccuracyScope->QuantitativeAttributeAccuracyItem->CharacterString != "") {
                                                                        $t5Scope = trim($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_QuantitativeAttributeAccuracy->QuantitativeAttributeAccuracyScope->QuantitativeAttributeAccuracyItem->CharacterString);
                                                                        echo $t5Scope;
                                                                    }
                                                                    if($t5Scope != ""){
                                                                        $flag *= 0;
                                                                        ?>
                                                                        <div class="form-group" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                                                                            <p>
                                                                                <label class="form-control-label"><b>Scope:</b></label>
                                                                                <?php echo trim($t5Scope); ?>
                                                                            </p>
                                                                        </div>
                                                                        <?php
                                                                    }
                                                                }
                                                                if($key == "c15_t5_comply_level_3"){
                                                                    $t5CompLvl = "";
                                                                    if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_QuantitativeAttributeAccuracy->QuantitativeAttributeAccuracyLevel->CharacterString) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_QuantitativeAttributeAccuracy->QuantitativeAttributeAccuracyLevel->CharacterString != "") {
                                                                        $t5CompLvl = $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_QuantitativeAttributeAccuracy->QuantitativeAttributeAccuracyLevel->CharacterString;
                                                                    }
                                                                    if($t5CompLvl != ""){
                                                                        $flag *= 0;
                                                                        ?>
                                                                        <div class="form-group" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                                                                            <p>
                                                                                <label class="form-control-label"><b>Compliance Level:</b></label>
                                                                                <?php echo $t5CompLvl; ?>
                                                                            </p>
                                                                        </div>
                                                                        <?php
                                                                    }
                                                                }
                                                                if($key == "c15_t5_date_3"){
                                                                    $t5Date = "";
                                                                    if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_QuantitativeAttributeAccuracy->dateTime->Date) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_QuantitativeAttributeAccuracy->dateTime->Date != "") {
                                                                        $t5Date = $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_QuantitativeAttributeAccuracy->dateTime->Date;
                                                                    }
                                                                    if($t5Date != ""){
                                                                        $flag *= 0;
                                                                        ?>
                                                                        <div class="form-group" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                                                                            <p>
                                                                                <label class="form-control-label"><b>Date:</b></label>
                                                                                <?php echo date('d/m/Y',strtotime(trim($t5Date))); ?>
                                                                            </p>
                                                                        </div>
                                                                        <?php
                                                                    }
                                                                }
                                                                if($key == "c15_t5_result_3"){
                                                                    $t5Res = "";
                                                                    if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_QuantitativeAttributeAccuracy->result->DQ_ConformanceResult->pass->Boolean) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_QuantitativeAttributeAccuracy->result->DQ_ConformanceResult->pass->Boolean != "") {
                                                                        $t5Res = trim($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_QuantitativeAttributeAccuracy->result->DQ_ConformanceResult->pass->Boolean);
                                                                    }
                                                                    if($t5Res != ""){
                                                                        $flag *= 0;
                                                                        ?>
                                                                        <div class="form-group" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                                                                            <p>
                                                                                <label class="form-control-label"><b>Result:</b></label>
                                                                                <?php echo trim($t5Res); ?>
                                                                            </p>
                                                                        </div>
                                                                        <?php
                                                                    }
                                                                }
                                                                if($key == "c15_t5_conform_result_3"){
                                                                    $t5ConformRes = "";
                                                                    if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_QuantitativeAttributeAccuracy->result->DQ_ConformanceResult->explanation->CharacterString) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_QuantitativeAttributeAccuracy->result->DQ_ConformanceResult->explanation->CharacterString != "") {
                                                                        $t5ConformRes = $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_QuantitativeAttributeAccuracy->result->DQ_ConformanceResult->explanation->CharacterString;
                                                                    }
                                                                    if($t5ConformRes != ""){
                                                                        $flag *= 0;
                                                                        ?>
                                                                        <div class="form-group" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                                                                            <p>
                                                                                <label class="form-control-label"><b>Conformance Result:</b></label>
                                                                                <?php echo $t5ConformRes; ?>
                                                                            </p>
                                                                        </div>
                                                                        <?php
                                                                    }
                                                                }
                                                            }
                                                            ?>
                                                        </td>
                                                    </tr>
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

<?php
if($flag == 1){
    ?>
    <script>
        $(document).ready(function(){
            $('#div_c15').hide();
        });
    </script>
    <?php
}
?>
