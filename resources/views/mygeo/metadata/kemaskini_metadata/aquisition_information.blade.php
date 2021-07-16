<div class="card card-primary mb-4 div_c8" id="div_c8">
    <div class="card-header">
        <a data-toggle="collapse" href="#collapse8">
            <h4 class="card-title">
                <?php echo __('lang.accord_8'); ?>
            </h4>
        </a>
        @if(auth::user()->hasRole(['Penerbit Metadata']) && $metadataSearched->disahkan == "no")
        <button type="button" class="btn btn-secondary float-right" data-toggle="modal" data-target="#modal8">Catatan</button>
        @elseif(auth::user()->hasRole(['Pengesah Metadata','Super Admin']))
        <button type="button" class="btn btn-secondary float-right" data-toggle="modal" data-target="#modal8">Catatan</button>
        @endif
    </div>
    <div id="collapse8" class="panel-collapse collapse in show" data-parent="#div_c8">
        <div class="card-body">
            <div class="acard-body opacity-8">
                <div class="row">
                    <div class="col-xl-4">
                        <h6 class="heading-small text-muted mb-3">Enviroment Record
                        </h6>
                        <div class="form-group">
                            <div class="row mb-2">
                                <div class="col-xl-8">
                                    <div class="form-control-label">
                                        Average Air Temperature
                                    </div>
                                </div>
                                <div class="col-xl-4">
                                    <?php
                                    $avgAirTemp = "";
                                    if (isset($metadataxml->identificationInfo->SV_ServiceIdentification->averageAirTemperature->CharacterString) && $metadataxml->identificationInfo->SV_ServiceIdentification->averageAirTemperature->CharacterString != "") {
                                        $avgAirTemp = $metadataxml->identificationInfo->SV_ServiceIdentification->averageAirTemperature->CharacterString;
                                    }
                                    ?>
                                    <input class="form-control form-control-sm" type="text" style="width :80px" placeholder="Celcius" name="c8_avg_air_temp" id="c8_avg_air_temp" value="{{ $avgAirTemp }}">
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-xl-8">
                                    <div class="form-control-label">
                                        Altitude
                                    </div>
                                </div>
                                <div class="col-xl-4">
                                    <?php
                                    $alt = "";
                                    if (isset($metadataxml->identificationInfo->SV_ServiceIdentification->altitude->CharacterString) && $metadataxml->identificationInfo->SV_ServiceIdentification->altitude->CharacterString != "") {
                                        $alt = $metadataxml->identificationInfo->SV_ServiceIdentification->altitude->CharacterString;
                                    }
                                    ?>
                                    <input class="form-control form-control-sm" type="text" style="width :80px" placeholder="Feet" name="c8_altitude" id="c8_altitude" value="{{ $alt }}">
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-xl-8">
                                    <div class="form-control-label">
                                        Relative Humidity
                                    </div>
                                </div>
                                <div class="col-xl-4">
                                    <?php
                                    $relHumid = "";
                                    if (isset($metadataxml->identificationInfo->SV_ServiceIdentification->relativeHumidity->CharacterString) && $metadataxml->identificationInfo->SV_ServiceIdentification->relativeHumidity->CharacterString != "") {
                                        $relHumid = $metadataxml->identificationInfo->SV_ServiceIdentification->relativeHumidity->CharacterString;
                                    }
                                    ?>
                                    <input class="form-control form-control-sm" type="text" style="width :80px" placeholder="Humidity" name="c8_relative_humid" id="c8_relative_humid" value="{{ $relHumid }}">
                                </div>
                            </div>
                            <div class="row mb">
                                <div class="col-xl-8">
                                    <div class="form-control-label">
                                        Meteorological Condition
                                    </div>
                                </div>
                                <div class="col-xl-4">
                                    <?php
                                    $metCond = "";
                                    if (isset($metadataxml->identificationInfo->SV_ServiceIdentification->meteorologicalCondition->CharacterString) && $metadataxml->identificationInfo->SV_ServiceIdentification->meteorologicalCondition->CharacterString != "") {
                                        $metCond = $metadataxml->identificationInfo->SV_ServiceIdentification->meteorologicalCondition->CharacterString;
                                    }
                                    ?>
                                    <input class="form-control form-control-sm" type="text" style="width :80px" placeholder="Condition" name="c8_meteor_cond" id="c8_meteor_cond" value="{{ $metCond }}">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3">
                        <h6 class="heading-small text-muted mb-3">Event Identifier
                        </h6>
                        <div class="form-group">
                            <div class="row mb-2">
                                <div class="col-xl-5">
                                    <div class="form-control-label">
                                        Identifier<span class="text-warning">*</span>
                                    </div>
                                </div>
                                <div class="col-xl-7">
                                    <?php
                                    $eventId = "";
                                    if (isset($metadataxml->identificationInfo->SV_ServiceIdentification->identifier->CharacterString) && $metadataxml->identificationInfo->SV_ServiceIdentification->identifier->CharacterString != "") {
                                        $eventId = $metadataxml->identificationInfo->SV_ServiceIdentification->identifier->CharacterString;
                                    }
                                    ?>
                                    <input class="form-control form-control-sm" type="text" style="width :80px" placeholder="Identifier" name="c8_identifier" id="c8_identifier" value="{{ $eventId }}">
                                    @error('c8_identifier')
                                    <div class="text-error">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-xl-5">
                                    <div class="form-control-label">
                                        Trigger
                                    </div>
                                </div>
                                <div class="col-xl-7">
                                    <?php
                                    $trigger = "";
                                    if (isset($metadataxml->identificationInfo->SV_ServiceIdentification->trigger->CharacterString) && $metadataxml->identificationInfo->SV_ServiceIdentification->trigger->CharacterString != "") {
                                        $trigger = $metadataxml->identificationInfo->SV_ServiceIdentification->trigger->CharacterString;
                                    }
                                    ?>
                                    <input class="form-control form-control-sm" type="text" style="width :120px" name="c8_trigger" id="c8_trigger" value="{{ $trigger }}">
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-xl-5">
                                    <div class="form-control-label">
                                        Context
                                    </div>
                                </div>
                                <div class="col-xl-7">
                                    <?php
                                    $context = "";
                                    if (isset($metadataxml->identificationInfo->SV_ServiceIdentification->context->CharacterString) && $metadataxml->identificationInfo->SV_ServiceIdentification->context->CharacterString != "") {
                                        $context = $metadataxml->identificationInfo->SV_ServiceIdentification->context->CharacterString;
                                    }
                                    ?>
                                    <input class="form-control form-control-sm" type="text" style="width :120px" name="c8_context" id="c8_context" value="{{ $context }}">
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-xl-5">
                                    <div class="form-control-label">
                                        Sequence
                                    </div>
                                </div>
                                <div class="col-xl-7">
                                    <?php
                                    $sequence = "";
                                    if (isset($metadataxml->identificationInfo->SV_ServiceIdentification->sequence->CharacterString) && $metadataxml->identificationInfo->SV_ServiceIdentification->sequence->CharacterString != "") {
                                        $sequence = $metadataxml->identificationInfo->SV_ServiceIdentification->sequence->CharacterString;
                                    }
                                    ?>
                                    <input class="form-control form-control-sm" type="text" style="width :120px" name="c8_sequence" id="c8_sequence" value="{{ $sequence }}">
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-xl-5">
                                    <div class="form-control-label">
                                        Time
                                    </div>
                                </div>
                                <div class="col-xl-7">
                                    <?php
                                    $time = "";
                                    if (isset($metadataxml->identificationInfo->SV_ServiceIdentification->EvtIdentifiertime->CharacterString) && $metadataxml->identificationInfo->SV_ServiceIdentification->EvtIdentifiertime->CharacterString != "") {
                                        $time = $metadataxml->identificationInfo->SV_ServiceIdentification->EvtIdentifiertime->CharacterString;
                                    }
                                    ?>
                                    <input class="form-control form-control-sm" type="time" style="width :120px" name="c8_time" id="c8_time" value="{{ $time }}">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3">
                        <h6 class="heading-small text-muted mb-3">Instrument Identification</h6>
                        <div class="form-group">
                            <div class="row mb-2">
                                <div class="col-xl-5">
                                    <div class="form-control-label">
                                        Type<span class="text-warning">*</span>
                                    </div>
                                </div>
                                <div class="col-xl-7">
                                    <?php
                                    $instruIdType = "";
                                    if (isset($metadataxml->identificationInfo->SV_ServiceIdentification->typeInstrumentIdentification->CharacterString) && $metadataxml->identificationInfo->SV_ServiceIdentification->typeInstrumentIdentification->CharacterString != "") {
                                        $instruIdType = $metadataxml->identificationInfo->SV_ServiceIdentification->typeInstrumentIdentification->CharacterString;
                                    }
                                    ?>
                                    <input class="form-control form-control-sm" type="text" style="width :80px" placeholder="Type" name="c8_type" id="c8_type" value="{{ $instruIdType }}">
                                    @error('c8_type')
                                    <div class="text-error">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <h6 class="heading-small text-muted mt-2 mb-3">Operation</h6>
                            <div class="row mb-2">
                                <div class="col-xl-5">
                                    <div class="form-control-label">
                                        Identifier<span class="text-warning">*</span>
                                    </div>
                                </div>
                                <div class="col-xl-7">
                                    <?php
                                    $opId = "";
                                    if (isset($metadataxml->identificationInfo->SV_ServiceIdentification->operationIdentifier->CharacterString) && $metadataxml->identificationInfo->SV_ServiceIdentification->operationIdentifier->CharacterString != "") {
                                        $opId = $metadataxml->identificationInfo->SV_ServiceIdentification->operationIdentifier->CharacterString;
                                    }
                                    ?>
                                    <input class="form-control form-control-sm" type="text" style="width :80px" placeholder="Identifier" name="c8_op_identifier" id="c8_op_identifier" value="{{ $opId }}">
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-xl-5">
                                    <div class="form-control-label">
                                        Status
                                    </div>
                                </div>
                                <div class="col-xl-7">
                                    <?php
                                    $opStatus = "";
                                    if (isset($metadataxml->identificationInfo->SV_ServiceIdentification->operationStatus->CharacterString) && $metadataxml->identificationInfo->SV_ServiceIdentification->operationStatus->CharacterString != "") {
                                        $opStatus = $metadataxml->identificationInfo->SV_ServiceIdentification->operationStatus->CharacterString;
                                    }
                                    ?>
                                    <input class="form-control form-control-sm" type="text" style="width :80px" placeholder="Status" name="c8_op_status" id="c8_op_status" value="{{ $opStatus }}">
                                </div>
                            </div>
                            <div class="row mb">
                                <div class="col-xl-5">
                                    <div class="form-control-label">
                                        Type
                                    </div>
                                </div>
                                <div class="col-xl-7">
                                    <?php
                                    $opType = "";
                                    if (isset($metadataxml->identificationInfo->SV_ServiceIdentification->operationType->CharacterString) && $metadataxml->identificationInfo->SV_ServiceIdentification->operationType->CharacterString != "") {
                                        $opType = $metadataxml->identificationInfo->SV_ServiceIdentification->operationType->CharacterString;
                                    }
                                    ?>
                                    <input class="form-control form-control-sm" type="text" style="width :80px" placeholder="Type" name="c8_op_type" id="c8_op_type" value="{{ $opType }}">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2 px-0">
                        <h6 class="heading-small text-muted mb-3">Request Data Range
                        </h6>
                        <div class="form-group">
                            <div class="form-control-label mr-3">
                                Date
                            </div>
                            <?php
                            $rdrDate = "";
                            if (isset($metadataxml->identificationInfo->SV_ServiceIdentification->operationDate->Date) && $metadataxml->identificationInfo->SV_ServiceIdentification->operationDate->Date != "") {
                                $rdrDate = $metadataxml->identificationInfo->SV_ServiceIdentification->operationDate->Date;
                            }
                            ?>
                            <input class="form-control form-control-sm" type="date" style="width :150px" placeholder="Select Date" name="c8_rdr_date" id="c8_rdr_date" value="{{ $rdrDate }}">
                            <div class="form-control-label mt-3 mr-3">
                                Last Acceptable Date
                            </div>
                            <?php
                            $lad = "";
                            if (isset($metadataxml->identificationInfo->SV_ServiceIdentification->lastAcceptableDate->Date) && $metadataxml->identificationInfo->SV_ServiceIdentification->lastAcceptableDate->Date != "") {
                                $lad = $metadataxml->identificationInfo->SV_ServiceIdentification->lastAcceptableDate->Date;
                            }
                            ?>
                            <input class="form-control form-control-sm" type="date" style="width :150px" placeholder="Select Date" name="c8_last_accept_date" id="c8_last_accept_date" class="form-control col-lg-4" value="{{ $lad }}">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
