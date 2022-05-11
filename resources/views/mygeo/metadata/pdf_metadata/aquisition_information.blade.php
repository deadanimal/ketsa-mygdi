<?php $flag = 1; ?>
<div class="card card-primary div_c8" id="div_c8">
    <div class="card-header">
        <a data-toggle="collapse" href="#collapse8">
            <h4 class="card-title">
                <?php echo __('lang.accord_8'); ?>
            </h4>
        </a>
    </div>
    <div id="collapse8" class="panel-collapse collapse in show" data-parent="#div_c8">
        <div class="card-body">
            <div class="acard-body opacity-8">
                <div class="row">
                    <div class="col-xl-4">
                        <h6 class="heading-small text-muted mb-3">Environment Record
                        </h6>
                        <div class="form-group">
                            <?php
                            foreach($template->template[strtolower($catSelected)]['accordion8'] as $key=>$val){
                                if($val['status'] == "customInput"){
                                    ?>
                                    <div class="row mb-2 sortIt">
                                        <div class="col-3 pl-5">
                                            <label class="form-control-label mr-4 customInput_label" for="uname">{{ $val['label_'.$langSelected] }}</label>
                                            <label class="float-right">:</label>
                                        </div>
                                        <div class="col-8">
                                            {{ (isset($metadataxml->customInputs->accordion8->$key) ? $metadataxml->customInputs->accordion8->$key:"") }}
                                        </div>
                                    </div>
                                    <?php
                                }
                                if($key == "c8_avg_air_temp"){
                                    $avgAirTemp = "";
                                    if (isset($metadataxml->identificationInfo->MD_DataIdentification->averageAirTemperature->CharacterString) && $metadataxml->identificationInfo->MD_DataIdentification->averageAirTemperature->CharacterString != "") {
                                        $avgAirTemp = $metadataxml->identificationInfo->MD_DataIdentification->averageAirTemperature->CharacterString;
                                    }
                                    if($avgAirTemp != ""){
                                        $flag *= 0;
                                        ?>
                                        <div class="row mb-2" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                                            <div class="col-xl-8">
                                                <div class="form-control-label">
                                                    Average Air Temperature
                                                </div>
                                            </div>
                                            <div class="col-xl-4">
                                                <?php echo "&nbsp;&nbsp;<p>" . $avgAirTemp . "</p>"; ?>
                                            </div>
                                        </div>
                                        <?php
                                    }
                                }
                                if($key == "c8_altitude"){
                                    $alt = "";
                                    if (isset($metadataxml->identificationInfo->MD_DataIdentification->altitude->CharacterString) && $metadataxml->identificationInfo->MD_DataIdentification->altitude->CharacterString != "") {
                                        $alt = $metadataxml->identificationInfo->MD_DataIdentification->altitude->CharacterString;
                                    }
                                    if($alt != ""){
                                        $flag *= 0;
                                        ?>
                                        <div class="row mb-2" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                                            <div class="col-xl-8">
                                                <div class="form-control-label">
                                                    Altitude
                                                </div>
                                            </div>
                                            <div class="col-xl-4">
                                                <?php echo "&nbsp;&nbsp;<p>" . $alt . "</p>"; ?>
                                            </div>
                                        </div>
                                        <?php
                                    }
                                }
                                if($key == "c8_relative_humid"){
                                    $relHumid = "";
                                    if (isset($metadataxml->identificationInfo->MD_DataIdentification->relativeHumidity->CharacterString) && $metadataxml->identificationInfo->MD_DataIdentification->relativeHumidity->CharacterString != "") {
                                        $relHumid = $metadataxml->identificationInfo->MD_DataIdentification->relativeHumidity->CharacterString;
                                    }
                                    if($relHumid != ""){
                                        $flag *= 0;
                                        ?>
                                        <div class="row mb-2" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                                            <div class="col-xl-8">
                                                <div class="form-control-label">
                                                    Relative Humidity
                                                </div>
                                            </div>
                                            <div class="col-xl-4">
                                                <?php echo "&nbsp;&nbsp;<p>" . $relHumid . "</p>"; ?>
                                            </div>
                                        </div>
                                        <?php
                                    }
                                }
                                if($key == "c8_meteor_cond"){
                                    $metCond = "";
                                    if (isset($metadataxml->identificationInfo->MD_DataIdentification->meteorologicalCondition->CharacterString) && $metadataxml->identificationInfo->MD_DataIdentification->meteorologicalCondition->CharacterString != "") {
                                        $metCond = $metadataxml->identificationInfo->MD_DataIdentification->meteorologicalCondition->CharacterString;
                                    }
                                    if($metCond != ""){
                                        $flag *= 0;
                                        ?>
                                        <div class="row mb" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                                            <div class="col-xl-8">
                                                <div class="form-control-label">
                                                    Meteorological Condition
                                                </div>
                                            </div>
                                            <div class="col-xl-4">
                                                <?php echo "&nbsp;&nbsp;<p>" . $metCond . "</p>"; ?>
                                            </div>
                                        </div>
                                        <?php
                                    }
                                }
                            }
                            ?>
                        </div>
                    </div>
                    <div class="col-xl-3">
                        <h6 class="heading-small text-muted mb-3">Event Identifier
                        </h6>
                        <div class="form-group">
                            <?php
                            foreach($template->template[strtolower($catSelected)]['accordion8'] as $key=>$val){
                                if($key == "c8_identifier"){
                                    $eventId = "";
                                    if (isset($metadataxml->identificationInfo->MD_DataIdentification->identifier->CharacterString) && $metadataxml->identificationInfo->MD_DataIdentification->identifier->CharacterString != "") {
                                        $eventId = $metadataxml->identificationInfo->MD_DataIdentification->identifier->CharacterString;
                                    }
                                    if($eventId != ""){
                                        $flag *= 0;
                                        ?>
                                        <div class="row mb-2" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                                            <div class="col-xl-5">
                                                <div class="form-control-label">
                                                    Identifier
                                                </div>
                                            </div>
                                            <div class="col-xl-7">
                                                <?php echo "&nbsp;&nbsp;<p>" . $eventId . "</p>"; ?>
                                            </div>
                                        </div>
                                        <?php
                                    }
                                }
                                if($key == "c8_trigger"){
                                    $trigger = "";
                                    if (isset($metadataxml->identificationInfo->MD_DataIdentification->trigger->CharacterString) && $metadataxml->identificationInfo->MD_DataIdentification->trigger->CharacterString != "") {
                                        $trigger = $metadataxml->identificationInfo->MD_DataIdentification->trigger->CharacterString;
                                    }
                                    if($trigger != ""){
                                        $flag *= 0;
                                        ?>
                                        <div class="row mb-2" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                                            <div class="col-xl-5">
                                                <div class="form-control-label">
                                                    Trigger
                                                </div>
                                            </div>
                                            <div class="col-xl-7">
                                                <?php echo "&nbsp;&nbsp;<p>" . $trigger . "</p>"; ?>
                                            </div>
                                        </div>
                                        <?php
                                    }
                                }
                                if($key == "c8_context"){
                                    $context = "";
                                    if (isset($metadataxml->identificationInfo->MD_DataIdentification->context->CharacterString) && $metadataxml->identificationInfo->MD_DataIdentification->context->CharacterString != "") {
                                        $context = $metadataxml->identificationInfo->MD_DataIdentification->context->CharacterString;
                                    }
                                    if($context != ""){
                                        $flag *= 0;
                                        ?>
                                        <div class="row mb-2" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                                            <div class="col-xl-5">
                                                <div class="form-control-label">
                                                    Context
                                                </div>
                                            </div>
                                            <div class="col-xl-7">
                                                <?php echo "&nbsp;&nbsp;<p>" . $context . "</p>"; ?>
                                            </div>
                                        </div>
                                        <?php
                                    }
                                }
                                if($key == "c8_sequence"){
                                    $sequence = "";
                                    if (isset($metadataxml->identificationInfo->MD_DataIdentification->sequence->CharacterString) && $metadataxml->identificationInfo->MD_DataIdentification->sequence->CharacterString != "") {
                                        $sequence = $metadataxml->identificationInfo->MD_DataIdentification->sequence->CharacterString;
                                    }
                                    if($sequence != ""){
                                        $flag *= 0;
                                        ?>
                                        <div class="row mb-2" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                                            <div class="col-xl-5">
                                                <div class="form-control-label">
                                                    Sequence
                                                </div>
                                            </div>
                                            <div class="col-xl-7">
                                                <?php echo "&nbsp;&nbsp;<p>" . $sequence . "</p>"; ?>
                                            </div>
                                        </div>
                                        <?php
                                    }
                                }
                                if($key == "c8_time"){
                                    $time = "";
                                    if (isset($metadataxml->identificationInfo->MD_DataIdentification->EvtIdentifiertime->CharacterString) && $metadataxml->identificationInfo->MD_DataIdentification->EvtIdentifiertime->CharacterString != "") {
                                        $time = $metadataxml->identificationInfo->MD_DataIdentification->EvtIdentifiertime->CharacterString;
                                    }
                                    if($time != ""){
                                        $flag *= 0;
                                        ?>
                                        <div class="row mb-2" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                                            <div class="col-xl-5">
                                                <div class="form-control-label">
                                                    Time
                                                </div>
                                            </div>
                                            <div class="col-xl-7">
                                                <?php echo "&nbsp;&nbsp;<p>" . $time . "</p>"; ?>
                                            </div>
                                        </div>
                                        <?php
                                    }
                                }
                            }
                            ?>
                        </div>
                    </div>
                    <div class="col-xl-3">
                        <h6 class="heading-small text-muted mb-3">Instrument Identification</h6>
                        <div class="form-group">
                            <?php
                            foreach($template->template[strtolower($catSelected)]['accordion8'] as $key=>$val){
                                if($key == "c8_type"){
                                    $instruIdType = "";
                                    if (isset($metadataxml->identificationInfo->MD_DataIdentification->typeInstrumentIdentification->CharacterString) && $metadataxml->identificationInfo->MD_DataIdentification->typeInstrumentIdentification->CharacterString != "") {
                                        $instruIdType = $metadataxml->identificationInfo->MD_DataIdentification->typeInstrumentIdentification->CharacterString;
                                    }
                                    if($instruIdType != ""){
                                        $flag *= 0;
                                        ?>
                                        <div class="row mb-2" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                                            <div class="col-xl-5">
                                                <div class="form-control-label">
                                                    Type
                                                </div>
                                            </div>
                                            <div class="col-xl-7">
                                                <?php echo "&nbsp;&nbsp;<p>" . $instruIdType . "</p>"; ?>
                                            </div>
                                        </div>
                                        <?php
                                    }
                                }
                            }
                            ?>

                            <h6 class="heading-small text-muted mt-2 mb-3">Operation</h6>
                            <?php
                            foreach($template->template[strtolower($catSelected)]['accordion8'] as $key=>$val){
                                if($key == "c8_op_identifier"){
                                    $opId = "";
                                    if (isset($metadataxml->identificationInfo->MD_DataIdentification->operationIdentifier->CharacterString) && $metadataxml->identificationInfo->MD_DataIdentification->operationIdentifier->CharacterString != "") {
                                        $opId = $metadataxml->identificationInfo->MD_DataIdentification->operationIdentifier->CharacterString;
                                    }
                                    if($opId != ""){
                                        $flag *= 0;
                                        ?>
                                        <div class="row mb-2" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                                            <div class="col-xl-5">
                                                <div class="form-control-label">
                                                    Identifier
                                                </div>
                                            </div>
                                            <div class="col-xl-7">
                                                <?php echo "&nbsp;&nbsp;<p>" . $opId . "</p>"; ?>
                                            </div>
                                        </div>
                                        <?php
                                    }
                                }
                                if($key == "c8_op_status"){
                                    $opStatus = "";
                                    if (isset($metadataxml->identificationInfo->MD_DataIdentification->operationStatus->CharacterString) && $metadataxml->identificationInfo->MD_DataIdentification->operationStatus->CharacterString != "") {
                                        $opStatus = $metadataxml->identificationInfo->MD_DataIdentification->operationStatus->CharacterString;
                                    }
                                    if($opStatus != ""){
                                        $flag *= 0;
                                        ?>
                                        <div class="row mb-2" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                                            <div class="col-xl-5">
                                                <div class="form-control-label">
                                                    Status
                                                </div>
                                            </div>
                                            <div class="col-xl-7">
                                                <?php echo "&nbsp;&nbsp;<p>" . $opStatus . "</p>"; ?>
                                            </div>
                                        </div>
                                        <?php
                                    }
                                }
                                if($key == "c8_op_type"){
                                    $opType = "";
                                    if (isset($metadataxml->identificationInfo->MD_DataIdentification->operationType->CharacterString) && $metadataxml->identificationInfo->MD_DataIdentification->operationType->CharacterString != "") {
                                        $opType = $metadataxml->identificationInfo->MD_DataIdentification->operationType->CharacterString;
                                    }
                                    if($opType != ""){
                                        $flag *= 0;
                                        ?>
                                        <div class="row mb" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                                            <div class="col-xl-5">
                                                <div class="form-control-label">
                                                    Type
                                                </div>
                                            </div>
                                            <div class="col-xl-7">
                                                <?php echo "&nbsp;&nbsp;<p>" . $opType . "</p>"; ?>
                                            </div>
                                        </div>
                                        <?php
                                    }
                                }
                            }
                            ?>
                        </div>
                    </div>
                    <div class="col-lg-2 px-0">
                        <h6 class="heading-small text-muted mb-3">Request Data Range
                        </h6>
                        <div class="form-group">
                            <?php
                            foreach($template->template[strtolower($catSelected)]['accordion8'] as $key=>$val){
                                if($key == "c8_rdr_date"){
                                    $rdrDate = "";
                                    if (isset($metadataxml->identificationInfo->MD_DataIdentification->operationDate->Date) && $metadataxml->identificationInfo->MD_DataIdentification->operationDate->Date != "") {
                                        $rdrDate = $metadataxml->identificationInfo->MD_DataIdentification->operationDate->Date;
                                    }
                                    if($rdrDate != ""){
                                        $flag *= 0;
                                        ?>
                                        <div <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                                            <div class="form-control-label mr-3">
                                                Date
                                            </div>
                                            <?php echo "&nbsp;&nbsp;<p>" . date('d/m/Y',strtotime(trim($rdrDate))) . "</p>"; ?>
                                        </div>
                                        <?php
                                    }
                                }
                                if($key == "c8_last_accept_date"){
                                    $lad = "";
                                    if (isset($metadataxml->identificationInfo->MD_DataIdentification->lastAcceptableDate->Date) && $metadataxml->identificationInfo->MD_DataIdentification->lastAcceptableDate->Date != "") {
                                        $lad = $metadataxml->identificationInfo->MD_DataIdentification->lastAcceptableDate->Date;
                                    }
                                    if($lad != ""){
                                        $flag *= 0;
                                        ?>
                                        <div <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                                            <div class="form-control-label mt-3 mr-3">
                                                Last Acceptable Date
                                            </div>
                                            <?php echo "&nbsp;&nbsp;<p>" . date('d/m/Y',strtotime(trim($lad))) . "</p>"; ?>
                                        </div>
                                        <?php
                                    }
                                }
                            }
                            ?>
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
            $('#div_c8').hide();
        });
    </script>
        <?php
}
?>
