<div class="card card-primary mb-4 div_c15" id="div_c15">
    <div class="card-header">
        <a href="#collapse15" data-toggle="collapse">
            <h4 class="card-title">
                <?php echo __('lang.accord_15'); ?>
            </h4>
        </a>
    </div>
    <div id="collapse15" class="panel-collapse collapse in show" data-parent="#div_c15"> <?php //### SMBG SINI - pull data quality from new format ### ?>
        <div class="card-body">
            <div class="form-group row col-xl-6">
                <b>Data Quality Information</b>
            </div>
            <div class="pl-lg-2">
                <div class="row mb-2">
                    <?php
                    if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->scope->DQ_Scope->level) && $metadataxml->dataQualityInfo->DQ_DataQuality->scope->DQ_Scope->level != "") {
                        ?>
                        <div class="col-xl-1">
                            <label class="form-control-label" for="input-DQscope">
                                DQ Scope
                            </label>
                        </div>
                        <div class="col-xl-3">
                            <?php echo trim($metadataxml->dataQualityInfo->DQ_DataQuality->scope->DQ_Scope->level); ?>
                        </div>
                        <?php 
                    }
                    ?>
                    <?php
                    if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->lineage->LI_Lineage->statement) && trim($metadataxml->dataQualityInfo->DQ_DataQuality->lineage->LI_Lineage->statement) != "") {
                        ?>
                        <div class="col-xl-2">
                            <label class="form-control-label float-right" for="input-datahistory">
                                Data History</label>
                        </div>
                        <div class="col-md-2">
                            <?php echo $metadataxml->dataQualityInfo->DQ_DataQuality->lineage->LI_Lineage->statement; ?>
                        </div>      
                        <?php
                    }
                    ?>
                    <?php
                    if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_Element->dateTime->Date) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_Element->dateTime->Date != "") {
                        ?>
                        <div class="col-xl-1">
                            <label class="form-control-label  float-right" for="input-date">
                                Date
                            </label>
                        </div>
                        <div class="col-xl-3">
                            <?php echo date('d/m/Y',strtotime(trim($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_Element->dateTime->Date))); ?>
                        </div>
                        <?php
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
                                                    <?php
                                                    if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_CompletenessCommission->compCommissScope) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_CompletenessCommission->compCommissScope != "") {
                                                        ?>
                                                        <tr class="Completeness_Commission">
                                                            <td>
                                                                <label class="form-check-label" for="c3_1">
                                                                    <b>Scope:</b>
                                                                    <?php echo trim($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_CompletenessCommission->compCommissScope); ?>
                                                                </label>
                                                            </td>
                                                        </tr>
                                                        <?php
                                                    }
                                                    ?>
                                                    <?php
                                                    if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_CompletenessCommission->compCommissComplLevel) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_CompletenessCommission->compCommissComplLevel != "") {
                                                        ?>
                                                        <tr class="Completeness_Commission">
                                                            <td>
                                                                <label class="form-check-label" for="c3_3">
                                                                    <b>Compliance Level:</b>
                                                                    <?php echo $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_CompletenessCommission->compCommissComplLevel; ?>
                                                                </label>
                                                            </td>
                                                        </tr>
                                                        <?php
                                                    }
                                                    ?>
                                                    <?php
                                                    if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_CompletenessCommission->dateTime->Date) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_CompletenessCommission->dateTime->Date != "") {
                                                        ?>
                                                        <tr class="Completeness_Commission">
                                                            <td>
                                                                <label class="form-check-label" for="c15_t1_commission_date">
                                                                    <b>Date:</b>
                                                                    <?php echo trim($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_CompletenessCommission->dateTime->Date); ?>
                                                                </label>
                                                            </td>
                                                        </tr>
                                                        <?php
                                                    }
                                                    ?>
                                                    <?php
                                                    if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_CompletenessCommission->result->DQ_ConformanceResult->pass) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_CompletenessCommission->result->DQ_ConformanceResult->pass != "") {
                                                        ?>
                                                        <tr class="Completeness_Commission">
                                                            <td>
                                                                <label class="form-check-label" for="c3_2">
                                                                    <b>Result:</b>
                                                                    <?php echo trim($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_CompletenessCommission->result->DQ_ConformanceResult->pass); ?>
                                                                </label>
                                                            </td>
                                                        </tr>
                                                        <?php
                                                    }
                                                    ?>
                                                    <?php
                                                    if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_CompletenessCommission->result->DQ_ConformanceResult->explanation) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_CompletenessCommission->result->DQ_ConformanceResult->explanation != "") {
                                                        ?>
                                                        <tr class="Completeness_Commission">
                                                            <td>
                                                                <label class="form-check-label" for="c15_t1_conform_result">
                                                                    <b>Conformance Result:</b>
                                                                    <?php echo $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_CompletenessCommission->result->DQ_ConformanceResult->explanation; ?>
                                                                </label>
                                                            </td>
                                                        </tr>
                                                        <?php
                                                    }
                                                    ?>
                                                   
                                                    <?php //================= ?>
                                                    <?php
                                                    if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_CompletenessOmission->compOmissScope) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_CompletenessOmission->compOmissScope != "") {
                                                        ?>
                                                        <tr class="Completeness_Omission">
                                                            <td>
                                                                <label class="form-check-label" for="c3_1">
                                                                    <b>Scope:</b>
                                                                    <?php echo trim($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_CompletenessOmission->compOmissScope); ?>
                                                                </label>
                                                            </td>
                                                        </tr>
                                                        <?php
                                                    }
                                                    ?>
                                                    <?php
                                                    if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_CompletenessOmission->compOmissComplLevel) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_CompletenessOmission->compOmissComplLevel != "") {
                                                        ?>
                                                        <tr class="Completeness_Omission">
                                                            <td>
                                                                <label class="form-check-label" for="c3_3">
                                                                    <b>Compliance Level:</b>
                                                                    <?php echo $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_CompletenessOmission->compOmissComplLevel; ?>
                                                                </label>
                                                            </td>
                                                        </tr>
                                                        <?php
                                                    }
                                                    ?>
                                                    <?php
                                                    if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_CompletenessOmission->dateTime->Date) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_CompletenessOmission->dateTime->Date != "") {
                                                        ?>
                                                        <tr class="Completeness_Omission">
                                                            <td>
                                                                <label class="form-check-label" for="c15_t1_commission_date">
                                                                    <b>Date:</b>
                                                                    <?php echo $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_CompletenessOmission->dateTime->Date; ?>
                                                                </label>
                                                            </td>
                                                        </tr>
                                                        <?php
                                                    }
                                                    ?>
                                                    <?php
                                                    if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_CompletenessCommission->result->DQ_ConformanceResult->pass) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_CompletenessCommission->result->DQ_ConformanceResult->pass != "") {
                                                        ?>
                                                        <tr class="Completeness_Omission">
                                                            <td>
                                                                <label class="form-check-label" for="c3_2">
                                                                    <b>Result:</b>
                                                                    <?php echo trim($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_CompletenessCommission->result->DQ_ConformanceResult->pass); ?>
                                                                </label>
                                                            </td>
                                                        </tr>
                                                        <?php
                                                    }
                                                    ?>
                                                    <?php
                                                    if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_CompletenessCommission->result->DQ_ConformanceResult->explanation) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_CompletenessCommission->result->DQ_ConformanceResult->explanation != "") {
                                                        ?>
                                                        <tr class="Completeness_Omission">
                                                            <td>
                                                                <label class="form-check-label" for="c3_4">
                                                                    <b>Conformance Result:</b>
                                                                    <?php echo $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_CompletenessCommission->result->DQ_ConformanceResult->explanation; ?>
                                                                </label>
                                                            </td>
                                                        </tr>
                                                        <?php
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
                                                    <?php
                                                    if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_ConceptualConsistency->consistConceptScope) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_ConceptualConsistency->consistConceptScope != "") {
                                                        ?>
                                                        <tr class='Conceptual'>
                                                            <td>
                                                                <label class="form-check-label" for="c15_t2_scope">
                                                                    <b>Scope:</b>
                                                                    <?php echo trim($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_ConceptualConsistency->consistConceptScope); ?>
                                                                </label>
                                                            </td>
                                                        </tr>
                                                        <?php
                                                    }
                                                    ?>
                                                    <?php
                                                    if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_ConceptualConsistency->compOmissLevel) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_ConceptualConsistency->compOmissLevel != "") {
                                                        ?>
                                                        <tr class='Conceptual'>
                                                            <td>
                                                                <label class="form-check-label" for="c15_t2_comply_level">
                                                                    <b>Compliance Level:</b>
                                                                    <?php echo $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_ConceptualConsistency->compOmissLevel; ?>
                                                                </label>
                                                            </td>
                                                        </tr>
                                                        <?php
                                                    }
                                                    ?>
                                                    <?php
                                                    if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_ConceptualConsistency->dateTime->Date) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_ConceptualConsistency->dateTime->Date != "") {
                                                        ?>
                                                        <tr class='Conceptual'>
                                                            <td>
                                                                <label class="form-check-label" for="c15_t2_date">
                                                                    <b>Date:</b>
                                                                    <?php echo $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_ConceptualConsistency->dateTime->Date; ?>
                                                                </label>
                                                            </td>
                                                        </tr>
                                                        <?php
                                                    }
                                                    ?>
                                                    <?php
                                                    if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_ConceptualConsistency->result->DQ_ConformanceResult->pass) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_ConceptualConsistency->result->DQ_ConformanceResult->pass != "") {
                                                        ?>
                                                        <tr class='Conceptual'>
                                                            <td>
                                                                <label class="form-check-label" for="c15_t2_result">
                                                                    <b>Result:</b>
                                                                    <?php echo trim($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_ConceptualConsistency->result->DQ_ConformanceResult->pass); ?>
                                                                </label>
                                                            </td>
                                                        </tr>
                                                        <?php
                                                    }
                                                    ?>
                                                    <?php
                                                    if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_ConceptualConsistency->result->DQ_ConformanceResult->explanation) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_ConceptualConsistency->result->DQ_ConformanceResult->explanation != "") {
                                                        ?>
                                                        <tr class='Conceptual'>
                                                            <td>
                                                                <label class="form-check-label" for="c15_t2_conform_result">
                                                                    <b>Conformance Result:</b>
                                                                    <?php echo $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_ConceptualConsistency->result->DQ_ConformanceResult->explanation; ?>
                                                                </label>
                                                            </td>
                                                        </tr>
                                                        <?php
                                                    }
                                                    ?>
                                                    <?php //================= ?>
                                                    <?php
                                                    if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_DomainConsistency->consistDomainScope) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_DomainConsistency->consistDomainScope != "") {
                                                        ?>
                                                        <tr class='Domain'>
                                                            <td>
                                                                <label class="form-check-label" for="c3_1">
                                                                    <b>Scope:</b>
                                                                    <?php echo trim($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_DomainConsistency->consistDomainScope); ?>
                                                                </label>
                                                            </td>
                                                        </tr>
                                                        <?php
                                                    }
                                                    ?>
                                                    <?php
                                                    if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_DomainConsistency->compDomainLevel) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_DomainConsistency->compDomainLevel != "") {
                                                        ?>
                                                        <tr class='Domain'>
                                                            <td>
                                                                <label class="form-check-label" for="c3_3">
                                                                    <b>Compliance Level:</b>
                                                                    <?php echo $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_DomainConsistency->compDomainLevel; ?>
                                                                </label>
                                                            </td>
                                                        </tr>
                                                        <?php
                                                    }
                                                    ?>
                                                    <?php
                                                    if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_DomainConsistency->dateTime->Date) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_DomainConsistency->dateTime->Date != "") {
                                                        ?>
                                                        <tr class='Domain'>
                                                            <td>
                                                                <label class="form-check-label" for="c15_t2_conceptual_date">
                                                                    <b>Date:</b>
                                                                    <?php echo $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_DomainConsistency->dateTime->Date; ?>
                                                                </label>
                                                            </td>
                                                        </tr>
                                                        <?php
                                                    }
                                                    ?>
                                                    <?php
                                                    if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_DomainConsistency->result->DQ_ConformanceResult->pass) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_DomainConsistency->result->DQ_ConformanceResult->pass != "") {
                                                        ?>
                                                        <tr class='Domain'>
                                                            <td>
                                                                <label class="form-check-label" for="c3_2">
                                                                    <b>Result:</b>
                                                                    <?php echo trim($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_DomainConsistency->result->DQ_ConformanceResult->pass); ?>
                                                                </label>
                                                            </td>
                                                        </tr>
                                                        <?php
                                                    }
                                                    ?>
                                                    <?php
                                                    if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_DomainConsistency->result->DQ_ConformanceResult->explanation) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_DomainConsistency->result->DQ_ConformanceResult->explanation != "") {
                                                        ?>
                                                        <tr class='Domain'>
                                                            <td>
                                                                <label class="form-check-label" for="c3_4">
                                                                    <b>Conformance Result:</b>
                                                                    <?php echo $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_DomainConsistency->result->DQ_ConformanceResult->explanation; ?>
                                                                </label>
                                                            </td>
                                                        </tr>
                                                        <?php
                                                    }
                                                    ?>
                                                    <?php //================= ?>
                                                    <?php
                                                    if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_FormatConsistency->consistFormatScope) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_FormatConsistency->consistFormatScope != "") {
                                                        ?>
                                                        <tr class='Format'>
                                                            <td>
                                                                <label class="form-check-label" for="c3_1">
                                                                    <b>Scope:</b>
                                                                    <?php echo trim($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_FormatConsistency->consistFormatScope); ?>
                                                                </label>
                                                            </td>
                                                        </tr>
                                                        <?php
                                                    }
                                                    ?>
                                                    <?php
                                                    if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_FormatConsistency->compFormatLevel->CharacterString) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_FormatConsistency->compFormatLevel->CharacterString != "") {
                                                        ?>
                                                        <tr class='Format'>
                                                            <td>
                                                                <label class="form-check-label" for="c3_3">
                                                                    <b>Compliance Level:</b>
                                                                    <?php echo $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_FormatConsistency->compFormatLevel->CharacterString; ?>
                                                                </label>
                                                            </td>
                                                        </tr>
                                                        <?php
                                                    }
                                                    ?>
                                                    <?php
                                                    if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_FormatConsistency->dateTime->Date) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_FormatConsistency->dateTime->Date != "") {
                                                        ?>
                                                        <tr class='Format'>
                                                            <td>
                                                                <label class="form-check-label" for="c15_t2_conceptual_date">
                                                                    <b>Date:</b>
                                                                    <?php echo $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_FormatConsistency->dateTime->Date; ?>
                                                                </label>
                                                            </td>
                                                        </tr>
                                                        <?php
                                                    }
                                                    ?>
                                                    <?php
                                                    if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_FormatConsistency->result->DQ_ConformanceResult->pass) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_FormatConsistency->result->DQ_ConformanceResult->pass != "") {
                                                        ?>
                                                        <tr class='Format'>
                                                            <td>
                                                                <label class="form-check-label" for="c3_2">
                                                                    <b>Result:</b>
                                                                    <?php echo trim($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_FormatConsistency->result->DQ_ConformanceResult->pass); ?>
                                                                </label>
                                                            </td>
                                                        </tr>
                                                        <?php
                                                    }
                                                    ?>
                                                    <?php
                                                    if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_FormatConsistency->result->DQ_ConformanceResult->explanation) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_FormatConsistency->result->DQ_ConformanceResult->explanation != "") {
                                                        ?>
                                                        <tr class='Format'>
                                                            <td>
                                                                <label class="form-check-label" for="c3_4">
                                                                    <b>Conformance Result:</b>
                                                                    <?php echo $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_FormatConsistency->result->DQ_ConformanceResult->explanation; ?>
                                                                </label>
                                                            </td>
                                                        </tr>
                                                        <?php
                                                    }
                                                    ?>
                                                    <?php //================= ?>
                                                    <?php
                                                    if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_TopologicalConsistency->consistTopoScope) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_TopologicalConsistency->consistTopoScope != "") {
                                                        ?>
                                                        <tr class='Topological'>
                                                            <td>
                                                                <label class="form-check-label" for="c3_1">
                                                                    <b>Scope:</b>
                                                                    <?php echo trim($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_TopologicalConsistency->consistTopoScope); ?>
                                                                </label>
                                                            </td>
                                                        </tr>
                                                        <?php
                                                    }
                                                    ?>
                                                    <?php
                                                    if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_TopologicalConsistency->compTopoLevel->CharacterString) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_TopologicalConsistency->compTopoLevel->CharacterString != "") {
                                                        ?>
                                                        <tr class='Topological'>
                                                            <td>
                                                                <label class="form-check-label" for="c3_3">
                                                                    <b>Compliance Level:</b>
                                                                    <?php echo $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_TopologicalConsistency->compTopoLevel->CharacterString; ?>
                                                                </label>
                                                            </td>
                                                        </tr>
                                                        <?php
                                                    }
                                                    ?>
                                                    <?php
                                                    if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_TopologicalConsistency->dateTime->Date) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_TopologicalConsistency->dateTime->Date != "") {
                                                        ?>
                                                        <tr class='Topological'>
                                                            <td>
                                                                <label class="form-check-label" for="c15_t2_conceptual_date">
                                                                    <b>Date:</b>
                                                                    <?php echo $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_TopologicalConsistency->dateTime->Date; ?>
                                                                </label>
                                                            </td>
                                                        </tr>
                                                        <?php
                                                    }
                                                    ?>
                                                    <?php
                                                    if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_TopologicalConsistency->result->DQ_ConformanceResult->pass) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_TopologicalConsistency->result->DQ_ConformanceResult->pass != "") {
                                                        ?>
                                                        <tr class='Topological'>
                                                            <td>
                                                                <label class="form-check-label" for="c3_2">
                                                                    <b>Result:</b>
                                                                    <?php echo trim($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_TopologicalConsistency->result->DQ_ConformanceResult->pass); ?>
                                                                </label>
                                                            </td>
                                                        </tr>
                                                        <?php
                                                    }
                                                    ?>
                                                    <?php
                                                    if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_TopologicalConsistency->result->DQ_ConformanceResult->explanation) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_TopologicalConsistency->result->DQ_ConformanceResult->explanation != "") {
                                                        ?>
                                                        <tr class='Topological'>
                                                            <td>
                                                                <label class="form-check-label" for="c3_4">
                                                                    <b>Conformance Result:</b>
                                                                    <?php echo $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_TopologicalConsistency->result->DQ_ConformanceResult->explanation; ?>  
                                                                </label>
                                                            </td>
                                                        </tr>
                                                        <?php
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
                                                    <?php
                                                    if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_AbsoluteExternalPositionalAccuracy->posAccAbsoluteScope) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_AbsoluteExternalPositionalAccuracy->posAccAbsoluteScope != "") {
                                                        ?>
                                                        <tr class='AbsoluteorExternal'>
                                                            <td>
                                                                <label class="form-check-label" for="c15_t3_scope">
                                                                    <b>Scope:</b>
                                                                    <?php echo trim($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_AbsoluteExternalPositionalAccuracy->posAccAbsoluteScope); ?>
                                                                </label>
                                                            </td>
                                                        </tr>
                                                        <?php
                                                    }
                                                    ?>
                                                    <?php
                                                    if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_AbsoluteExternalPositionalAccuracy->compPosAccAbsoluteLevel) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_AbsoluteExternalPositionalAccuracy->compPosAccAbsoluteLevel != "") {
                                                        ?>
                                                        <tr class='AbsoluteorExternal'>
                                                            <td>
                                                                <label class="form-check-label" for="c15_t3_comply_level">
                                                                    <b>Compliance Level:</b>
                                                                    <?php echo $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_AbsoluteExternalPositionalAccuracy->compPosAccAbsoluteLevel; ?>
                                                                </label>
                                                            </td>
                                                        </tr>
                                                        <?php
                                                    }
                                                    ?>
                                                    <?php
                                                    if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_AbsoluteExternalPositionalAccuracy->dateTime->Date) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_AbsoluteExternalPositionalAccuracy->dateTime->Date != "") {
                                                        ?>
                                                        <tr class='AbsoluteorExternal'>
                                                            <td>
                                                                <label class="form-check-label" for="c15_t3_date">
                                                                    <b>Date:</b>
                                                                    <?php echo $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_AbsoluteExternalPositionalAccuracy->dateTime->Date; ?>
                                                                </label>
                                                            </td>
                                                        </tr>
                                                        <?php
                                                    }
                                                    ?>
                                                    <?php
                                                    if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_AbsoluteExternalPositionalAccuracy->result->DQ_ConformanceResult->pass) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_AbsoluteExternalPositionalAccuracy->result->DQ_ConformanceResult->pass != "") {
                                                        ?>
                                                        <tr class='AbsoluteorExternal'>
                                                            <td>
                                                                <label class="form-check-label" for="c15_t3_result">
                                                                    <b>Result:</b>
                                                                    <?php echo trim($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_AbsoluteExternalPositionalAccuracy->result->DQ_ConformanceResult->pass); ?>
                                                                </label>
                                                            </td>
                                                        </tr>
                                                        <?php
                                                    }
                                                    ?>
                                                    <?php
                                                    if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_AbsoluteExternalPositionalAccuracy->result->DQ_ConformanceResult->explanation) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_AbsoluteExternalPositionalAccuracy->result->DQ_ConformanceResult->explanation != "") {
                                                        ?>
                                                        <tr class='AbsoluteorExternal'>
                                                            <td>
                                                                <label class="form-check-label" for="c15_t3_conform_result">
                                                                    <b>Conformance Result:</b>
                                                                    <?php echo $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_AbsoluteExternalPositionalAccuracy->result->DQ_ConformanceResult->explanation; ?>
                                                                </label>
                                                            </td>
                                                        </tr>
                                                        <?php
                                                    }
                                                    ?>
                                                    <?php //================= ?>
                                                    <?php
                                                    if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_RelativeInternalPositionalAccuracy->posAccRelativeScope) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_RelativeInternalPositionalAccuracy->posAccRelativeScope != "") {
                                                        ?>
                                                        <tr class='RelativeorInternal'>
                                                            <td>
                                                                <label class="form-check-label" for="c15_t3_scope_2">
                                                                    <b>Scope:</b>
                                                                    <?php echo trim($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_RelativeInternalPositionalAccuracy->posAccRelativeScope); ?>
                                                                </label>
                                                            </td>
                                                        </tr>
                                                        <?php
                                                    }
                                                    ?>
                                                    <?php
                                                    if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_RelativeInternalPositionalAccuracy->posAccRelativeLevel) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_RelativeInternalPositionalAccuracy->posAccRelativeLevel != "") {
                                                        ?>
                                                        <tr class='RelativeorInternal'>
                                                            <td>
                                                                <label class="form-check-label" for="c15_t3_comply_level_2">
                                                                    <b>Compliance Level:</b>
                                                                    <?php echo $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_RelativeInternalPositionalAccuracy->posAccRelativeLevel; ?>
                                                                </label>
                                                            </td>
                                                        </tr>
                                                        <?php
                                                    }
                                                    ?>
                                                    <?php
                                                    if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_RelativeInternalPositionalAccuracy->dateTime->Date) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_RelativeInternalPositionalAccuracy->dateTime->Date != "") {
                                                        ?>
                                                        <tr class='RelativeorInternal'>
                                                            <td>
                                                                <label class="form-check-label" for="c15_t3_date_2">
                                                                    <b>Date:</b>
                                                                    <?php echo $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_RelativeInternalPositionalAccuracy->dateTime->Date; ?>
                                                                </label>
                                                            </td>
                                                        </tr>
                                                        <?php
                                                    }
                                                    ?>
                                                    <?php
                                                    if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_RelativeInternalPositionalAccuracy->result->DQ_ConformanceResult->pass) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_RelativeInternalPositionalAccuracy->result->DQ_ConformanceResult->pass != "") {
                                                        ?>
                                                        <tr class='RelativeorInternal'>
                                                            <td>
                                                                <label class="form-check-label" for="c15_t3_result_2">
                                                                    <b>Result:</b>
                                                                    <?php echo trim($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_RelativeInternalPositionalAccuracy->result->DQ_ConformanceResult->pass); ?>
                                                                </label>
                                                            </td>
                                                        </tr>
                                                        <?php
                                                    }
                                                    ?>
                                                    <?php
                                                    if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_RelativeInternalPositionalAccuracy->result->DQ_ConformanceResult->explanation) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_RelativeInternalPositionalAccuracy->result->DQ_ConformanceResult->explanation != "") {
                                                        ?>
                                                        <tr class='RelativeorInternal'>
                                                        <td>
                                                            <label class="form-check-label" for="c15_t3_conform_result_2">
                                                                <b>Conformance Result:</b>
                                                                <?php echo $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_RelativeInternalPositionalAccuracy->result->DQ_ConformanceResult->explanation; ?>
                                                                </label>
                                                            </td>
                                                        </tr>
                                                        <?php
                                                    }
                                                    ?> 
                                                    <?php //================= ?>
                                                    <?php
                                                    if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_GriddedDataPositionalAccuracy->posAccGridScope) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_GriddedDataPositionalAccuracy->posAccGridScope != "") {
                                                        ?>
                                                        <tr class='GriddedData'>
                                                            <td>
                                                                <label class="form-check-label" for="c15_t3_scope_3">
                                                                    <b>Scope:</b>
                                                                    <?php echo trim($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_GriddedDataPositionalAccuracy->posAccGridScope); ?>
                                                                </label>
                                                            </td>
                                                        </tr>
                                                        <?php
                                                    }
                                                    ?>
                                                    <?php
                                                    if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_GriddedDataPositionalAccuracy->posAccGridLevel->CharacterString) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_GriddedDataPositionalAccuracy->posAccGridLevel->CharacterString != "") {
                                                        ?>
                                                        <tr class='GriddedData'>
                                                            <td>
                                                                <label class="form-check-label" for="c15_t3_comply_level_3">
                                                                    <b>Compliance Level:</b>
                                                                    <?php echo $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_GriddedDataPositionalAccuracy->posAccGridLevel->CharacterString; ?>
                                                                </label>
                                                            </td>
                                                        </tr>
                                                        <?php
                                                    }
                                                    ?>
                                                    <?php
                                                    if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_GriddedDataPositionalAccuracy->dateTime->Date) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_GriddedDataPositionalAccuracy->dateTime->Date != "") {
                                                        ?>
                                                        <tr class='GriddedData'>
                                                            <td>
                                                                <label class="form-check-label" for="c15_t3_date_3">
                                                                    <b>Date:</b>
                                                                    <?php echo $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_GriddedDataPositionalAccuracy->dateTime->Date; ?>
                                                                </label>
                                                            </td>
                                                        </tr>
                                                        <?php
                                                    }
                                                    ?>
                                                    <?php
                                                    if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_GriddedDataPositionalAccuracy->result->DQ_ConformanceResult->pass) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_GriddedDataPositionalAccuracy->result->DQ_ConformanceResult->pass != "") {
                                                        ?>
                                                        <tr class='GriddedData'>
                                                            <td>
                                                                <label class="form-check-label" for="c15_t3_result_3">
                                                                    <b>Result:</b>
                                                                    <?php echo trim($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_GriddedDataPositionalAccuracy->result->DQ_ConformanceResult->pass); ?>
                                                                </label>
                                                            </td>
                                                        </tr>
                                                        <?php
                                                    }
                                                    ?>
                                                    <?php
                                                    if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_GriddedDataPositionalAccuracy->result->DQ_ConformanceResult->explanation->CharacterString) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_GriddedDataPositionalAccuracy->result->DQ_ConformanceResult->explanation->CharacterString != "") {
                                                        ?>
                                                        <tr class='GriddedData'>
                                                            <td>
                                                                <label class="form-check-label" for="c15_t3_conform_result_3">
                                                                    <b>Conformance Result:</b>
                                                                    <?php echo $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_GriddedDataPositionalAccuracy->result->DQ_ConformanceResult->explanation->CharacterString; ?>
                                                                </label>
                                                            </td>
                                                        </tr>
                                                        <?php
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
                                                    <?php
                                                    if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_AccuracyOfATimeMeasurement->AccuracyOfATimeMeasurementScope) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_AccuracyOfATimeMeasurement->AccuracyOfATimeMeasurementScope != "") {
                                                        ?>
                                                        <tr class='AccuracyorTimeMeasurement'>
                                                            <td>
                                                                <label class="form-check-label" for="c15_t4_accuTimeMeasure_scope">
                                                                    <b>Scope:</b>
                                                                    <?php echo trim($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_AccuracyOfATimeMeasurement->AccuracyOfATimeMeasurementScope); ?>
                                                                </label>
                                                            </td>
                                                        </tr>
                                                        <?php
                                                    }
                                                    ?>
                                                    <?php
                                                    if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_AccuracyOfATimeMeasurement->AccuracyOfATimeMeasurementLevel) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_AccuracyOfATimeMeasurement->AccuracyOfATimeMeasurementLevel != "") {
                                                        ?>
                                                        <tr class='AccuracyorTimeMeasurement'>
                                                            <td>
                                                                <label class="form-check-label" for="c3_3">
                                                                    <b>Compliance Level:</b>
                                                                    <?php echo $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_AccuracyOfATimeMeasurement->AccuracyOfATimeMeasurementLevel; ?>
                                                                </label>
                                                            </td>
                                                        </tr>
                                                        <?php
                                                    }
                                                    ?>
                                                    <?php
                                                    if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_AccuracyOfATimeMeasurement->dateTime->Date) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_AccuracyOfATimeMeasurement->dateTime->Date != "") {
                                                        ?>
                                                        <tr class='AccuracyorTimeMeasurement'>
                                                            <td>
                                                                <label class="form-check-label" for="c15_t4_accuTimeMeasure_date">
                                                                    <b>Date:</b>
                                                                    <?php echo $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_AccuracyOfATimeMeasurement->dateTime->Date; ?>
                                                                </label>
                                                            </td>
                                                        </tr>
                                                        <?php
                                                    }
                                                    ?>
                                                    <?php
                                                    if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_AccuracyOfATimeMeasurement->result->DQ_ConformanceResult->pass) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_AccuracyOfATimeMeasurement->result->DQ_ConformanceResult->pass != "") {
                                                        ?>
                                                        <tr class='AccuracyorTimeMeasurement'>
                                                            <td>
                                                                <label class="form-check-label" for="c3_2">
                                                                    <b>Result:</b>
                                                                    <?php echo trim($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_AccuracyOfATimeMeasurement->result->DQ_ConformanceResult->pass); ?>
                                                                </label>
                                                            </td>
                                                        </tr>
                                                        <?php
                                                    }
                                                    ?>
                                                    <?php
                                                    if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_AccuracyOfATimeMeasurement->result->DQ_ConformanceResult->explanation) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_AccuracyOfATimeMeasurement->result->DQ_ConformanceResult->explanation != "") {
                                                        ?>
                                                        <tr class='AccuracyorTimeMeasurement'>
                                                            <td>
                                                                <label class="form-check-label" for="c3_4">
                                                                    <b>Conformance Result:</b>
                                                                    <?php echo $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_AccuracyOfATimeMeasurement->result->DQ_ConformanceResult->explanation; ?>
                                                                </label>
                                                            </td>
                                                        </tr>
                                                        <?php
                                                    }
                                                    ?>
                                                    <?php //================= ?>
                                                    <?php
                                                    if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_TemporalConsistency->TemporalConsistencyScope) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_TemporalConsistency->TemporalConsistencyScope != "") {
                                                        ?>
                                                        <tr class='TemporalConsistency'>
                                                            <td>
                                                                <label class="form-check-label" for="c15_t4_scope_2">
                                                                    <b>Scope:</b>
                                                                    <?php echo trim($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_TemporalConsistency->TemporalConsistencyScope); ?>
                                                                </label>
                                                            </td>
                                                        </tr>
                                                        <?php
                                                    }
                                                    ?>
                                                    <?php
                                                    if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_TemporalConsistency->TemporalConsistencyLevel->CharacterString) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_TemporalConsistency->TemporalConsistencyLevel->CharacterString != "") {
                                                        ?>
                                                        <tr class='TemporalConsistency'>
                                                            <td>
                                                                <label class="form-check-label" for="c15_t4_comply_level_2">
                                                                    <b>Compliance Level:</b>
                                                                    <?php echo $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_TemporalConsistency->TemporalConsistencyLevel->CharacterString; ?>
                                                                </label>
                                                            </td>
                                                        </tr>
                                                        <?php
                                                    }
                                                    ?>
                                                    <?php
                                                    if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_TemporalConsistency->dateTime->Date) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_TemporalConsistency->dateTime->Date != "") {
                                                        ?>
                                                        <tr class='TemporalConsistency'>
                                                            <td>
                                                                <label class="form-check-label" for="c15_t4_date_2">
                                                                    <b>Date:</b>
                                                                    <?php echo $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_TemporalConsistency->dateTime->Date; ?>
                                                                </label>
                                                            </td>
                                                        </tr>
                                                        <?php
                                                    }
                                                    ?>
                                                    <?php
                                                    if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_TemporalConsistency->result->DQ_ConformanceResult->pass) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_TemporalConsistency->result->DQ_ConformanceResult->pass != "") {
                                                        ?>
                                                        <tr class='TemporalConsistency'>
                                                            <td>
                                                                <label class="form-check-label" for="c15_t4_conform_result_2">
                                                                    <b>Result:</b>
                                                                    <?php echo trim($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_TemporalConsistency->result->DQ_ConformanceResult->pass); ?>
                                                                </label>
                                                            </td>
                                                        </tr>
                                                        <?php
                                                    }
                                                    ?>
                                                    <?php
                                                    if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_TemporalConsistency->result->DQ_ConformanceResult->explanation->CharacterString) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_TemporalConsistency->result->DQ_ConformanceResult->explanation->CharacterString != "") {
                                                        ?>
                                                        <tr class='TemporalConsistency'>
                                                            <td>
                                                                <label class="form-check-label" for="c15_t4_conform_result_2">
                                                                    <b>Conformance Result:</b>
                                                                    <?php echo $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_TemporalConsistency->result->DQ_ConformanceResult->explanation->CharacterString; ?>
                                                                </label>
                                                            </td>
                                                        </tr>
                                                        <?php
                                                    }
                                                    ?>
                                                    <?php //================= ?>
                                                    <?php
                                                    if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_TemporalValidity->TemporalValidityScope) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_TemporalValidity->TemporalValidityScope != "") {
                                                        ?>
                                                        <tr class='TemporalValidity'>
                                                            <td>
                                                                <label class="form-check-label" for="c15_t4_accuTimeMeasure_scope">
                                                                    <b>Scope:</b>
                                                                    <?php echo trim($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_TemporalValidity->TemporalValidityScope); ?>
                                                                </label>
                                                            </td>
                                                        </tr>
                                                        <?php
                                                    }
                                                    ?>
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
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