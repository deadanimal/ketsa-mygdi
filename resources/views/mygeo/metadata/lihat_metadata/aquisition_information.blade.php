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
                                    if (isset($metadataxml->identificationInfo->SV_ServiceIdentification->averageAirTemperature->CharacterString) && $metadataxml->identificationInfo->SV_ServiceIdentification->averageAirTemperature->CharacterString != "") {
                                        echo "&nbsp;&nbsp;<p>" . $metadataxml->identificationInfo->SV_ServiceIdentification->averageAirTemperature->CharacterString . "</p>";
                                    }
                                    ?>
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
                                    if (isset($metadataxml->identificationInfo->SV_ServiceIdentification->altitude->CharacterString) && $metadataxml->identificationInfo->SV_ServiceIdentification->altitude->CharacterString != "") {
                                        echo "&nbsp;&nbsp;<p>" . $metadataxml->identificationInfo->SV_ServiceIdentification->altitude->CharacterString . "</p>";
                                    }
                                    ?>
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
                                    if (isset($metadataxml->identificationInfo->SV_ServiceIdentification->relativeHumidity->CharacterString) && $metadataxml->identificationInfo->SV_ServiceIdentification->relativeHumidity->CharacterString != "") {
                                        echo "&nbsp;&nbsp;<p>" . $metadataxml->identificationInfo->SV_ServiceIdentification->relativeHumidity->CharacterString . "</p>";
                                    }
                                    ?>
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
                                    if (isset($metadataxml->identificationInfo->SV_ServiceIdentification->meteorologicalCondition->CharacterString) && $metadataxml->identificationInfo->SV_ServiceIdentification->meteorologicalCondition->CharacterString != "") {
                                        echo "&nbsp;&nbsp;<p>" . $metadataxml->identificationInfo->SV_ServiceIdentification->meteorologicalCondition->CharacterString . "</p>";
                                    }
                                    ?>
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
                                    if (isset($metadataxml->identificationInfo->SV_ServiceIdentification->identifier->CharacterString) && $metadataxml->identificationInfo->SV_ServiceIdentification->identifier->CharacterString != "") {
                                        echo "&nbsp;&nbsp;<p>" . $metadataxml->identificationInfo->SV_ServiceIdentification->identifier->CharacterString . "</p>";
                                    }
                                    ?>
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
                                    if (isset($metadataxml->identificationInfo->SV_ServiceIdentification->trigger->CharacterString) && $metadataxml->identificationInfo->SV_ServiceIdentification->trigger->CharacterString != "") {
                                        echo "&nbsp;&nbsp;<p>" . $metadataxml->identificationInfo->SV_ServiceIdentification->trigger->CharacterString . "</p>";
                                    }
                                    ?>
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
                                    if (isset($metadataxml->identificationInfo->SV_ServiceIdentification->context->CharacterString) && $metadataxml->identificationInfo->SV_ServiceIdentification->context->CharacterString != "") {
                                        echo "&nbsp;&nbsp;<p>" . $metadataxml->identificationInfo->SV_ServiceIdentification->context->CharacterString . "</p>";
                                    }
                                    ?>
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
                                    if (isset($metadataxml->identificationInfo->SV_ServiceIdentification->sequence->CharacterString) && $metadataxml->identificationInfo->SV_ServiceIdentification->sequence->CharacterString != "") {
                                        echo "&nbsp;&nbsp;<p>" . $metadataxml->identificationInfo->SV_ServiceIdentification->sequence->CharacterString . "</p>";
                                    }
                                    ?>
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
                                    if (isset($metadataxml->identificationInfo->SV_ServiceIdentification->EvtIdentifiertime->CharacterString) && $metadataxml->identificationInfo->SV_ServiceIdentification->EvtIdentifiertime->CharacterString != "") {
                                        echo "&nbsp;&nbsp;<p>" . $metadataxml->identificationInfo->SV_ServiceIdentification->EvtIdentifiertime->CharacterString . "</p>";
                                    }
                                    ?>
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
                                    if (isset($metadataxml->identificationInfo->SV_ServiceIdentification->typeInstrumentIdentification->CharacterString) && $metadataxml->identificationInfo->SV_ServiceIdentification->typeInstrumentIdentification->CharacterString != "") {
                                        echo "&nbsp;&nbsp;<p>" . $metadataxml->identificationInfo->SV_ServiceIdentification->typeInstrumentIdentification->CharacterString . "</p>";
                                    }
                                    ?>
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
                                    if (isset($metadataxml->identificationInfo->SV_ServiceIdentification->operationIdentifier->CharacterString) && $metadataxml->identificationInfo->SV_ServiceIdentification->operationIdentifier->CharacterString != "") {
                                        echo "&nbsp;&nbsp;<p>" . $metadataxml->identificationInfo->SV_ServiceIdentification->operationIdentifier->CharacterString . "</p>";
                                    }
                                    ?>
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
                                    if (isset($metadataxml->identificationInfo->SV_ServiceIdentification->operationStatus->CharacterString) && $metadataxml->identificationInfo->SV_ServiceIdentification->operationStatus->CharacterString != "") {
                                        echo "&nbsp;&nbsp;<p>" . $metadataxml->identificationInfo->SV_ServiceIdentification->operationStatus->CharacterString . "</p>";
                                    }
                                    ?>
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
                                    if (isset($metadataxml->identificationInfo->SV_ServiceIdentification->operationType->CharacterString) && $metadataxml->identificationInfo->SV_ServiceIdentification->operationType->CharacterString != "") {
                                        echo "&nbsp;&nbsp;<p>" . $metadataxml->identificationInfo->SV_ServiceIdentification->operationType->CharacterString . "</p>";
                                    }
                                    ?>
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
                            if (isset($metadataxml->identificationInfo->SV_ServiceIdentification->operationDate->Date) && $metadataxml->identificationInfo->SV_ServiceIdentification->operationDate->Date != "") {
                                echo "&nbsp;&nbsp;<p>" . $metadataxml->identificationInfo->SV_ServiceIdentification->operationDate->Date . "</p>";
                            }
                            ?>
                            <div class="form-control-label mt-3 mr-3">
                                Last Acceptable Date
                            </div>
                            <?php
                            if (isset($metadataxml->identificationInfo->SV_ServiceIdentification->lastAcceptableDate->Date) && $metadataxml->identificationInfo->SV_ServiceIdentification->lastAcceptableDate->Date != "") {
                                echo "&nbsp;&nbsp;<p>" . $metadataxml->identificationInfo->SV_ServiceIdentification->lastAcceptableDate->Date . "</p>";
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
