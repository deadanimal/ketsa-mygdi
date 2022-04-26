<div class="card card-primary mb-4 div_c15" id="div_c15">
    <div class="card-header">
        <a href="#collapse15" data-toggle="collapse">
            <h4 class="card-title">
                <?php echo __('lang.accord_15'); ?>
            </h4>
        </a>
        @if(auth::user()->hasRole(['Penerbit Metadata']) && $metadataSearched->disahkan == "no")
        <button type="button" class="btn btn-secondary float-right" data-toggle="modal" data-target="#modal15">Catatan</button>
        @elseif(auth::user()->hasRole(['Pengesah Metadata','Super Admin','Pentadbir Aplikasi']))
        <button type="button" class="btn btn-secondary float-right" data-toggle="modal" data-target="#modal15">Catatan</button>
        @endif
    </div>
    <div id="collapse15" class="panel-collapse collapse in show" data-parent="#div_c15">
        <div class="card-body">
            <div class="form-group row col-xl-6">
                <b><?php echo __('lang.DQInformation'); ?></b>
            </div>
            <div class="pl-lg-2">
                <div class="row mb-2">
                    <?php 
                    foreach($template->template[strtolower($catSelected)]['accordion15'] as $key=>$val){
                        if($val['status'] == "customInput"){
                            ?>
                            <div class="row mb-2 sortIt">
                                <div class="col-3 pl-5">
                                    <label class="form-control-label mr-4 customInput_label" for="uname">{{ $val['label_'.$langSelected] }}</label>
                                    <label class="float-right">:</label>
                                </div>
                                <div class="col-8">
                                    <input class="form-control form-control-sm ml-3 sortable" type="text" name="{{ $key }}" data-status="<?php echo $val['status']; ?>" value="{{ (isset($metadataxml->customInputs->accordion15->$key) ? $metadataxml->customInputs->accordion15->$key:"") }}"/>
                                </div>
                            </div>
                            <?php
                        }
                    }
                    ?>
                </div>
            </div>
            <div class="pl-lg-2">
                <div class="row mb-2">
                    <?php 
                    foreach($template->template[strtolower($catSelected)]['accordion15'] as $key=>$val){
                        if($key == "c15_data_quality_info"){
                            ?>
                            <div class="col-xl-1" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                                <label class="form-control-label" for="input-DQscope">
                                    <?php echo __('lang.dq_scope'); ?>
                                </label>
                            </div>
                            <div class="col-xl-3" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                                <?php
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
                                ?>
                                <select name="c15_data_quality_info" id="c15_data_quality_info" style="max-width: 100%;" class="form-control form-control-sm">
                                    <option value="">Pilih...</option>
                                    <option value="Attribute" {{($dqScope == 'Attribute' ? "selected":"")}}>Attribute</option>
                                    <option value="Attribute Type" {{($dqScope == 'Attribute Type' ? "selected":"")}}>Attribute Type</option>
                                    <option value="Collection Session" {{($dqScope == 'Collection Session' ? "selected":"")}}>Collection Session</option>
                                    <option value="Dataset" {{($dqScope == 'Dataset' ? "selected":"")}}>Dataset</option>
                                    <option value="Series" {{($dqScope == 'Series' ? "selected":"")}}>Series</option>
                                    <option value="Feature" {{($dqScope == 'Feature' ? "selected":"")}}>Feature</option>
                                    <option value="Dimension Group" {{($dqScope == 'Dimension Group' ? "selected":"")}}>Dimension Group</option>
                                    <option value="Feature Type" {{($dqScope == 'Feature Type' ? "selected":"")}}>Feature Type</option>
                                    <option value="Field Session" {{($dqScope == 'Field Session' ? "selected":"")}}>Field Session</option>
                                    <option value="Model" {{($dqScope == 'Model' ? "selected":"")}}>Model</option>
                                    <option value="Non Geographic Date Set" {{($dqScope == 'Non Geographic Date Set' ? "selected":"")}}>Non Geographic Date Set</option>
                                    <option value="Property Type" {{($dqScope == 'Property Type' ? "selected":"")}}>Property Type</option>
                                    <option value="Service" {{($dqScope == 'Service' ? "selected":"")}}>Service</option>
                                    <option value="Software" {{($dqScope == 'Software' ? "selected":"")}}>Software</option>
                                    <option value="Tile" {{($dqScope == 'Tile' ? "selected":"")}}>Tile</option>
                                </select>
                            </div>    
                            <?php
                        }
                        if($key == "c15_data_history"){
                            ?>
                            <div class="col-xl-2" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                                <label class="form-control-label float-right" for="input-datahistory">
                                    <?php echo __('lang.data_history'); ?></label>
                            </div>
                            <div class="col-md-2" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                                <?php
                                $dataHist = "";
                                if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->lineage->LI_Lineage->statement->CharacterString) && $metadataxml->dataQualityInfo->DQ_DataQuality->lineage->LI_Lineage->statement->CharacterString != "") {
                                    $dataHist = $metadataxml->dataQualityInfo->DQ_DataQuality->lineage->LI_Lineage->statement->CharacterString;
                                }
                                ?>
                                <input class="form-control form-control-sm" type="text" name="c15_data_history" id="c15_data_history" placeholder="None" value="{{ $dataHist }}">
                            </div>  
                            <?php
                        }
                        if($key == "c15_date"){
                            ?>
                            <div class="col-xl-1" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                                <label class="form-control-label  float-right" for="input-date">
                                    <?php echo __('lang.date_time'); ?>
                                </label>
                            </div>
                            <div class="col-xl-3" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                                <?php
                                $dqDate = "";
                                if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_Element->dateTime->Date) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_Element->dateTime->Date != "") {
                                    $dqDate = trim($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_Element->dateTime->Date);
                                }
                                ?>
                                <input type="date" name="c15_date" id="c15_date" class="form-control form-control-sm" value="{{ $dqDate }}">
                            </div> 
                            <?php
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
                                                        <?php
                                                        $radio1 = "";
                                                        if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_CompletenessCommission->radio) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_CompletenessCommission->radio != "") {
                                                            $radio1 = trim($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_CompletenessCommission->radio);
                                                        }
                                                        ?>
                                                        <td>
                                                            <label class="form-check-label" for="c15_t1_complete_comm_or_omit" style="margin-right:50px;">
                                                                <input type="radio" name="c15_t1_complete_comm_or_omit" id='completeness_comission' value='Completeness Commission' {{($radio1 == 'Completeness Commission' ? 'checked="checked"':'')}}>&nbsp;Completeness Commission
                                                            </label>
                                                        </td>
                                                        <td>
                                                            <label class="form-check-label" for="c15_t1_complete_comm_or_omit" style="margin-right:50px;">
                                                                <input type="radio" name="c15_t1_complete_comm_or_omit" value='Completeness Omission' {{($radio1 == 'Completeness Omission' ? 'checked="checked"':'')}}>&nbsp;Completeness Omission
                                                            </label>
                                                        </td>
                                                    </tr>
                                                    <?php //================= ?>
                                                    <?php 
                                                    foreach($template->template[strtolower($catSelected)]['accordion15'] as $key=>$val){
                                                        if($key == "c15_t1_scope"){
                                                            ?>
                                                            <tr class="Completeness_Commission">
                                                                <td>
                                                                    <label class="form-check-label" for="c3_1" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                                                                        <?php
                                                                        $t1Scope = "";
                                                                        if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_CompletenessCommission->compCommissScope->compCommissScopeItem->CharacterString) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_CompletenessCommission->compCommissScope->compCommissScopeItem->CharacterString != "") {
                                                                            $t1Scope = trim($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_CompletenessCommission->compCommissScope->compCommissScopeItem->CharacterString);
                                                                        }
                                                                        ?>
                                                                        <b>Scope:</b>
                                                                        <select name="c15_t1_scope" id="c15_t1_scope" class="form-control form-control-sm">
                                                                            <option value="">Pilih...</option>
                                                                            <option value="Aeronautical" {{($t1Scope == 'Aeronautical' ? "selected":"")}}>Aeronautical</option>
                                                                            <option value="Built Environment" {{($t1Scope == 'Built Environment' ? "selected":"")}}>Built Environment</option>
                                                                            <option value="Demarcation" {{($t1Scope == 'Demarcation' ? "selected":"")}}>Demarcation</option>
                                                                            <option value="General" {{($t1Scope == 'General' ? "selected":"")}}>General</option>
                                                                            <option value="Geology" {{($t1Scope == 'Geology' ? "selected":"")}}>Geology</option>
                                                                            <option value="Hydrography" {{($t1Scope == 'Hydrography' ? "selected":"")}}>Hydrography</option>
                                                                            <option value="Hypsography" {{($t1Scope == 'Hypsography' ? "selected":"")}}>Hypsography</option>
                                                                            <option value="Soil" {{($t1Scope == 'Soil' ? "selected":"")}}>Soil</option>
                                                                            <option value="Special Use" {{($t1Scope == 'Special Use' ? "selected":"")}}>Special Use</option>
                                                                            <option value="Transportation" {{($t1Scope == 'Transportation' ? "selected":"")}}>Transportation</option>
                                                                            <option value="Utility" {{($t1Scope == 'Utility' ? "selected":"")}}>Utility</option>
                                                                            <option value="Vegetation" {{($t1Scope == 'Vegetation' ? "selected":"")}}>Vegetation</option>
                                                                        </select>
                                                                    </label>
                                                                </td>
                                                            </tr>  
                                                            <?php
                                                        }
                                                        if($key == "c15_t1_comply_level"){
                                                            ?>
                                                            <tr class="Completeness_Commission">
                                                                <td>
                                                                    <label class="form-check-label" for="c3_3" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                                                                        <?php
                                                                        $compLvl = "";
                                                                        if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_CompletenessCommission->compCommissComplLevel->CharacterString) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_CompletenessCommission->compCommissComplLevel->CharacterString != "") {
                                                                            $compLvl = $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_CompletenessCommission->compCommissComplLevel->CharacterString;
                                                                        }
                                                                        ?>
                                                                        <b>Compliance Level:</b>
                                                                        <input type="text" name="c15_t1_comply_level" id="c15_t1_comply_level" class="form-control form-control-sm" value="{{$compLvl}}">
                                                                    </label>
                                                                </td>
                                                            </tr>
                                                            <?php
                                                        }
                                                        if($key == "c15_t1_date"){
                                                            ?>
                                                            <tr class="Completeness_Commission">
                                                                <td>
                                                                    <label class="form-check-label" for="c15_t1_commission_date" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                                                                        <?php
                                                                        $t1Date = "";
                                                                        if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_CompletenessCommission->dateTime->Date) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_CompletenessCommission->dateTime->Date != "") {
                                                                            $t1Date = trim($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_CompletenessCommission->dateTime->Date);
                                                                        }
                                                                        ?>
                                                                        <b>Date:</b>
                                                                        <input type="date" name="c15_t1_date" id="c15_t1_date" class="form-control form-control-sm" value="{{ $t1Date }}">
                                                                    </label>
                                                                </td>
                                                            </tr>
                                                            <?php
                                                        }
                                                        if($key == "c15_t1_result"){
                                                            ?>
                                                            <tr class="Completeness_Commission">
                                                                <td>
                                                                    <label class="form-check-label" for="c3_2" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                                                                        <?php
                                                                        $t1Res = "";
                                                                        if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_CompletenessCommission->result->DQ_ConformanceResult->pass->Boolean) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_CompletenessCommission->result->DQ_ConformanceResult->pass->Boolean != "") {
                                                                            $t1Res = ucwords(trim($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_CompletenessCommission->result->DQ_ConformanceResult->pass->Boolean));
                                                                        }
                                                                        if($t1Res == "Passed"){
                                                                            $t1Res = "Pass";
                                                                        }elseif($t1Res == "NotRelevant"){
                                                                            $t1Res = "Not Relevant";
                                                                        }
                                                                        ?>
                                                                        <b>Result:</b>
                                                                        <select name="c15_t1_result" id="c15_t1_result" class="form-control form-control-sm">
                                                                            <option value="">Pilih...</option>
                                                                            <option value="Pass" {{($t1Res == 'Pass' ? "selected":"")}}>Pass</option>
                                                                            <option value="Fail" {{($t1Res == 'Fail' ? "selected":"")}}>Fail</option>
                                                                            <option value="Not Relevant" {{($t1Res == 'Not Relevant' ? "selected":"")}}>Not Relevant</option>
                                                                        </select>
                                                                    </label>
                                                                </td>
                                                            </tr>
                                                            <?php
                                                        }
                                                        if($key == "c15_t1_conform_result"){
                                                            ?>
                                                            <tr class="Completeness_Commission">
                                                                <td>
                                                                    <label class="form-check-label" for="c15_t1_conform_result" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                                                                        <?php
                                                                        $conformRes = "";
                                                                        if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_CompletenessCommission->result->DQ_ConformanceResult->explanation->CharacterString) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_CompletenessCommission->result->DQ_ConformanceResult->explanation->CharacterString != "") {
                                                                            $conformRes = $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_CompletenessCommission->result->DQ_ConformanceResult->explanation->CharacterString;
                                                                        }
                                                                        ?>
                                                                        <b>Conformance Result:</b>
                                                                        <input type="text" name="c15_t1_conform_result" id="c15_t1_conform_result" class="form-control form-control-sm" value="{{$conformRes}}">
                                                                    </label>
                                                                </td>
                                                            </tr>
                                                            <?php
                                                        }
                                                        if($key == "c15_t1_scope_2"){
                                                            ?>
                                                            <tr class="Completeness_Omission">
                                                                <td>
                                                                    <label class="form-check-label" for="c3_1" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                                                                        <?php
                                                                        $t1Scope = "";
                                                                        if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_CompletenessOmission->compOmissScope->compOmissScopeItem->CharacterString) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_CompletenessOmission->compOmissScope->compOmissScopeItem->CharacterString != "") {
                                                                            $t1Scope = trim($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_CompletenessOmission->compOmissScope->compOmissScopeItem->CharacterString);
                                                                        }
                                                                        ?>
                                                                        <b>Scope:</b>
                                                                        <select name="c15_t1_scope_2" id="c15_t1_scope_2" class="form-control form-control-sm">
                                                                            <option value="">Pilih...</option>
                                                                            <option value="Aeronautical" {{($t1Scope == 'Aeronautical' ? "selected":"")}}>Aeronautical</option>
                                                                            <option value="Built Environment" {{($t1Scope == 'Built Environment' ? "selected":"")}}>Built Environment</option>
                                                                            <option value="Demarcation" {{($t1Scope == 'Demarcation' ? "selected":"")}}>Demarcation</option>
                                                                            <option value="General" {{($t1Scope == 'General' ? "selected":"")}}>General</option>
                                                                            <option value="Geology" {{($t1Scope == 'Geology' ? "selected":"")}}>Geology</option>
                                                                            <option value="Hydrography" {{($t1Scope == 'Hydrography' ? "selected":"")}}>Hydrography</option>
                                                                            <option value="Hypsography" {{($t1Scope == 'Hypsography' ? "selected":"")}}>Hypsography</option>
                                                                            <option value="Soil" {{($t1Scope == 'Soil' ? "selected":"")}}>Soil</option>
                                                                            <option value="Special Use" {{($t1Scope == 'Special Use' ? "selected":"")}}>Special Use</option>
                                                                            <option value="Transportation" {{($t1Scope == 'Transportation' ? "selected":"")}}>Transportation</option>
                                                                            <option value="Utility" {{($t1Scope == 'Utility' ? "selected":"")}}>Utility</option>
                                                                            <option value="Vegetation" {{($t1Scope == 'Vegetation' ? "selected":"")}}>Vegetation</option>
                                                                        </select>
                                                                    </label>
                                                                </td>
                                                            </tr>
                                                            <?php
                                                        }
                                                        if($key == "c15_t1_comply_level_2"){
                                                            ?>
                                                            <tr class="Completeness_Omission">
                                                                <td>
                                                                    <label class="form-check-label" for="c3_3" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                                                                        <?php
                                                                        $compLvl = "";
                                                                        if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_CompletenessOmission->compOmissComplLevel->CharacterString) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_CompletenessOmission->compOmissComplLevel->CharacterString != "") {
                                                                            $compLvl = $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_CompletenessOmission->compOmissComplLevel->CharacterString;
                                                                        }
                                                                        ?>
                                                                        <b>Compliance Level:</b>
                                                                        <input type="text" name="c15_t1_comply_level_2" id="c15_t1_comply_level_2" class="form-control form-control-sm" value="{{$compLvl}}">
                                                                    </label>
                                                                </td>
                                                            </tr>
                                                            <?php
                                                        }
                                                        if($key == "c15_t1_date_2"){
                                                            ?>
                                                            <tr class="Completeness_Omission">
                                                                <td>
                                                                    <label class="form-check-label" for="c15_t1_commission_date" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                                                                        <?php
                                                                        $t1Date = "";
                                                                        if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_CompletenessOmission->dateTime->Date) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_CompletenessOmission->dateTime->Date != "") {
                                                                            $t1Date = $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_CompletenessOmission->dateTime->Date;
                                                                        }
                                                                        ?>
                                                                        <b>Date:</b>
                                                                        <input type="date" name="c15_t1_date_2" id="c15_t1_date_2" class="form-control form-control-sm" value="{{$t1Date}}">
                                                                    </label>
                                                                </td>
                                                            </tr>
                                                            <?php
                                                        }
                                                        if($key == "c15_t1_result_2"){
                                                            ?>
                                                            <tr class="Completeness_Omission">
                                                                <td>
                                                                    <label class="form-check-label" for="c3_2" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                                                                        <?php
                                                                        $t1Res = "";
                                                                        if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_CompletenessOmission->result->DQ_ConformanceResult->pass->Boolean) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_CompletenessOmission->result->DQ_ConformanceResult->pass->Boolean != "") {
                                                                            $t1Res = trim($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_CompletenessOmission->result->DQ_ConformanceResult->pass->Boolean);
                                                                        }
                                                                        ?>
                                                                        <b>Result:</b>
                                                                        <select name="c15_t1_result_2" id="c15_t1_result_2" class="form-control form-control-sm">
                                                                            <option value="">Pilih...</option>
                                                                            <option value="Pass" {{($t1Res == 'Pass' ? "selected":"")}}>Pass</option>
                                                                            <option value="Fail" {{($t1Res == 'Fail' ? "selected":"")}}>Fail</option>
                                                                            <option value="Not Relevant" {{($t1Res == 'Not Relevant' ? "selected":"")}}>Not Relevant</option>
                                                                        </select>
                                                                    </label>
                                                                </td>
                                                            </tr>
                                                            <?php
                                                        }
                                                        if($key == "c15_t1_conform_result_2"){
                                                            ?>
                                                            <tr class="Completeness_Omission">
                                                                <td>
                                                                    <label class="form-check-label" for="c3_4" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                                                                        <?php
                                                                        $conformRes = "";
                                                                        if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_CompletenessOmission->result->DQ_ConformanceResult->explanation->CharacterString) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_CompletenessOmission->result->DQ_ConformanceResult->explanation->CharacterString != "") {
                                                                            $conformRes = $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_CompletenessOmission->result->DQ_ConformanceResult->explanation->CharacterString;
                                                                        }
                                                                        ?>
                                                                        <b>Conformance Result:</b>
                                                                        <input type="text" name="c15_t1_conform_result_2" id="c15_t1_conform_result_2" class="form-control form-control-sm" value="{{$conformRes}}">
                                                                    </label>
                                                                </td>
                                                            </tr>
                                                            <?php
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
                                                        <?php
                                                        $radio2 = "";
                                                        if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_DomainConsistency) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_DomainConsistency != "") {
                                                            $radio2 = trim($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_DomainConsistency);
                                                        }
                                                        ?>
                                                        <td>
                                                            <label class="form-check-label" for="c15_t2_type" style="margin-right:50px;">
                                                                <input type="radio" name="c15_t2_type" id='conceptual' value="Conceptual" {{($radio2 == 'Conceptual' ? 'checked="checked"':'')}}>&nbsp;Conceptual
                                                            </label>
                                                        </td>
                                                        <td>
                                                            <label class="form-check-label" for="c15_t2_type" style="margin-right:50px;">
                                                                <input type="radio" name="c15_t2_type" value="Domain" {{($radio2 == 'Domain' ? 'checked="checked"':'')}}>&nbsp;Domain
                                                            </label>
                                                        </td>
                                                        <td>
                                                            <label class="form-check-label" for="c15_t2_type" style="margin-right:50px;">
                                                                <input type="radio" name="c15_t2_type" value="Format" {{($radio2 == 'Format' ? 'checked="checked"':'')}}>&nbsp;Format
                                                            </label>
                                                        </td>
                                                        <td>
                                                            <label class="form-check-label" for="c15_t2_type" style="margin-right:50px;">
                                                                <input type="radio" name="c15_t2_type" value="Topological" {{($radio2 == 'Topological' ? 'checked="checked"':'')}}>&nbsp;Topological
                                                            </label>
                                                        </td>
                                                    </tr>
                                                    <?php //================= ?>
                                                    <?php 
                                                    foreach($template->template[strtolower($catSelected)]['accordion15'] as $key=>$val){
                                                        if($key == "c15_t2_scope"){
                                                            ?>
                                                            <tr class='Conceptual'>
                                                                <td>
                                                                    <label class="form-check-label" for="c15_t2_scope" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                                                                        <?php
                                                                        $t2Scope = "";
                                                                        if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_ConceptualConsistency->consistConceptScope->consistConceptScopeItem->CharacterString) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_ConceptualConsistency->consistConceptScope->consistConceptScopeItem->CharacterString != "") {
                                                                            $t2Scope = trim($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_ConceptualConsistency->consistConceptScope->consistConceptScopeItem->CharacterString);
                                                                        }
                                                                        ?>
                                                                        <b>Scope:</b>
                                                                        <select name="c15_t2_scope" id="c15_t2_scope" class="form-control form-control-sm">
                                                                            <option value="">Pilih...</option>
                                                                            <option value="Aeronautical" {{($t2Scope == 'Aeronautical' ? "selected":"")}}>Aeronautical</option>
                                                                            <option value="Built Environment" {{($t2Scope == 'Built Environment' ? "selected":"")}}>Built Environment</option>
                                                                            <option value="Demarcation" {{($t2Scope == 'Demarcation' ? "selected":"")}}>Demarcation</option>
                                                                            <option value="General" {{($t2Scope == 'General' ? "selected":"")}}>General</option>
                                                                            <option value="Geology" {{($t2Scope == 'Geology' ? "selected":"")}}>Geology</option>
                                                                            <option value="Hydrography" {{($t2Scope == 'Hydrography' ? "selected":"")}}>Hydrography</option>
                                                                            <option value="Hypsography" {{($t2Scope == 'Hypsography' ? "selected":"")}}>Hypsography</option>
                                                                            <option value="Soil" {{($t2Scope == 'Soil' ? "selected":"")}}>Soil</option>
                                                                            <option value="Special Use" {{($t2Scope == 'Special Use' ? "selected":"")}}>Special Use</option>
                                                                            <option value="Transportation" {{($t2Scope == 'Transportation' ? "selected":"")}}>Transportation</option>
                                                                            <option value="Utility" {{($t2Scope == 'Utility' ? "selected":"")}}>Utility</option>
                                                                            <option value="Vegetation" {{($t2Scope == 'Vegetation' ? "selected":"")}}>Vegetation</option>
                                                                        </select>
                                                                    </label>
                                                                </td>
                                                            </tr>
                                                            <?php
                                                        }
                                                        if($key == "c15_t2_comply_level"){
                                                            ?>
                                                            <tr class='Conceptual'>
                                                                <td>
                                                                    <label class="form-check-label" for="c15_t2_comply_level" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                                                                        <?php
                                                                        $compLvl = "";
                                                                        if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_ConceptualConsistency->compOmissLevel->CharacterString) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_ConceptualConsistency->compOmissLevel->CharacterString != "") {
                                                                            $compLvl = $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_ConceptualConsistency->compOmissLevel->CharacterString;
                                                                        }
                                                                        ?>
                                                                        <b>Compliance Level:</b>
                                                                        <input type="text" name="c15_t2_comply_level" id="c15_t2_comply_level" class="form-control form-control-sm" value="{{$compLvl}}">
                                                                    </label>
                                                                </td>
                                                            </tr>
                                                            <?php
                                                        }
                                                        if($key == "c15_t2_date"){
                                                            ?>
                                                            <tr class='Conceptual'>
                                                                <td>
                                                                    <label class="form-check-label" for="c15_t2_date" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                                                                        <?php
                                                                        $t2Date = "";
                                                                        if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_ConceptualConsistency->dateTime->Date) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_ConceptualConsistency->dateTime->Date != "") {
                                                                            $t2Date = $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_ConceptualConsistency->dateTime->Date;
                                                                        }
                                                                        ?>
                                                                        <b>Date:</b>
                                                                            <input type="date" name="c15_t2_date" id="c15_t2_date" class="form-control form-control-sm" value="{{$t2Date}}">
                                                                    </label>
                                                                </td>
                                                            </tr>
                                                            <?php
                                                        }
                                                        if($key == "c15_t2_result"){
                                                            ?>
                                                            <tr class='Conceptual'>
                                                                <td>
                                                                    <label class="form-check-label" for="c15_t2_result" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                                                                        <?php
                                                                        $t2Res = "";
                                                                        if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_ConceptualConsistency->result->DQ_ConformanceResult->pass->Boolean) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_ConceptualConsistency->result->DQ_ConformanceResult->pass->Boolean != "") {
                                                                            $t2Res = trim($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_ConceptualConsistency->result->DQ_ConformanceResult->pass->Boolean);
                                                                        }
                                                                        ?>
                                                                        <b>Result:</b>
                                                                        <select name="c15_t2_result" id="c15_t2_result" class="form-control form-control-sm">
                                                                            <option value="">Pilih...</option>
                                                                            <option value="Pass" {{($t2Res == 'Pass' ? "selected":"")}}>Pass</option>
                                                                            <option value="Fail" {{($t2Res == 'Fail' ? "selected":"")}}>Fail</option>
                                                                            <option value="Not Relevant" {{($t2Res == 'Not Relevant' ? "selected":"")}}>Not Relevant</option>
                                                                        </select>
                                                                    </label>
                                                                </td>
                                                            </tr>
                                                            <?php
                                                        }
                                                        if($key == "c15_t2_conform_result"){
                                                            ?>
                                                            <tr class='Conceptual'>
                                                                <td>
                                                                    <label class="form-check-label" for="c15_t2_conform_result" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                                                                        <?php
                                                                        $t2ConformRes = "";
                                                                        if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_ConceptualConsistency->result->DQ_ConformanceResult->explanation->CharacterString) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_ConceptualConsistency->result->DQ_ConformanceResult->explanation->CharacterString != "") {
                                                                            $t2ConformRes = $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_ConceptualConsistency->result->DQ_ConformanceResult->explanation->CharacterString;
                                                                        }
                                                                        ?>
                                                                        <b>Conformance Result:</b>
                                                                        <input type="text" name="c15_t2_conform_result" id="c15_t2_conform_result" class="form-control form-control-sm" value="{{$t2ConformRes}}">
                                                                    </label>
                                                                </td>
                                                            </tr>
                                                            <?php
                                                        }
                                                        if($key == "c15_t2_scope_2"){
                                                            ?>
                                                            <tr class='Domain'>
                                                                <td>
                                                                    <label class="form-check-label" for="c3_1" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                                                                        <?php
                                                                        $t2Scope = "";
                                                                        if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_DomainConsistency->consistDomainScope->consistConceptScopeItem->CharacterString) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_DomainConsistency->consistDomainScope->consistConceptScopeItem->CharacterString != "") {
                                                                            $t2Scope = trim($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_DomainConsistency->consistDomainScope->consistConceptScopeItem->CharacterString);
                                                                        }
                                                                        ?>
                                                                        <b>Scope:</b>
                                                                        <select name="c15_t2_scope_2" id="c15_t2_scope_2" class="form-control form-control-sm">
                                                                            <option value="">Pilih...</option>
                                                                            <option value="Aeronautical" {{($t2Scope == 'Aeronautical' ? "selected":"")}}>Aeronautical</option>
                                                                            <option value="Built Environment" {{($t2Scope == 'Built Environment' ? "selected":"")}}>Built Environment</option>
                                                                            <option value="Demarcation" {{($t2Scope == 'Demarcation' ? "selected":"")}}>Demarcation</option>
                                                                            <option value="General" {{($t2Scope == 'General' ? "selected":"")}}>General</option>
                                                                            <option value="Geology" {{($t2Scope == 'Geology' ? "selected":"")}}>Geology</option>
                                                                            <option value="Hydrography" {{($t2Scope == 'Hydrography' ? "selected":"")}}>Hydrography</option>
                                                                            <option value="Hypsography" {{($t2Scope == 'Hypsography' ? "selected":"")}}>Hypsography</option>
                                                                            <option value="Soil" {{($t2Scope == 'Soil' ? "selected":"")}}>Soil</option>
                                                                            <option value="Special Use" {{($t2Scope == 'Special Use' ? "selected":"")}}>Special Use</option>
                                                                            <option value="Transportation" {{($t2Scope == 'Transportation' ? "selected":"")}}>Transportation</option>
                                                                            <option value="Utility" {{($t2Scope == 'Utility' ? "selected":"")}}>Utility</option>
                                                                            <option value="Vegetation" {{($t2Scope == 'Vegetation' ? "selected":"")}}>Vegetation</option>
                                                                        </select>
                                                                    </label>
                                                                </td>
                                                            </tr>
                                                            <?php
                                                        }
                                                        if($key == "c15_t2_comply_level_2"){
                                                            ?>
                                                            <tr class='Domain'>
                                                                <td>
                                                                    <label class="form-check-label" for="c3_3" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                                                                        <?php
                                                                        $compLvl = "";
                                                                        if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_DomainConsistency->compDomainLevel->CharacterString) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_DomainConsistency->compDomainLevel->CharacterString != "") {
                                                                            $compLvl = $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_DomainConsistency->compDomainLevel->CharacterString;
                                                                        }
                                                                        ?>
                                                                        <b>Compliance Level:</b>
                                                                        <input type="text" name="c15_t2_comply_level_2" id="c15_t2_comply_level_2" class="form-control form-control-sm" value="{{$compLvl}}">
                                                                    </label>
                                                                </td>
                                                            </tr>
                                                            <?php
                                                        }
                                                        if($key == "c15_t2_date_2"){
                                                            ?>
                                                            <tr class='Domain'>
                                                                <td>
                                                                    <label class="form-check-label" for="c15_t2_conceptual_date" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                                                                        <?php
                                                                        $t2Date = "";
                                                                        if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_DomainConsistency->dateTime->Date) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_DomainConsistency->dateTime->Date != "") {
                                                                            $t2Date = $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_DomainConsistency->dateTime->Date;
                                                                        }
                                                                        ?>
                                                                        <b>Date:</b>
                                                                            <input type="date" name="c15_t2_date_2" id="c15_t2_date_2" class="form-control form-control-sm" value="{{$t2Date}}">
                                                                    </label>
                                                                </td>
                                                            </tr>
                                                            <?php
                                                        }
                                                        if($key == "c15_t2_result_2"){
                                                            ?>
                                                            <tr class='Domain'>
                                                                <td>
                                                                    <label class="form-check-label" for="c3_2" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                                                                        <?php
                                                                        $t2Res = "";
                                                                        if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_DomainConsistency->result->DQ_ConformanceResult->pass->Boolean) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_DomainConsistency->result->DQ_ConformanceResult->pass->Boolean != "") {
                                                                            $t2Res = trim($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_DomainConsistency->result->DQ_ConformanceResult->pass->Boolean);
                                                                        }
                                                                        ?>
                                                                        <b>Result:</b>
                                                                        <select name="c15_t2_result_2" id="c15_t2_result_2" class="form-control form-control-sm">
                                                                            <option value="">Pilih...</option>
                                                                            <option value="Pass" {{($t2Res == 'Pass' ? "selected":"")}}>Pass</option>
                                                                            <option value="Fail" {{($t2Res == 'Fail' ? "selected":"")}}>Fail</option>
                                                                            <option value="Not Relevant" {{($t2Res == 'Not Relevant' ? "selected":"")}}>Not Relevant</option>
                                                                        </select>
                                                                    </label>
                                                                </td>
                                                            </tr>
                                                            <?php
                                                        }
                                                        if($key == "c15_t2_conform_result_2"){
                                                            ?>
                                                            <tr class='Domain'>
                                                                <td>
                                                                    <label class="form-check-label" for="c3_4" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                                                                        <?php
                                                                        $t2ConformRes = "";
                                                                        if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_DomainConsistency->result->DQ_ConformanceResult->explanation->CharacterString) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_DomainConsistency->result->DQ_ConformanceResult->explanation->CharacterString != "") {
                                                                            $t2ConformRes = $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_DomainConsistency->result->DQ_ConformanceResult->explanation->CharacterString;
                                                                        }
                                                                        ?>
                                                                        <b>Conformance Result:</b>
                                                                        <input type="text" name="c15_t2_conform_result_2" id="c15_t2_conform_result_2" class="form-control form-control-sm" value="{{$t2ConformRes}}">
                                                                    </label>
                                                                </td>
                                                            </tr>
                                                            <?php
                                                        }
                                                        if($key == "c15_t2_scope_3"){
                                                            ?>
                                                            <tr class='Format'>
                                                                <td>
                                                                    <label class="form-check-label" for="c15_t2_scope_3" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                                                                        <?php
                                                                        $t2Scope = "";
                                                                        if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_FormatConsistency->consistFormatScope->consistFormatScopeItem->CharacterString) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_FormatConsistency->consistFormatScope->consistFormatScopeItem->CharacterString != "") {
                                                                            $t2Scope = trim($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_FormatConsistency->consistFormatScope->consistFormatScopeItem->CharacterString);
                                                                        }
                                                                        ?>
                                                                        <b>Scope:</b>
                                                                        <select name="c15_t2_scope_3" id="c15_t2_scope_3" class="form-control form-control-sm">
                                                                            <option value="">Pilih...</option>
                                                                            <option value="Aeronautical" {{($t2Scope == 'Aeronautical' ? "selected":"")}}>Aeronautical</option>
                                                                            <option value="Built Environment" {{($t2Scope == 'Built Environment' ? "selected":"")}}>Built Environment</option>
                                                                            <option value="Demarcation" {{($t2Scope == 'Demarcation' ? "selected":"")}}>Demarcation</option>
                                                                            <option value="General" {{($t2Scope == 'General' ? "selected":"")}}>General</option>
                                                                            <option value="Geology" {{($t2Scope == 'Geology' ? "selected":"")}}>Geology</option>
                                                                            <option value="Hydrography" {{($t2Scope == 'Hydrography' ? "selected":"")}}>Hydrography</option>
                                                                            <option value="Hypsography" {{($t2Scope == 'Hypsography' ? "selected":"")}}>Hypsography</option>
                                                                            <option value="Soil" {{($t2Scope == 'Soil' ? "selected":"")}}>Soil</option>
                                                                            <option value="Special Use" {{($t2Scope == 'Special Use' ? "selected":"")}}>Special Use</option>
                                                                            <option value="Transportation" {{($t2Scope == 'Transportation' ? "selected":"")}}>Transportation</option>
                                                                            <option value="Utility" {{($t2Scope == 'Utility' ? "selected":"")}}>Utility</option>
                                                                            <option value="Vegetation" {{($t2Scope == 'Vegetation' ? "selected":"")}}>Vegetation</option>
                                                                        </select>
                                                                    </label>
                                                                </td>
                                                            </tr>
                                                            <?php
                                                        }
                                                        if($key == "c15_t2_comply_level_3"){
                                                            ?>
                                                            <tr class='Format'>
                                                                <td>
                                                                    <label class="form-check-label" for="c3_3" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                                                                        <?php
                                                                        $compLvl = "";
                                                                        if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_FormatConsistency->compFormatLevel->CharacterString) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_FormatConsistency->compFormatLevel->CharacterString != "") {
                                                                            $compLvl = $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_FormatConsistency->compFormatLevel->CharacterString;
                                                                        }
                                                                        ?>
                                                                        <b>Compliance Level:</b>
                                                                        <input type="text" name="c15_t2_comply_level_3" id="c15_t2_comply_level_3" class="form-control form-control-sm" value="{{$compLvl}}">
                                                                    </label>
                                                                </td>
                                                            </tr>
                                                            <?php
                                                        }
                                                        if($key == "c15_t2_date_3"){
                                                            ?>
                                                            <tr class='Format'>
                                                                <td>
                                                                    <label class="form-check-label" for="c15_t2_conceptual_date" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                                                                        <?php
                                                                        $t2Date = "";
                                                                        if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_FormatConsistency->dateTime->Date) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_FormatConsistency->dateTime->Date != "") {
                                                                            $t2Date = $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_FormatConsistency->dateTime->Date;
                                                                        }
                                                                        ?>
                                                                        <b>Date:</b>
                                                                            <input type="date" name="c15_t2_date_3" id="c15_t2_date_3" class="form-control form-control-sm" value="{{$t2Date}}">
                                                                    </label>
                                                                </td>
                                                            </tr>
                                                            <?php
                                                        }
                                                        if($key == "c15_t2_result_3"){
                                                            ?>
                                                            <tr class='Format'>
                                                                <td>
                                                                    <label class="form-check-label" for="c3_2" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                                                                        <?php
                                                                        $t2Res = "";
                                                                        if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_FormatConsistency->result->DQ_ConformanceResult->pass->Boolean) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_FormatConsistency->result->DQ_ConformanceResult->pass->Boolean != "") {
                                                                            $t2Res = trim($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_FormatConsistency->result->DQ_ConformanceResult->pass->Boolean);
                                                                        }
                                                                        ?>
                                                                        <b>Result:</b>
                                                                        <select name="c15_t2_result_3" id="c15_t2_result_3" class="form-control form-control-sm">
                                                                            <option value="">Pilih...</option>
                                                                            <option value="Pass" {{($t2Res == 'Pass' ? "selected":"")}}>Pass</option>
                                                                            <option value="Fail" {{($t2Res == 'Fail' ? "selected":"")}}>Fail</option>
                                                                            <option value="Not Relevant" {{($t2Res == 'Not Relevant' ? "selected":"")}}>Not Relevant</option>
                                                                        </select>
                                                                    </label>
                                                                </td>
                                                            </tr>
                                                            <?php
                                                        }
                                                        if($key == "c15_t2_conform_result_3"){
                                                            ?>
                                                            <tr class='Format'>
                                                                <td>
                                                                    <label class="form-check-label" for="c3_4" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                                                                        <?php
                                                                        $t2ConformRes = "";
                                                                        if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_FormatConsistency->result->DQ_ConformanceResult->explanation->CharacterString) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_FormatConsistency->result->DQ_ConformanceResult->explanation->CharacterString != "") {
                                                                            $t2ConformRes = $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_FormatConsistency->result->DQ_ConformanceResult->explanation->CharacterString;
                                                                        }
                                                                        ?>
                                                                        <b>Conformance Result:</b>
                                                                        <input type="text" name="c15_t2_conform_result_3" id="c15_t2_conform_result_3" class="form-control form-control-sm" value="{{$t2ConformRes}}">
                                                                    </label>
                                                                </td>
                                                            </tr>
                                                            <?php
                                                        }
                                                        if($key == "c15_t2_scope_4"){
                                                            ?>
                                                            <tr class='Topological'>
                                                                <td>
                                                                    <label class="form-check-label" for="c15_t2_scope_4" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                                                                        <?php
                                                                        $t2Scope = "";
                                                                        if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_TopologicalConsistency->consistTopoScope->consistTopoScopeItem->CharacterString) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_TopologicalConsistency->consistTopoScope->consistTopoScopeItem->CharacterString != "") {
                                                                            $t2Scope = trim($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_TopologicalConsistency->consistTopoScope->consistTopoScopeItem->CharacterString);
                                                                        }
                                                                        ?>
                                                                        <b>Scope:</b>
                                                                        <select name="c15_t2_scope_4" id="c15_t2_scope_4" class="form-control form-control-sm">
                                                                            <option value="">Pilih...</option>
                                                                            <option value="Aeronautical" {{($t2Scope == 'Aeronautical' ? "selected":"")}}>Aeronautical</option>
                                                                            <option value="Built Environment" {{($t2Scope == 'Built Environment' ? "selected":"")}}>Built Environment</option>
                                                                            <option value="Demarcation" {{($t2Scope == 'Demarcation' ? "selected":"")}}>Demarcation</option>
                                                                            <option value="General" {{($t2Scope == 'General' ? "selected":"")}}>General</option>
                                                                            <option value="Geology" {{($t2Scope == 'Geology' ? "selected":"")}}>Geology</option>
                                                                            <option value="Hydrography" {{($t2Scope == 'Hydrography' ? "selected":"")}}>Hydrography</option>
                                                                            <option value="Hypsography" {{($t2Scope == 'Hypsography' ? "selected":"")}}>Hypsography</option>
                                                                            <option value="Soil" {{($t2Scope == 'Soil' ? "selected":"")}}>Soil</option>
                                                                            <option value="Special Use" {{($t2Scope == 'Special Use' ? "selected":"")}}>Special Use</option>
                                                                            <option value="Transportation" {{($t2Scope == 'Transportation' ? "selected":"")}}>Transportation</option>
                                                                            <option value="Utility" {{($t2Scope == 'Utility' ? "selected":"")}}>Utility</option>
                                                                            <option value="Vegetation" {{($t2Scope == 'Vegetation' ? "selected":"")}}>Vegetation</option>
                                                                        </select>
                                                                    </label>
                                                                </td>
                                                            </tr>
                                                            <?php
                                                        }
                                                        if($key == "c15_t2_comply_level_4"){
                                                            ?>
                                                            <tr class='Topological'>
                                                                <td>
                                                                    <label class="form-check-label" for="c3_3" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                                                                        <?php
                                                                        $compLvl = "";
                                                                        if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_TopologicalConsistency->compTopoLevel->CharacterString) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_TopologicalConsistency->compTopoLevel->CharacterString != "") {
                                                                            $compLvl = $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_TopologicalConsistency->compTopoLevel->CharacterString;
                                                                        }
                                                                        ?>
                                                                        <b>Compliance Level:</b>
                                                                        <input type="text" name="c15_t2_comply_level_4" id="c15_t2_comply_level_4" class="form-control form-control-sm" value="{{$compLvl}}">
                                                                    </label>
                                                                </td>
                                                            </tr>
                                                            <?php
                                                        }
                                                        if($key == "c15_t2_date_4"){
                                                            ?>
                                                            <tr class='Topological'>
                                                                <td>
                                                                    <label class="form-check-label" for="c15_t2_conceptual_date" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                                                                        <?php
                                                                        $t2Date = "";
                                                                        if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_TopologicalConsistency->dateTime->Date) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_TopologicalConsistency->dateTime->Date != "") {
                                                                            $t2Date = $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_TopologicalConsistency->dateTime->Date;
                                                                        }
                                                                        ?>
                                                                        <b>Date:</b>
                                                                            <input type="date" name="c15_t2_date_4" id="c15_t2_date_4" class="form-control form-control-sm" value="{{$t2Date}}">
                                                                    </label>
                                                                </td>
                                                            </tr>
                                                            <?php
                                                        }
                                                        if($key == "c15_t2_result_4"){
                                                            ?>
                                                            <tr class='Topological'>
                                                                <td>
                                                                    <label class="form-check-label" for="c3_2" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                                                                        <?php
                                                                        $t2Res = "";
                                                                        if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_TopologicalConsistency->result->DQ_ConformanceResult->pass->Boolean) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_TopologicalConsistency->result->DQ_ConformanceResult->pass->Boolean != "") {
                                                                            $t2Res = trim($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_TopologicalConsistency->result->DQ_ConformanceResult->pass->Boolean);
                                                                        }
                                                                        ?>
                                                                        <b>Result:</b>
                                                                        <select name="c15_t2_result_4" id="c15_t2_result_4" class="form-control form-control-sm">
                                                                            <option value="">Pilih...</option>
                                                                            <option value="Pass" {{($t2Res == 'Pass' ? "selected":"")}}>Pass</option>
                                                                            <option value="Fail" {{($t2Res == 'Fail' ? "selected":"")}}>Fail</option>
                                                                            <option value="Not Relevant" {{($t2Res == 'Not Relevant' ? "selected":"")}}>Not Relevant</option>
                                                                        </select>
                                                                    </label>
                                                                </td>
                                                            </tr>
                                                            <?php
                                                        }
                                                        if($key == "c15_t2_conform_result_4"){
                                                            ?>
                                                            <tr class='Topological'>
                                                                <td>
                                                                    <label class="form-check-label" for="c3_4" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                                                                        <?php
                                                                        $t2ConformRes = "";
                                                                        if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_TopologicalConsistency->result->DQ_ConformanceResult->explanation->CharacterString) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_TopologicalConsistency->result->DQ_ConformanceResult->explanation->CharacterString != "") {
                                                                            $t2ConformRes = $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_TopologicalConsistency->result->DQ_ConformanceResult->explanation->CharacterString;
                                                                        }
                                                                        ?>
                                                                        <b>Conformance Result:</b>
                                                                        <input type="text" name="c15_t2_conform_result_4" id="c15_t2_conform_result_4" class="form-control form-control-sm" value="{{$t2ConformRes}}">
                                                                    </label>
                                                                </td>
                                                            </tr>
                                                            <?php
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
                                                        <?php
                                                        $radio3 = "";
                                                        if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_AbsoluteExternalPositionalAccuracy) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_AbsoluteExternalPositionalAccuracy != "") {
                                                            $radio3 = trim($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_AbsoluteExternalPositionalAccuracy);
                                                        }
                                                        ?>
                                                        <td>
                                                            <label class="form-check-label" for="c15_t3_type" style="margin-right:50px;">
                                                                <input type="radio" name="c15_t3_type" id='AbsoluteOrExternal' value="Absolute or External" {{($radio3 == 'Absolute or External' ? 'checked="checked"':'')}}>&nbsp;Absolute or External
                                                            </label>
                                                        </td>
                                                        <td>
                                                            <label class="form-check-label" for="c15_t3_type" style="margin-right:50px;">
                                                                <input type="radio" name="c15_t3_type" value="Relative or Internal" {{($radio3 == 'Relative or Internal' ? 'checked="checked"':'')}}>&nbsp;Relative or Internal
                                                            </label>
                                                        </td>
                                                        <td>
                                                            <label class="form-check-label" for="c15_t3_type" style="margin-right:50px;">
                                                                <input type="radio" name="c15_t3_type" value="Gridded Data" {{($radio3 == 'Gridded Data' ? 'checked="checked"':'')}}>&nbsp;Gridded Data
                                                            </label>
                                                        </td>
                                                    </tr>
                                                    <?php //================= ?>
                                                    <?php 
                                                    foreach($template->template[strtolower($catSelected)]['accordion15'] as $key=>$val){
                                                        if($key == "c15_t3_scope"){
                                                            ?>
                                                            <tr class='AbsoluteorExternal'>
                                                                <td>
                                                                    <label class="form-check-label" for="c15_t3_scope" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                                                                        <?php
                                                                        $t3Scope = "";
                                                                        if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_AbsoluteExternalPositionalAccuracy->posAccAbsoluteScope->posAccAbsoluteScopeItem->CharacterString) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_AbsoluteExternalPositionalAccuracy->posAccAbsoluteScope->posAccAbsoluteScopeItem->CharacterString != "") {
                                                                            $t3Scope = trim($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_AbsoluteExternalPositionalAccuracy->posAccAbsoluteScope->posAccAbsoluteScopeItem->CharacterString);
                                                                        }
                                                                        ?>
                                                                        <b>Scope:</b>
                                                                        <select name="c15_t3_scope" id="c15_t3_scope" class="form-control form-control-sm">
                                                                            <option value="">Pilih...</option>
                                                                            <option value="Aeronautical" {{($t3Scope == 'Aeronautical' ? "selected":"")}}>Aeronautical</option>
                                                                            <option value="Built Environment" {{($t3Scope == 'Built Environment' ? "selected":"")}}>Built Environment</option>
                                                                            <option value="Demarcation" {{($t3Scope == 'Demarcation' ? "selected":"")}}>Demarcation</option>
                                                                            <option value="General" {{($t3Scope == 'General' ? "selected":"")}}>General</option>
                                                                            <option value="Geology" {{($t3Scope == 'Geology' ? "selected":"")}}>Geology</option>
                                                                            <option value="Hydrography" {{($t3Scope == 'Hydrography' ? "selected":"")}}>Hydrography</option>
                                                                            <option value="Hypsography" {{($t3Scope == 'Hypsography' ? "selected":"")}}>Hypsography</option>
                                                                            <option value="Soil" {{($t3Scope == 'Soil' ? "selected":"")}}>Soil</option>
                                                                            <option value="Special Use" {{($t3Scope == 'Special Use' ? "selected":"")}}>Special Use</option>
                                                                            <option value="Transportation" {{($t3Scope == 'Transportation' ? "selected":"")}}>Transportation</option>
                                                                            <option value="Utility" {{($t3Scope == 'Utility' ? "selected":"")}}>Utility</option>
                                                                            <option value="Vegetation" {{($t3Scope == 'Vegetation' ? "selected":"")}}>Vegetation</option>
                                                                        </select>
                                                                    </label>
                                                                </td>
                                                            </tr>
                                                            <?php
                                                        }
                                                        if($key == "c15_t3_comply_level"){
                                                            ?>
                                                            <tr class='AbsoluteorExternal'>
                                                                <td>
                                                                    <label class="form-check-label" for="c15_t3_comply_level" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                                                                        <?php
                                                                        $t3CompLvl = "";
                                                                        if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_AbsoluteExternalPositionalAccuracy->compPosAccAbsoluteLevel->CharacterString) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_AbsoluteExternalPositionalAccuracy->compPosAccAbsoluteLevel->CharacterString != "") {
                                                                            $t3CompLvl = $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_AbsoluteExternalPositionalAccuracy->compPosAccAbsoluteLevel->CharacterString;
                                                                        }
                                                                        ?>
                                                                        <b>Compliance Level:</b>
                                                                        <input type="text" name="c15_t3_comply_level" id="c15_t3_comply_level" class="form-control form-control-sm" value="{{$t3CompLvl}}">
                                                                    </label>
                                                                </td>
                                                            </tr>
                                                            <?php
                                                        }
                                                        if($key == "c15_t3_date"){
                                                            ?>
                                                            <tr class='AbsoluteorExternal'>
                                                                <td>
                                                                    <label class="form-check-label" for="c15_t3_date" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                                                                        <?php
                                                                        $t3Date = "";
                                                                        if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_AbsoluteExternalPositionalAccuracy->dateTime->Date) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_AbsoluteExternalPositionalAccuracy->dateTime->Date != "") {
                                                                            $t3Date = $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_AbsoluteExternalPositionalAccuracy->dateTime->Date;
                                                                        }
                                                                        ?>
                                                                        <b>Date:</b>
                                                                        <input type="date" name="c15_t3_date" id="c15_t3_date" class="form-control form-control-sm" value="{{$t3Date}}">
                                                                    </label>
                                                                </td>
                                                            </tr>
                                                            <?php
                                                        }
                                                        if($key == "c15_t3_result"){
                                                            ?>
                                                            <tr class='AbsoluteorExternal'>
                                                                <td>
                                                                    <label class="form-check-label" for="c15_t3_result" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                                                                        <?php
                                                                        $t3Res = "";
                                                                        if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_AbsoluteExternalPositionalAccuracy->result->DQ_ConformanceResult->pass->Boolean) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_AbsoluteExternalPositionalAccuracy->result->DQ_ConformanceResult->pass->Boolean != "") {
                                                                            $t3Res = trim($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_AbsoluteExternalPositionalAccuracy->result->DQ_ConformanceResult->pass->Boolean);
                                                                        }
                                                                        ?>
                                                                        <b>Result:</b>
                                                                        <select name="c15_t3_result" id="c15_t3_result" class="form-control form-control-sm">
                                                                            <option value="">Pilih...</option>
                                                                            <option value="Pass" {{($t3Res == 'Pass' ? "selected":"")}}>Pass</option>
                                                                            <option value="Fail" {{($t3Res == 'Fail' ? "selected":"")}}>Fail</option>
                                                                            <option value="Not Relevant" {{($t3Res == 'Not Relevant' ? "selected":"")}}>Not Relevant</option>
                                                                        </select>
                                                                    </label>
                                                                </td>
                                                            </tr>
                                                            <?php
                                                        }
                                                        if($key == "c15_t3_conform_result"){
                                                            ?>
                                                            <tr class='AbsoluteorExternal'>
                                                                <td>
                                                                    <label class="form-check-label" for="c15_t3_conform_result" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                                                                        <?php
                                                                        $t3ConformRes = "";
                                                                        if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_AbsoluteExternalPositionalAccuracy->result->DQ_ConformanceResult->explanation->CharacterString) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_AbsoluteExternalPositionalAccuracy->result->DQ_ConformanceResult->explanation->CharacterString != "") {
                                                                            $t3ConformRes = $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_AbsoluteExternalPositionalAccuracy->result->DQ_ConformanceResult->explanation->CharacterString;
                                                                        }
                                                                        ?>  
                                                                        <b>Conformance Result:</b>
                                                                        <input type="text" name="c15_t3_conform_result" id="c15_t3_conform_result" class="form-control form-control-sm" value="{{$t3ConformRes}}">
                                                                    </label>
                                                                </td>
                                                            </tr>
                                                            <?php
                                                        }
                                                        if($key == "c15_t3_scope_2"){
                                                            ?>
                                                            <tr class='RelativeorInternal'>
                                                                <td>
                                                                    <label class="form-check-label" for="c15_t3_scope_2" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                                                                        <?php
                                                                        $t3Scope = "";
                                                                        if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_RelativeInternalPositionalAccuracy->posAccRelativeScope->posAccRelativeScopeItem->CharacterString) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_RelativeInternalPositionalAccuracy->posAccRelativeScope->posAccRelativeScopeItem->CharacterString != "") {
                                                                            $t3Scope = trim($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_RelativeInternalPositionalAccuracy->posAccRelativeScope->posAccRelativeScopeItem->CharacterString);
                                                                        }
                                                                        ?>
                                                                        <b>Scope:</b>
                                                                        <select name="c15_t3_scope_2" id="c15_t3_scope_2" class="form-control form-control-sm">
                                                                            <option value="">Pilih...</option>
                                                                            <option value="Aeronautical" {{($t3Scope == 'Aeronautical' ? "selected":"")}}>Aeronautical</option>
                                                                            <option value="Built Environment" {{($t3Scope == 'Built Environment' ? "selected":"")}}>Built Environment</option>
                                                                            <option value="Demarcation" {{($t3Scope == 'Demarcation' ? "selected":"")}}>Demarcation</option>
                                                                            <option value="General" {{($t3Scope == 'General' ? "selected":"")}}>General</option>
                                                                            <option value="Geology" {{($t3Scope == 'Geology' ? "selected":"")}}>Geology</option>
                                                                            <option value="Hydrography" {{($t3Scope == 'Hydrography' ? "selected":"")}}>Hydrography</option>
                                                                            <option value="Hypsography" {{($t3Scope == 'Hypsography' ? "selected":"")}}>Hypsography</option>
                                                                            <option value="Soil" {{($t3Scope == 'Soil' ? "selected":"")}}>Soil</option>
                                                                            <option value="Special Use" {{($t3Scope == 'Special Use' ? "selected":"")}}>Special Use</option>
                                                                            <option value="Transportation" {{($t3Scope == 'Transportation' ? "selected":"")}}>Transportation</option>
                                                                            <option value="Utility" {{($t3Scope == 'Utility' ? "selected":"")}}>Utility</option>
                                                                            <option value="Vegetation" {{($t3Scope == 'Vegetation' ? "selected":"")}}>Vegetation</option>
                                                                        </select>
                                                                    </label>
                                                                </td>
                                                            </tr>
                                                            <?php
                                                        }
                                                        if($key == "c15_t3_comply_level_2"){
                                                            ?>
                                                            <tr class='RelativeorInternal'>
                                                                <td>
                                                                    <label class="form-check-label" for="c15_t3_comply_level_2" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                                                                        <?php
                                                                        $t3CompLvl = "";
                                                                        if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_RelativeInternalPositionalAccuracy->posAccRelativeLevel->CharacterString) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_RelativeInternalPositionalAccuracy->posAccRelativeLevel->CharacterString != "") {
                                                                            $t3CompLvl = $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_RelativeInternalPositionalAccuracy->posAccRelativeLevel->CharacterString;
                                                                        }
                                                                        ?>
                                                                        <b>Compliance Level:</b>
                                                                        <input type="text" name="c15_t3_comply_level_2" id="c15_t3_comply_level_2" class="form-control form-control-sm" value="{{$t3CompLvl}}">
                                                                    </label>
                                                                </td>
                                                            </tr>
                                                            <?php
                                                        }
                                                        if($key == "c15_t3_date_2"){
                                                            ?>
                                                            <tr class='RelativeorInternal'>
                                                                <td>
                                                                    <label class="form-check-label" for="c15_t3_date_2" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                                                                        <?php
                                                                        $t3Date = "";
                                                                        if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_RelativeInternalPositionalAccuracy->dateTime->Date) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_RelativeInternalPositionalAccuracy->dateTime->Date != "") {
                                                                            $t3Date = $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_RelativeInternalPositionalAccuracy->dateTime->Date;
                                                                        }
                                                                        ?>
                                                                        <b>Date:</b>
                                                                        <input type="date" name="c15_t3_date_2" id="c15_t3_date_2" class="form-control form-control-sm" value="{{$t3Date}}">
                                                                    </label>
                                                                </td>
                                                            </tr>
                                                            <?php
                                                        }
                                                        if($key == "c15_t3_result_2"){
                                                            ?>
                                                            <tr class='RelativeorInternal'>
                                                                <td>
                                                                    <label class="form-check-label" for="c15_t3_result_2" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                                                                        <?php
                                                                        $t3Res = "";
                                                                        if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_RelativeInternalPositionalAccuracy->result->DQ_ConformanceResult->pass->Boolean) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_RelativeInternalPositionalAccuracy->result->DQ_ConformanceResult->pass->Boolean != "") {
                                                                            $t3Res = trim($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_RelativeInternalPositionalAccuracy->result->DQ_ConformanceResult->pass->Boolean);
                                                                        }
                                                                        ?>
                                                                        <b>Result:</b>
                                                                        <select name="c15_t3_result_2" id="c15_t3_result_2" class="form-control form-control-sm">
                                                                            <option value="">Pilih...</option>
                                                                            <option value="Pass" {{($t3Res == 'Pass' ? "selected":"")}}>Pass</option>
                                                                            <option value="Fail" {{($t3Res == 'Fail' ? "selected":"")}}>Fail</option>
                                                                            <option value="Not Relevant" {{($t3Res == 'Not Relevant' ? "selected":"")}}>Not Relevant</option>
                                                                        </select>
                                                                    </label>
                                                                </td>
                                                            </tr>
                                                            <?php
                                                        }
                                                        if($key == "c15_t3_conform_result_2"){
                                                            ?>
                                                            <tr class='RelativeorInternal'>
                                                                <td>
                                                                    <label class="form-check-label" for="c15_t3_conform_result_2" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                                                                        <?php
                                                                        $t3ConformRes = "";
                                                                        if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_RelativeInternalPositionalAccuracy->result->DQ_ConformanceResult->explanation->CharacterString) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_RelativeInternalPositionalAccuracy->result->DQ_ConformanceResult->explanation->CharacterString != "") {
                                                                            $t3ConformRes = $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_RelativeInternalPositionalAccuracy->result->DQ_ConformanceResult->explanation->CharacterString;
                                                                        }
                                                                        ?> 
                                                                        <b>Conformance Result:</b>
                                                                        <input type="text" name="c15_t3_conform_result_2" id="c15_t3_conform_result_2" class="form-control form-control-sm" value="{{$t3ConformRes}}">
                                                                    </label>
                                                                </td>
                                                            </tr>
                                                            <?php
                                                        }
                                                        if($key == "c15_t3_scope_3"){
                                                            ?>
                                                            <tr class='GriddedData'>
                                                                <td>
                                                                    <label class="form-check-label" for="c15_t3_scope_3" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                                                                        <?php
                                                                        $t3Scope = "";
                                                                        if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_GriddedDataPositionalAccuracy->posAccGridScope->posAccGridScopeItem->CharacterString) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_GriddedDataPositionalAccuracy->posAccGridScope->posAccGridScopeItem->CharacterString != "") {
                                                                            $t3Scope = trim($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_GriddedDataPositionalAccuracy->posAccGridScope->posAccGridScopeItem->CharacterString);
                                                                        }
                                                                        ?>
                                                                        <b>Scope:</b>
                                                                        <select name="c15_t3_scope_3" id="c15_t3_scope_3" class="form-control form-control-sm">
                                                                            <option value="">Pilih...</option>
                                                                            <option value="Aeronautical" {{($t3Scope == 'Aeronautical' ? "selected":"")}}>Aeronautical</option>
                                                                            <option value="Built Environment" {{($t3Scope == 'Built Environment' ? "selected":"")}}>Built Environment</option>
                                                                            <option value="Demarcation" {{($t3Scope == 'Demarcation' ? "selected":"")}}>Demarcation</option>
                                                                            <option value="General" {{($t3Scope == 'General' ? "selected":"")}}>General</option>
                                                                            <option value="Geology" {{($t3Scope == 'Geology' ? "selected":"")}}>Geology</option>
                                                                            <option value="Hydrography" {{($t3Scope == 'Hydrography' ? "selected":"")}}>Hydrography</option>
                                                                            <option value="Hypsography" {{($t3Scope == 'Hypsography' ? "selected":"")}}>Hypsography</option>
                                                                            <option value="Soil" {{($t3Scope == 'Soil' ? "selected":"")}}>Soil</option>
                                                                            <option value="Special Use" {{($t3Scope == 'Special Use' ? "selected":"")}}>Special Use</option>
                                                                            <option value="Transportation" {{($t3Scope == 'Transportation' ? "selected":"")}}>Transportation</option>
                                                                            <option value="Utility" {{($t3Scope == 'Utility' ? "selected":"")}}>Utility</option>
                                                                            <option value="Vegetation" {{($t3Scope == 'Vegetation' ? "selected":"")}}>Vegetation</option>
                                                                        </select>
                                                                    </label>
                                                                </td>
                                                            </tr>
                                                            <?php
                                                        }
                                                        if($key == "c15_t3_comply_level_3"){
                                                            ?>
                                                            <tr class='GriddedData'>
                                                                <td>
                                                                    <label class="form-check-label" for="c15_t3_comply_level_3" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                                                                        <?php
                                                                        $t3CompLvl = "";
                                                                        if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_GriddedDataPositionalAccuracy->posAccGridLevel->CharacterString) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_GriddedDataPositionalAccuracy->posAccGridLevel->CharacterString != "") {
                                                                            $t3CompLvl = $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_GriddedDataPositionalAccuracy->posAccGridLevel->CharacterString;
                                                                        }
                                                                        ?>
                                                                        <b>Compliance Level:</b>
                                                                        <input type="text" name="c15_t3_comply_level_3" id="c15_t3_comply_level_3" class="form-control form-control-sm" value="{{$t3CompLvl}}">
                                                                    </label>
                                                                </td>
                                                            </tr>
                                                            <?php
                                                        }
                                                        if($key == "c15_t3_date_3"){
                                                            ?>
                                                            <tr class='GriddedData'>
                                                                <td>
                                                                    <label class="form-check-label" for="c15_t3_date_3" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                                                                        <?php
                                                                        $t3Date = "";
                                                                        if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_GriddedDataPositionalAccuracy->dateTime->Date) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_GriddedDataPositionalAccuracy->dateTime->Date != "") {
                                                                            $t3Date = $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_GriddedDataPositionalAccuracy->dateTime->Date;
                                                                        }
                                                                        ?>
                                                                        <b>Date:</b>
                                                                        <input type="date" name="c15_t3_date_3" id="c15_t3_date_3" class="form-control form-control-sm" value="{{$t3Date}}">
                                                                    </label>
                                                                </td>
                                                            </tr>
                                                            <?php
                                                        }
                                                        if($key == "c15_t3_result_3"){
                                                            ?>
                                                            <tr class='GriddedData'>
                                                                <td>
                                                                    <label class="form-check-label" for="c15_t3_result_3" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                                                                        <?php
                                                                        $t3Res = "";
                                                                        if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_GriddedDataPositionalAccuracy->result->DQ_ConformanceResult->pass->Boolean) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_GriddedDataPositionalAccuracy->result->DQ_ConformanceResult->pass->Boolean != "") {
                                                                            $t3Res = trim($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_GriddedDataPositionalAccuracy->result->DQ_ConformanceResult->pass->Boolean);
                                                                        }
                                                                        ?>
                                                                        <b>Result:</b>
                                                                        <select name="c15_t3_result_3" id="c15_t3_result_3" class="form-control form-control-sm">
                                                                            <option value="">Pilih...</option>
                                                                            <option value="Pass" {{($t3Res == 'Pass' ? "selected":"")}}>Pass</option>
                                                                            <option value="Fail" {{($t3Res == 'Fail' ? "selected":"")}}>Fail</option>
                                                                            <option value="Not Relevant" {{($t3Res == 'Not Relevant' ? "selected":"")}}>Not Relevant</option>
                                                                        </select>
                                                                    </label>
                                                                </td>
                                                            </tr>
                                                            <?php
                                                        }
                                                        if($key == "c15_t3_conform_result_3"){
                                                            ?>
                                                            <tr class='GriddedData'>
                                                                <td>
                                                                    <label class="form-check-label" for="c15_t3_conform_result_3" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                                                                        <?php   
                                                                        $t3ConformRes = "";
                                                                        if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_GriddedDataPositionalAccuracy->result->DQ_ConformanceResult->explanation->CharacterString) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_GriddedDataPositionalAccuracy->result->DQ_ConformanceResult->explanation->CharacterString != "") {
                                                                            $t3ConformRes = $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_GriddedDataPositionalAccuracy->result->DQ_ConformanceResult->explanation->CharacterString;
                                                                        }
                                                                        ?> 
                                                                        <b>Conformance Result:</b>
                                                                        <input type="text" name="c15_t3_conform_result_3" id="c15_t3_conform_result_3" class="form-control form-control-sm" value="{{$t3ConformRes}}">
                                                                    </label>
                                                                </td>
                                                            </tr>
                                                            <?php
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
                                                        <?php
                                                        $radio4 = "";
                                                        if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_AccuracyOfATimeMeasurement) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_AccuracyOfATimeMeasurement != "") {
                                                            $radio4 = trim($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_AccuracyOfATimeMeasurement);
                                                        }
                                                        ?>
                                                        <td>
                                                            <label class="form-check-label" for="c15_t4_type" style="margin-right:50px;">
                                                                <input type="radio" name="c15_t4_type" id='AccuracyorTimeMeasurement' value="Accuracy or Time Measurement" {{($radio4 == 'Accuracy or Time Measurement' ? 'checked="checked"':'')}}>&nbsp;Accuracy or Time Measurement
                                                            </label>
                                                        </td>
                                                        <td>
                                                            <label class="form-check-label" for="c15_t4_type" style="margin-right:50px;">
                                                                <input type="radio" name="c15_t4_type" value="Temporal Consistency" {{($radio4 == 'Temporal Consistency' ? 'checked="checked"':'')}}>&nbsp;Temporal Consistency
                                                            </label>
                                                        </td>
                                                        <td>
                                                            <label class="form-check-label" for="c15_t4_type" style="margin-right:50px;">
                                                                <input type="radio" name="c15_t4_type" value="Temporal Validity" {{($radio4 == 'Temporal Validity' ? 'checked="checked"':'')}}>&nbsp;Temporal Validity
                                                            </label>
                                                        </td>
                                                    </tr>
                                                    <?php //================= ?>
                                                    <?php 
                                                    foreach($template->template[strtolower($catSelected)]['accordion15'] as $key=>$val){
                                                        if($key == "c15_t4_scope"){
                                                            ?>
                                                            <tr class='AccuracyorTimeMeasurement'>
                                                                <td>
                                                                    <label class="form-check-label" for="c15_t4_accuTimeMeasure_scope" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                                                                        <?php
                                                                        $t4Scope = "";
                                                                        if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_AccuracyOfATimeMeasurement->AccuracyOfATimeMeasurementScope->AccuracyOfATimeMeasurementItem->CharacterString) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_AccuracyOfATimeMeasurement->AccuracyOfATimeMeasurementScope->AccuracyOfATimeMeasurementItem->CharacterString != "") {
                                                                            $t4Scope = trim($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_AccuracyOfATimeMeasurement->AccuracyOfATimeMeasurementScope->AccuracyOfATimeMeasurementItem->CharacterString);
                                                                        }
                                                                        ?>
                                                                        <b>Scope:</b>
                                                                        <select name="c15_t4_scope" id="c15_t4_scope" class="form-control form-control-sm">
                                                                            <option value="">Pilih...</option>
                                                                            <option value="Aeronautical" {{($t4Scope == 'Aeronautical' ? "selected":"")}}>Aeronautical</option>
                                                                            <option value="Built Environment" {{($t4Scope == 'Built Environment' ? "selected":"")}}>Built Environment</option>
                                                                            <option value="Demarcation" {{($t4Scope == 'Demarcation' ? "selected":"")}}>Demarcation</option>
                                                                            <option value="General" {{($t4Scope == 'General' ? "selected":"")}}>General</option>
                                                                            <option value="Geology" {{($t4Scope == 'Geology' ? "selected":"")}}>Geology</option>
                                                                            <option value="Hydrography" {{($t4Scope == 'Hydrography' ? "selected":"")}}>Hydrography</option>
                                                                            <option value="Hypsography" {{($t4Scope == 'Hypsography' ? "selected":"")}}>Hypsography</option>
                                                                            <option value="Soil" {{($t4Scope == 'Soil' ? "selected":"")}}>Soil</option>
                                                                            <option value="Special Use" {{($t4Scope == 'Special Use' ? "selected":"")}}>Special Use</option>
                                                                            <option value="Transportation" {{($t4Scope == 'Transportation' ? "selected":"")}}>Transportation</option>
                                                                            <option value="Utility" {{($t4Scope == 'Utility' ? "selected":"")}}>Utility</option>
                                                                            <option value="Vegetation" {{($t4Scope == 'Vegetation' ? "selected":"")}}>Vegetation</option>
                                                                        </select>
                                                                    </label>
                                                                </td>
                                                            </tr>
                                                            <?php
                                                        }
                                                        if($key == "c15_t4_comply_level"){
                                                            ?>
                                                            <tr class='AccuracyorTimeMeasurement'>
                                                                <td>
                                                                    <label class="form-check-label" for="c3_3" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                                                                        <?php
                                                                        $t4CompLvl = "";
                                                                        if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_AccuracyOfATimeMeasurement->AccuracyOfATimeMeasurementLevel->CharacterString) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_AccuracyOfATimeMeasurement->AccuracyOfATimeMeasurementLevel->CharacterString != "") {
                                                                            $t4CompLvl = $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_AccuracyOfATimeMeasurement->AccuracyOfATimeMeasurementLevel->CharacterString;
                                                                        }
                                                                        ?>
                                                                        <b>Compliance Level:</b>
                                                                        <input type="text" name="c15_t4_comply_level" id="c15_t4_comply_level" class="form-control form-control-sm" value="{{$t4CompLvl}}">
                                                                    </label>
                                                                </td>
                                                            </tr>
                                                            <?php
                                                        }
                                                        if($key == "c15_t4_date"){
                                                            ?>
                                                            <tr class='AccuracyorTimeMeasurement'>
                                                                <td>
                                                                    <label class="form-check-label" for="c15_t4_accuTimeMeasure_date" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                                                                        <?php
                                                                        $t4Date = "";
                                                                        if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_AccuracyOfATimeMeasurement->dateTime->Date) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_AccuracyOfATimeMeasurement->dateTime->Date != "") {
                                                                            $t4Date = $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_AccuracyOfATimeMeasurement->dateTime->Date;
                                                                        }
                                                                        ?>
                                                                        <b>Date:</b>
                                                                            <input type="date" name="c15_t4_date" id="c15_t4_date" class="form-control form-control-sm" value="{{$t4Date}}">
                                                                    </label>
                                                                </td>
                                                            </tr>
                                                            <?php
                                                        }
                                                        if($key == "c15_t4_result"){
                                                            ?>
                                                            <tr class='AccuracyorTimeMeasurement'>
                                                                <td>
                                                                    <label class="form-check-label" for="c3_2" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                                                                        <?php
                                                                        $t4Res = "";
                                                                        if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_AccuracyOfATimeMeasurement->result->DQ_ConformanceResult->pass->Boolean) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_AccuracyOfATimeMeasurement->result->DQ_ConformanceResult->pass->Boolean != "") {
                                                                            $t4Res = trim($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_AccuracyOfATimeMeasurement->result->DQ_ConformanceResult->pass->Boolean);
                                                                        }
                                                                        ?>
                                                                        <b>Result:</b>
                                                                        <select name="c15_t4_result" id="c15_t4_result" class="form-control form-control-sm">
                                                                            <option value="">Pilih...</option>
                                                                            <option value="Pass" {{($t4Res == 'Pass' ? "selected":"")}}>Pass</option>
                                                                            <option value="Fail" {{($t4Res == 'Fail' ? "selected":"")}}>Fail</option>
                                                                            <option value="Not Relevant" {{($t4Res == 'Not Relevant' ? "selected":"")}}>Not Relevant</option>
                                                                        </select>
                                                                    </label>
                                                                </td>
                                                            </tr>
                                                            <?php
                                                        }
                                                        if($key == "c15_t4_conform_result"){
                                                            ?>
                                                            <tr class='AccuracyorTimeMeasurement'>
                                                                <td>
                                                                    <label class="form-check-label" for="c3_4" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                                                                        <?php
                                                                        $t4ConformRes = "";
                                                                        if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_AccuracyOfATimeMeasurement->result->DQ_ConformanceResult->explanation->CharacterString) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_AccuracyOfATimeMeasurement->result->DQ_ConformanceResult->explanation->CharacterString != "") {
                                                                            $t4ConformRes = $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_AccuracyOfATimeMeasurement->result->DQ_ConformanceResult->explanation->CharacterString;
                                                                        }
                                                                        ?>
                                                                        <b>Conformance Result:</b>
                                                                        <input type="text" name="c15_t4_conform_result" id="c15_t4_conform_result" class="form-control form-control-sm" value="{{$t4ConformRes}}">
                                                                    </label>
                                                                </td>
                                                            </tr>
                                                            <?php
                                                        }
                                                        if($key == "c15_t4_scope_2"){
                                                            ?>
                                                            <tr class='TemporalConsistency'>
                                                                <td>
                                                                    <label class="form-check-label" for="c15_t4_scope_2" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                                                                        <?php
                                                                        $t4Scope = "";
                                                                        if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_TemporalConsistency->TemporalConsistencyScope->TemporalConsistencyItem->CharacterString) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_TemporalConsistency->TemporalConsistencyScope->TemporalConsistencyItem->CharacterString != "") {
                                                                            $t4Scope = trim($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_TemporalConsistency->TemporalConsistencyScope->TemporalConsistencyItem->CharacterString);
                                                                        }
                                                                        ?>
                                                                        <b>Scope:</b>
                                                                        <select name="c15_t4_scope_2" id="c15_t4_scope_2" class="form-control form-control-sm">
                                                                            <option value="">Pilih...</option>
                                                                            <option value="Aeronautical" {{($t4Scope == 'Aeronautical' ? "selected":"")}}>Aeronautical</option>
                                                                            <option value="Built Environment" {{($t4Scope == 'Built Environment' ? "selected":"")}}>Built Environment</option>
                                                                            <option value="Demarcation" {{($t4Scope == 'Demarcation' ? "selected":"")}}>Demarcation</option>
                                                                            <option value="General" {{($t4Scope == 'General' ? "selected":"")}}>General</option>
                                                                            <option value="Geology" {{($t4Scope == 'Geology' ? "selected":"")}}>Geology</option>
                                                                            <option value="Hydrography" {{($t4Scope == 'Hydrography' ? "selected":"")}}>Hydrography</option>
                                                                            <option value="Hypsography" {{($t4Scope == 'Hypsography' ? "selected":"")}}>Hypsography</option>
                                                                            <option value="Soil" {{($t4Scope == 'Soil' ? "selected":"")}}>Soil</option>
                                                                            <option value="Special Use" {{($t4Scope == 'Special Use' ? "selected":"")}}>Special Use</option>
                                                                            <option value="Transportation" {{($t4Scope == 'Transportation' ? "selected":"")}}>Transportation</option>
                                                                            <option value="Utility" {{($t4Scope == 'Utility' ? "selected":"")}}>Utility</option>
                                                                            <option value="Vegetation" {{($t4Scope == 'Vegetation' ? "selected":"")}}>Vegetation</option>
                                                                        </select>
                                                                    </label>
                                                                </td>
                                                            </tr>
                                                            <?php
                                                        }
                                                        if($key == "c15_t4_comply_level_2"){
                                                            ?>
                                                            <tr class='TemporalConsistency'>
                                                                <td>
                                                                    <label class="form-check-label" for="c15_t4_comply_level_2" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                                                                        <?php
                                                                        $t4CompLvl = "";
                                                                        if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_TemporalConsistency->TemporalConsistencyLevel->CharacterString) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_TemporalConsistency->TemporalConsistencyLevel->CharacterString != "") {
                                                                            $t4CompLvl = $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_TemporalConsistency->TemporalConsistencyLevel->CharacterString;
                                                                        }
                                                                        ?>
                                                                        <b>Compliance Level:</b>
                                                                        <input type="text" name="c15_t4_comply_level_2" id="c15_t4_comply_level_2" class="form-control form-control-sm" value="{{$t4CompLvl}}">
                                                                    </label>
                                                                </td>
                                                            </tr>
                                                            <?php
                                                        }
                                                        if($key == "c15_t4_date_2"){
                                                            ?>
                                                            <tr class='TemporalConsistency'>
                                                                <td>
                                                                    <label class="form-check-label" for="c15_t4_date_2" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                                                                        <?php
                                                                        $t4Date = "";
                                                                        if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_TemporalConsistency->dateTime->Date) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_TemporalConsistency->dateTime->Date != "") {
                                                                            $t4Date = $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_TemporalConsistency->dateTime->Date;
                                                                        }
                                                                        ?>
                                                                        <b>Date:</b>
                                                                        <input type="date" name="c15_t4_date_2" id="c15_t4_date_2" class="form-control form-control-sm" value="{{$t4Date}}">
                                                                    </label>
                                                                </td>
                                                            </tr>
                                                            <?php
                                                        }
                                                        if($key == "c15_t4_result_2"){
                                                            ?>
                                                            <tr class='TemporalConsistency'>
                                                                <td>
                                                                    <label class="form-check-label" for="c15_t4_result_2" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                                                                        <?php
                                                                        $t4Res = "";
                                                                        if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_TemporalConsistency->result->DQ_ConformanceResult->pass->Boolean) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_TemporalConsistency->result->DQ_ConformanceResult->pass->Boolean != "") {
                                                                            $t4Res = trim($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_TemporalConsistency->result->DQ_ConformanceResult->pass->Boolean);
                                                                        }
                                                                        ?>
                                                                        <b>Result:</b>
                                                                        <select name="c15_t4_result_2" id="c15_t4_result_2" class="form-control form-control-sm">
                                                                            <option value="">Pilih...</option>
                                                                            <option value="Pass" {{($t4Res == 'Pass' ? "selected":"")}}>Pass</option>
                                                                            <option value="Fail" {{($t4Res == 'Fail' ? "selected":"")}}>Fail</option>
                                                                            <option value="Not Relevant" {{($t4Res == 'Not Relevant' ? "selected":"")}}>Not Relevant</option>
                                                                        </select>
                                                                    </label>
                                                                </td>
                                                            </tr>
                                                            <?php
                                                        }
                                                        if($key == "c15_t4_conform_result_2"){
                                                            ?>
                                                            <tr class='TemporalConsistency'>
                                                                <td>
                                                                    <label class="form-check-label" for="c15_t4_conform_result_2" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                                                                        <?php
                                                                        $t4ConformRes = "";
                                                                        if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_TemporalConsistency->result->DQ_ConformanceResult->explanation->CharacterString) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_TemporalConsistency->result->DQ_ConformanceResult->explanation->CharacterString != "") {
                                                                            $t4ConformRes = $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_TemporalConsistency->result->DQ_ConformanceResult->explanation->CharacterString;
                                                                        }
                                                                        ?>
                                                                        <b>Conformance Result:</b>
                                                                        <input type="text" name="c15_t4_conform_result_2" id="c15_t4_conform_result_2" class="form-control form-control-sm" value="{{$t4ConformRes}}">
                                                                    </label>
                                                                </td>
                                                            </tr>
                                                            <?php
                                                        }
                                                        if($key == "c15_t4_scope_3"){
                                                            ?>
                                                            <tr class='TemporalValidity'>
                                                                <td>
                                                                    <label class="form-check-label" for="c15_t4_accuTimeMeasure_scope" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                                                                        <?php
                                                                        $t4Scope = "";
                                                                        if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_TemporalValidity->TemporalValidityScope->TemporalValidityItem->CharacterString) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_TemporalValidity->TemporalValidityScope->TemporalValidityItem->CharacterString != "") {
                                                                            $t4Scope = trim($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_TemporalValidity->TemporalValidityScope->TemporalValidityItem->CharacterString);
                                                                        }
                                                                        ?>
                                                                        <b>Scope:</b>
                                                                        <select name="c15_t4_scope_3" id="c15_t4_scope_3" class="form-control form-control-sm">
                                                                            <option value="">Pilih...</option>
                                                                            <option value="Aeronautical" {{($t4Scope == 'Aeronautical' ? "selected":"")}}>Aeronautical</option>
                                                                            <option value="Built Environment" {{($t4Scope == 'Built Environment' ? "selected":"")}}>Built Environment</option>
                                                                            <option value="Demarcation" {{($t4Scope == 'Demarcation' ? "selected":"")}}>Demarcation</option>
                                                                            <option value="General" {{($t4Scope == 'General' ? "selected":"")}}>General</option>
                                                                            <option value="Geology" {{($t4Scope == 'Geology' ? "selected":"")}}>Geology</option>
                                                                            <option value="Hydrography" {{($t4Scope == 'Hydrography' ? "selected":"")}}>Hydrography</option>
                                                                            <option value="Hypsography" {{($t4Scope == 'Hypsography' ? "selected":"")}}>Hypsography</option>
                                                                            <option value="Soil" {{($t4Scope == 'Soil' ? "selected":"")}}>Soil</option>
                                                                            <option value="Special Use" {{($t4Scope == 'Special Use' ? "selected":"")}}>Special Use</option>
                                                                            <option value="Transportation" {{($t4Scope == 'Transportation' ? "selected":"")}}>Transportation</option>
                                                                            <option value="Utility" {{($t4Scope == 'Utility' ? "selected":"")}}>Utility</option>
                                                                            <option value="Vegetation" {{($t4Scope == 'Vegetation' ? "selected":"")}}>Vegetation</option>
                                                                        </select>
                                                                    </label>
                                                                </td>
                                                            </tr>
                                                            <?php
                                                        }
                                                        if($key == "c15_t4_comply_level_3"){
                                                            ?>
                                                            <tr class='TemporalValidity'>
                                                                <td>
                                                                    <label class="form-check-label" for="c15_t4_comply_level_3" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                                                                        <?php
                                                                        $t4CompLvl = "";
                                                                        if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_TemporalValidity->TemporalValidityLevel->CharacterString) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_TemporalValidity->TemporalValidityLevel->CharacterString != "") {
                                                                            $t4CompLvl = $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_TemporalValidity->TemporalValidityLevel->CharacterString;
                                                                        }
                                                                        ?>
                                                                        <b>Compliance Level:</b>
                                                                        <input type="text" name="c15_t4_comply_level_3" id="c15_t4_comply_level_3" class="form-control form-control-sm" value="{{$t4CompLvl}}">
                                                                    </label>
                                                                </td>
                                                            </tr>
                                                            <?php
                                                        }
                                                        if($key == "c15_t4_date_3"){
                                                            ?>
                                                            <tr class='TemporalValidity'>
                                                                <td>
                                                                    <label class="form-check-label" for="c15_t4_date_3" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                                                                        <?php
                                                                        $t4Date = "";
                                                                        if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_TemporalValidity->dateTime->Date) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_TemporalValidity->dateTime->Date != "") {
                                                                            $t4Date = $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_TemporalValidity->dateTime->Date;
                                                                        }
                                                                        ?>
                                                                        <b>Date:</b>
                                                                        <input type="date" name="c15_t4_date_3" id="c15_t4_date_3" class="form-control form-control-sm" value="{{$t4Date}}">
                                                                    </label>
                                                                </td>
                                                            </tr>
                                                            <?php
                                                        }
                                                        if($key == "c15_t4_result_3"){
                                                            ?>
                                                            <tr class='TemporalValidity'>
                                                                <td>
                                                                    <label class="form-check-label" for="c15_t4_result_3" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                                                                        <?php
                                                                        $t4Res = "";
                                                                        if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_TemporalValidity->result->DQ_ConformanceResult->pass->Boolean) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_TemporalValidity->result->DQ_ConformanceResult->pass->Boolean != "") {
                                                                            $t4Res = trim($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_TemporalValidity->result->DQ_ConformanceResult->pass->Boolean);
                                                                        }
                                                                        ?>
                                                                        <b>Result:</b>
                                                                        <select name="c15_t4_result_3" id="c15_t4_result_3" class="form-control form-control-sm">
                                                                            <option value="">Pilih...</option>
                                                                            <option value="Pass" {{($t4Res == 'Pass' ? "selected":"")}}>Pass</option>
                                                                            <option value="Fail" {{($t4Res == 'Fail' ? "selected":"")}}>Fail</option>
                                                                            <option value="Not Relevant" {{($t4Res == 'Not Relevant' ? "selected":"")}}>Not Relevant</option>
                                                                        </select>
                                                                    </label>
                                                                </td>
                                                            </tr>
                                                            <?php
                                                        }
                                                        if($key == "c15_t4_conform_result_3"){
                                                            ?>
                                                            <tr class='TemporalValidity'>
                                                                <td>
                                                                    <label class="form-check-label" for="c15_t4_conform_result_3" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                                                                        <?php
                                                                        $t4ConformRes = "";
                                                                        if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_TemporalValidity->result->DQ_ConformanceResult->explanation->CharacterString) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_TemporalValidity->result->DQ_ConformanceResult->explanation->CharacterString != "") {
                                                                            $t4ConformRes = $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_TemporalValidity->result->DQ_ConformanceResult->explanation->CharacterString;
                                                                        }
                                                                        ?>
                                                                        <b>Conformance Result:</b>
                                                                        <input type="text" name="c15_t4_conform_result_3" id="c15_t4_conform_result_3" class="form-control form-control-sm" value="{{$t4ConformRes}}">
                                                                    </label>
                                                                </td>
                                                            </tr>
                                                            <?php
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
                                                        <?php
                                                        $radio5 = "";
                                                        if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_ThematicClassificationCorrectness) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_ThematicClassificationCorrectness != "") {
                                                            $radio5 = trim($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_ThematicClassificationCorrectness);
                                                        }
                                                        ?>
                                                        <td>
                                                            <label class="form-check-label" for="c15_t5_type" style="margin-right:50px;">
                                                                <input type="radio" name="c15_t5_type" value="Classification Correctness" checked>&nbsp;Classification Correctness
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
                                                            ?>
                                                            <tr class='classificationCorrectness'>
                                                                <td>
                                                                    <label class="form-check-label" for="c15_t5_classCorrect_scope" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                                                                        <?php
                                                                        $t5Scope = "";
                                                                        if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_ThematicClassificationCorrectness->ThematicClassificationCorrectnessScope->ThematicClassificationCorrectnessItem->CharacterString) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_ThematicClassificationCorrectness->ThematicClassificationCorrectnessScope->ThematicClassificationCorrectnessItem->CharacterString != "") {
                                                                            $t5Scope = trim($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_ThematicClassificationCorrectness->ThematicClassificationCorrectnessScope->ThematicClassificationCorrectnessItem->CharacterString);
                                                                        }
                                                                        ?>
                                                                        <b>Scope:</b>
                                                                        <select name="c15_t5_scope" id="c15_t5_scope" class="form-control form-control-sm">
                                                                            <option value="">Pilih...</option>
                                                                            <option value="Aeronautical" {{($t5Scope == 'Aeronautical' ? "selected":"")}}>Aeronautical</option>
                                                                            <option value="Built Environment" {{($t5Scope == 'Built Environment' ? "selected":"")}}>Built Environment</option>
                                                                            <option value="Demarcation" {{($t5Scope == 'Demarcation' ? "selected":"")}}>Demarcation</option>
                                                                            <option value="General" {{($t5Scope == 'General' ? "selected":"")}}>General</option>
                                                                            <option value="Geology" {{($t5Scope == 'feature' ? "selected":"")}}>Geology</option>
                                                                            <option value="Hydrography" {{($t5Scope == 'Hydrography' ? "selected":"")}}>Hydrography</option>
                                                                            <option value="Hypsography" {{($t5Scope == 'Hypsography' ? "selected":"")}}>Hypsography</option>
                                                                            <option value="Soil" {{($t5Scope == 'Soil' ? "selected":"")}}>Soil</option>
                                                                            <option value="Special Use" {{($t5Scope == 'Special Use' ? "selected":"")}}>Special Use</option>
                                                                            <option value="Transportation" {{($t5Scope == 'Transportation' ? "selected":"")}}>Transportation</option>
                                                                            <option value="Utility" {{($t5Scope == 'Utility' ? "selected":"")}}>Utility</option>
                                                                            <option value="Vegetation" {{($t5Scope == 'Vegetation' ? "selected":"")}}>Vegetation</option>
                                                                        </select>
                                                                    </label>
                                                                </td>
                                                            </tr>
                                                            <?php
                                                        }
                                                        if($key == "c15_t5_comply_level"){
                                                            ?>
                                                            <tr class='classificationCorrectness'>
                                                                <td>
                                                                    <label class="form-check-label" for="c3_3" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                                                                        <?php
                                                                        $t5CompLvl = "";
                                                                        if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_ThematicClassificationCorrectness->ThematicClassificationCorrectnessLevel->CharacterString) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_ThematicClassificationCorrectness->ThematicClassificationCorrectnessLevel->CharacterString != "") {
                                                                            $t5CompLvl = $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_ThematicClassificationCorrectness->ThematicClassificationCorrectnessLevel->CharacterString;
                                                                        }
                                                                        ?>
                                                                        <b>Compliance Level:</b>
                                                                        <input type="text" name="c15_t5_comply_level" id="c15_t5_comply_level" class="form-control form-control-sm" value="{{$t5CompLvl}}">
                                                                    </label>
                                                                </td>
                                                            </tr>
                                                            <?php
                                                        }
                                                        if($key == "c15_t5_date"){
                                                            ?>
                                                            <tr class='classificationCorrectness'>
                                                                <td>
                                                                    <label class="form-check-label" for="c15_t5_classCorrect_date" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                                                                        <?php
                                                                        $t5Date = "";
                                                                        if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_ThematicClassificationCorrectness->dateTime->Date) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_ThematicClassificationCorrectness->dateTime->Date != "") {
                                                                            $t5Date = $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_ThematicClassificationCorrectness->dateTime->Date;
                                                                        }
                                                                        ?>
                                                                        <b>Date:</b>
                                                                        <input type="date" name="c15_t5_date" id="c15_t5_date" class="form-control form-control-sm" value="{{$t5Date}}">
                                                                    </label>
                                                                </td>
                                                            </tr>
                                                            <?php
                                                        }
                                                        if($key == "c15_t5_result"){
                                                            ?>
                                                            <tr class='classificationCorrectness'>
                                                                <td>
                                                                    <label class="form-check-label" for="c3_2" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                                                                        <?php
                                                                        $t5Res = "";
                                                                        if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_ThematicClassificationCorrectness->result->DQ_ConformanceResult->pass->Boolean) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_ThematicClassificationCorrectness->result->DQ_ConformanceResult->pass->Boolean != "") {
                                                                            $t5Res = trim($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_ThematicClassificationCorrectness->result->DQ_ConformanceResult->pass->Boolean);
                                                                        }
                                                                        ?>
                                                                        <b>Result:</b>
                                                                        <select name="c15_t5_result" id="c15_t5_result" class="form-control form-control-sm">
                                                                            <option value="">Pilih...</option>
                                                                            <option value="Pass" {{($t5Res == 'Pass' ? "selected":"")}}>Pass</option>
                                                                            <option value="Fail" {{($t5Res == 'Fail' ? "selected":"")}}>Fail</option>
                                                                            <option value="Not Relevant" {{($t5Res == 'Not Relevant' ? "selected":"")}}>Not Relevant</option>
                                                                        </select>
                                                                    </label>
                                                                </td>
                                                            </tr>
                                                            <?php
                                                        }
                                                        if($key == "c15_t5_conform_result"){
                                                            ?>
                                                            <tr class='classificationCorrectness'>
                                                                <td>
                                                                    <label class="form-check-label" for="c3_4" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                                                                        <?php
                                                                        $t5ConformRes = "";
                                                                        if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_ThematicClassificationCorrectness->result->DQ_ConformanceResult->explanation->CharacterString) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_ThematicClassificationCorrectness->result->DQ_ConformanceResult->explanation->CharacterString != "") {
                                                                            $t5ConformRes = $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_ThematicClassificationCorrectness->result->DQ_ConformanceResult->explanation->CharacterString;
                                                                        }
                                                                        ?>
                                                                        <b>Conformance Result:</b>
                                                                        <input type="text" name="c15_t5_conform_result" id="c15_t5_conform_result" class="form-control form-control-sm" value="{{$t5ConformRes}}">
                                                                    </label>
                                                                </td>
                                                            </tr>
                                                            <?php
                                                        }
                                                        if($key == "c15_t5_scope_2"){
                                                            ?>
                                                            <tr class='nonQuantitativeAttributeCorrectness'>
                                                                <td>
                                                                    <label class="form-check-label" for="c15_t5_scope_2" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                                                                        <?php
                                                                        $t5Scope = "";
                                                                        if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_NonQuantitativeAttributeAccuracy->NonQuantitativeAttributeAccuracyScope->NonQuantitativeAttributeAccuracyScopeItem->CharacterString) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_NonQuantitativeAttributeAccuracy->NonQuantitativeAttributeAccuracyScope->NonQuantitativeAttributeAccuracyScopeItem->CharacterString != "") {
                                                                            $t5Scope = trim($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_NonQuantitativeAttributeAccuracy->NonQuantitativeAttributeAccuracyScope->NonQuantitativeAttributeAccuracyScopeItem->CharacterString);
                                                                            echo $t5Scope;
                                                                        }
                                                                        ?>
                                                                        <b>Scope:</b>
                                                                        <select name="c15_t5_scope_2" id="c15_t5_scope_2" class="form-control form-control-sm">
                                                                            <option value="">Pilih...</option>
                                                                            <option value="Aeronautical" {{($t5Scope == 'Aeronautical' ? "selected":"")}}>Aeronautical</option>
                                                                            <option value="Built Environment" {{($t5Scope == 'Built Environment' ? "selected":"")}}>Built Environment</option>
                                                                            <option value="Demarcation" {{($t5Scope == 'Demarcation' ? "selected":"")}}>Demarcation</option>
                                                                            <option value="General" {{($t5Scope == 'General' ? "selected":"")}}>General</option>
                                                                            <option value="Geology" {{($t5Scope == 'feature' ? "selected":"")}}>Geology</option>
                                                                            <option value="Hydrography" {{($t5Scope == 'Hydrography' ? "selected":"")}}>Hydrography</option>
                                                                            <option value="Hypsography" {{($t5Scope == 'Hypsography' ? "selected":"")}}>Hypsography</option>
                                                                            <option value="Soil" {{($t5Scope == 'Soil' ? "selected":"")}}>Soil</option>
                                                                            <option value="Special Use" {{($t5Scope == 'Special Use' ? "selected":"")}}>Special Use</option>
                                                                            <option value="Transportation" {{($t5Scope == 'Transportation' ? "selected":"")}}>Transportation</option>
                                                                            <option value="Utility" {{($t5Scope == 'Utility' ? "selected":"")}}>Utility</option>
                                                                            <option value="Vegetation" {{($t5Scope == 'Vegetation' ? "selected":"")}}>Vegetation</option>
                                                                        </select>
                                                                    </label>
                                                                </td>
                                                            </tr>
                                                            <?php
                                                        }
                                                        if($key == "c15_t5_comply_level_2"){
                                                            ?>
                                                            <tr class='nonQuantitativeAttributeCorrectness'>
                                                                <td>
                                                                    <label class="form-check-label" for="c15_t5_comply_level_2" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                                                                        <?php
                                                                        $t5CompLvl = "";
                                                                        if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_NonQuantitativeAttributeAccuracy->NonQuantitativeAttributeAccuracyLevel->CharacterString) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_NonQuantitativeAttributeAccuracy->NonQuantitativeAttributeAccuracyLevel->CharacterString != "") {
                                                                            $t5CompLvl = $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_NonQuantitativeAttributeAccuracy->NonQuantitativeAttributeAccuracyLevel->CharacterString;
                                                                        }
                                                                        ?>
                                                                        <b>Compliance Level:</b>
                                                                        <input type="text" name="c15_t5_comply_level_2" id="c15_t5_comply_level_2" class="form-control form-control-sm" value="{{$t5CompLvl}}">
                                                                    </label>
                                                                </td>
                                                            </tr>
                                                            <?php
                                                        }
                                                        if($key == "c15_t5_date_2"){
                                                            ?>
                                                            <tr class='nonQuantitativeAttributeCorrectness'>
                                                                <td>
                                                                    <label class="form-check-label" for="c15_t5_date_2" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                                                                        <?php
                                                                        $t5Date = "";
                                                                        if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_NonQuantitativeAttributeAccuracy->dateTime->Date) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_NonQuantitativeAttributeAccuracy->dateTime->Date != "") {
                                                                            $t5Date = $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_NonQuantitativeAttributeAccuracy->dateTime->Date;
                                                                        }
                                                                        ?>
                                                                        <b>Date:</b>
                                                                        <input type="date" name="c15_t5_date_2" id="c15_t5_date_2" class="form-control form-control-sm" value="{{$t5Date}}">
                                                                    </label>
                                                                </td>
                                                            </tr>
                                                            <?php
                                                        }
                                                        if($key == "c15_t5_result_2"){
                                                            ?>
                                                            <tr class='nonQuantitativeAttributeCorrectness'>
                                                                <td>
                                                                    <label class="form-check-label" for="c15_t5_result_2" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                                                                        <?php
                                                                        $t5Res = "";
                                                                        if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_NonQuantitativeAttributeAccuracy->result->DQ_ConformanceResult->pass->Boolean) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_NonQuantitativeAttributeAccuracy->result->DQ_ConformanceResult->pass->Boolean != "") {
                                                                            $t5Res = trim($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_NonQuantitativeAttributeAccuracy->result->DQ_ConformanceResult->pass->Boolean);
                                                                        }
                                                                        ?>
                                                                        <b>Result:</b>
                                                                        <select name="c15_t5_result_2" id="c15_t5_result_2" class="form-control form-control-sm">
                                                                            <option value="">Pilih...</option>
                                                                            <option value="Pass" {{($t5Res == 'Pass' ? "selected":"")}}>Pass</option>
                                                                            <option value="Fail" {{($t5Res == 'Fail' ? "selected":"")}}>Fail</option>
                                                                            <option value="Not Relevant" {{($t5Res == 'Not Relevant' ? "selected":"")}}>Not Relevant</option>
                                                                        </select>
                                                                    </label>
                                                                </td>
                                                            </tr>
                                                            <?php
                                                        }
                                                        if($key == "c15_t5_conform_result_2"){
                                                            ?>
                                                            <tr class='nonQuantitativeAttributeCorrectness'>
                                                                <td>
                                                                    <label class="form-check-label" for="c15_t5_conform_result_2" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                                                                        <?php
                                                                        $t5ConformRes = "";
                                                                        if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_ThematicClassificationCorrectness->result->DQ_ConformanceResult->explanation->CharacterString) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_ThematicClassificationCorrectness->result->DQ_ConformanceResult->explanation->CharacterString != "") {
                                                                            $t5ConformRes = $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_ThematicClassificationCorrectness->result->DQ_ConformanceResult->explanation->CharacterString;
                                                                        }
                                                                        ?>
                                                                        <b>Conformance Result:</b>
                                                                        <input type="text" name="c15_t5_conform_result_2" id="c15_t5_conform_result_2" class="form-control form-control-sm" value="{{$t5ConformRes}}">
                                                                    </label>
                                                                </td>
                                                            </tr>
                                                            <?php
                                                        }
                                                        if($key == "c15_t5_scope_3"){
                                                            ?>
                                                            <tr class='quantitativeAttributeCorrectness'>
                                                                <td>
                                                                    <label class="form-check-label" for="c15_t5_scope_3" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                                                                        <?php
                                                                        $t5Scope = "";
                                                                        if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_QuantitativeAttributeAccuracy->QuantitativeAttributeAccuracyScope->QuantitativeAttributeAccuracyItem->CharacterString) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_QuantitativeAttributeAccuracy->QuantitativeAttributeAccuracyScope->QuantitativeAttributeAccuracyItem->CharacterString != "") {
                                                                            $t5Scope = trim($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_QuantitativeAttributeAccuracy->QuantitativeAttributeAccuracyScope->QuantitativeAttributeAccuracyItem->CharacterString);
                                                                            echo $t5Scope;
                                                                        }
                                                                        ?>
                                                                        <b>Scope:</b>
                                                                        <select name="c15_t5_scope_3" id="c15_t5_scope_3" class="form-control form-control-sm">
                                                                            <option value="">Pilih...</option>
                                                                            <option value="Aeronautical" {{($t5Scope == 'Aeronautical' ? "selected":"")}}>Aeronautical</option>
                                                                            <option value="Built Environment" {{($t5Scope == 'Built Environment' ? "selected":"")}}>Built Environment</option>
                                                                            <option value="Demarcation" {{($t5Scope == 'Demarcation' ? "selected":"")}}>Demarcation</option>
                                                                            <option value="General" {{($t5Scope == 'General' ? "selected":"")}}>General</option>
                                                                            <option value="Geology" {{($t5Scope == 'feature' ? "selected":"")}}>Geology</option>
                                                                            <option value="Hydrography" {{($t5Scope == 'Hydrography' ? "selected":"")}}>Hydrography</option>
                                                                            <option value="Hypsography" {{($t5Scope == 'Hypsography' ? "selected":"")}}>Hypsography</option>
                                                                            <option value="Soil" {{($t5Scope == 'Soil' ? "selected":"")}}>Soil</option>
                                                                            <option value="Special Use" {{($t5Scope == 'Special Use' ? "selected":"")}}>Special Use</option>
                                                                            <option value="Transportation" {{($t5Scope == 'Transportation' ? "selected":"")}}>Transportation</option>
                                                                            <option value="Utility" {{($t5Scope == 'Utility' ? "selected":"")}}>Utility</option>
                                                                            <option value="Vegetation" {{($t5Scope == 'Vegetation' ? "selected":"")}}>Vegetation</option>
                                                                        </select>
                                                                    </label>
                                                                </td>
                                                            </tr>
                                                            <?php
                                                        }
                                                        if($key == "c15_t5_comply_level_3"){
                                                            ?>
                                                            <tr class='quantitativeAttributeCorrectness'>
                                                                <td>
                                                                    <label class="form-check-label" for="c15_t5_comply_level_3" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                                                                        <?php
                                                                        $t5CompLvl = "";
                                                                        if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_QuantitativeAttributeAccuracy->QuantitativeAttributeAccuracyLevel->CharacterString) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_QuantitativeAttributeAccuracy->QuantitativeAttributeAccuracyLevel->CharacterString != "") {
                                                                            $t5CompLvl = $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_QuantitativeAttributeAccuracy->QuantitativeAttributeAccuracyLevel->CharacterString;
                                                                        }
                                                                        ?>
                                                                        <b>Compliance Level:</b>
                                                                        <input type="text" name="c15_t5_comply_level_3" id="c15_t5_comply_level_3" class="form-control form-control-sm" value="{{$t5CompLvl}}">
                                                                    </label>
                                                                </td>
                                                            </tr>
                                                            <?php
                                                        }
                                                        if($key == "c15_t5_date_3"){
                                                            ?>
                                                            <tr class='quantitativeAttributeCorrectness'>
                                                                <td>
                                                                    <label class="form-check-label" for="c15_t5_date_3" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                                                                        <?php
                                                                        $t5Date = "";
                                                                        if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_QuantitativeAttributeAccuracy->dateTime->Date) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_QuantitativeAttributeAccuracy->dateTime->Date != "") {
                                                                            $t5Date = $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_QuantitativeAttributeAccuracy->dateTime->Date;
                                                                        }
                                                                        ?>
                                                                        <b>Date:</b>
                                                                        <input type="date" name="c15_t5_date_3" id="c15_t5_date_3" class="form-control form-control-sm" value="{{$t5Date}}">
                                                                    </label>
                                                                </td>
                                                            </tr>
                                                            <?php
                                                        }
                                                        if($key == "c15_t5_result_3"){
                                                            ?>
                                                            <tr class='quantitativeAttributeCorrectness'>
                                                                <td>
                                                                    <label class="form-check-label" for="c15_t5_result_3" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                                                                        <?php
                                                                        $t5Res = "";
                                                                        if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_QuantitativeAttributeAccuracy->result->DQ_ConformanceResult->pass->Boolean) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_QuantitativeAttributeAccuracy->result->DQ_ConformanceResult->pass->Boolean != "") {
                                                                            $t5Res = trim($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_QuantitativeAttributeAccuracy->result->DQ_ConformanceResult->pass->Boolean);
                                                                        }
                                                                        ?>
                                                                        <b>Result:</b>
                                                                        <select name="c15_t5_result_3" id="c15_t5_result_3" class="form-control form-control-sm">
                                                                            <option value="">Pilih...</option>
                                                                            <option value="Pass" {{($t5Res == 'Pass' ? "selected":"")}}>Pass</option>
                                                                            <option value="Fail" {{($t5Res == 'Fail' ? "selected":"")}}>Fail</option>
                                                                            <option value="Not Relevant" {{($t5Res == 'Not Relevant' ? "selected":"")}}>Not Relevant</option>
                                                                        </select>
                                                                    </label>
                                                                </td>
                                                            </tr>
                                                            <?php
                                                        }
                                                        if($key == "c15_t5_conform_result_3"){
                                                            ?>
                                                            <tr class='quantitativeAttributeCorrectness'>
                                                                <td>
                                                                    <label class="form-check-label" for="c15_t5_conform_result_3" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                                                                        <?php
                                                                        $t5ConformRes = "";
                                                                        if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_QuantitativeAttributeAccuracy->result->DQ_ConformanceResult->explanation->CharacterString) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_QuantitativeAttributeAccuracy->result->DQ_ConformanceResult->explanation->CharacterString != "") {
                                                                            $t5ConformRes = $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_QuantitativeAttributeAccuracy->result->DQ_ConformanceResult->explanation->CharacterString;
                                                                        }
                                                                        ?>
                                                                        <b>Conformance Result:</b>
                                                                        <input type="text" name="c15_t5_conform_result_3" id="c15_t5_conform_result_3" class="form-control form-control-sm" value="{{$t5ConformRes}}">
                                                                    </label>
                                                                </td>
                                                            </tr>
                                                            <?php
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
    $(document).ready(function(){
        //t1
        $('.Completeness_Commission').hide();
        $('.Completeness_Omission').hide();
//        $("#completeness_comission").prop("checked", true);
        //t2
        $('.Conceptual').hide();
        $('.Domain').hide();
        $('.Format').hide();
        $('.Topological').hide();
//        $("#conceptual").prop("checked", true);
        //t3
        $('.AbsoluteorExternal').hide();
        $('.RelativeorInternal').hide();
        $('.GriddedData').hide();
//        $("#AbsoluteOrExternal").prop("checked", true);
        //t4
        $('.AccuracyorTimeMeasurement').hide();
        $('.TemporalConsistency').hide();
        $('.TemporalValidity').hide();
//        $("#AccuracyorTimeMeasurement").prop("checked", true);
        //t5
        $('.classificationCorrectness').hide();
        $('.nonQuantitativeAttributeCorrectness').hide();
        $('.quantitativeAttributeCorrectness').hide();
//        $("#ClassificationCorrectness").prop("checked", true);
    });
    
    $('input:radio[name="c15_t1_complete_comm_or_omit"]').change(function() {
        if ($(this).val() == 'Completeness Commission') {
            $('.Completeness_Commission').show();
            $('.Completeness_Omission').hide();
        } else if ($(this).val() == 'Completeness Omission') {
            $('.Completeness_Commission').hide();
            $('.Completeness_Omission').show();
        }
    });
    $('input:radio[name="c15_t2_type"]').change(function() {
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
    $('input:radio[name="c15_t3_type"]').change(function() {
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
    $('input:radio[name="c15_t4_type"]').change(function() {
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
