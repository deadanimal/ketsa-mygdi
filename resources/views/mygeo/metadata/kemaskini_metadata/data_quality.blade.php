<div class="card card-primary mb-4 div_c15" id="div_c15">
    <div class="card-header">
        <a href="#collapse15" data-toggle="collapse">
            <h4 class="card-title">
                <?php echo __('lang.accord_15'); ?>
            </h4>
        </a>
        @if(auth::user()->hasRole(['Penerbit Metadata']) && $metadataSearched->disahkan == "no")
        <button type="button" class="btn btn-secondary float-right" data-toggle="modal" data-target="#modal15">Catatan</button>
        @elseif(auth::user()->hasRole(['Pengesah Metadata','Super Admin']))
        <button type="button" class="btn btn-secondary float-right" data-toggle="modal" data-target="#modal15">Catatan</button>
        @endif
    </div>
    <div id="collapse15" class="panel-collapse collapse in show" data-parent="#div_c15">
        <div class="card-body">
            <div class="form-group row col-xl-6">
                <b>Data Quality Information</b>
            </div>
            <div class="pl-lg-2">
                <div class="row mb-2">
                    <div class="col-xl-1">
                        <label class="form-control-label" for="input-DQscope">
                            DQ Scope
                        </label>
                    </div>
                    <div class="col-xl-3">
                        <?php
                        $dqScope = "";
                        if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->scope->DQ_Scope->level) && $metadataxml->dataQualityInfo->DQ_DataQuality->scope->DQ_Scope->level != "") {
                            $dqScope = trim($metadataxml->dataQualityInfo->DQ_DataQuality->scope->DQ_Scope->level);
                        }
                        ?>
                        <select name="c15_data_quality_info" id="c15_data_quality_info" style="max-width: 100%;" class="form-control form-control-sm">
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
                    <div class="col-xl-2">
                        <label class="form-control-label float-right" for="input-datahistory">
                            Data History</label>
                    </div>
                    <div class="col-md-2">
                        <?php
                        $dataHist = "";
                        if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->lineage->LI_Lineage->statement) && $metadataxml->dataQualityInfo->DQ_DataQuality->lineage->LI_Lineage->statement != "") {
                            $dataHist = $metadataxml->dataQualityInfo->DQ_DataQuality->lineage->LI_Lineage->statement;
                        }
                        ?>
                        <input class="form-control form-control-sm" type="text" name="c15_data_history" id="c15_data_history" placeholder="None" value="{{ $dataHist }}">
                    </div>
                    <div class="col-xl-1">
                        <label class="form-control-label  float-right" for="input-date">
                            Date
                        </label>
                    </div>
                    <div class="col-xl-3">
                        <?php
                        $dqDate = "";
                        if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_Element->dateTime->Date) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_Element->dateTime->Date != "") {
                            $dqDate = trim($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_Element->dateTime->Date);
                        }
                        ?>
                        <input type="date" name="c15_date" id="c15_date" class="form-control form-control-sm" value="{{ $dqDate }}">
                    </div>
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
                                                            <label class="form-check-label" for="c15_t1_complete_comm_or_omit">
                                                                <input type="radio" name="c15_t1_complete_comm_or_omit" value='Completeness Commission' {{($radio1 == 'Completeness Commission' ? 'checked="checked"':'')}}>&nbsp;Completeness Commission
                                                            </label>
                                                        </td>
                                                        <td>
                                                            <label class="form-check-label" for="c15_t1_complete_comm_or_omit">
                                                                <input type="radio" name="c15_t1_complete_comm_or_omit" value='Completeness Omission' {{($radio1 == 'Completeness Omission' ? 'checked="checked"':'')}}>&nbsp;Completeness Omission
                                                            </label>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <label class="form-check-label" for="c3_1">
                                                                <b>Scope:</b>
                                                                <?php
                                                                $t1Scope = "";
                                                                if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_CompletenessOmission->compOmissScope) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_CompletenessOmission->compOmissScope != "") {
                                                                    $t1Scope = trim($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_CompletenessOmission->compOmissScope);
                                                                }
                                                                ?>
                                                                <select name="c15_t1_scope" id="c15_t1_scope" class="form-control">
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
                                                    <tr>
                                                        <td>
                                                            <label class="form-check-label" for="c3_3">
                                                                <b>Compliance Level:</b>
                                                                <?php
                                                                $compLvl = "";
                                                                if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_CompletenessCommission->compCommissComplLevel) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_CompletenessCommission->compCommissComplLevel != "") {
                                                                    $compLvl = $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_CompletenessCommission->compCommissComplLevel;
                                                                }
                                                                ?>
                                                                <input type="text" name="c15_t1_comply_level" id="c15_t1_comply_level" class="form-control" value="{{ $compLvl }}">
                                                            </label>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <label class="form-check-label" for="c15_t1_commission_date">
                                                                <b>Date:</b>
                                                                <?php
                                                                $t1Date = "";
                                                                if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_CompletenessCommission->dateTime->Date) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_CompletenessCommission->dateTime->Date != "") {
                                                                    $t1Date = $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_CompletenessCommission->dateTime->Date;
                                                                }
                                                                ?>
                                                                <input type="date" name="c15_t1_date" id="c15_t1_date" class="form-control" value="{{ $t1Date }}">
                                                            </label>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <label class="form-check-label" for="c3_2">
                                                                <b>Result:</b>
                                                                <?php
                                                                $t1Res = "";
                                                                if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_CompletenessCommission->result->DQ_ConformanceResult->pass) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_CompletenessCommission->result->DQ_ConformanceResult->pass != "") {
                                                                    $t1Res = trim($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_CompletenessCommission->result->DQ_ConformanceResult->pass);
                                                                }
                                                                ?>
                                                                <select name="c15_t1_result" id="c15_t1_result" class="form-control">
                                                                    <option value="Pass" {{($t1Res == 'Pass' ? "selected":"")}}>Pass</option>
                                                                    <option value="Fail" {{($t1Res == 'Fail' ? "selected":"")}}>Fail</option>
                                                                    <option value="Not Relevant" {{($t1Res == 'Not Relevant' ? "selected":"")}}>Not Relevant</option>
                                                                </select>
                                                            </label>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <label class="form-check-label" for="c3_4">
                                                                <b>Conformance Result:</b>
                                                                <?php
                                                                $conformRes = "";
                                                                if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_CompletenessCommission->result->DQ_ConformanceResult->explanation) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_CompletenessCommission->result->DQ_ConformanceResult->explanation != "") {
                                                                    $conformRes = $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_CompletenessCommission->result->DQ_ConformanceResult->explanation;
                                                                }
                                                                ?>
                                                                <input type="text" name="c15_t1_conform_result" id="c15_t1_conform_result" class="form-control" value="{{ $conformRes }}">
                                                            </label>
                                                        </td>
                                                    </tr>
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
                                                            <label class="form-check-label" for="c15_t2_type">
                                                                <input type="radio" name="c15_t2_type" value="Conceptual" {{($radio2 == 'Conceptual' ? 'checked="checked"':'')}}>&nbsp;Conceptual
                                                            </label>
                                                        </td>
                                                        <td>
                                                            <label class="form-check-label" for="c15_t2_type">
                                                                <input type="radio" name="c15_t2_type" value="Domain" {{($radio2 == 'Domain' ? 'checked="checked"':'')}}>&nbsp;Domain
                                                            </label>
                                                        </td>
                                                        <td>
                                                            <label class="form-check-label" for="c15_t2_type">
                                                                <input type="radio" name="c15_t2_type" value="Format" {{($radio2 == 'Format' ? 'checked="checked"':'')}}>&nbsp;Format
                                                            </label>
                                                        </td>
                                                        <td>
                                                            <label class="form-check-label" for="c15_t2_type">
                                                                <input type="radio" name="c15_t2_type" value="Topological" {{($radio2 == 'Topological' ? 'checked="checked"':'')}}>&nbsp;Topological
                                                            </label>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <label class="form-check-label" for="c3_1">
                                                                <b>Scope:</b>
                                                                <?php
                                                                $t2Scope = "";
                                                                if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_ConceptualConsistency->consistConceptScope) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_ConceptualConsistency->consistConceptScope != "") {
                                                                    $t2Scope = trim($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_ConceptualConsistency->consistConceptScope);
                                                                }
                                                                ?>
                                                                <select name="c15_t2_scope" id="c15_t2_scope" class="form-control">
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
                                                    <tr>
                                                        <td>
                                                            <label class="form-check-label" for="c3_3">
                                                                <b>Compliance Level:</b>
                                                                <?php
                                                                $compLvl = "";
                                                                if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_ConceptualConsistency->compOmissLevel) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_ConceptualConsistency->compOmissLevel != "") {
                                                                    $compLvl = $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_ConceptualConsistency->compOmissLevel;
                                                                }
                                                                ?>
                                                                <input type="text" name="c15_t2_comply_level" id="c15_t2_comply_level" class="form-control" value="{{ $compLvl }}">
                                                            </label>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <label class="form-check-label" for="c15_t2_conceptual_date">
                                                                <b>Date:</b>
                                                                <?php
                                                                $t2Date = "";
                                                                if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_ConceptualConsistency->dateTime->Date) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_ConceptualConsistency->dateTime->Date != "") {
                                                                    $t2Date = $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_ConceptualConsistency->dateTime->Date;
                                                                }
                                                                ?>
                                                                <input type="date" name="c15_t2_date" id="c15_t2_date" class="form-control" value="{{ $t2Date }}">
                                                            </label>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <label class="form-check-label" for="c3_2">
                                                                <b>Result:</b>
                                                                <?php
                                                                $t2Res = "";
                                                                if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_ConceptualConsistency->result->DQ_ConformanceResult->pass) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_ConceptualConsistency->result->DQ_ConformanceResult->pass != "") {
                                                                    $t2Res = trim($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_ConceptualConsistency->result->DQ_ConformanceResult->pass);
                                                                }
                                                                ?>
                                                                <select name="c15_t2_result" id="c15_t2_result" class="form-control">
                                                                    <option value="Pass" {{($t2Res == 'Pass' ? "selected":"")}}>Pass</option>
                                                                    <option value="Fail" {{($t2Res == 'Fail' ? "selected":"")}}>Fail</option>
                                                                    <option value="Not Relevant" {{($t2Res == 'Not Relevant' ? "selected":"")}}>Not Relevant</option>
                                                                </select>
                                                            </label>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <label class="form-check-label" for="c3_4">
                                                                <b>Conformance Result:</b>
                                                                <?php
                                                                $t2ConformRes = "";
                                                                if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_ConceptualConsistency->result->DQ_ConformanceResult->explanation) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_ConceptualConsistency->result->DQ_ConformanceResult->explanation != "") {
                                                                    $t2ConformRes = $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_ConceptualConsistency->result->DQ_ConformanceResult->explanation;
                                                                }
                                                                ?>
                                                                <input type="text" name="c15_t2_conform_result" id="c15_t2_conform_result" class="form-control" value="{{ $t2ConformRes }}">
                                                            </label>
                                                        </td>
                                                    </tr>
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
                                                            <label class="form-check-label" for="c15_t3_type">
                                                                <input type="radio" name="c15_t3_type" value="Absolute or External" {{($radio3 == 'Absolute or External' ? 'checked="checked"':'')}}>&nbsp;Absolute or External
                                                            </label>
                                                        </td>
                                                        <td>
                                                            <label class="form-check-label" for="c15_t3_type">
                                                                <input type="radio" name="c15_t3_type" value="Relative or Internal" {{($radio3 == 'Relative or Internal' ? 'checked="checked"':'')}}>&nbsp;Relative or Internal
                                                            </label>
                                                        </td>
                                                        <td>
                                                            <label class="form-check-label" for="c15_t3_type">
                                                                <input type="radio" name="c15_t3_type" value="Gridded Data" {{($radio3 == 'Gridded Data' ? 'checked="checked"':'')}}>&nbsp;Gridded Data
                                                            </label>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <label class="form-check-label" for="c3_1">
                                                                <b>Scope:</b>
                                                                <?php
                                                                $t3Scope = "";
                                                                if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_AbsoluteExternalPositionalAccuracy->posAccAbsoluteScope) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_AbsoluteExternalPositionalAccuracy->posAccAbsoluteScope != "") {
                                                                    $t3Scope = trim($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_AbsoluteExternalPositionalAccuracy->posAccAbsoluteScope);
                                                                }
                                                                ?>
                                                                <select name="c15_t3_scope" id="c15_t3_scope" class="form-control">
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
                                                    <tr>
                                                        <td>
                                                            <label class="form-check-label" for="c3_3">
                                                                <b>Compliance Level:</b>
                                                                <?php
                                                                $t3CompLvl = "";
                                                                if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_AbsoluteExternalPositionalAccuracy->compPosAccAbsoluteLevel) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_AbsoluteExternalPositionalAccuracy->compPosAccAbsoluteLevel != "") {
                                                                    $t3CompLvl = $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_AbsoluteExternalPositionalAccuracy->compPosAccAbsoluteLevel;
                                                                }
                                                                ?>
                                                                <input type="text" name="c15_t3_comply_level" id="c15_t3_comply_level" class="form-control" value="{{ $t3CompLvl }}">
                                                            </label>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <label class="form-check-label" for="c15_t3_absExt_date">
                                                                <b>Date:</b>
                                                                <?php
                                                                $t3Date = "";
                                                                if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_AbsoluteExternalPositionalAccuracy->dateTime->Date) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_AbsoluteExternalPositionalAccuracy->dateTime->Date != "") {
                                                                    $t3Date = $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_AbsoluteExternalPositionalAccuracy->dateTime->Date;
                                                                }
                                                                ?>
                                                                <input type="date" name="c15_t3_date" id="c15_t3_date" class="form-control" value="{{ $t3Date }}">
                                        </div>
                                        </label>
                                        </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <label class="form-check-label" for="c3_2">
                                                    <b>Result:</b>
                                                    <?php
                                                    $t3Res = "";
                                                    if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_AbsoluteExternalPositionalAccuracy->result->DQ_ConformanceResult->pass) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_AbsoluteExternalPositionalAccuracy->result->DQ_ConformanceResult->pass != "") {
                                                        $t3Res = trim($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_AbsoluteExternalPositionalAccuracy->result->DQ_ConformanceResult->pass);
                                                    }
                                                    ?>
                                                    <select name="c15_t3_result" id="c15_t3_result" class="form-control">
                                                        <option value="Pass" {{($t3Res == 'Pass' ? "selected":"")}}>Pass</option>
                                                        <option value="Fail" {{($t3Res == 'Fail' ? "selected":"")}}>Fail</option>
                                                        <option value="Not Relevant" {{($t3Res == 'Not Relevant' ? "selected":"")}}>Not Relevant</option>
                                                    </select>
                                                </label>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <label class="form-check-label" for="c3_4">
                                                    <b>Conformance Result:</b>
                                                    <?php
                                                    $t3ConformRes = "";
                                                    if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_AbsoluteExternalPositionalAccuracy->result->DQ_ConformanceResult->explanation) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_AbsoluteExternalPositionalAccuracy->result->DQ_ConformanceResult->explanation != "") {
                                                        $t3ConformRes = $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_AbsoluteExternalPositionalAccuracy->result->DQ_ConformanceResult->explanation;
                                                    }
                                                    ?>
                                                    <input type="text" name="c15_t3_conform_result" id="c15_t3_conform_result" class="form-control" value="{{ $t3ConformRes }}">
                                                </label>
                                            </td>
                                        </tr>
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
                                                        <label class="form-check-label" for="c15_t4_type">
                                                            <input type="radio" name="c15_t4_type" value="Accuracy or Time Measurement" {{($radio4 == 'Accuracy or Time Measurement' ? 'checked="checked"':'')}}>&nbsp;Accuracy or Time Measurement
                                                        </label>
                                                    </td>
                                                    <td>
                                                        <label class="form-check-label" for="c15_t4_type">
                                                            <input type="radio" name="c15_t4_type" value="Temporal Consistency" {{($radio4 == 'Temporal Consistency' ? 'checked="checked"':'')}}>&nbsp;Temporal Consistency
                                                        </label>
                                                    </td>
                                                    <td>
                                                        <label class="form-check-label" for="c15_t4_type">
                                                            <input type="radio" name="c15_t4_type" value="Temporal Validity" {{($radio4 == 'Temporal Validity' ? 'checked="checked"':'')}}>&nbsp;Temporal Validity
                                                        </label>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <label class="form-check-label" for="c15_t4_accuTimeMeasure_scope">
                                                            <b>Scope:</b>
                                                            <?php
                                                            $t4Scope = "";
                                                            if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_AccuracyOfATimeMeasurement->AccuracyOfATimeMeasurementScope) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_AccuracyOfATimeMeasurement->AccuracyOfATimeMeasurementScope != "") {
                                                                $t4Scope = trim($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_AccuracyOfATimeMeasurement->AccuracyOfATimeMeasurementScope);
                                                            }
                                                            ?>
                                                            <select name="c15_t4_scope" id="c15_t4_scope" class="form-control">
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
                                                <tr>
                                                    <td>
                                                        <label class="form-check-label" for="c3_3">
                                                            <b>Compliance Level:</b>
                                                            <?php
                                                            $t4CompLvl = "";
                                                            if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_AccuracyOfATimeMeasurement->AccuracyOfATimeMeasurementLevel) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_AccuracyOfATimeMeasurement->AccuracyOfATimeMeasurementLevel != "") {
                                                                $t4CompLvl = $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_AccuracyOfATimeMeasurement->AccuracyOfATimeMeasurementLevel;
                                                            }
                                                            ?>
                                                            <input type="text" name="c15_t4_comply_level" id="c15_t4_comply_level" class="form-control" value="{{ $t4CompLvl }}">
                                                        </label>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <label class="form-check-label" for="c15_t4_accuTimeMeasure_date">
                                                            <b>Date:</b>
                                                            <?php
                                                            $t4Date = "";
                                                            if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_AccuracyOfATimeMeasurement->dateTime->Date) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_AccuracyOfATimeMeasurement->dateTime->Date != "") {
                                                                $t4Date = $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_AccuracyOfATimeMeasurement->dateTime->Date;
                                                            }
                                                            ?>
                                                            <input type="date" name="c15_t4_date" id="c15_t4_date" class="form-control" value="{{ $t4Date }}">
                                                        </label>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <label class="form-check-label" for="c3_2">
                                                            <b>Result:</b>
                                                            <?php
                                                            $t4Res = "";
                                                            if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_AccuracyOfATimeMeasurement->result->DQ_ConformanceResult->pass) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_AccuracyOfATimeMeasurement->result->DQ_ConformanceResult->pass != "") {
                                                                $t4Res = trim($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_AccuracyOfATimeMeasurement->result->DQ_ConformanceResult->pass);
                                                            }
                                                            ?>
                                                            <select name="c15_t4_result" id="c15_t4_result" class="form-control">
                                                                <option value="Pass" {{($t4Res == 'Pass' ? "selected":"")}}>Pass</option>
                                                                <option value="Fail" {{($t4Res == 'Fail' ? "selected":"")}}>Fail</option>
                                                                <option value="Not Relevant" {{($t4Res == 'Not Relevant' ? "selected":"")}}>Not Relevant</option>
                                                            </select>
                                                        </label>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <label class="form-check-label" for="c3_4">
                                                            <b>Conformance Result:</b>
                                                            <?php
                                                            $t4ConformRes = "";
                                                            if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_AccuracyOfATimeMeasurement->result->DQ_ConformanceResult->explanation) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_AccuracyOfATimeMeasurement->result->DQ_ConformanceResult->explanation != "") {
                                                                $t4ConformRes = $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_AccuracyOfATimeMeasurement->result->DQ_ConformanceResult->explanation;
                                                            }
                                                            ?>
                                                            <input type="text" name="c15_t4_conform_result" id="c15_t4_conform_result" class="form-control" value="{{ $t4ConformRes }}">
                                                        </label>
                                                    </td>
                                                </tr>
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
                                                        <label class="form-check-label" for="c15_t5_type">
                                                            <input type="radio" name="c15_t5_type" value="Classification Correctness" {{($radio5 == 'Classification Correctness' ? 'checked="checked"':'')}}>&nbsp;Classification Correctness
                                                        </label>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <label class="form-check-label" for="c15_t5_classCorrect_scope">
                                                            <b>Scope:</b>
                                                            <?php
                                                            $t5Scope = "";
                                                            if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_ThematicClassificationCorrectness->ThematicClassificationCorrectnessScope) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_ThematicClassificationCorrectness->ThematicClassificationCorrectnessScope != "") {
                                                                $t5Scope = trim($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_ThematicClassificationCorrectness->ThematicClassificationCorrectnessScope);
                                                                echo $t5Scope;
                                                            }
                                                            ?>
                                                            <select name="c15_t5_scope" id="c15_t5_scope" class="form-control">
                                                                <option value="Aeronautical" {{($t5Scope == 'Aeronautical' ? "selected":"")}}>Aeronautical</option>
                                                                <option value="Built Environment" {{($t5Scope == 'Built Environment' ? "selected":"")}}>Built Environment</option>
                                                                <option value="Demarcation" {{($t5Scope == 'Demarcation' ? "selected":"")}}>Demarcation</option>
                                                                <option value="General" {{($t5Scope == 'General' ? "selected":"")}}>General</option>
                                                                <option value="Geology" {{($t5Scope == 'Geology' ? "selected":"")}}>Geology</option>
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
                                                <tr>
                                                    <td>
                                                        <label class="form-check-label" for="c3_3">
                                                            <b>Compliance Level:</b>
                                                            <?php
                                                            $t5CompLvl = "";
                                                            if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_ThematicClassificationCorrectness->ThematicClassificationCorrectnessLevel) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_ThematicClassificationCorrectness->ThematicClassificationCorrectnessLevel != "") {
                                                                $t5CompLvl = $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_ThematicClassificationCorrectness->ThematicClassificationCorrectnessLevel;
                                                            }
                                                            ?>
                                                            <input type="text" name="c15_t5_comply_level" id="c15_t5_comply_level" class="form-control" value="{{ $t5CompLvl }}">
                                                        </label>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <label class="form-check-label" for="c15_t5_classCorrect_date">
                                                            <b>Date:</b>
                                                            <?php
                                                            $t5Date = "";
                                                            if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_ThematicClassificationCorrectness->dateTime->Date) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_ThematicClassificationCorrectness->dateTime->Date != "") {
                                                                $t5Date = $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_ThematicClassificationCorrectness->dateTime->Date;
                                                            }
                                                            ?>
                                                            <input type="date" name="c15_t5_date" id="c15_t5_date" class="form-control" value="{{ $t5Date }}">
                                                        </label>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <label class="form-check-label" for="c3_2">
                                                            <b>Result:</b>
                                                            <?php
                                                            $t5Res = "";
                                                            if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_ThematicClassificationCorrectness->result->DQ_ConformanceResult->pass) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_ThematicClassificationCorrectness->result->DQ_ConformanceResult->pass != "") {
                                                                $t5Res = trim($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_ThematicClassificationCorrectness->result->DQ_ConformanceResult->pass);
                                                            }
                                                            ?>
                                                            <select name="c15_t5_result" id="c15_t5_result" class="form-control">
                                                                <option value="Pass" {{($t5Res == 'Pass' ? "selected":"")}}>Pass</option>
                                                                <option value="Fail" {{($t5Res == 'Fail' ? "selected":"")}}>Fail</option>
                                                                <option value="Not Relevant" {{($t5Res == 'Not Relevant' ? "selected":"")}}>Not Relevant</option>
                                                            </select>
                                                        </label>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <label class="form-check-label" for="c3_4">
                                                            <b>Conformance Result:</b>
                                                            <?php
                                                            $t5ConformRes = "";
                                                            if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_ThematicClassificationCorrectness->result->DQ_ConformanceResult->explanation) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_ThematicClassificationCorrectness->result->DQ_ConformanceResult->explanation != "") {
                                                                $t5ConformRes = $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_ThematicClassificationCorrectness->result->DQ_ConformanceResult->explanation;
                                                            }
                                                            ?>
                                                            <input type="text" name="c15_t5_conform_result" id="c15_t5_conform_result" class="form-control" value="{{ $t5ConformRes }}">
                                                        </label>
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
