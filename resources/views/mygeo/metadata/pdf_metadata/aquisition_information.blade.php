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
                            if (isset($metadataxml->identificationInfo->MD_DataIdentification->averageAirTemperature->CharacterString) && $metadataxml->identificationInfo->MD_DataIdentification->averageAirTemperature->CharacterString != "") {
                                ?>
                                <div class="row mb-2">
                                    <div class="col-xl-8">
                                        <div class="form-control-label">
                                            Average Air Temperature
                                        </div>
                                    </div>
                                    <div class="col-xl-4">
                                        <?php echo "&nbsp;&nbsp;<p>" . $metadataxml->identificationInfo->MD_DataIdentification->averageAirTemperature->CharacterString . "</p>"; ?>
                                    </div>
                                </div>
                                <?php
                            }
                            ?>
                            <?php
                            if (isset($metadataxml->identificationInfo->MD_DataIdentification->altitude->CharacterString) && $metadataxml->identificationInfo->MD_DataIdentification->altitude->CharacterString != "") {
                                ?>
                                <div class="row mb-2">
                                    <div class="col-xl-8">
                                        <div class="form-control-label">
                                            Altitude
                                        </div>
                                    </div>
                                    <div class="col-xl-4">
                                        <?php echo "&nbsp;&nbsp;<p>" . $metadataxml->identificationInfo->MD_DataIdentification->altitude->CharacterString . "</p>"; ?>
                                    </div>
                                </div>
                                <?php
                            }
                            ?>
                            <?php
                            if (isset($metadataxml->identificationInfo->MD_DataIdentification->relativeHumidity->CharacterString) && $metadataxml->identificationInfo->MD_DataIdentification->relativeHumidity->CharacterString != "") {
                                ?>
                                <div class="row mb-2">
                                    <div class="col-xl-8">
                                        <div class="form-control-label">
                                            Relative Humidity
                                        </div>
                                    </div>
                                    <div class="col-xl-4">
                                        <?php echo "&nbsp;&nbsp;<p>" . $metadataxml->identificationInfo->MD_DataIdentification->relativeHumidity->CharacterString . "</p>"; ?>
                                    </div>
                                </div>
                                <?php
                            }
                            ?>
                            <?php
                            if (isset($metadataxml->identificationInfo->MD_DataIdentification->meteorologicalCondition->CharacterString) && $metadataxml->identificationInfo->MD_DataIdentification->meteorologicalCondition->CharacterString != "") {
                                ?>
                                <div class="row mb">
                                    <div class="col-xl-8">
                                        <div class="form-control-label">
                                            Meteorological Condition
                                        </div>
                                    </div>
                                    <div class="col-xl-4">
                                        <?php echo "&nbsp;&nbsp;<p>" . $metadataxml->identificationInfo->MD_DataIdentification->meteorologicalCondition->CharacterString . "</p>"; ?>
                                    </div>
                                </div>
                                <?php
                            }
                            ?>
                        </div>
                    </div>
                    <div class="col-xl-3">
                        <h6 class="heading-small text-muted mb-3">Event Identifier
                        </h6>
                        <div class="form-group">
                            <?php
                            if (isset($metadataxml->identificationInfo->MD_DataIdentification->identifier->CharacterString) && $metadataxml->identificationInfo->MD_DataIdentification->identifier->CharacterString != "") {
                                ?>
                                <div class="row mb-2">
                                    <div class="col-xl-5">
                                        <div class="form-control-label">
                                            Identifier
                                        </div>
                                    </div>
                                    <div class="col-xl-7">
                                        <?php echo "&nbsp;&nbsp;<p>" . $metadataxml->identificationInfo->MD_DataIdentification->identifier->CharacterString . "</p>"; ?>
                                    </div>
                                </div>
                                <?php
                            }
                            ?>
                            <?php
                            if (isset($metadataxml->identificationInfo->MD_DataIdentification->trigger->CharacterString) && $metadataxml->identificationInfo->MD_DataIdentification->trigger->CharacterString != "") {
                                ?>
                                <div class="row mb-2">
                                    <div class="col-xl-5">
                                        <div class="form-control-label">
                                            Trigger
                                        </div>
                                    </div>
                                    <div class="col-xl-7">
                                        <?php echo "&nbsp;&nbsp;<p>" . $metadataxml->identificationInfo->MD_DataIdentification->trigger->CharacterString . "</p>"; ?>
                                    </div>
                                </div>
                                <?php
                            }
                            ?>
                            <?php
                            if (isset($metadataxml->identificationInfo->MD_DataIdentification->context->CharacterString) && $metadataxml->identificationInfo->MD_DataIdentification->context->CharacterString != "") {
                                ?>
                                <div class="row mb-2">
                                    <div class="col-xl-5">
                                        <div class="form-control-label">
                                            Context
                                        </div>
                                    </div>
                                    <div class="col-xl-7">
                                        <?php echo "&nbsp;&nbsp;<p>" . $metadataxml->identificationInfo->MD_DataIdentification->context->CharacterString . "</p>"; ?>
                                    </div>
                                </div>
                                <?php
                            }
                            ?>
                            <?php
                            if (isset($metadataxml->identificationInfo->MD_DataIdentification->sequence->CharacterString) && $metadataxml->identificationInfo->MD_DataIdentification->sequence->CharacterString != "") {
                                ?>
                                <div class="row mb-2">
                                    <div class="col-xl-5">
                                        <div class="form-control-label">
                                            Sequence
                                        </div>
                                    </div>
                                    <div class="col-xl-7">
                                        <?php echo "&nbsp;&nbsp;<p>" . $metadataxml->identificationInfo->MD_DataIdentification->sequence->CharacterString . "</p>"; ?>
                                    </div>
                                </div>
                                <?php
                            }
                            ?>
                            <?php
                            if (isset($metadataxml->identificationInfo->MD_DataIdentification->EvtIdentifiertime->CharacterString) && $metadataxml->identificationInfo->MD_DataIdentification->EvtIdentifiertime->CharacterString != "") {
                                ?>
                                <div class="row mb-2">
                                    <div class="col-xl-5">
                                        <div class="form-control-label">
                                            Time
                                        </div>
                                    </div>
                                    <div class="col-xl-7">
                                        <?php echo "&nbsp;&nbsp;<p>" . $metadataxml->identificationInfo->MD_DataIdentification->EvtIdentifiertime->CharacterString . "</p>"; ?>
                                    </div>
                                </div>
                                <?php
                            }
                            ?>
                        </div>
                    </div>
                    <div class="col-xl-3">
                        <h6 class="heading-small text-muted mb-3">Instrument Identification</h6>
                        <div class="form-group">
                            <?php
                            if (isset($metadataxml->identificationInfo->MD_DataIdentification->typeInstrumentIdentification->CharacterString) && $metadataxml->identificationInfo->MD_DataIdentification->typeInstrumentIdentification->CharacterString != "") {
                                ?>
                                <div class="row mb-2">
                                    <div class="col-xl-5">
                                        <div class="form-control-label">
                                            Type
                                        </div>
                                    </div>
                                    <div class="col-xl-7">
                                        <?php echo "&nbsp;&nbsp;<p>" . $metadataxml->identificationInfo->MD_DataIdentification->typeInstrumentIdentification->CharacterString . "</p>"; ?>
                                    </div>
                                </div>
                                <?php
                            }
                            ?>

                            <h6 class="heading-small text-muted mt-2 mb-3">Operation</h6>
                            <?php
                            if (isset($metadataxml->identificationInfo->MD_DataIdentification->operationIdentifier->CharacterString) && $metadataxml->identificationInfo->MD_DataIdentification->operationIdentifier->CharacterString != "") {
                                ?>
                                <div class="row mb-2">
                                    <div class="col-xl-5">
                                        <div class="form-control-label">
                                            Identifier
                                        </div>
                                    </div>
                                    <div class="col-xl-7">
                                        <?php echo "&nbsp;&nbsp;<p>" . $metadataxml->identificationInfo->MD_DataIdentification->operationIdentifier->CharacterString . "</p>"; ?>
                                    </div>
                                </div>
                                <?php
                            }
                            ?>
                            <?php
                            if (isset($metadataxml->identificationInfo->MD_DataIdentification->operationStatus->CharacterString) && $metadataxml->identificationInfo->MD_DataIdentification->operationStatus->CharacterString != "") {
                                ?>
                                <div class="row mb-2">
                                    <div class="col-xl-5">
                                        <div class="form-control-label">
                                            Status
                                        </div>
                                    </div>
                                    <div class="col-xl-7">
                                        <?php echo "&nbsp;&nbsp;<p>" . $metadataxml->identificationInfo->MD_DataIdentification->operationStatus->CharacterString . "</p>"; ?>
                                    </div>
                                </div>
                                <?php
                            }
                            ?>
                            <?php
                            if (isset($metadataxml->identificationInfo->MD_DataIdentification->operationType->CharacterString) && $metadataxml->identificationInfo->MD_DataIdentification->operationType->CharacterString != "") {
                                ?>
                                <div class="row mb">
                                    <div class="col-xl-5">
                                        <div class="form-control-label">
                                            Type
                                        </div>
                                    </div>
                                    <div class="col-xl-7">
                                        <?php echo "&nbsp;&nbsp;<p>" . $metadataxml->identificationInfo->MD_DataIdentification->operationType->CharacterString . "</p>"; ?>
                                    </div>
                                </div>
                                <?php
                            }
                            ?>
                        </div>
                    </div>
                    <div class="col-lg-2 px-0">
                        <h6 class="heading-small text-muted mb-3">Request Data Range
                        </h6>
                        <div class="form-group">
                            <?php
                            if (isset($metadataxml->identificationInfo->MD_DataIdentification->operationDate->Date) && $metadataxml->identificationInfo->MD_DataIdentification->operationDate->Date != "") {
                                ?>
                                <div class="form-control-label mr-3">
                                    Date
                                </div>
                                <?php echo "&nbsp;&nbsp;<p>" . date('d/m/Y',strtotime(trim($metadataxml->identificationInfo->MD_DataIdentification->operationDate->Date))) . "</p>"; ?>
                                <?php
                            }
                            ?>
                            <?php
                            if (isset($metadataxml->identificationInfo->MD_DataIdentification->lastAcceptableDate->Date) && $metadataxml->identificationInfo->MD_DataIdentification->lastAcceptableDate->Date != "") {
                                ?>
                                <div class="form-control-label mt-3 mr-3">
                                    Last Acceptable Date
                                </div>
                                <?php echo "&nbsp;&nbsp;<p>" . date('d/m/Y',strtotime(trim($metadataxml->identificationInfo->MD_DataIdentification->lastAcceptableDate->Date))) . "</p>"; ?>
                                <?php
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
