<div class="card card-primary div_c8" id="div_c8">
    <div class="card-header ftest">
        <a data-toggle="collapse" href="#collapse8">
            <h4 class="card-title">
                <?php echo __('lang.accord_8'); ?>
            </h4>
        </a>
    </div>
    <div id="collapse8" class="panel-collapse collapse" data-parent="#div_c8">
        <div class="card-body">
            <b>Environment Record</b>
            <div class="form-group row">
                Average Air Temperature:
                <?php
                if(isset($metadataxml->identificationInfo->SV_ServiceIdentification->averageAirTemperature->CharacterString) && $metadataxml->identificationInfo->SV_ServiceIdentification->averageAirTemperature->CharacterString != ""){
                    echo "&nbsp;&nbsp;<p>".$metadataxml->identificationInfo->SV_ServiceIdentification->averageAirTemperature->CharacterString."</p>";
                }
                ?>
                &nbsp;&nbsp;&nbsp;
                Altitude:
                <?php
                if(isset($metadataxml->identificationInfo->SV_ServiceIdentification->altitude->CharacterString) && $metadataxml->identificationInfo->SV_ServiceIdentification->altitude->CharacterString != ""){
                    echo "&nbsp;&nbsp;<p>".$metadataxml->identificationInfo->SV_ServiceIdentification->altitude->CharacterString."</p>";
                }
                ?>
            </div>
            <div class="form-group row">
                Relative Humidity:
                <?php
                if(isset($metadataxml->identificationInfo->SV_ServiceIdentification->relativeHumidity->CharacterString) && $metadataxml->identificationInfo->SV_ServiceIdentification->relativeHumidity->CharacterString != ""){
                    echo "&nbsp;&nbsp;<p>".$metadataxml->identificationInfo->SV_ServiceIdentification->relativeHumidity->CharacterString."</p>";
                }
                ?>
                &nbsp;&nbsp;&nbsp;
                Meteorological Condition:
                <?php
                if(isset($metadataxml->identificationInfo->SV_ServiceIdentification->meteorologicalCondition->CharacterString) && $metadataxml->identificationInfo->SV_ServiceIdentification->meteorologicalCondition->CharacterString != ""){
                    echo "&nbsp;&nbsp;<p>".$metadataxml->identificationInfo->SV_ServiceIdentification->meteorologicalCondition->CharacterString."</p>";
                }
                ?>
            </div>
            <b>Event Identifier</b>
            <div class="form-group row">
                Identifier:
                <?php
                if(isset($metadataxml->identificationInfo->SV_ServiceIdentification->identifier->CharacterString) && $metadataxml->identificationInfo->SV_ServiceIdentification->identifier->CharacterString != ""){
                    echo "&nbsp;&nbsp;<p>".$metadataxml->identificationInfo->SV_ServiceIdentification->identifier->CharacterString."</p>";
                }
                ?>
                &nbsp;&nbsp;&nbsp;
                Trigger:
                <?php
                if(isset($metadataxml->identificationInfo->SV_ServiceIdentification->trigger->CharacterString) && $metadataxml->identificationInfo->SV_ServiceIdentification->trigger->CharacterString != ""){
                    echo "&nbsp;&nbsp;<p>".$metadataxml->identificationInfo->SV_ServiceIdentification->trigger->CharacterString."</p>";
                }
                ?>
            </div>
            <div class="form-group row">
                Context:
                <?php
                if(isset($metadataxml->identificationInfo->SV_ServiceIdentification->context->CharacterString) && $metadataxml->identificationInfo->SV_ServiceIdentification->context->CharacterString != ""){
                    echo "&nbsp;&nbsp;<p>".$metadataxml->identificationInfo->SV_ServiceIdentification->context->CharacterString."</p>";
                }
                ?>
                &nbsp;&nbsp;&nbsp;
                Sequence:
                <?php
                if(isset($metadataxml->identificationInfo->SV_ServiceIdentification->sequence->CharacterString) && $metadataxml->identificationInfo->SV_ServiceIdentification->sequence->CharacterString != ""){
                    echo "&nbsp;&nbsp;<p>".$metadataxml->identificationInfo->SV_ServiceIdentification->sequence->CharacterString."</p>";
                }
                ?>
            </div>
            <div class="form-group row">
                Time:
                <?php
                if(isset($metadataxml->identificationInfo->SV_ServiceIdentification->EvtIdentifiertime->CharacterString) && $metadataxml->identificationInfo->SV_ServiceIdentification->EvtIdentifiertime->CharacterString != ""){
                    echo "&nbsp;&nbsp;<p>".$metadataxml->identificationInfo->SV_ServiceIdentification->EvtIdentifiertime->CharacterString."</p>";
                }
                ?>
                &nbsp;&nbsp;&nbsp;
            </div>
            <b>Instrument Identification</b>
            <div class="form-group row">
                Type:
                <?php
                if(isset($metadataxml->identificationInfo->SV_ServiceIdentification->typeInstrumentIdentification->CharacterString) && $metadataxml->identificationInfo->SV_ServiceIdentification->typeInstrumentIdentification->CharacterString != ""){
                    echo "&nbsp;&nbsp;<p>".$metadataxml->identificationInfo->SV_ServiceIdentification->typeInstrumentIdentification->CharacterString."</p>";
                }
                ?>
                &nbsp;&nbsp;&nbsp;
            </div>
            <b>Operation</b>
            <div class="form-group row">
                Identifier:
                <?php
                if(isset($metadataxml->identificationInfo->SV_ServiceIdentification->operationIdentifier->CharacterString) && $metadataxml->identificationInfo->SV_ServiceIdentification->operationIdentifier->CharacterString != ""){
                    echo "&nbsp;&nbsp;<p>".$metadataxml->identificationInfo->SV_ServiceIdentification->operationIdentifier->CharacterString."</p>";
                }
                ?>
                &nbsp;&nbsp;&nbsp;
                Status:
                <?php
                if(isset($metadataxml->identificationInfo->SV_ServiceIdentification->operationStatus->CharacterString) && $metadataxml->identificationInfo->SV_ServiceIdentification->operationStatus->CharacterString != ""){
                    echo "&nbsp;&nbsp;<p>".$metadataxml->identificationInfo->SV_ServiceIdentification->operationStatus->CharacterString."</p>";
                }
                ?>
            </div>
            <div class="form-group row">
                Type:
                <?php
                if(isset($metadataxml->identificationInfo->SV_ServiceIdentification->operationType->CharacterString) && $metadataxml->identificationInfo->SV_ServiceIdentification->operationType->CharacterString != ""){
                    echo "&nbsp;&nbsp;<p>".$metadataxml->identificationInfo->SV_ServiceIdentification->operationType->CharacterString."</p>";
                }
                ?>
                &nbsp;&nbsp;&nbsp;
            </div>
            <b>Request Data Range</b>
            <div class="form-group row">
                Date:
                <?php
                if(isset($metadataxml->identificationInfo->SV_ServiceIdentification->operationDate->Date) && $metadataxml->identificationInfo->SV_ServiceIdentification->operationDate->Date != ""){
                    echo "&nbsp;&nbsp;<p>".$metadataxml->identificationInfo->SV_ServiceIdentification->operationDate->Date."</p>";
                }
                ?>
                &nbsp;&nbsp;&nbsp;
                Last Acceptable Date:
                <?php
                if(isset($metadataxml->identificationInfo->SV_ServiceIdentification->lastAcceptableDate->Date) && $metadataxml->identificationInfo->SV_ServiceIdentification->lastAcceptableDate->Date != ""){
                    echo "&nbsp;&nbsp;<p>".$metadataxml->identificationInfo->SV_ServiceIdentification->lastAcceptableDate->Date."</p>";
                }
                ?>
            </div>
        </div>
    </div>
</div>