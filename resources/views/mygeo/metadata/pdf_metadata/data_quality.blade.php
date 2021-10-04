<?php $flag = 1; ?>
<style>
    td {
padding-right: 2rem;
    }
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
                <b>Data Quality Information</b>
            </div>
            <div class="pl-lg-2">
                <div class="row mb-2">
                    <?php
                    if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->scope->DQ_Scope->level->MD_ScopeCode) && $metadataxml->dataQualityInfo->DQ_DataQuality->scope->DQ_Scope->level->MD_ScopeCode != "") {
                        $flag *= 0;
                        ?>
                        <div class="col-xl-1">
                            <label class="form-control-label" for="input-DQscope">
                                DQ Scope
                            </label>
                        </div>
                        <div class="col-xl-3">
                            <?php echo trim($metadataxml->dataQualityInfo->DQ_DataQuality->scope->DQ_Scope->level->MD_ScopeCode); ?>
                        </div>
                        <?php
                    }
                    ?>
                    <?php
                    if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->lineage->LI_Lineage->statement->CharacterString) && trim($metadataxml->dataQualityInfo->DQ_DataQuality->lineage->LI_Lineage->statement->CharacterString) != "") {
                        $flag *= 0;
                        ?>
                        <div class="col-xl-2">
                            <label class="form-control-label float-right" for="input-datahistory">
                                Data History</label>
                        </div>
                        <div class="col-md-2">
                            <?php echo $metadataxml->dataQualityInfo->DQ_DataQuality->lineage->LI_Lineage->statement->CharacterString; ?>
                        </div>
                        <?php
                    }
                    ?>
                    <?php
                    if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_Element->dateTime->Date) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_Element->dateTime->Date != "") {
                        $flag *= 0;
                        ?>
                        <div class="col-xl-1">
                            <label class="form-control-label  float-right" for="input-date">
                                Date :
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
                <div class="card card-primary card-outline card-outline-tabs col-xl-12">
                    <div class="card-header p-0 border-bottom-0">
                        <ul class="nav nav-tabs" id="custom-tabs-four-tab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="tab_completeness" data-toggle="pill" href="#completeness" role="tab" aria-controls="completeness" aria-selected="true">Completeness</a>
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
                                                            <h4>Completeness Commission</h4>

                                                        </td>
                                                        <td>
                                                            <h4>Completeness Omission</h4>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <?php //================= ?>
                                                            <?php
                                                            if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_CompletenessCommission->compCommissScope->compCommissScopeItem->CharacterString) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_CompletenessCommission->compCommissScope->compCommissScopeItem->CharacterString != "") {
                                                                $flag *= 0;
                                                                ?>
                                                                <div class="form-group">
                                                                    <label class="form-check-label" for="c3_1">
                                                                        <b>Scope:</b>
                                                                        <?php echo trim($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_CompletenessCommission->compCommissScope->compCommissScopeItem->CharacterString); ?>
                                                                    </label>
                                                                </div>
                                                                <?php
                                                            }
                                                            ?>
                                                            <?php
                                                            if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_CompletenessCommission->compCommissComplLevel->CharacterString) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_CompletenessCommission->compCommissComplLevel->CharacterString != "") {
                                                                $flag *= 0;
                                                                ?>
                                                                <div class="form-group">
                                                                    <label class="form-check-label" for="c3_3">
                                                                        <b>Compliance Level:</b>
                                                                        <?php echo $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_CompletenessCommission->compCommissComplLevel->CharacterString; ?>
                                                                    </label>
                                                                </div>
                                                                <?php
                                                            }
                                                            ?>
                                                            <?php
                                                            if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_CompletenessCommission->dateTime->Date) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_CompletenessCommission->dateTime->Date != "") {
                                                                $flag *= 0;
                                                                ?>
                                                                <div class="form-group">
                                                                        <label class="form-check-label" for="c15_t1_commission_date">
                                                                            <b>Date:</b>
                                                                            <?php echo date('d/m/Y',strtotime(trim($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_CompletenessCommission->dateTime->Date))); ?>
                                                                        </label>
                                                                </div>
                                                                <?php
                                                            }
                                                            ?>
                                                            <?php
                                                            if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_CompletenessCommission->result->DQ_ConformanceResult->pass->Boolean) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_CompletenessCommission->result->DQ_ConformanceResult->pass->Boolean != "") {
                                                                $flag *= 0;
                                                                ?>
                                                                <div class="form-group">
                                                                        <label class="form-check-label" for="c3_2">
                                                                            <b>Result:</b>
                                                                            <?php echo trim($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_CompletenessCommission->result->DQ_ConformanceResult->pass->Boolean); ?>
                                                                        </label>
                                                                </div>
                                                                <?php
                                                            }
                                                            ?>
                                                            <?php
                                                            if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_CompletenessCommission->result->DQ_ConformanceResult->explanation->CharacterString) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_CompletenessCommission->result->DQ_ConformanceResult->explanation->CharacterString != "") {
                                                                $flag *= 0;
                                                                ?>
                                                                <div class="form-group">
                                                                        <label class="form-check-label" for="c15_t1_conform_result">
                                                                            <b>Conformance Result:</b>
                                                                            <?php echo $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_CompletenessCommission->result->DQ_ConformanceResult->explanation->CharacterString; ?>
                                                                        </label>
                                                                </div>
                                                                <?php
                                                            }
                                                            ?>
                                                        </td>
                                                        <td>
                                                            <?php //================= ?>
                                                            <?php
                                                            if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_CompletenessOmission->compOmissScope->compOmissScopeItem->CharacterString) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_CompletenessOmission->compOmissScope->compOmissScopeItem->CharacterString != "") {
                                                                $flag *= 0;
                                                                ?>
                                                                <div class="form-group">
                                                                        <label class="form-check-label" for="c3_1">
                                                                            <b>Scope:</b>
                                                                            <?php echo trim($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_CompletenessOmission->compOmissScope->compOmissScopeItem->CharacterString); ?>
                                                                        </label>
                                                                </div>
                                                                <?php
                                                            }
                                                            ?>
                                                            <?php
                                                            if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_CompletenessOmission->compOmissComplLevel->CharacterString) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_CompletenessOmission->compOmissComplLevel->CharacterString != "") {
                                                                $flag *= 0;
                                                                ?>
                                                                <div class="form-group">
                                                                    <label class="form-check-label" for="c3_3">
                                                                        <b>Compliance Level:</b>
                                                                        <?php echo $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_CompletenessOmission->compOmissComplLevel->CharacterString; ?>
                                                                    </label>
                                                                </div>
                                                                <?php
                                                            }
                                                            ?>
                                                            <?php
                                                            if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_CompletenessOmission->dateTime->Date) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_CompletenessOmission->dateTime->Date != "") {
                                                                $flag *= 0;
                                                                ?>
                                                                <div class="form-group">
                                                                    <label class="form-check-label" for="c15_t1_commission_date">
                                                                        <b>Date:</b>
                                                                        <?php echo date('d/m/Y',strtotime(trim($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_CompletenessOmission->dateTime->Date))); ?>
                                                                    </label>
                                                                </div>
                                                                <?php
                                                            }
                                                            ?>
                                                            <?php
                                                            if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_CompletenessOmission->result->DQ_ConformanceResult->pass->Boolean) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_CompletenessOmission->result->DQ_ConformanceResult->pass->Boolean != "") {
                                                                $flag *= 0;
                                                                ?>
                                                                <div class="form-group">
                                                                    <label class="form-check-label" for="c3_2">
                                                                        <b>Result:</b>
                                                                        <?php echo trim($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_CompletenessOmission->result->DQ_ConformanceResult->pass->Boolean); ?>
                                                                    </label>
                                                                </div>
                                                                <?php
                                                            }
                                                            ?>
                                                            <?php
                                                            if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_CompletenessOmission->result->DQ_ConformanceResult->explanation->CharacterString) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_CompletenessOmission->result->DQ_ConformanceResult->explanation->CharacterString != "") {
                                                                $flag *= 0;
                                                                ?>
                                                                <div class="form-group">
                                                                    <label class="form-check-label" for="c3_4">
                                                                        <b>Conformance Result:</b>
                                                                        <?php echo $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_CompletenessOmission->result->DQ_ConformanceResult->explanation->CharacterString; ?>
                                                                    </label>
                                                                </div>
                                                                <?php
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
                                <a class="nav-link active" id="tab_consistency" data-toggle="pill" href="#consistency" role="tab" aria-controls="consistency" aria-selected="false">Consistency</a>
                            </li>
                        </ul>
                    </div>
                    <div class="card-body">
                        <div class="tab-content" id="custom-tabs-four-tabContent">
                            <div class="tab-pane fade active show" id="consistency" role="tabpanel" aria-labelledby="tab_consistency">
                                <div class="form-group row">
                                    <div class="d-flex flex-wrap bd-highlight">
                                        <div class="table-responsive">
                                            <table class="table-borderless">
                                                <tbody>
                                                    <tr>
                                                        <td>
                                                            <h4>Conceptual Consistency</h4>
                                                        </td>
                                                        <td>
                                                            <h4>Domain Consistency</h4>
                                                        </td>
                                                        <td>
                                                            <h4>Format Consistency</h4>
                                                        </td>
                                                        <td>
                                                            <h4>Topological Consistency</h4>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <?php
                                                            if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_ConceptualConsistency->consistConceptScope->consistConceptScopeItem->CharacterString) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_ConceptualConsistency->consistConceptScope->consistConceptScopeItem->CharacterString != "") {
                                                                $flag *= 0;
                                                                ?>
                                                                <div class="form-group">
                                                                    <label class="form-check-label" for="c15_t2_scope">
                                                                        <b>Scope:</b>
                                                                        <?php echo trim($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_ConceptualConsistency->consistConceptScope->consistConceptScopeItem->CharacterString); ?>
                                                                    </label>
                                                                </div>
                                                                <?php
                                                            }
                                                            ?>
                                                            <?php
                                                            if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_ConceptualConsistency->compOmissLevel->CharacterString) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_ConceptualConsistency->compOmissLevel->CharacterString != "") {
                                                                $flag *= 0;
                                                                ?>
                                                                <div class="form-group">
                                                                    <label class="form-check-label" for="c15_t2_comply_level">
                                                                        <b>Compliance Level:</b>
                                                                        <?php echo $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_ConceptualConsistency->compOmissLevel->CharacterString; ?>
                                                                    </label>
                                                                </div>
                                                                <?php
                                                            }
                                                            ?>
                                                            <?php
                                                            if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_ConceptualConsistency->dateTime->Date) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_ConceptualConsistency->dateTime->Date != "") {
                                                                $flag *= 0;
                                                                ?>
                                                                <div class="form-group">
                                                                    <label class="form-check-label" for="c15_t2_date">
                                                                        <b>Date:</b>
                                                                        <?php echo date('d/m/Y',strtotime(trim($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_ConceptualConsistency->dateTime->Date))); ?>
                                                                    </label>
                                                                </div>
                                                                <?php
                                                            }
                                                            ?>
                                                            <?php
                                                            if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_ConceptualConsistency->result->DQ_ConformanceResult->pass->Boolean) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_ConceptualConsistency->result->DQ_ConformanceResult->pass->Boolean != "") {
                                                                $flag *= 0;
                                                                ?>
                                                                <div class="form-group">
                                                                    <label class="form-check-label" for="c15_t2_result">
                                                                        <b>Result:</b>
                                                                        <?php echo trim($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_ConceptualConsistency->result->DQ_ConformanceResult->pass->Boolean); ?>
                                                                    </label>
                                                                </div>
                                                                <?php
                                                            }
                                                            ?>
                                                            <?php
                                                            if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_ConceptualConsistency->result->DQ_ConformanceResult->explanation->CharacterString) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_ConceptualConsistency->result->DQ_ConformanceResult->explanation->CharacterString != "") {
                                                                $flag *= 0;
                                                                ?>
                                                                <div class="form-group">
                                                                    <label class="form-check-label" for="c15_t2_conform_result">
                                                                        <b>Conformance Result:</b>
                                                                        <?php echo $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_ConceptualConsistency->result->DQ_ConformanceResult->explanation->CharacterString; ?>
                                                                    </label>
                                                                </div>
                                                                <?php
                                                            }
                                                            ?>
                                                        </td>
                                                        <td>
                                                            <?php
                                                            if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_DomainConsistency->consistDomainScope->consistConceptScopeItem->CharacterString) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_DomainConsistency->consistDomainScope->consistConceptScopeItem->CharacterString != "") {
                                                                $flag *= 0;
                                                                ?>
                                                                <div class="form-group">
                                                                    <label class="form-check-label" for="c3_1">
                                                                        <b>Scope:</b>
                                                                        <?php echo trim($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_DomainConsistency->consistDomainScope->consistConceptScopeItem->CharacterString); ?>
                                                                    </label>
                                                                </div>
                                                                <?php
                                                            }
                                                            ?>
                                                            <?php
                                                            if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_DomainConsistency->compDomainLevel->CharacterString) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_DomainConsistency->compDomainLevel->CharacterString != "") {
                                                                $flag *= 0;
                                                                ?>
                                                                <div class="form-group">
                                                                    <label class="form-check-label" for="c3_3">
                                                                        <b>Compliance Level:</b>
                                                                        <?php echo $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_DomainConsistency->compDomainLevel->CharacterString; ?>
                                                                    </label>
                                                                </div>
                                                                <?php
                                                            }
                                                            ?>
                                                            <?php
                                                            if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_DomainConsistency->dateTime->Date) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_DomainConsistency->dateTime->Date != "") {
                                                                $flag *= 0;
                                                                ?>
                                                                <div class="form-group">
                                                                    <label class="form-check-label" for="c15_t2_conceptual_date">
                                                                        <b>Date:</b>
                                                                        <?php echo date('d/m/Y',strtotime(trim($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_DomainConsistency->dateTime->Date))); ?>
                                                                    </label>
                                                                </div>
                                                                <?php
                                                            }
                                                            ?>
                                                            <?php
                                                            if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_DomainConsistency->result->DQ_ConformanceResult->pass->Boolean) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_DomainConsistency->result->DQ_ConformanceResult->pass->Boolean != "") {
                                                                $flag *= 0;
                                                                ?>
                                                                <div class="form-group">
                                                                    <label class="form-check-label" for="c3_2">
                                                                        <b>Result:</b>
                                                                        <?php echo trim($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_DomainConsistency->result->DQ_ConformanceResult->pass->Boolean); ?>
                                                                    </label>
                                                                </div>
                                                                <?php
                                                            }
                                                            ?>
                                                            <?php
                                                            if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_DomainConsistency->result->DQ_ConformanceResult->explanation->CharacterString) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_DomainConsistency->result->DQ_ConformanceResult->explanation->CharacterString != "") {
                                                                $flag *= 0;
                                                                ?>
                                                                <div class="form-group">
                                                                    <label class="form-check-label" for="c3_4">
                                                                        <b>Conformance Result:</b>
                                                                        <?php echo $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_DomainConsistency->result->DQ_ConformanceResult->explanation->CharacterString; ?>
                                                                    </label>
                                                                </div>
                                                                <?php
                                                            }
                                                            ?>
                                                        </td>
                                                        <td>
                                                            <?php
                                                            if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_FormatConsistency->consistFormatScope->consistFormatScopeItem->CharacterString) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_FormatConsistency->consistFormatScope->consistFormatScopeItem->CharacterString != "") {
                                                                $flag *= 0;
                                                                ?>
                                                                <div class="form-group">
                                                                    <label class="form-check-label" for="c3_1">
                                                                        <b>Scope:</b>
                                                                        <?php echo trim($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_FormatConsistency->consistFormatScope->consistFormatScopeItem->CharacterString); ?>
                                                                    </label>
                                                                </div>
                                                                <?php
                                                            }
                                                            ?>
                                                            <?php
                                                            if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_FormatConsistency->compFormatLevel->CharacterString) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_FormatConsistency->compFormatLevel->CharacterString != "") {
                                                                $flag *= 0;
                                                                ?>
                                                                <div class="form-group">
                                                                    <label class="form-check-label" for="c3_3">
                                                                        <b>Compliance Level:</b>
                                                                        <?php echo $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_FormatConsistency->compFormatLevel->CharacterString; ?>
                                                                    </label>
                                                                </div>
                                                                <?php
                                                            }
                                                            ?>
                                                            <?php
                                                            if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_FormatConsistency->dateTime->Date) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_FormatConsistency->dateTime->Date != "") {
                                                                $flag *= 0;
                                                                ?>
                                                                <div class="form-group">
                                                                    <label class="form-check-label" for="c15_t2_conceptual_date">
                                                                        <b>Date:</b>
                                                                        <?php echo date('d/m/Y',strtotime(trim($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_FormatConsistency->dateTime->Date))); ?>
                                                                    </label>
                                                                </div>
                                                                <?php
                                                            }
                                                            ?>
                                                            <?php
                                                            if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_FormatConsistency->result->DQ_ConformanceResult->pass->Boolean) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_FormatConsistency->result->DQ_ConformanceResult->pass->Boolean != "") {
                                                                $flag *= 0;
                                                                ?>
                                                                <div class="form-group">
                                                                    <label class="form-check-label" for="c3_2">
                                                                        <b>Result:</b>
                                                                        <?php echo trim($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_FormatConsistency->result->DQ_ConformanceResult->pass->Boolean); ?>
                                                                    </label>
                                                                </div>
                                                                <?php
                                                            }
                                                            ?>
                                                            <?php
                                                            if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_FormatConsistency->result->DQ_ConformanceResult->explanation->CharacterString) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_FormatConsistency->result->DQ_ConformanceResult->explanation->CharacterString != "") {
                                                                $flag *= 0;
                                                                ?>
                                                                <div class="form-group">
                                                                    <label class="form-check-label" for="c3_4">
                                                                        <b>Conformance Result:</b>
                                                                        <?php echo $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_FormatConsistency->result->DQ_ConformanceResult->explanation->CharacterString; ?>
                                                                    </label>
                                                                </div>
                                                                <?php
                                                            }
                                                            ?>
                                                        </td>
                                                        <td>
                                                            <?php
                                                            if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_TopologicalConsistency->consistTopoScope->consistTopoScopeItem->CharacterString) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_TopologicalConsistency->consistTopoScope->consistTopoScopeItem->CharacterString != "") {
                                                                $flag *= 0;
                                                                ?>
                                                                <div class="form-group">
                                                                    <label class="form-check-label" for="c3_1">
                                                                        <b>Scope:</b>
                                                                        <?php echo trim($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_TopologicalConsistency->consistTopoScope->consistTopoScopeItem->CharacterString); ?>
                                                                    </label>
                                                                </div>
                                                                <?php
                                                            }
                                                            ?>
                                                            <?php
                                                            if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_TopologicalConsistency->compTopoLevel->CharacterString) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_TopologicalConsistency->compTopoLevel->CharacterString != "") {
                                                                $flag *= 0;
                                                                ?>
                                                                <div class="form-group">
                                                                    <label class="form-check-label" for="c3_3">
                                                                        <b>Compliance Level:</b>
                                                                        <?php echo $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_TopologicalConsistency->compTopoLevel->CharacterString; ?>
                                                                    </label>
                                                                </div>
                                                                <?php
                                                            }
                                                            ?>
                                                            <?php
                                                            if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_TopologicalConsistency->dateTime->Date) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_TopologicalConsistency->dateTime->Date != "") {
                                                                $flag *= 0;
                                                                ?>
                                                                <div class="form-group">
                                                                    <label class="form-check-label" for="c15_t2_conceptual_date">
                                                                        <b>Date:</b>
                                                                        <?php echo date('d/m/Y',strtotime(trim($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_TopologicalConsistency->dateTime->Date))); ?>
                                                                    </label>
                                                                </div>
                                                                <?php
                                                            }
                                                            ?>
                                                            <?php
                                                            if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_TopologicalConsistency->result->DQ_ConformanceResult->pass->Boolean) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_TopologicalConsistency->result->DQ_ConformanceResult->pass->Boolean != "") {
                                                                $flag *= 0;
                                                                ?>
                                                                <div class="form-group">
                                                                    <label class="form-check-label" for="c3_2">
                                                                        <b>Result:</b>
                                                                        <?php echo trim($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_TopologicalConsistency->result->DQ_ConformanceResult->pass->Boolean); ?>
                                                                    </label>
                                                                </div>
                                                                <?php
                                                            }
                                                            ?>
                                                            <?php
                                                            if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_TopologicalConsistency->result->DQ_ConformanceResult->explanation->CharacterString) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_TopologicalConsistency->result->DQ_ConformanceResult->explanation->CharacterString != "") {
                                                                $flag *= 0;
                                                                ?>
                                                                <div class="form-group">
                                                                    <label class="form-check-label" for="c3_4">
                                                                        <b>Conformance Result:</b>
                                                                        <?php echo $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_TopologicalConsistency->result->DQ_ConformanceResult->explanation->CharacterString; ?>
                                                                    </label>
                                                                </div>
                                                                <?php
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
                                <a class="nav-link active" id="tab_position_accuracy" data-toggle="pill" href="#position_accuracy" role="tab" aria-controls="position_accuracy" aria-selected="false">Positional Accuracy</a>
                            </li>
                        </ul>
                    </div>
                    <div class="card-body">
                        <div class="tab-content" id="custom-tabs-four-tabContent">
                            <div class="tab-pane fade active show" id="position_accuracy" role="tabpanel" aria-labelledby="tab_position_accuracy">
                                <div class="form-group row">
                                    <div class="d-flex flex-wrap bd-highlight">
                                        <div class="table-responsive">
                                            <table class="table-borderless">
                                                <tbody>
                                                    <tr>
                                                        <td>
                                                            <h4>Absolute or External Accuracy</h4>
                                                        </td>
                                                        <td>
                                                            <h4>Relative or Internal Accuracy</h4>
                                                        </td>
                                                        <td>
                                                            <h4>Gridded Data Accuracy</h4>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <?php
                                                            if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_AbsoluteExternalPositionalAccuracy->posAccAbsoluteScope->posAccAbsoluteScopeItem->CharacterString) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_AbsoluteExternalPositionalAccuracy->posAccAbsoluteScope->posAccAbsoluteScopeItem->CharacterString != "") {
                                                                $flag *= 0;
                                                                ?>
                                                                <div class="form-group">
                                                                    <label class="form-check-label" for="c15_t3_scope">
                                                                        <b>Scope:</b>
                                                                        <?php echo trim($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_AbsoluteExternalPositionalAccuracy->posAccAbsoluteScope->posAccAbsoluteScopeItem->CharacterString); ?>
                                                                    </label>
                                                                </div>
                                                                <?php
                                                            }
                                                            ?>
                                                            <?php
                                                            if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_AbsoluteExternalPositionalAccuracy->compPosAccAbsoluteLevel->CharacterString) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_AbsoluteExternalPositionalAccuracy->compPosAccAbsoluteLevel->CharacterString != "") {
                                                                $flag *= 0;
                                                                ?>
                                                                <div class="form-group">
                                                                    <label class="form-check-label" for="c15_t3_comply_level">
                                                                        <b>Compliance Level:</b>
                                                                        <?php echo $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_AbsoluteExternalPositionalAccuracy->compPosAccAbsoluteLevel->CharacterString; ?>
                                                                    </label>
                                                                </div>
                                                                <?php
                                                            }
                                                            ?>
                                                            <?php
                                                            if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_AbsoluteExternalPositionalAccuracy->dateTime->Date) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_AbsoluteExternalPositionalAccuracy->dateTime->Date != "") {
                                                                $flag *= 0;
                                                                ?>
                                                                <div class="form-group">
                                                                    <label class="form-check-label" for="c15_t3_date">
                                                                        <b>Date:</b>
                                                                        <?php echo date('d/m/Y',strtotime(trim($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_AbsoluteExternalPositionalAccuracy->dateTime->Date))); ?>
                                                                    </label>
                                                                </div>
                                                                <?php
                                                            }
                                                            ?>
                                                            <?php
                                                            if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_AbsoluteExternalPositionalAccuracy->result->DQ_ConformanceResult->pass->Boolean) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_AbsoluteExternalPositionalAccuracy->result->DQ_ConformanceResult->pass->Boolean != "") {
                                                                $flag *= 0;
                                                                ?>
                                                                <div class="form-group">
                                                                    <label class="form-check-label" for="c15_t3_result">
                                                                        <b>Result:</b>
                                                                        <?php echo trim($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_AbsoluteExternalPositionalAccuracy->result->DQ_ConformanceResult->pass->Boolean); ?>
                                                                    </label>
                                                                </div>
                                                                <?php
                                                            }
                                                            ?>
                                                            <?php
                                                            if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_AbsoluteExternalPositionalAccuracy->result->DQ_ConformanceResult->explanation->CharacterString) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_AbsoluteExternalPositionalAccuracy->result->DQ_ConformanceResult->explanation->CharacterString != "") {
                                                                $flag *= 0;
                                                                ?>
                                                                <div class="form-group">
                                                                    <label class="form-check-label" for="c15_t3_conform_result">
                                                                        <b>Conformance Result:</b>
                                                                        <?php echo $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_AbsoluteExternalPositionalAccuracy->result->DQ_ConformanceResult->explanation->CharacterString; ?>
                                                                    </label>
                                                                </div>
                                                                <?php
                                                            }
                                                            ?>
                                                        </td>
                                                        <td>
                                                            <?php
                                                            if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_RelativeInternalPositionalAccuracy->posAccRelativeScope->posAccRelativeScopeItem->CharacterString) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_RelativeInternalPositionalAccuracy->posAccRelativeScope->posAccRelativeScopeItem->CharacterString != "") {
                                                                $flag *= 0;
                                                                ?>
                                                                <div class="form-group">
                                                                    <label class="form-check-label" for="c15_t3_scope_2">
                                                                        <b>Scope:</b>
                                                                        <?php echo trim($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_RelativeInternalPositionalAccuracy->posAccRelativeScope->posAccRelativeScopeItem->CharacterString); ?>
                                                                    </label>
                                                                </div>
                                                                <?php
                                                            }
                                                            ?>
                                                            <?php
                                                            if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_RelativeInternalPositionalAccuracy->posAccRelativeLevel->CharacterString) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_RelativeInternalPositionalAccuracy->posAccRelativeLevel->CharacterString != "") {
                                                                $flag *= 0;
                                                                ?>
                                                                <div class="form-group">
                                                                    <label class="form-check-label" for="c15_t3_comply_level_2">
                                                                        <b>Compliance Level:</b>
                                                                        <?php echo $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_RelativeInternalPositionalAccuracy->posAccRelativeLevel->CharacterString; ?>
                                                                    </label>
                                                                </div>
                                                                <?php
                                                            }
                                                            ?>
                                                            <?php
                                                            if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_RelativeInternalPositionalAccuracy->dateTime->Date) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_RelativeInternalPositionalAccuracy->dateTime->Date != "") {
                                                                $flag *= 0;
                                                                ?>
                                                                <div class="form-group">
                                                                    <label class="form-check-label" for="c15_t3_date_2">
                                                                        <b>Date:</b>
                                                                        <?php echo date('d/m/Y',strtotime(trim($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_RelativeInternalPositionalAccuracy->dateTime->Date))); ?>
                                                                    </label>
                                                                </div>
                                                                <?php
                                                            }
                                                            ?>
                                                            <?php
                                                            if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_RelativeInternalPositionalAccuracy->result->DQ_ConformanceResult->pass->Boolean) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_RelativeInternalPositionalAccuracy->result->DQ_ConformanceResult->pass->Boolean != "") {
                                                                $flag *= 0;
                                                                ?>
                                                                <div class="form-group">
                                                                    <label class="form-check-label" for="c15_t3_result_2">
                                                                        <b>Result:</b>
                                                                        <?php echo trim($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_RelativeInternalPositionalAccuracy->result->DQ_ConformanceResult->pass->Boolean); ?>
                                                                    </label>
                                                                </div>
                                                                <?php
                                                            }
                                                            ?>
                                                            <?php
                                                            if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_RelativeInternalPositionalAccuracy->result->DQ_ConformanceResult->explanation->CharacterString) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_RelativeInternalPositionalAccuracy->result->DQ_ConformanceResult->explanation->CharacterString != "") {
                                                                $flag *= 0;
                                                                ?>
                                                                <div class="form-group">
                                                                    <label class="form-check-label" for="c15_t3_conform_result_2">
                                                                        <b>Conformance Result:</b>
                                                                        <?php echo $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_RelativeInternalPositionalAccuracy->result->DQ_ConformanceResult->explanation->CharacterString; ?>
                                                                    </label>
                                                                </div>
                                                                <?php
                                                            }
                                                            ?>
                                                        </td>
                                                        <td>
                                                            <?php
                                                            if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_GriddedDataPositionalAccuracy->posAccGridScope->posAccGridScopeItem->CharacterString) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_GriddedDataPositionalAccuracy->posAccGridScope->posAccGridScopeItem->CharacterString != "") {
                                                                $flag *= 0;
                                                                ?>
                                                                <div class="form-group">
                                                                    <label class="form-check-label" for="c15_t3_scope_3">
                                                                        <b>Scope:</b>
                                                                        <?php echo trim($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_GriddedDataPositionalAccuracy->posAccGridScope->posAccGridScopeItem->CharacterString); ?>
                                                                    </label>
                                                                </div>
                                                                <?php
                                                            }
                                                            ?>
                                                            <?php
                                                            if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_GriddedDataPositionalAccuracy->posAccGridLevel->CharacterString) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_GriddedDataPositionalAccuracy->posAccGridLevel->CharacterString != "") {
                                                                $flag *= 0;
                                                                ?>
                                                                <div class="form-group">
                                                                    <label class="form-check-label" for="c15_t3_comply_level_3">
                                                                        <b>Compliance Level:</b>
                                                                        <?php echo $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_GriddedDataPositionalAccuracy->posAccGridLevel->CharacterString; ?>
                                                                    </label>
                                                                </div>
                                                                <?php
                                                            }
                                                            ?>
                                                            <?php
                                                            if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_GriddedDataPositionalAccuracy->dateTime->Date) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_GriddedDataPositionalAccuracy->dateTime->Date != "") {
                                                                $flag *= 0;
                                                                ?>
                                                                <div class="form-group">
                                                                    <label class="form-check-label" for="c15_t3_date_3">
                                                                        <b>Date:</b>
                                                                        <?php echo date('d/m/Y',strtotime(trim($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_GriddedDataPositionalAccuracy->dateTime->Date))); ?>
                                                                    </label>
                                                                </div>
                                                                <?php
                                                            }
                                                            ?>
                                                            <?php
                                                            if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_GriddedDataPositionalAccuracy->result->DQ_ConformanceResult->pass->Boolean) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_GriddedDataPositionalAccuracy->result->DQ_ConformanceResult->pass->Boolean != "") {
                                                                $flag *= 0;
                                                                ?>
                                                                <div class="form-group">
                                                                    <label class="form-check-label" for="c15_t3_result_3">
                                                                        <b>Result:</b>
                                                                        <?php echo trim($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_GriddedDataPositionalAccuracy->result->DQ_ConformanceResult->pass->Boolean); ?>
                                                                    </label>
                                                                </div>
                                                                <?php
                                                            }
                                                            ?>
                                                            <?php
                                                            if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_GriddedDataPositionalAccuracy->result->DQ_ConformanceResult->explanation->CharacterString) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_GriddedDataPositionalAccuracy->result->DQ_ConformanceResult->explanation->CharacterString != "") {
                                                                $flag *= 0;
                                                                ?>
                                                                <div class="form-group">
                                                                    <label class="form-check-label" for="c15_t3_conform_result_3">
                                                                        <b>Conformance Result:</b>
                                                                        <?php echo $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_GriddedDataPositionalAccuracy->result->DQ_ConformanceResult->explanation->CharacterString; ?>
                                                                    </label>
                                                                </div>
                                                                <?php
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
                                <a class="nav-link active" id="tab_temp_accuracy" data-toggle="pill" href="#temp_accuracy" role="tab" aria-controls="temp_accuracy" aria-selected="false">Temporal Accuracy</a>
                            </li>
                        </ul>
                    </div>
                    <div class="card-body">
                        <div class="tab-content" id="custom-tabs-four-tabContent">
                            <div class="tab-pane fade active show" id="temp_accuracy" role="tabpanel" aria-labelledby="tab_temp_accuracy">
                                <div class="form-group row">
                                    <div class="bd-highlight">
                                        <div class="table-responsive">
                                            <table class="table-borderless">
                                                <tbody>
                                                    <tr>
                                                        <td>
                                                            <h4>Accuracy or Time Measurement</h4>
                                                        </td>
                                                        <td>
                                                            <h4>Temporal Consistency</h4>
                                                        </td>
                                                        <td>
                                                            <h4>Temporal Validity</h4>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <?php
                                                            if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_AccuracyOfATimeMeasurement->AccuracyOfATimeMeasurementScope->AccuracyOfATimeMeasurementItem->CharacterString) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_AccuracyOfATimeMeasurement->AccuracyOfATimeMeasurementScope->AccuracyOfATimeMeasurementItem->CharacterString != "") {
                                                                $flag *= 0;
                                                                ?>
                                                                <div class="form-group">
                                                                    <label class="form-check-label" for="c15_t4_accuTimeMeasure_scope">
                                                                        <b>Scope:</b>
                                                                        <?php echo trim($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_AccuracyOfATimeMeasurement->AccuracyOfATimeMeasurementScope->AccuracyOfATimeMeasurementItem->CharacterString); ?>
                                                                    </label>
                                                                </div>
                                                                <?php
                                                            }
                                                            ?>
                                                            <?php
                                                            if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_AccuracyOfATimeMeasurement->AccuracyOfATimeMeasurementLevel->CharacterString) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_AccuracyOfATimeMeasurement->AccuracyOfATimeMeasurementLevel->CharacterString != "") {
                                                                $flag *= 0;
                                                                ?>
                                                                <div class="form-group">
                                                                    <label class="form-check-label" for="c3_3">
                                                                        <b>Compliance Level:</b>
                                                                        <?php echo $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_AccuracyOfATimeMeasurement->AccuracyOfATimeMeasurementLevel->CharacterString; ?>
                                                                    </label>
                                                                </div>
                                                                <?php
                                                            }
                                                            ?>
                                                            <?php
                                                            if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_AccuracyOfATimeMeasurement->dateTime->Date) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_AccuracyOfATimeMeasurement->dateTime->Date != "") {
                                                                $flag *= 0;
                                                                ?>
                                                                <div class="form-group">
                                                                    <label class="form-check-label" for="c15_t4_accuTimeMeasure_date">
                                                                        <b>Date:</b>
                                                                        <?php echo date('d/m/Y',strtotime(trim($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_AccuracyOfATimeMeasurement->dateTime->Date))); ?>
                                                                    </label>
                                                                </div>
                                                                <?php
                                                            }
                                                            ?>
                                                            <?php
                                                            if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_AccuracyOfATimeMeasurement->result->DQ_ConformanceResult->pass->Boolean) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_AccuracyOfATimeMeasurement->result->DQ_ConformanceResult->pass->Boolean != "") {
                                                                $flag *= 0;
                                                                ?>
                                                                <div class="form-group">
                                                                    <label class="form-check-label" for="c3_2">
                                                                        <b>Result:</b>
                                                                        <?php echo trim($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_AccuracyOfATimeMeasurement->result->DQ_ConformanceResult->pass->Boolean); ?>
                                                                    </label>
                                                                </div>
                                                                <?php
                                                            }
                                                            ?>
                                                            <?php
                                                            if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_AccuracyOfATimeMeasurement->result->DQ_ConformanceResult->explanation->CharacterString) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_AccuracyOfATimeMeasurement->result->DQ_ConformanceResult->explanation->CharacterString != "") {
                                                                $flag *= 0;
                                                                ?>
                                                                <div class="form-group">
                                                                    <label class="form-check-label" for="c3_4">
                                                                        <b>Conformance Result:</b>
                                                                        <?php echo $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_AccuracyOfATimeMeasurement->result->DQ_ConformanceResult->explanation->CharacterString; ?>
                                                                    </label>
                                                                </div>
                                                                <?php
                                                            }
                                                            ?>
                                                        </td>
                                                        <td>
                                                            <?php
                                                            if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_TemporalConsistency->TemporalConsistencyScope->TemporalConsistencyItem->CharacterString) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_TemporalConsistency->TemporalConsistencyScope->TemporalConsistencyItem->CharacterString != "") {
                                                                $flag *= 0;
                                                                ?>
                                                                <div class="form-group">
                                                                    <label class="form-check-label" for="c15_t4_scope_2">
                                                                        <b>Scope:</b>
                                                                        <?php echo trim($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_TemporalConsistency->TemporalConsistencyScope->TemporalConsistencyItem->CharacterString); ?>
                                                                    </label>
                                                                </div>
                                                                <?php
                                                            }
                                                            ?>
                                                            <?php
                                                            if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_TemporalConsistency->TemporalConsistencyLevel->CharacterString) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_TemporalConsistency->TemporalConsistencyLevel->CharacterString != "") {
                                                                $flag *= 0;
                                                                ?>
                                                                <div class="form-group">
                                                                    <label class="form-check-label" for="c15_t4_comply_level_2">
                                                                        <b>Compliance Level:</b>
                                                                        <?php echo $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_TemporalConsistency->TemporalConsistencyLevel->CharacterString; ?>
                                                                    </label>
                                                                </div>
                                                                <?php
                                                            }
                                                            ?>
                                                            <?php
                                                            if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_TemporalConsistency->dateTime->Date) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_TemporalConsistency->dateTime->Date != "") {
                                                                $flag *= 0;
                                                                ?>
                                                                <div class="form-group">
                                                                    <label class="form-check-label" for="c15_t4_date_2">
                                                                        <b>Date:</b>
                                                                        <?php echo date('d/m/Y',strtotime(trim($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_TemporalConsistency->dateTime->Date))); ?>
                                                                    </label>
                                                                </div>
                                                                <?php
                                                            }
                                                            ?>
                                                            <?php
                                                            if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_TemporalConsistency->result->DQ_ConformanceResult->pass->Boolean) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_TemporalConsistency->result->DQ_ConformanceResult->pass->Boolean != "") {
                                                                $flag *= 0;
                                                                ?>
                                                                <div class="form-group">
                                                                    <label class="form-check-label" for="c15_t4_conform_result_2">
                                                                        <b>Result:</b>
                                                                        <?php echo trim($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_TemporalConsistency->result->DQ_ConformanceResult->pass->Boolean); ?>
                                                                    </label>
                                                                </div>
                                                                <?php
                                                            }
                                                            ?>
                                                            <?php
                                                            if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_TemporalConsistency->result->DQ_ConformanceResult->explanation->CharacterString) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_TemporalConsistency->result->DQ_ConformanceResult->explanation->CharacterString != "") {
                                                                $flag *= 0;
                                                                ?>
                                                                <div class="form-group">
                                                                    <label class="form-check-label" for="c15_t4_conform_result_2">
                                                                        <b>Conformance Result:</b>
                                                                        <?php echo $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_TemporalConsistency->result->DQ_ConformanceResult->explanation->CharacterString; ?>
                                                                    </label>
                                                                </div>
                                                                <?php
                                                            }
                                                            ?>
                                                        </td>
                                                        <td>
                                                            <?php
                                                            if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_TemporalValidity->TemporalValidityScope->TemporalValidityItem->CharacterString) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_TemporalValidity->TemporalValidityScope->TemporalValidityItem->CharacterString != "") {
                                                                $flag *= 0;
                                                                ?>
                                                                <div class="form-group">
                                                                    <label class="form-check-label" for="c15_t4_accuTimeMeasure_scope">
                                                                        <b>Scope:</b>
                                                                        <?php echo trim($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_TemporalValidity->TemporalValidityScope->TemporalValidityItem->CharacterString); ?>
                                                                    </label>
                                                                </div>
                                                                <?php
                                                            }
                                                            ?>
                                                            <?php
                                                            if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_TemporalValidity->TemporalValidityLevel->CharacterString) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_TemporalValidity->TemporalValidityLevel->CharacterString != "") {
                                                                $flag *= 0;
                                                                ?>
                                                                <div class="form-group">
                                                                    <label class="form-check-label" for="c15_t4_comply_level_3">
                                                                        <b>Compliance Level:</b>
                                                                        <?php
                                                                        echo $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_TemporalValidity->TemporalValidityLevel->CharacterString;
                                                                        ?>
                                                                    </label>
                                                                </div>
                                                                <?php
                                                            }
                                                            ?>
                                                            <?php
                                                            if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_TemporalValidity->dateTime->Date) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_TemporalValidity->dateTime->Date != "") {
                                                                $flag *= 0;
                                                                ?>
                                                                <div class="form-group">
                                                                    <label class="form-check-label" for="c15_t4_date_3">
                                                                        <b>Date:</b>
                                                                        <?php
                                                                        echo date('d/m/Y',strtotime(trim($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_TemporalValidity->dateTime->Date)));
                                                                        ?>
                                                                    </label>
                                                                </div>
                                                                <?php
                                                            }
                                                            ?>
                                                            <?php
                                                            if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_TemporalValidity->result->DQ_ConformanceResult->pass->Boolean) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_TemporalValidity->result->DQ_ConformanceResult->pass->Boolean != "") {
                                                                $flag *= 0;
                                                                ?>
                                                                <div class="form-group">
                                                                    <label class="form-check-label" for="c15_t4_result_3">
                                                                        <b>Result:</b>
                                                                        <?php
                                                                        echo trim($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_TemporalValidity->result->DQ_ConformanceResult->pass->Boolean);
                                                                        ?>
                                                                    </label>
                                                                </div>
                                                                <?php
                                                            }
                                                            ?>
                                                            <?php
                                                            if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_TemporalValidity->result->DQ_ConformanceResult->explanation->CharacterString) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_TemporalValidity->result->DQ_ConformanceResult->explanation->CharacterString != "") {
                                                                $flag *= 0;
                                                                ?>
                                                                <div class="form-group">
                                                                    <label class="form-check-label" for="c15_t4_conform_result_3">
                                                                        <b>Conformance Result:</b>
                                                                        <?php
                                                                        echo $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_TemporalValidity->result->DQ_ConformanceResult->explanation->CharacterString;
                                                                        ?>
                                                                    </label>
                                                                </div>
                                                                <?php
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
                                <a class="nav-link active" id="tab_thematic_accuracy" data-toggle="pill" href="#thematic_accuracy" role="tab" aria-controls="thematic_accuracy" aria-selected="false">Thematic Accuracy</a>
                            </li>
                        </ul>
                    </div>
                    <div class="card-body">
                        <div class="tab-content" id="custom-tabs-four-tabContent">
                            <div class="tab-pane fade active show" id="thematic_accuracy" role="tabpanel" aria-labelledby="tab_thematic_accuracy">
                                <div class="form-group row">
                                    <div class="d-flex flex-wrap bd-highlight">
                                        <div class="table-responsive">
                                            <table class="table-borderless">
                                                <tbody>
                                                    <tr>
                                                        <td>
                                                            <h4><?php echo __('lang.classificationCorrectness'); ?></h4>
                                                        </td>
                                                        <td>
                                                            <h4><?php echo __('lang.nonQuantitativeAttributeCorrectness'); ?></h4>
                                                        </td>
                                                        <td>
                                                            <h4><?php echo __('lang.quantitativeAttributeCorrectness'); ?></h4>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <?php
                                                            if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_ThematicClassificationCorrectness->ThematicClassificationCorrectnessScope->ThematicClassificationCorrectnessItem->CharacterString) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_ThematicClassificationCorrectness->ThematicClassificationCorrectnessScope->ThematicClassificationCorrectnessItem->CharacterString != "") {
                                                                $flag *= 0;
                                                                ?>
                                                                <div class="form-group">
                                                                    <label class="form-check-label" for="c15_t5_classCorrect_scope">
                                                                        <b>Scope:</b>
                                                                        <?php
                                                                        echo trim($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_ThematicClassificationCorrectness->ThematicClassificationCorrectnessScope->ThematicClassificationCorrectnessItem->CharacterString);
                                                                        ?>
                                                                    </label>
                                                                </div>
                                                                <?php
                                                            }
                                                            ?>
                                                            <?php
                                                            if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_ThematicClassificationCorrectness->ThematicClassificationCorrectnessLevel->CharacterString) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_ThematicClassificationCorrectness->ThematicClassificationCorrectnessLevel->CharacterString != "") {
                                                                $flag *= 0;
                                                                ?>
                                                                <div class="form-group">
                                                                    <label class="form-check-label" for="c3_3">
                                                                        <b>Compliance Level:</b>
                                                                        <?php
                                                                        echo $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_ThematicClassificationCorrectness->ThematicClassificationCorrectnessLevel->CharacterString;
                                                                        ?>
                                                                    </label>
                                                                </div>
                                                                <?php
                                                            }
                                                            ?>
                                                            <?php
                                                            if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_ThematicClassificationCorrectness->dateTime->Date) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_ThematicClassificationCorrectness->dateTime->Date != "") {
                                                                $flag *= 0;
                                                                ?>
                                                                <div class="form-group">
                                                                    <label class="form-check-label" for="c15_t5_classCorrect_date">
                                                                        <b>Date:</b>
                                                                        <?php
                                                                        echo date('d/m/Y',strtotime(trim($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_ThematicClassificationCorrectness->dateTime->Date)));
                                                                        ?>
                                                                    </label>
                                                                </div>
                                                                <?php
                                                            }
                                                            ?>
                                                            <?php
                                                            if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_ThematicClassificationCorrectness->result->DQ_ConformanceResult->pass->Boolean) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_ThematicClassificationCorrectness->result->DQ_ConformanceResult->pass->Boolean != "") {
                                                                $flag *= 0;
                                                                ?>
                                                                <div class="form-group">
                                                                    <label class="form-check-label" for="c3_2">
                                                                        <b>Result:</b>
                                                                        <?php
                                                                        echo trim($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_ThematicClassificationCorrectness->result->DQ_ConformanceResult->pass->Boolean);
                                                                        ?>
                                                                    </label>
                                                                </div>
                                                                <?php
                                                            }
                                                            ?>
                                                            <?php
                                                            if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_ThematicClassificationCorrectness->result->DQ_ConformanceResult->explanation->CharacterString) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_ThematicClassificationCorrectness->result->DQ_ConformanceResult->explanation->CharacterString != "") {
                                                                $flag *= 0;
                                                                ?>
                                                                <div class="form-group">
                                                                    <label class="form-check-label" for="c3_4">
                                                                        <b>Conformance Result:</b>
                                                                        <?php
                                                                        echo $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_ThematicClassificationCorrectness->result->DQ_ConformanceResult->explanation->CharacterString;
                                                                        ?>
                                                                    </label>
                                                                </div>
                                                                <?php
                                                            }
                                                            ?>
                                                        </td>
                                                        <td>
                                                            <?php
                                                            if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_NonQuantitativeAttributeAccuracy->NonQuantitativeAttributeAccuracyScope->NonQuantitativeAttributeAccuracyScopeItem->CharacterString) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_NonQuantitativeAttributeAccuracy->NonQuantitativeAttributeAccuracyScope->NonQuantitativeAttributeAccuracyScopeItem->CharacterString != "") {
                                                                $flag *= 0;
                                                                ?>
                                                                <div class="form-group">
                                                                    <label class="form-check-label" for="c15_t5_classCorrect_scope">
                                                                        <b>Scope:</b>
                                                                        <?php
                                                                        echo trim($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_NonQuantitativeAttributeAccuracy->NonQuantitativeAttributeAccuracyScope->NonQuantitativeAttributeAccuracyScopeItem->CharacterString);
                                                                        ?>
                                                                    </label>
                                                                </div>
                                                                <?php
                                                            }
                                                            ?>
                                                            <?php
                                                            if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_NonQuantitativeAttributeAccuracy->NonQuantitativeAttributeAccuracyLevel->CharacterString) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_NonQuantitativeAttributeAccuracy->NonQuantitativeAttributeAccuracyLevel->CharacterString != "") {
                                                                $flag *= 0;
                                                                ?>
                                                                <div class="form-group">
                                                                    <label class="form-check-label" for="c3_3">
                                                                        <b>Compliance Level:</b>
                                                                        <?php
                                                                        echo $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_NonQuantitativeAttributeAccuracy->NonQuantitativeAttributeAccuracyLevel->CharacterString;
                                                                        ?>
                                                                    </label>
                                                                </div>
                                                                <?php
                                                            }
                                                            ?>
                                                            <?php
                                                            if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_NonQuantitativeAttributeAccuracy->dateTime->Date) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_NonQuantitativeAttributeAccuracy->dateTime->Date != "") {
                                                                $flag *= 0;
                                                                ?>
                                                                <div class="form-group">
                                                                    <label class="form-check-label" for="c15_t5_classCorrect_date">
                                                                        <b>Date:</b>
                                                                        <?php
                                                                        echo date('d/m/Y',strtotime(trim($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_NonQuantitativeAttributeAccuracy->dateTime->Date)));
                                                                        ?>
                                                                    </label>
                                                                </div>
                                                                <?php
                                                            }
                                                            ?>
                                                            <?php
                                                            if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_NonQuantitativeAttributeAccuracy->result->DQ_ConformanceResult->pass->Boolean) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_NonQuantitativeAttributeAccuracy->result->DQ_ConformanceResult->pass->Boolean != "") {
                                                                $flag *= 0;
                                                                ?>
                                                                <div class="form-group">
                                                                    <label class="form-check-label" for="c3_2">
                                                                        <b>Result:</b>
                                                                        <?php
                                                                        echo trim($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_NonQuantitativeAttributeAccuracy->result->DQ_ConformanceResult->pass->Boolean);
                                                                        ?>
                                                                    </label>
                                                                </div>
                                                                <?php
                                                            }
                                                            ?>
                                                            <?php
                                                            if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_ThematicClassificationCorrectness->result->DQ_ConformanceResult->explanation->CharacterString) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_ThematicClassificationCorrectness->result->DQ_ConformanceResult->explanation->CharacterString != "") {
                                                                $flag *= 0;
                                                                ?>
                                                                <div class="form-group">
                                                                    <label class="form-check-label" for="c3_4">
                                                                        <b>Conformance Result:</b>
                                                                        <?php
                                                                        echo $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_NonQuantitativeAttributeAccuracy->result->DQ_ConformanceResult->explanation->CharacterString;
                                                                        ?>
                                                                    </label>
                                                                </div>
                                                                <?php
                                                            }
                                                            ?>
                                                        </td>
                                                        <td>
                                                            <?php
                                                            if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_QuantitativeAttributeAccuracy->QuantitativeAttributeAccuracyScope->QuantitativeAttributeAccuracyItem->CharacterString) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_QuantitativeAttributeAccuracy->QuantitativeAttributeAccuracyScope->QuantitativeAttributeAccuracyItem->CharacterString != "") {
                                                                $flag *= 0;
                                                                ?>
                                                                <div class="form-group">
                                                                    <label class="form-check-label" for="c15_t5_classCorrect_scope">
                                                                        <b>Scope:</b>
                                                                        <?php
                                                                        echo trim($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_QuantitativeAttributeAccuracy->QuantitativeAttributeAccuracyScope->QuantitativeAttributeAccuracyItem->CharacterString);
                                                                        ?>
                                                                    </label>
                                                                </div>
                                                                <?php
                                                            }
                                                            ?>
                                                            <?php
                                                            if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_QuantitativeAttributeAccuracy->QuantitativeAttributeAccuracyLevel->CharacterString) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_QuantitativeAttributeAccuracy->QuantitativeAttributeAccuracyLevel->CharacterString != "") {
                                                                $flag *= 0;
                                                                ?>
                                                                <div class="form-group">
                                                                    <label class="form-check-label" for="c3_3">
                                                                        <b>Compliance Level:</b>
                                                                        <?php
                                                                        echo $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_QuantitativeAttributeAccuracy->QuantitativeAttributeAccuracyLevel->CharacterString;
                                                                        ?>
                                                                    </label>
                                                                </div>
                                                                <?php
                                                            }
                                                            ?>
                                                            <?php
                                                            if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_QuantitativeAttributeAccuracy->dateTime->Date) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_QuantitativeAttributeAccuracy->dateTime->Date != "") {
                                                                $flag *= 0;
                                                                ?>
                                                                <div class="form-group">
                                                                    <label class="form-check-label" for="c15_t5_classCorrect_date">
                                                                        <b>Date:</b>
                                                                        <?php
                                                                        echo date('d/m/Y',strtotime(trim($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_QuantitativeAttributeAccuracy->dateTime->Date)));
                                                                        ?>
                                                                    </label>
                                                                </div>
                                                                <?php
                                                            }
                                                            ?>
                                                            <?php
                                                            if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_QuantitativeAttributeAccuracy->result->DQ_ConformanceResult->pass->Boolean) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_QuantitativeAttributeAccuracy->result->DQ_ConformanceResult->pass->Boolean != "") {
                                                                $flag *= 0;
                                                                ?>
                                                                <div class="form-group">
                                                                    <label class="form-check-label" for="c3_2">
                                                                        <b>Result:</b>
                                                                        <?php
                                                                        echo trim($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_QuantitativeAttributeAccuracy->result->DQ_ConformanceResult->pass->Boolean);
                                                                        ?>
                                                                    </label>
                                                                </div>
                                                                <?php
                                                            }
                                                            ?>
                                                            <?php
                                                            if (isset($metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_QuantitativeAttributeAccuracy->result->DQ_ConformanceResult->explanation->CharacterString) && $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_QuantitativeAttributeAccuracy->result->DQ_ConformanceResult->explanation->CharacterString != "") {
                                                                $flag *= 0;
                                                                ?>
                                                                <div class="form-group">
                                                                    <label class="form-check-label" for="c3_4">
                                                                        <b>Conformance Result:</b>
                                                                        <?php
                                                                        echo $metadataxml->dataQualityInfo->DQ_DataQuality->report->DQ_QuantitativeAttributeAccuracy->result->DQ_ConformanceResult->explanation->CharacterString;
                                                                        ?>
                                                                    </label>
                                                                </div>
                                                                <?php
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