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
                        echo $dqScope;
                        ?>
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
                        echo $dataHist;
                        ?>
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
                        echo $dqDate;
                        ?>
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
                                                        <td>
                                                            <label class="form-check-label" for="c15_t1_complete_comm_or_omit">
                                                                <input type="radio" name="c15_t1_complete_comm_or_omit" id='completeness_comission' value='Completeness Commission' checked>&nbsp;Completeness Commission
                                                            </label>
                                                        </td>
                                                        <td>
                                                            <label class="form-check-label" for="c15_t1_complete_comm_or_omit">
                                                                <input type="radio" name="c15_t1_complete_comm_or_omit" value='Completeness Omission'>&nbsp;Completeness Omission
                                                            </label>
                                                        </td>
                                                    </tr>
                                                    <?php //================= ?>
                                                    <tr class="Completeness_Commission">
                                                        <td>
                                                            <label class="form-check-label" for="c3_1">
                                                                <b>Scope:</b>
                                                                <?php
                                                                $t1Scope = "";
                                                                if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_CompletenessCommission->compCommissScope) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_CompletenessCommission->compCommissScope != "") {
                                                                    $t1Scope = trim($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_CompletenessCommission->compCommissScope);
                                                                }
                                                                echo $t1Scope;
                                                                ?>
                                                            </label>
                                                        </td>
                                                    </tr>
                                                    <tr class="Completeness_Commission">
                                                        <td>
                                                            <label class="form-check-label" for="c3_3">
                                                                <b>Compliance Level:</b>
                                                                <?php
                                                                $compLvl = "";
                                                                if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_CompletenessCommission->compCommissComplLevel) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_CompletenessCommission->compCommissComplLevel != "") {
                                                                    $compLvl = $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_CompletenessCommission->compCommissComplLevel;
                                                                }
                                                                echo $compLvl;
                                                                ?>
                                                            </label>
                                                        </td>
                                                    </tr>
                                                    <tr class="Completeness_Commission">
                                                        <td>
                                                            <label class="form-check-label" for="c15_t1_commission_date">
                                                                <b>Date:</b>
                                                                <?php
                                                                $t1Date = "";
                                                                if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_CompletenessCommission->dateTime->Date) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_CompletenessCommission->dateTime->Date != "") {
                                                                    $t1Date = trim($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_CompletenessCommission->dateTime->Date);
                                                                }
                                                                echo $t1Date;
                                                                ?>
                                                            </label>
                                                        </td>
                                                    </tr>
                                                    <tr class="Completeness_Commission">
                                                        <td>
                                                            <label class="form-check-label" for="c3_2">
                                                                <b>Result:</b>
                                                                <?php
                                                                $t1Res = "";
                                                                if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_CompletenessCommission->result->DQ_ConformanceResult->pass) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_CompletenessCommission->result->DQ_ConformanceResult->pass != "") {
                                                                    $t1Res = trim($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_CompletenessCommission->result->DQ_ConformanceResult->pass);
                                                                }
                                                                echo $t1Res;
                                                                ?>
                                                            </label>
                                                        </td>
                                                    </tr>
                                                    <tr class="Completeness_Commission">
                                                        <td>
                                                            <label class="form-check-label" for="c15_t1_conform_result">
                                                                <b>Conformance Result:</b>
                                                                <?php
                                                                $conformRes = "";
                                                                if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_CompletenessCommission->result->DQ_ConformanceResult->explanation) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_CompletenessCommission->result->DQ_ConformanceResult->explanation != "") {
                                                                    $conformRes = $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_CompletenessCommission->result->DQ_ConformanceResult->explanation;
                                                                }
                                                                echo $conformRes;
                                                                ?>
                                                            </label>
                                                        </td>
                                                    </tr>
                                                    <?php //================= ?>
                                                    <tr class="Completeness_Omission">
                                                        <td>
                                                            <label class="form-check-label" for="c3_1">
                                                                <b>Scope:</b>
                                                                <?php
                                                                $t1Scope = "";
                                                                if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_CompletenessOmission->compOmissScope) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_CompletenessOmission->compOmissScope != "") {
                                                                    $t1Scope = trim($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_CompletenessOmission->compOmissScope);
                                                                }
                                                                echo $t1Scope;
                                                                ?>
                                                            </label>
                                                        </td>
                                                    </tr>
                                                    <tr class="Completeness_Omission">
                                                        <td>
                                                            <label class="form-check-label" for="c3_3">
                                                                <b>Compliance Level:</b>
                                                                <?php
                                                                $compLvl = "";
                                                                if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_CompletenessOmission->compOmissComplLevel) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_CompletenessOmission->compOmissComplLevel != "") {
                                                                    $compLvl = $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_CompletenessOmission->compOmissComplLevel;
                                                                }
                                                                echo $compLvl;
                                                                ?>
                                                            </label>
                                                        </td>
                                                    </tr>
                                                    <tr class="Completeness_Omission">
                                                        <td>
                                                            <label class="form-check-label" for="c15_t1_commission_date">
                                                                <b>Date:</b>
                                                                <?php
                                                                $t1Date = "";
                                                                if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_CompletenessOmission->dateTime->Date) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_CompletenessOmission->dateTime->Date != "") {
                                                                    $t1Date = $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_CompletenessOmission->dateTime->Date;
                                                                }
                                                                echo $t1Date;
                                                                ?>
                                                            </label>
                                                        </td>
                                                    </tr>
                                                    <tr class="Completeness_Omission">
                                                        <td>
                                                            <label class="form-check-label" for="c3_2">
                                                                <b>Result:</b>
                                                                <?php
                                                                $t1Res = "";
                                                                if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_CompletenessCommission->result->DQ_ConformanceResult->pass) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_CompletenessCommission->result->DQ_ConformanceResult->pass != "") {
                                                                    $t1Res = trim($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_CompletenessCommission->result->DQ_ConformanceResult->pass);
                                                                }
                                                                echo $t1Res;
                                                                ?>
                                                            </label>
                                                        </td>
                                                    </tr>
                                                    <tr class="Completeness_Omission">
                                                        <td>
                                                            <label class="form-check-label" for="c3_4">
                                                                <b>Conformance Result:</b>
                                                                <?php
                                                                $conformRes = "";
                                                                if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_CompletenessCommission->result->DQ_ConformanceResult->explanation) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_CompletenessCommission->result->DQ_ConformanceResult->explanation != "") {
                                                                    $conformRes = $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_CompletenessCommission->result->DQ_ConformanceResult->explanation;
                                                                }
                                                                echo $conformRes;
                                                                ?>
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
                                                        <td>
                                                            <label class="form-check-label" for="c15_t2_type">
                                                                <input type="radio" name="c15_t2_type" id='conceptual' value="Conceptual" checked>&nbsp;Conceptual
                                                            </label>
                                                        </td>
                                                        <td>
                                                            <label class="form-check-label" for="c15_t2_type">
                                                                <input type="radio" name="c15_t2_type" value="Domain">&nbsp;Domain
                                                            </label>
                                                        </td>
                                                        <td>
                                                            <label class="form-check-label" for="c15_t2_type">
                                                                <input type="radio" name="c15_t2_type" value="Format">&nbsp;Format
                                                            </label>
                                                        </td>
                                                        <td>
                                                            <label class="form-check-label" for="c15_t2_type">
                                                                <input type="radio" name="c15_t2_type" value="Topological">&nbsp;Topological
                                                            </label>
                                                        </td>
                                                    </tr>
                                                    <?php //================= ?>
                                                    <tr class='Conceptual'>
                                                        <td>
                                                            <label class="form-check-label" for="c15_t2_scope">
                                                                <b>Scope:</b>
                                                                <?php
                                                                $t2Scope = "";
                                                                if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_ConceptualConsistency->consistConceptScope) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_ConceptualConsistency->consistConceptScope != "") {
                                                                    $t2Scope = trim($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_ConceptualConsistency->consistConceptScope);
                                                                }
                                                                echo $t2Scope;
                                                                ?>
                                                            </label>
                                                        </td>
                                                    </tr>
                                                    <tr class='Conceptual'>
                                                        <td>
                                                            <label class="form-check-label" for="c15_t2_comply_level">
                                                                <b>Compliance Level:</b>
                                                                <?php
                                                                $compLvl = "";
                                                                if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_ConceptualConsistency->compOmissLevel) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_ConceptualConsistency->compOmissLevel != "") {
                                                                    $compLvl = $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_ConceptualConsistency->compOmissLevel;
                                                                }
                                                                echo $compLvl;
                                                                ?>
                                                            </label>
                                                        </td>
                                                    </tr>
                                                    <tr class='Conceptual'>
                                                        <td>
                                                            <label class="form-check-label" for="c15_t2_date">
                                                                <b>Date:</b>
                                                                <?php
                                                                $t2Date = "";
                                                                if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_ConceptualConsistency->dateTime->Date) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_ConceptualConsistency->dateTime->Date != "") {
                                                                    $t2Date = $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_ConceptualConsistency->dateTime->Date;
                                                                }
                                                                echo $t2Date;
                                                                ?>
                                                            </label>
                                                        </td>
                                                    </tr>
                                                    <tr class='Conceptual'>
                                                        <td>
                                                            <label class="form-check-label" for="c15_t2_result">
                                                                <b>Result:</b>
                                                                <?php
                                                                $t2Res = "";
                                                                if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_ConceptualConsistency->result->DQ_ConformanceResult->pass) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_ConceptualConsistency->result->DQ_ConformanceResult->pass != "") {
                                                                    $t2Res = trim($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_ConceptualConsistency->result->DQ_ConformanceResult->pass);
                                                                }
                                                                echo $t2Res;
                                                                ?>
                                                            </label>
                                                        </td>
                                                    </tr>
                                                    <tr class='Conceptual'>
                                                        <td>
                                                            <label class="form-check-label" for="c15_t2_conform_result">
                                                                <b>Conformance Result:</b>
                                                                <?php
                                                                $t2ConformRes = "";
                                                                if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_ConceptualConsistency->result->DQ_ConformanceResult->explanation) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_ConceptualConsistency->result->DQ_ConformanceResult->explanation != "") {
                                                                    $t2ConformRes = $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_ConceptualConsistency->result->DQ_ConformanceResult->explanation;
                                                                }
                                                                echo $t2ConformRes;
                                                                ?>
                                                            </label>
                                                        </td>
                                                    </tr>
                                                    <?php //================= ?>
                                                    <tr class='Domain'>
                                                        <td>
                                                            <label class="form-check-label" for="c3_1">
                                                                <b>Scope:</b>
                                                                <?php
                                                                $t2Scope = "";
                                                                if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_DomainConsistency->consistDomainScope) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_DomainConsistency->consistDomainScope != "") {
                                                                    $t2Scope = trim($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_DomainConsistency->consistDomainScope);
                                                                }
                                                                echo $t2Scope;
                                                                ?>
                                                            </label>
                                                        </td>
                                                    </tr>
                                                    <tr class='Domain'>
                                                        <td>
                                                            <label class="form-check-label" for="c3_3">
                                                                <b>Compliance Level:</b>
                                                                <?php
                                                                $compLvl = "";
                                                                if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_DomainConsistency->compDomainLevel) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_DomainConsistency->compDomainLevel != "") {
                                                                    $compLvl = $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_DomainConsistency->compDomainLevel;
                                                                }
                                                                echo $compLvl;
                                                                ?>
                                                            </label>
                                                        </td>
                                                    </tr>
                                                    <tr class='Domain'>
                                                        <td>
                                                            <label class="form-check-label" for="c15_t2_conceptual_date">
                                                                <b>Date:</b>
                                                                <?php
                                                                $t2Date = "";
                                                                if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_DomainConsistency->dateTime->Date) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_DomainConsistency->dateTime->Date != "") {
                                                                    $t2Date = $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_DomainConsistency->dateTime->Date;
                                                                }
                                                                echo $t2Date;
                                                                ?>
                                                            </label>
                                                        </td>
                                                    </tr>
                                                    <tr class='Domain'>
                                                        <td>
                                                            <label class="form-check-label" for="c3_2">
                                                                <b>Result:</b>
                                                                <?php
                                                                $t2Res = "";
                                                                if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_DomainConsistency->result->DQ_ConformanceResult->pass) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_DomainConsistency->result->DQ_ConformanceResult->pass != "") {
                                                                    $t2Res = trim($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_DomainConsistency->result->DQ_ConformanceResult->pass);
                                                                }
                                                                echo $t2Res;
                                                                ?>
                                                            </label>
                                                        </td>
                                                    </tr>
                                                    <tr class='Domain'>
                                                        <td>
                                                            <label class="form-check-label" for="c3_4">
                                                                <b>Conformance Result:</b>
                                                                <?php
                                                                $t2ConformRes = "";
                                                                if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_DomainConsistency->result->DQ_ConformanceResult->explanation) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_DomainConsistency->result->DQ_ConformanceResult->explanation != "") {
                                                                    $t2ConformRes = $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_DomainConsistency->result->DQ_ConformanceResult->explanation;
                                                                }
                                                                echo $t2ConformRes;
                                                                ?>
                                                            </label>
                                                        </td>
                                                    </tr>
                                                    <?php //================= ?>
                                                    <tr class='Format'>
                                                        <td>
                                                            <label class="form-check-label" for="c3_1">
                                                                <b>Scope:</b>
                                                                <?php
                                                                $t2Scope = "";
                                                                if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_FormatConsistency->consistFormatScope) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_FormatConsistency->consistFormatScope != "") {
                                                                    $t2Scope = trim($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_FormatConsistency->consistFormatScope);
                                                                }
                                                                echo $t2Scope;
                                                                ?>
                                                            </label>
                                                        </td>
                                                    </tr>
                                                    <tr class='Format'>
                                                        <td>
                                                            <label class="form-check-label" for="c3_3">
                                                                <b>Compliance Level:</b>
                                                                <?php
                                                                $compLvl = "";
                                                                if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_FormatConsistency->compFormatLevel->CharacterString) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_FormatConsistency->compFormatLevel->CharacterString != "") {
                                                                    $compLvl = $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_FormatConsistency->compFormatLevel->CharacterString;
                                                                }
                                                                echo $compLvl;
                                                                ?>
                                                            </label>
                                                        </td>
                                                    </tr>
                                                    <tr class='Format'>
                                                        <td>
                                                            <label class="form-check-label" for="c15_t2_conceptual_date">
                                                                <b>Date:</b>
                                                                <?php
                                                                $t2Date = "";
                                                                if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_FormatConsistency->dateTime->Date) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_FormatConsistency->dateTime->Date != "") {
                                                                    $t2Date = $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_FormatConsistency->dateTime->Date;
                                                                }
                                                                echo $t2Date;
                                                                ?>
                                                            </label>
                                                        </td>
                                                    </tr>
                                                    <tr class='Format'>
                                                        <td>
                                                            <label class="form-check-label" for="c3_2">
                                                                <b>Result:</b>
                                                                <?php
                                                                $t2Res = "";
                                                                if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_FormatConsistency->result->DQ_ConformanceResult->pass) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_FormatConsistency->result->DQ_ConformanceResult->pass != "") {
                                                                    $t2Res = trim($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_FormatConsistency->result->DQ_ConformanceResult->pass);
                                                                }
                                                                echo $t2Res;
                                                                ?>
                                                            </label>
                                                        </td>
                                                    </tr>
                                                    <tr class='Format'>
                                                        <td>
                                                            <label class="form-check-label" for="c3_4">
                                                                <b>Conformance Result:</b>
                                                                <?php
                                                                $t2ConformRes = "";
                                                                if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_FormatConsistency->result->DQ_ConformanceResult->explanation) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_FormatConsistency->result->DQ_ConformanceResult->explanation != "") {
                                                                    $t2ConformRes = $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_FormatConsistency->result->DQ_ConformanceResult->explanation;
                                                                }
                                                                echo $t2ConformRes;
                                                                ?>
                                                            </label>
                                                        </td>
                                                    </tr>
                                                    <?php //================= ?>
                                                    <tr class='Topological'>
                                                        <td>
                                                            <label class="form-check-label" for="c3_1">
                                                                <b>Scope:</b>
                                                                <?php
                                                                $t2Scope = "";
                                                                if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_TopologicalConsistency->consistTopoScope) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_TopologicalConsistency->consistTopoScope != "") {
                                                                    $t2Scope = trim($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_TopologicalConsistency->consistTopoScope);
                                                                }
                                                                echo $t2Scope;
                                                                ?>
                                                            </label>
                                                        </td>
                                                    </tr>
                                                    <tr class='Topological'>
                                                        <td>
                                                            <label class="form-check-label" for="c3_3">
                                                                <b>Compliance Level:</b>
                                                                <?php
                                                                $compLvl = "";
                                                                if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_TopologicalConsistency->compTopoLevel->CharacterString) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_TopologicalConsistency->compTopoLevel->CharacterString != "") {
                                                                    $compLvl = $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_TopologicalConsistency->compTopoLevel->CharacterString;
                                                                }
                                                                echo $compLvl;
                                                                ?>
                                                            </label>
                                                        </td>
                                                    </tr>
                                                    <tr class='Topological'>
                                                        <td>
                                                            <label class="form-check-label" for="c15_t2_conceptual_date">
                                                                <b>Date:</b>
                                                                <?php
                                                                $t2Date = "";
                                                                if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_TopologicalConsistency->dateTime->Date) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_TopologicalConsistency->dateTime->Date != "") {
                                                                    $t2Date = $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_TopologicalConsistency->dateTime->Date;
                                                                }
                                                                echo $t2Date;
                                                                ?>
                                                            </label>
                                                        </td>
                                                    </tr>
                                                    <tr class='Topological'>
                                                        <td>
                                                            <label class="form-check-label" for="c3_2">
                                                                <b>Result:</b>
                                                                <?php
                                                                $t2Res = "";
                                                                if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_TopologicalConsistency->result->DQ_ConformanceResult->pass) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_TopologicalConsistency->result->DQ_ConformanceResult->pass != "") {
                                                                    $t2Res = trim($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_TopologicalConsistency->result->DQ_ConformanceResult->pass);
                                                                }
                                                                echo $t2Res;
                                                                ?>
                                                            </label>
                                                        </td>
                                                    </tr>
                                                    <tr class='Topological'>
                                                        <td>
                                                            <label class="form-check-label" for="c3_4">
                                                                <b>Conformance Result:</b>
                                                                <?php
                                                                $t2ConformRes = "";
                                                                if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_TopologicalConsistency->result->DQ_ConformanceResult->explanation) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_TopologicalConsistency->result->DQ_ConformanceResult->explanation != "") {
                                                                    $t2ConformRes = $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_TopologicalConsistency->result->DQ_ConformanceResult->explanation;
                                                                }
                                                                echo $t2ConformRes;
                                                                ?>
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
                                                        <td>
                                                            <label class="form-check-label" for="c15_t3_type">
                                                                <input type="radio" name="c15_t3_type" id='AbsoluteOrExternal' value="Absolute or External" checked>&nbsp;Absolute or External
                                                            </label>
                                                        </td>
                                                        <td>
                                                            <label class="form-check-label" for="c15_t3_type">
                                                                <input type="radio" name="c15_t3_type" value="Relative or Internal">&nbsp;Relative or Internal
                                                            </label>
                                                        </td>
                                                        <td>
                                                            <label class="form-check-label" for="c15_t3_type">
                                                                <input type="radio" name="c15_t3_type" value="Gridded Data">&nbsp;Gridded Data
                                                            </label>
                                                        </td>
                                                    </tr>
                                                    <?php //================= ?>
                                                    <tr class='AbsoluteorExternal'>
                                                        <td>
                                                            <label class="form-check-label" for="c15_t3_scope">
                                                                <b>Scope:</b>
                                                                <?php
                                                                $t3Scope = "";
                                                                if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_AbsoluteExternalPositionalAccuracy->posAccAbsoluteScope) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_AbsoluteExternalPositionalAccuracy->posAccAbsoluteScope != "") {
                                                                    $t3Scope = trim($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_AbsoluteExternalPositionalAccuracy->posAccAbsoluteScope);
                                                                }
                                                                echo $t3Scope;
                                                                ?>
                                                            </label>
                                                        </td>
                                                    </tr>
                                                    <tr class='AbsoluteorExternal'>
                                                        <td>
                                                            <label class="form-check-label" for="c15_t3_comply_level">
                                                                <b>Compliance Level:</b>
                                                                <?php
                                                                $t3CompLvl = "";
                                                                if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_AbsoluteExternalPositionalAccuracy->compPosAccAbsoluteLevel) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_AbsoluteExternalPositionalAccuracy->compPosAccAbsoluteLevel != "") {
                                                                    $t3CompLvl = $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_AbsoluteExternalPositionalAccuracy->compPosAccAbsoluteLevel;
                                                                }
                                                                echo $t3CompLvl;
                                                                ?>
                                                            </label>
                                                        </td>
                                                    </tr>
                                                    <tr class='AbsoluteorExternal'>
                                                        <td>
                                                            <label class="form-check-label" for="c15_t3_date">
                                                                <b>Date:</b>
                                                                <?php
                                                                $t3Date = "";
                                                                if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_AbsoluteExternalPositionalAccuracy->dateTime->Date) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_AbsoluteExternalPositionalAccuracy->dateTime->Date != "") {
                                                                    $t3Date = $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_AbsoluteExternalPositionalAccuracy->dateTime->Date;
                                                                }
                                                                echo $t3Date;
                                                                ?>
                                                            </label>
                                                        </td>
                                                    </tr>
                                                    <tr class='AbsoluteorExternal'>
                                                        <td>
                                                            <label class="form-check-label" for="c15_t3_result">
                                                                <b>Result:</b>
                                                                <?php
                                                                $t3Res = "";
                                                                if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_AbsoluteExternalPositionalAccuracy->result->DQ_ConformanceResult->pass) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_AbsoluteExternalPositionalAccuracy->result->DQ_ConformanceResult->pass != "") {
                                                                    $t3Res = trim($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_AbsoluteExternalPositionalAccuracy->result->DQ_ConformanceResult->pass);
                                                                }
                                                                echo $t3Res;
                                                                ?>
                                                            </label>
                                                        </td>
                                                    </tr>
                                                    <tr class='AbsoluteorExternal'>
                                                        <td>
                                                            <label class="form-check-label" for="c15_t3_conform_result">
                                                                <b>Conformance Result:</b>
                                                                <?php
                                                                $t3ConformRes = "";
                                                                if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_AbsoluteExternalPositionalAccuracy->result->DQ_ConformanceResult->explanation) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_AbsoluteExternalPositionalAccuracy->result->DQ_ConformanceResult->explanation != "") {
                                                                    $t3ConformRes = $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_AbsoluteExternalPositionalAccuracy->result->DQ_ConformanceResult->explanation;
                                                                }
                                                                echo $t3ConformRes;
                                                                ?>
                                                            </label>
                                                        </td>
                                                    </tr>
                                                    <?php //================= ?>
                                                    <tr class='RelativeorInternal'>
                                                        <td>
                                                            <label class="form-check-label" for="c15_t3_scope_2">
                                                                <b>Scope:</b>
                                                                <?php
                                                                $t3Scope = "";
                                                                if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_RelativeInternalPositionalAccuracy->posAccRelativeScope) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_RelativeInternalPositionalAccuracy->posAccRelativeScope != "") {
                                                                    $t3Scope = trim($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_RelativeInternalPositionalAccuracy->posAccRelativeScope);
                                                                }
                                                                echo $t3Scope;
                                                                ?>
                                                            </label>
                                                        </td>
                                                    </tr>
                                                    <tr class='RelativeorInternal'>
                                                        <td>
                                                            <label class="form-check-label" for="c15_t3_comply_level_2">
                                                                <b>Compliance Level:</b>
                                                                <?php
                                                                $t3CompLvl = "";
                                                                if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_RelativeInternalPositionalAccuracy->posAccRelativeLevel) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_RelativeInternalPositionalAccuracy->posAccRelativeLevel != "") {
                                                                    $t3CompLvl = $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_RelativeInternalPositionalAccuracy->posAccRelativeLevel;
                                                                }
                                                                echo $t3CompLvl;
                                                                ?>
                                                            </label>
                                                        </td>
                                                    </tr>
                                                    <tr class='RelativeorInternal'>
                                                        <td>
                                                            <label class="form-check-label" for="c15_t3_date_2">
                                                                <b>Date:</b>
                                                                <?php
                                                                $t3Date = "";
                                                                if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_RelativeInternalPositionalAccuracy->dateTime->Date) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_RelativeInternalPositionalAccuracy->dateTime->Date != "") {
                                                                    $t3Date = $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_RelativeInternalPositionalAccuracy->dateTime->Date;
                                                                }
                                                                echo $t3Date;
                                                                ?>
                                                            </label>
                                                        </td>
                                                    </tr>
                                                    <tr class='RelativeorInternal'>
                                                        <td>
                                                            <label class="form-check-label" for="c15_t3_result_2">
                                                                <b>Result:</b>
                                                                <?php
                                                                $t3Res = "";
                                                                if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_RelativeInternalPositionalAccuracy->result->DQ_ConformanceResult->pass) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_RelativeInternalPositionalAccuracy->result->DQ_ConformanceResult->pass != "") {
                                                                    $t3Res = trim($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_RelativeInternalPositionalAccuracy->result->DQ_ConformanceResult->pass);
                                                                }
                                                                echo $t3Res;
                                                                ?>
                                                            </label>
                                                        </td>
                                                    </tr>
                                                    <tr class='RelativeorInternal'>
                                                        <td>
                                                            <label class="form-check-label" for="c15_t3_conform_result_2">
                                                                <b>Conformance Result:</b>
                                                                <?php
                                                                $t3ConformRes = "";
                                                                if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_RelativeInternalPositionalAccuracy->result->DQ_ConformanceResult->explanation) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_RelativeInternalPositionalAccuracy->result->DQ_ConformanceResult->explanation != "") {
                                                                    $t3ConformRes = $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_RelativeInternalPositionalAccuracy->result->DQ_ConformanceResult->explanation;
                                                                }
                                                                echo $t3Res;
                                                                ?> 
                                                            </label>
                                                        </td>
                                                    </tr>
                                                    <?php //================= ?>
                                                    <tr class='GriddedData'>
                                                        <td>
                                                            <label class="form-check-label" for="c15_t3_scope_3">
                                                                <b>Scope:</b>
                                                                <?php
                                                                $t3Scope = "";
                                                                if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_GriddedDataPositionalAccuracy->posAccGridScope) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_GriddedDataPositionalAccuracy->posAccGridScope != "") {
                                                                    $t3Scope = trim($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_GriddedDataPositionalAccuracy->posAccGridScope);
                                                                }
                                                                echo $t3Scope;
                                                                ?>
                                                            </label>
                                                        </td>
                                                    </tr>
                                                    <tr class='GriddedData'>
                                                        <td>
                                                            <label class="form-check-label" for="c15_t3_comply_level_3">
                                                                <b>Compliance Level:</b>
                                                                <?php
                                                                $t3CompLvl = "";
                                                                if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_GriddedDataPositionalAccuracy->posAccGridLevel->CharacterString) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_GriddedDataPositionalAccuracy->posAccGridLevel->CharacterString != "") {
                                                                    $t3CompLvl = $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_GriddedDataPositionalAccuracy->posAccGridLevel->CharacterString;
                                                                }
                                                                echo $t3CompLvl;
                                                                ?>
                                                            </label>
                                                        </td>
                                                    </tr>
                                                    <tr class='GriddedData'>
                                                        <td>
                                                            <label class="form-check-label" for="c15_t3_date_3">
                                                                <b>Date:</b>
                                                                <?php
                                                                $t3Date = "";
                                                                if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_GriddedDataPositionalAccuracy->dateTime->Date) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_GriddedDataPositionalAccuracy->dateTime->Date != "") {
                                                                    $t3Date = $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_GriddedDataPositionalAccuracy->dateTime->Date;
                                                                }
                                                                echo $t3Date;
                                                                ?>
                                                            </label>
                                                        </td>
                                                    </tr>
                                                    <tr class='GriddedData'>
                                                        <td>
                                                            <label class="form-check-label" for="c15_t3_result_3">
                                                                <b>Result:</b>
                                                                <?php
                                                                $t3Res = "";
                                                                if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_GriddedDataPositionalAccuracy->result->DQ_ConformanceResult->pass) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_GriddedDataPositionalAccuracy->result->DQ_ConformanceResult->pass != "") {
                                                                    $t3Res = trim($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_GriddedDataPositionalAccuracy->result->DQ_ConformanceResult->pass);
                                                                }
                                                                echo $t3Res;
                                                                ?>
                                                            </label>
                                                        </td>
                                                    </tr>
                                                    <tr class='GriddedData'>
                                                        <td>
                                                            <label class="form-check-label" for="c15_t3_conform_result_3">
                                                                <b>Conformance Result:</b>
                                                                <?php
                                                                $t3ConformRes = "";
                                                                if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_GriddedDataPositionalAccuracy->result->DQ_ConformanceResult->explanation->CharacterString) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_GriddedDataPositionalAccuracy->result->DQ_ConformanceResult->explanation->CharacterString != "") {
                                                                    $t3ConformRes = $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_GriddedDataPositionalAccuracy->result->DQ_ConformanceResult->explanation->CharacterString;
                                                                }
                                                                echo $t3ConformRes;
                                                                ?> 
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
                                                        <td>
                                                            <label class="form-check-label" for="c15_t4_type">
                                                                <input type="radio" name="c15_t4_type" id='AccuracyorTimeMeasurement' value="Accuracy or Time Measurement" checked>&nbsp;Accuracy or Time Measurement
                                                            </label>
                                                        </td>
                                                        <td>
                                                            <label class="form-check-label" for="c15_t4_type">
                                                                <input type="radio" name="c15_t4_type" value="Temporal Consistency">&nbsp;Temporal Consistency
                                                            </label>
                                                        </td>
                                                        <td>
                                                            <label class="form-check-label" for="c15_t4_type">
                                                                <input type="radio" name="c15_t4_type" value="Temporal Validity">&nbsp;Temporal Validity
                                                            </label>
                                                        </td>
                                                    </tr>
                                                    <?php //================= ?>
                                                    <tr class='AccuracyorTimeMeasurement'>
                                                        <td>
                                                            <label class="form-check-label" for="c15_t4_accuTimeMeasure_scope">
                                                                <b>Scope:</b>
                                                                <?php
                                                                $t4Scope = "";
                                                                if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_AccuracyOfATimeMeasurement->AccuracyOfATimeMeasurementScope) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_AccuracyOfATimeMeasurement->AccuracyOfATimeMeasurementScope != "") {
                                                                    $t4Scope = trim($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_AccuracyOfATimeMeasurement->AccuracyOfATimeMeasurementScope);
                                                                }
                                                                echo $t4Scope;
                                                                ?>
                                                            </label>
                                                        </td>
                                                    </tr>
                                                    <tr class='AccuracyorTimeMeasurement'>
                                                        <td>
                                                            <label class="form-check-label" for="c3_3">
                                                                <b>Compliance Level:</b>
                                                                <?php
                                                                $t4CompLvl = "";
                                                                if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_AccuracyOfATimeMeasurement->AccuracyOfATimeMeasurementLevel) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_AccuracyOfATimeMeasurement->AccuracyOfATimeMeasurementLevel != "") {
                                                                    $t4CompLvl = $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_AccuracyOfATimeMeasurement->AccuracyOfATimeMeasurementLevel;
                                                                }
                                                                echo $t4CompLvl;
                                                                ?>
                                                            </label>
                                                        </td>
                                                    </tr>
                                                    <tr class='AccuracyorTimeMeasurement'>
                                                        <td>
                                                            <label class="form-check-label" for="c15_t4_accuTimeMeasure_date">
                                                                <b>Date:</b>
                                                                <?php
                                                                $t4Date = "";
                                                                if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_AccuracyOfATimeMeasurement->dateTime->Date) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_AccuracyOfATimeMeasurement->dateTime->Date != "") {
                                                                    $t4Date = $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_AccuracyOfATimeMeasurement->dateTime->Date;
                                                                }
                                                                echo $t4Date;
                                                                ?>
                                                            </label>
                                                        </td>
                                                    </tr>
                                                    <tr class='AccuracyorTimeMeasurement'>
                                                        <td>
                                                            <label class="form-check-label" for="c3_2">
                                                                <b>Result:</b>
                                                                <?php
                                                                $t4Res = "";
                                                                if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_AccuracyOfATimeMeasurement->result->DQ_ConformanceResult->pass) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_AccuracyOfATimeMeasurement->result->DQ_ConformanceResult->pass != "") {
                                                                    $t4Res = trim($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_AccuracyOfATimeMeasurement->result->DQ_ConformanceResult->pass);
                                                                }
                                                                echo $t4Res;
                                                                ?>
                                                            </label>
                                                        </td>
                                                    </tr>
                                                    <tr class='AccuracyorTimeMeasurement'>
                                                        <td>
                                                            <label class="form-check-label" for="c3_4">
                                                                <b>Conformance Result:</b>
                                                                <?php
                                                                $t4ConformRes = "";
                                                                if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_AccuracyOfATimeMeasurement->result->DQ_ConformanceResult->explanation) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_AccuracyOfATimeMeasurement->result->DQ_ConformanceResult->explanation != "") {
                                                                    $t4ConformRes = $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_AccuracyOfATimeMeasurement->result->DQ_ConformanceResult->explanation;
                                                                }
                                                                echo $t4ConformRes;
                                                                ?>
                                                            </label>
                                                        </td>
                                                    </tr>
                                                    <?php //================= ?>
                                                    <tr class='TemporalConsistency'>
                                                        <td>
                                                            <label class="form-check-label" for="c15_t4_scope_2">
                                                                <b>Scope:</b>
                                                                <?php
                                                                $t4Scope = "";
                                                                if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_TemporalConsistency->TemporalConsistencyScope) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_TemporalConsistency->TemporalConsistencyScope != "") {
                                                                    $t4Scope = trim($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_TemporalConsistency->TemporalConsistencyScope);
                                                                }
                                                                echo $t4Scope;
                                                                ?>
                                                            </label>
                                                        </td>
                                                    </tr>
                                                    <tr class='TemporalConsistency'>
                                                        <td>
                                                            <label class="form-check-label" for="c15_t4_comply_level_2">
                                                                <b>Compliance Level:</b>
                                                                <?php
                                                                $t4CompLvl = "";
                                                                if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_TemporalConsistency->TemporalConsistencyLevel->CharacterString) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_TemporalConsistency->TemporalConsistencyLevel->CharacterString != "") {
                                                                    $t4CompLvl = $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_TemporalConsistency->TemporalConsistencyLevel->CharacterString;
                                                                }
                                                                echo $t4CompLvl;
                                                                ?>
                                                            </label>
                                                        </td>
                                                    </tr>
                                                    <tr class='TemporalConsistency'>
                                                        <td>
                                                            <label class="form-check-label" for="c15_t4_date_2">
                                                                <b>Date:</b>
                                                                <?php
                                                                $t4Date = "";
                                                                if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_TemporalConsistency->dateTime->Date) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_TemporalConsistency->dateTime->Date != "") {
                                                                    $t4Date = $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_TemporalConsistency->dateTime->Date;
                                                                }
                                                                echo $t4Date;
                                                                ?>
                                                            </label>
                                                        </td>
                                                    </tr>
                                                    <tr class='TemporalConsistency'>
                                                        <td>
                                                            <label class="form-check-label" for="c15_t4_conform_result_2">
                                                                <b>Result:</b>
                                                                <?php
                                                                $t4Res = "";
                                                                if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_TemporalConsistency->result->DQ_ConformanceResult->pass) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_TemporalConsistency->result->DQ_ConformanceResult->pass != "") {
                                                                    $t4Res = trim($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_TemporalConsistency->result->DQ_ConformanceResult->pass);
                                                                }
                                                                echo $t4Res;
                                                                ?>
                                                            </label>
                                                        </td>
                                                    </tr>
                                                    <tr class='TemporalConsistency'>
                                                        <td>
                                                            <label class="form-check-label" for="c15_t4_conform_result_2">
                                                                <b>Conformance Result:</b>
                                                                <?php
                                                                $t4ConformRes = "";
                                                                if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_TemporalConsistency->result->DQ_ConformanceResult->explanation->CharacterString) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_TemporalConsistency->result->DQ_ConformanceResult->explanation->CharacterString != "") {
                                                                    $t4ConformRes = $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_TemporalConsistency->result->DQ_ConformanceResult->explanation->CharacterString;
                                                                }
                                                                echo $t4ConformRes;
                                                                ?>
                                                            </label>
                                                        </td>
                                                    </tr>
                                                    <?php //================= ?>
                                                    <tr class='TemporalValidity'>
                                                        <td>
                                                            <label class="form-check-label" for="c15_t4_accuTimeMeasure_scope">
                                                                <b>Scope:</b>
                                                                <?php
                                                                $t4Scope = "";
                                                                if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_TemporalValidity->TemporalValidityScope) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_TemporalValidity->TemporalValidityScope != "") {
                                                                    $t4Scope = trim($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_TemporalValidity->TemporalValidityScope);
                                                                }
                                                                echo $t4Scope;
                                                                ?>
                                                            </label>
                                                        </td>
                                                    </tr>
                                                    <tr class='TemporalValidity'>
                                                        <td>
                                                            <label class="form-check-label" for="c15_t4_comply_level_3">
                                                                <b>Compliance Level:</b>
                                                                <?php
                                                                $t4CompLvl = "";
                                                                if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_TemporalValidity->TemporalValidityLevel->CharacterString) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_TemporalValidity->TemporalValidityLevel->CharacterString != "") {
                                                                    $t4CompLvl = $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_TemporalValidity->TemporalValidityLevel->CharacterString;
                                                                }
                                                                echo $t4CompLvl;
                                                                ?>
                                                            </label>
                                                        </td>
                                                    </tr>
                                                    <tr class='TemporalValidity'>
                                                        <td>
                                                            <label class="form-check-label" for="c15_t4_date_3">
                                                                <b>Date:</b>
                                                                <?php
                                                                $t4Date = "";
                                                                if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_TemporalValidity->dateTime->Date) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_TemporalValidity->dateTime->Date != "") {
                                                                    $t4Date = $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_TemporalValidity->dateTime->Date;
                                                                }
                                                                echo $t4Date;
                                                                ?>
                                                            </label>
                                                        </td>
                                                    </tr>
                                                    <tr class='TemporalValidity'>
                                                        <td>
                                                            <label class="form-check-label" for="c15_t4_result_3">
                                                                <b>Result:</b>
                                                                <?php
                                                                $t4Res = "";
                                                                if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_TemporalValidity->result->DQ_ConformanceResult->pass) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_TemporalValidity->result->DQ_ConformanceResult->pass != "") {
                                                                    $t4Res = trim($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_TemporalValidity->result->DQ_ConformanceResult->pass);
                                                                }
                                                                echo $t4Res;
                                                                ?>
                                                            </label>
                                                        </td>
                                                    </tr>
                                                    <tr class='TemporalValidity'>
                                                        <td>
                                                            <label class="form-check-label" for="c15_t4_conform_result_3">
                                                                <b>Conformance Result:</b>
                                                                <?php
                                                                $t4ConformRes = "";
                                                                if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_TemporalValidity->result->DQ_ConformanceResult->explanation) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_TemporalValidity->result->DQ_ConformanceResult->explanation != "") {
                                                                    $t4ConformRes = $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_TemporalValidity->result->DQ_ConformanceResult->explanation;
                                                                }
                                                                echo $t4ConformRes;
                                                                ?>
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
                                                        <td>
                                                            <label class="form-check-label" for="c15_t5_type">
                                                                <input type="radio" name="c15_t5_type" value="Classification Correctness" checked>&nbsp;Classification Correctness
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
                                                                }
                                                                echo $t5Scope;
                                                                ?>
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
                                                                echo $t5CompLvl;
                                                                ?>
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
                                                                echo $t5Date;
                                                                ?>
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
                                                                echo $t5Res;
                                                                ?>
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
                                                                echo $t5ConformRes;
                                                                ?>
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

    <script>
        $(document).ready(function () {
            //t1
            $('.Completeness_Commission').show();
            $('.Completeness_Omission').hide();
            $("#completeness_comission").prop("checked", true);
            //t2
            $('.Conceptual').show();
            $('.Domain').hide();
            $('.Format').hide();
            $('.Topological').hide();
            $("#conceptual").prop("checked", true);
            //t3
            $('.AbsoluteorExternal').show();
            $('.RelativeorInternal').hide();
            $('.GriddedData').hide();
            $("#AbsoluteOrExternal").prop("checked", true);
            //t4
            $('.AccuracyorTimeMeasurement').show();
            $('.TemporalConsistency').hide();
            $('.TemporalValidity').hide();
            $("#AccuracyorTimeMeasurement").prop("checked", true);
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
    </script>