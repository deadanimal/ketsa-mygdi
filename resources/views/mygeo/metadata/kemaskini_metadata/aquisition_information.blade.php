<div class="card card-primary div_c8" id="div_c8">
    <div class="card-header ftest">
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
    <div id="collapse8" class="panel-collapse collapse" data-parent="#div_c8">
        <div class="card-body">
            <b>Environment Record</b>
            <div class="form-group row">
                Average Air Temperature:
                <?php
                $avgAirTemp = "";
                if(isset($metadataxml->identificationInfo->SV_ServiceIdentification->averageAirTemperature->CharacterString) && $metadataxml->identificationInfo->SV_ServiceIdentification->averageAirTemperature->CharacterString != ""){
                    $avgAirTemp = $metadataxml->identificationInfo->SV_ServiceIdentification->averageAirTemperature->CharacterString;
                }
                ?>
                <input type="text" name="c8_avg_air_temp" id="c8_avg_air_temp" class="form-control col-lg-4" value="{{ $avgAirTemp }}">
                &nbsp;&nbsp;&nbsp;
                Altitude:
                <?php
                $alt = "";
                if(isset($metadataxml->identificationInfo->SV_ServiceIdentification->altitude->CharacterString) && $metadataxml->identificationInfo->SV_ServiceIdentification->altitude->CharacterString != ""){
                    $alt = $metadataxml->identificationInfo->SV_ServiceIdentification->altitude->CharacterString;
                }
                ?>
                <input type="text" name="c8_altitude" id="c8_altitude" class="form-control col-lg-4" value="{{ $alt }}"> 
            </div>
            <div class="form-group row">
                Relative Humidity:
                <?php
                $relHumid = "";
                if(isset($metadataxml->identificationInfo->SV_ServiceIdentification->relativeHumidity->CharacterString) && $metadataxml->identificationInfo->SV_ServiceIdentification->relativeHumidity->CharacterString != ""){
                    $relHumid = $metadataxml->identificationInfo->SV_ServiceIdentification->relativeHumidity->CharacterString;
                }
                ?>
                <input type="text" name="c8_relative_humid" id="c8_relative_humid" class="form-control col-lg-4" value="{{ $relHumid }}">
                &nbsp;&nbsp;&nbsp;
                Meteorological Condition:
                <?php
                $metCond = "";
                if(isset($metadataxml->identificationInfo->SV_ServiceIdentification->meteorologicalCondition->CharacterString) && $metadataxml->identificationInfo->SV_ServiceIdentification->meteorologicalCondition->CharacterString != ""){
                    $metCond = $metadataxml->identificationInfo->SV_ServiceIdentification->meteorologicalCondition->CharacterString;
                }
                ?>
                <input type="text" name="c8_meteor_cond" id="c8_meteor_cond" class="form-control col-lg-4" value="{{ $metCond }}"> 
            </div>
            <b>Event Identifier</b>
            <div class="form-group row">
                Identifier<span class="required">*</span>:
                <?php
                $eventId = "";
                if(isset($metadataxml->identificationInfo->SV_ServiceIdentification->identifier->CharacterString) && $metadataxml->identificationInfo->SV_ServiceIdentification->identifier->CharacterString != ""){
                    $eventId = $metadataxml->identificationInfo->SV_ServiceIdentification->identifier->CharacterString;
                }
                ?>
                <input type="text" name="c8_identifier" id="c8_identifier" class="form-control col-lg-4" value="{{ $eventId }}">
                &nbsp;&nbsp;&nbsp;
                Trigger:
                <?php
                $trigger = "";
                if(isset($metadataxml->identificationInfo->SV_ServiceIdentification->trigger->CharacterString) && $metadataxml->identificationInfo->SV_ServiceIdentification->trigger->CharacterString != ""){
                    $trigger = $metadataxml->identificationInfo->SV_ServiceIdentification->trigger->CharacterString;
                }
                ?>
                <input type="text" name="c8_trigger" id="c8_trigger" class="form-control col-lg-4" value="{{ $trigger }}"> 
            </div>
            @error('c8_identifier')
                <div style="color:red;">{{ $message }}</div>
            @enderror
            <div class="form-group row">
                Context:
                <?php
                $context = "";
                if(isset($metadataxml->identificationInfo->SV_ServiceIdentification->context->CharacterString) && $metadataxml->identificationInfo->SV_ServiceIdentification->context->CharacterString != ""){
                    $context = $metadataxml->identificationInfo->SV_ServiceIdentification->context->CharacterString;
                }
                ?>
                <input type="text" name="c8_context" id="c8_context" class="form-control col-lg-4" value="{{ $context }}">
                &nbsp;&nbsp;&nbsp;
                Sequence:
                <?php
                $sequence = "";
                if(isset($metadataxml->identificationInfo->SV_ServiceIdentification->sequence->CharacterString) && $metadataxml->identificationInfo->SV_ServiceIdentification->sequence->CharacterString != ""){
                    $sequence = $metadataxml->identificationInfo->SV_ServiceIdentification->sequence->CharacterString;
                }
                ?>
                <input type="text" name="c8_sequence" id="c8_sequence" class="form-control col-lg-4" value="{{ $sequence }}"> 
            </div>
            <div class="form-group row">
                Time:
                <?php
                $time = "";
                if(isset($metadataxml->identificationInfo->SV_ServiceIdentification->EvtIdentifiertime->CharacterString) && $metadataxml->identificationInfo->SV_ServiceIdentification->EvtIdentifiertime->CharacterString != ""){
                    $time = $metadataxml->identificationInfo->SV_ServiceIdentification->EvtIdentifiertime->CharacterString;
                }
                ?>
                <input type="text" name="c8_time" id="c8_time" class="form-control col-lg-4" value="{{ $time }}">
                &nbsp;&nbsp;&nbsp;
            </div>
            <b>Instrument Identification</b>
            <div class="form-group row">
                Type<span class="required">*</span>:
                <?php
                $instruIdType = "";
                if(isset($metadataxml->identificationInfo->SV_ServiceIdentification->typeInstrumentIdentification->CharacterString) && $metadataxml->identificationInfo->SV_ServiceIdentification->typeInstrumentIdentification->CharacterString != ""){
                    $instruIdType = $metadataxml->identificationInfo->SV_ServiceIdentification->typeInstrumentIdentification->CharacterString;
                }
                ?>
                <input type="text" name="c8_type" id="c8_type" class="form-control col-lg-4" value="{{ $instruIdType }}">
                &nbsp;&nbsp;&nbsp;
                @error('c8_type')
                    <div style="color:red;">{{ $message }}</div>
                @enderror
            </div>
            <b>Operation</b>
            <div class="form-group row">
                Identifier<span class="required">*</span>:
                <?php
                $opId = "";
                if(isset($metadataxml->identificationInfo->SV_ServiceIdentification->operationIdentifier->CharacterString) && $metadataxml->identificationInfo->SV_ServiceIdentification->operationIdentifier->CharacterString != ""){
                    $opId = $metadataxml->identificationInfo->SV_ServiceIdentification->operationIdentifier->CharacterString;
                }
                ?>
                <input type="text" name="c8_op_identifier" id="c8_op_identifier" class="form-control col-lg-4" value="{{ $opId }}">
                &nbsp;&nbsp;&nbsp;
                Status:
                <?php
                $opStatus = "";
                if(isset($metadataxml->identificationInfo->SV_ServiceIdentification->operationStatus->CharacterString) && $metadataxml->identificationInfo->SV_ServiceIdentification->operationStatus->CharacterString != ""){
                    $opStatus = $metadataxml->identificationInfo->SV_ServiceIdentification->operationStatus->CharacterString;
                }
                ?>
                <input type="text" name="c8_op_status" id="c8_op_status" class="form-control col-lg-4" value="{{ $opStatus }}"> 
            </div>
            @error('c8_op_identifier')
                <div style="color:red;">{{ $message }}</div>
            @enderror
            <div class="form-group row">
                Type:
                <?php
                $opType = "";
                if(isset($metadataxml->identificationInfo->SV_ServiceIdentification->operationType->CharacterString) && $metadataxml->identificationInfo->SV_ServiceIdentification->operationType->CharacterString != ""){
                    $opType = $metadataxml->identificationInfo->SV_ServiceIdentification->operationType->CharacterString;
                }
                ?>
                <input type="text" name="c8_op_type" id="c8_op_type" class="form-control col-lg-4" value="{{ $opType }}">
                &nbsp;&nbsp;&nbsp;
            </div>
            <b>Request Data Range</b>
            <div class="form-group row">
                Date:
                <?php
                $rdrDate = "";
                if(isset($metadataxml->identificationInfo->SV_ServiceIdentification->operationDate->Date) && $metadataxml->identificationInfo->SV_ServiceIdentification->operationDate->Date != ""){
                    $rdrDate = $metadataxml->identificationInfo->SV_ServiceIdentification->operationDate->Date;
                }
                ?>
                <input type="date" name="c8_rdr_date" id="c8_rdr_date" class="form-control col-lg-4" value="{{ $rdrDate }}"> 
                &nbsp;&nbsp;&nbsp;
                Last Acceptable Date:
                <?php
                $lad = "";
                if(isset($metadataxml->identificationInfo->SV_ServiceIdentification->lastAcceptableDate->Date) && $metadataxml->identificationInfo->SV_ServiceIdentification->lastAcceptableDate->Date != ""){
                   $lad = $metadataxml->identificationInfo->SV_ServiceIdentification->lastAcceptableDate->Date;
                }
                ?>
                <input type="date" name="c8_last_accept_date" id="c8_last_accept_date" class="form-control col-lg-4" value="{{ $lad }}">
            </div>
        </div>
    </div>
</div>