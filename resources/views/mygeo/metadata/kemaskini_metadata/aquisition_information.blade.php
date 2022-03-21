<div class="card card-primary mb-4 div_c8" id="div_c8">
    <div class="card-header">
        <a data-toggle="collapse" href="#collapse8">
            <h4 class="card-title">
                <?php echo __('lang.accord_8'); ?>
            </h4>
        </a>
        @if(auth::user()->hasRole(['Penerbit Metadata']) && $metadataSearched->disahkan == "no")
        <button type="button" class="btn btn-secondary float-right" data-toggle="modal" data-target="#modal8">Catatan</button>
        @elseif(auth::user()->hasRole(['Pengesah Metadata','Super Admin','Pentadbir Aplikasi']))
        <button type="button" class="btn btn-secondary float-right" data-toggle="modal" data-target="#modal8">Catatan</button>
        @endif
    </div>
    <div id="collapse8" class="panel-collapse collapse in show" data-parent="#div_c8">
        <div class="card-body">
            <div class="acard-body opacity-8">
                <div class="row">
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
                                    <input class="form-control form-control-sm ml-3 sortable" type="text" name="{{ $key }}" data-status="<?php echo $val['status']; ?>" value="{{ $metadataxml->customInputs->accordion8->$key }}"/>
                                </div>
                            </div>
                            <?php
                        }
                    }
                    ?>
                </div>
                <div class="row">
                    <div class="col-xl-4">
                        <h6 class="heading-small text-muted mb-3">Environment Record
                        </h6>
                        <div class="form-group">
                            <?php
                            foreach($template->template[strtolower($catSelected)]['accordion8'] as $key=>$val){
                                if($key == "c8_avg_air_temp"){
                                    ?>
                                    <div class="row mb-2" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                                        <div class="col-xl-8">
                                            <div class="form-control-label">
                                                Average Air Temperature
                                            </div>
                                        </div>
                                        <div class="col-xl-4">
                                            <?php
                                            $avgAirTemp = "";
                                            if (isset($metadataxml->identificationInfo->MD_DataIdentification->averageAirTemperature->CharacterString) && $metadataxml->identificationInfo->MD_DataIdentification->averageAirTemperature->CharacterString != "") {
                                                $avgAirTemp = $metadataxml->identificationInfo->MD_DataIdentification->averageAirTemperature->CharacterString;
                                            }
                                            ?>
                                            <input class="form-control form-control-sm" type="text" style="width :80px" placeholder="Celcius" name="c8_avg_air_temp" id="c8_avg_air_temp" value="{{ $avgAirTemp }}">
                                        </div>
                                    </div>
                                    <?php
                                }
                                if($key == "c8_altitude"){
                                    ?>
                                    <div class="row mb-2" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                                        <div class="col-xl-8">
                                            <div class="form-control-label">
                                                Altitude
                                            </div>
                                        </div>
                                        <div class="col-xl-4">
                                            <?php
                                            $alt = "";
                                            if (isset($metadataxml->identificationInfo->MD_DataIdentification->altitude->CharacterString) && $metadataxml->identificationInfo->MD_DataIdentification->altitude->CharacterString != "") {
                                                $alt = $metadataxml->identificationInfo->MD_DataIdentification->altitude->CharacterString;
                                            }
                                            ?>
                                            <input class="form-control form-control-sm" type="text" style="width :80px" placeholder="Feet" name="c8_altitude" id="c8_altitude" value="{{ $alt }}">
                                        </div>
                                    </div>
                                    <?php
                                }
                                if($key == "c8_relative_humid"){
                                    ?>
                                    <div class="row mb-2" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                                        <div class="col-xl-8">
                                            <div class="form-control-label">
                                                Relative Humidity
                                            </div>
                                        </div>
                                        <div class="col-xl-4">
                                            <?php
                                            $relHumid = "";
                                            if (isset($metadataxml->identificationInfo->MD_DataIdentification->relativeHumidity->CharacterString) && $metadataxml->identificationInfo->MD_DataIdentification->relativeHumidity->CharacterString != "") {
                                                $relHumid = $metadataxml->identificationInfo->MD_DataIdentification->relativeHumidity->CharacterString;
                                            }
                                            ?>
                                            <input class="form-control form-control-sm" type="text" style="width :80px" placeholder="Humidity" name="c8_relative_humid" id="c8_relative_humid" value="{{ $relHumid }}">
                                        </div>
                                    </div>
                                    <?php
                                }
                                if($key == "c8_meteor_cond"){
                                    ?>
                                    <div class="row mb" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                                        <div class="col-xl-8">
                                            <div class="form-control-label">
                                                Meteorological Condition
                                            </div>
                                        </div>
                                        <div class="col-xl-4">
                                            <?php
                                            $metCond = "";
                                            if (isset($metadataxml->identificationInfo->MD_DataIdentification->meteorologicalCondition->CharacterString) && $metadataxml->identificationInfo->MD_DataIdentification->meteorologicalCondition->CharacterString != "") {
                                                $metCond = $metadataxml->identificationInfo->MD_DataIdentification->meteorologicalCondition->CharacterString;
                                            }
                                            ?>
                                            <input class="form-control form-control-sm" type="text" style="width :80px" placeholder="Condition" name="c8_meteor_cond" id="c8_meteor_cond" value="{{ $metCond }}">
                                        </div>
                                    </div>
                                    <?php
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
                                    ?>
                                    <div class="row mb-2" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                                        <div class="col-xl-5">
                                            <div class="form-control-label">
                                                Identifier<span class="text-warning">*</span>
                                            </div>
                                        </div>
                                        <div class="col-xl-7">
                                            <?php
                                            $eventId = "";
                                            if (isset($metadataxml->identificationInfo->MD_DataIdentification->identifier->CharacterString) && $metadataxml->identificationInfo->MD_DataIdentification->identifier->CharacterString != "") {
                                                $eventId = $metadataxml->identificationInfo->MD_DataIdentification->identifier->CharacterString;
                                            }
                                            ?>
                                            <input class="form-control form-control-sm" type="text" style="width :80px" placeholder="Identifier" name="c8_identifier" id="c8_identifier" value="{{ $eventId }}">
                                            @error('c8_identifier')
                                            <div class="text-error">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <?php
                                }
                                if($key == "c8_trigger"){
                                    ?>
                                    <div class="row mb-2" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                                        <div class="col-xl-5">
                                            <div class="form-control-label">
                                                Trigger
                                            </div>
                                        </div>
                                        <div class="col-xl-7">
                                            <?php
                                            $trigger = "";
                                            if (isset($metadataxml->identificationInfo->MD_DataIdentification->trigger->CharacterString) && $metadataxml->identificationInfo->MD_DataIdentification->trigger->CharacterString != "") {
                                                $trigger = $metadataxml->identificationInfo->MD_DataIdentification->trigger->CharacterString;
                                            }
                                            ?>
                                            <select class="form-control form-control-sm" name="c8_trigger" id="c8_trigger">
                                                <option value="">Pilih...</option>
                                                <option value="Automatic" {{ ($trigger == 'Automatic' ? "selected":"") }}>Automatic</option>
                                                <option value="Manual" {{ ($trigger == 'Manual' ? "selected":"") }}>Manual</option>
                                                <option value="Pre Programmed" {{ ($trigger == 'Pre Programmed' ? "selected":"") }}>Pre Programmed</option>
                                            </select>
                                        </div>
                                    </div>
                                    <?php
                                }
                                if($key == "c8_context"){
                                    ?>
                                    <div class="row mb-2" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                                        <div class="col-xl-5">
                                            <div class="form-control-label">
                                                Context
                                            </div>
                                        </div>
                                        <div class="col-xl-7">
                                            <?php
                                            $context = "";
                                            if (isset($metadataxml->identificationInfo->MD_DataIdentification->context->CharacterString) && $metadataxml->identificationInfo->MD_DataIdentification->context->CharacterString != "") {
                                                $context = $metadataxml->identificationInfo->MD_DataIdentification->context->CharacterString;
                                            }
                                            ?>
                                            <select class="form-control form-control-sm" name="c8_context" id="c8_context">
                                                <option value="">Pilih...</option>
                                                <option value="Acquisition" {{ ($context == 'Acquisition' ? "selected":"") }}>Acquisition</option>
                                                <option value="Pass" {{ ($context == 'Pass' ? "selected":"") }}>Pass</option>
                                                <option value="Way Point" {{ ($context == 'Way Point' ? "selected":"") }}>Way Point</option>
                                            </select>
                                        </div>
                                    </div>
                                    <?php
                                }
                                if($key == "c8_sequence"){
                                    ?>
                                    <div class="row mb-2" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                                        <div class="col-xl-5">
                                            <div class="form-control-label">
                                                Sequence
                                            </div>
                                        </div>
                                        <div class="col-xl-7">
                                            <?php
                                            $sequence = "";
                                            if (isset($metadataxml->identificationInfo->MD_DataIdentification->sequence->CharacterString) && $metadataxml->identificationInfo->MD_DataIdentification->sequence->CharacterString != "") {
                                                $sequence = $metadataxml->identificationInfo->MD_DataIdentification->sequence->CharacterString;
                                            }
                                            ?>
                                            <select class="form-control form-control-sm" name="c8_sequence" id="c8_sequence">
                                                <option value="">Pilih...</option>
                                                <option value="Start" {{ ($sequence == 'Start' ? "selected":"") }}>Start</option>
                                                <option value="End" {{ ($sequence == 'End' ? "selected":"") }}>End</option>
                                                <option value="Instantaneous" {{ ($sequence == 'Instantaneous' ? "selected":"") }}>Instantaneous</option>
                                            </select>
                                        </div>
                                    </div>
                                    <?php
                                }
                                if($key == "c8_time"){
                                    ?>
                                    <div class="row mb-2" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                                        <div class="col-xl-5">
                                            <div class="form-control-label">
                                                Time
                                            </div>
                                        </div>
                                        <div class="col-xl-7">
                                            <?php
                                            $time = "";
                                            if (isset($metadataxml->identificationInfo->MD_DataIdentification->EvtIdentifiertime->CharacterString) && $metadataxml->identificationInfo->MD_DataIdentification->EvtIdentifiertime->CharacterString != "") {
                                                $time = $metadataxml->identificationInfo->MD_DataIdentification->EvtIdentifiertime->CharacterString;
                                            }
                                            ?>
                                            <input class="form-control form-control-sm" type="time" style="width :120px" name="c8_time" id="c8_time" value="{{ $time }}">
                                        </div>
                                    </div>
                                    <?php
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
                                    ?>
                                    <div class="row mb-2" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                                        <div class="col-xl-5">
                                            <div class="form-control-label">
                                                Type<span class="text-warning">*</span>
                                            </div>
                                        </div>
                                        <div class="col-xl-7">
                                            <?php
                                            $instruIdType = "";
                                            if (isset($metadataxml->identificationInfo->MD_DataIdentification->typeInstrumentIdentification->CharacterString) && $metadataxml->identificationInfo->MD_DataIdentification->typeInstrumentIdentification->CharacterString != "") {
                                                $instruIdType = $metadataxml->identificationInfo->MD_DataIdentification->typeInstrumentIdentification->CharacterString;
                                            }
                                            ?>
                                            <input class="form-control form-control-sm" type="text" style="width :80px" placeholder="Type" name="c8_type" id="c8_type" value="{{ $instruIdType }}">
                                            @error('c8_type')
                                            <div class="text-error">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <?php
                                }
                            }
                            ?>
                            <h6 class="heading-small text-muted mt-2 mb-3">Operation</h6>
                            <?php
                            foreach($template->template[strtolower($catSelected)]['accordion8'] as $key=>$val){
                                if($key == "c8_op_identifier"){
                                    ?>
                                    <div class="row mb-2" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                                        <div class="col-xl-5">
                                            <div class="form-control-label">
                                                Identifier<span class="text-warning">*</span>
                                            </div>
                                        </div>
                                        <div class="col-xl-7">
                                            <?php
                                            $opId = "";
                                            if (isset($metadataxml->identificationInfo->MD_DataIdentification->operationIdentifier->CharacterString) && $metadataxml->identificationInfo->MD_DataIdentification->operationIdentifier->CharacterString != "") {
                                                $opId = $metadataxml->identificationInfo->MD_DataIdentification->operationIdentifier->CharacterString;
                                            }
                                            ?>
                                            <input class="form-control form-control-sm" type="text" style="width :80px" placeholder="Identifier" name="c8_op_identifier" id="c8_op_identifier" value="{{ $opId }}">
                                        </div>
                                    </div>
                                    <?php
                                }
                                if($key == "c8_op_status"){
                                    ?>
                                    <div class="row mb-2" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                                        <div class="col-xl-5">
                                            <div class="form-control-label">
                                                Status
                                            </div>
                                        </div>
                                        <div class="col-xl-7">
                                            <?php
                                            $opStatus = "";
                                            if (isset($metadataxml->identificationInfo->MD_DataIdentification->operationStatus->CharacterString) && $metadataxml->identificationInfo->MD_DataIdentification->operationStatus->CharacterString != "") {
                                                $opStatus = $metadataxml->identificationInfo->MD_DataIdentification->operationStatus->CharacterString;
                                            }
                                            ?>
                                            <input class="form-control form-control-sm" type="text" style="width :80px" placeholder="Status" name="c8_op_status" id="c8_op_status" value="{{ $opStatus }}">
                                        </div>
                                    </div>
                                    <?php
                                }
                                if($key == "c8_op_type"){
                                    ?>
                                    <div class="row mb" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                                        <div class="col-xl-5">
                                            <div class="form-control-label">
                                                Type
                                            </div>
                                        </div>
                                        <div class="col-xl-7">
                                            <?php
                                            $opType = "";
                                            if (isset($metadataxml->identificationInfo->MD_DataIdentification->operationType->CharacterString) && $metadataxml->identificationInfo->MD_DataIdentification->operationType->CharacterString != "") {
                                                $opType = $metadataxml->identificationInfo->MD_DataIdentification->operationType->CharacterString;
                                            }
                                            ?>
                                            <input class="form-control form-control-sm" type="text" style="width :80px" placeholder="Type" name="c8_op_type" id="c8_op_type" value="{{ $opType }}">
                                        </div>
                                    </div>
                                    <?php
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
                                    ?>
                                    <div <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                                        <div class="form-control-label mr-3">
                                            Date
                                        </div>
                                        <?php
                                        $rdrDate = "";
                                        if (isset($metadataxml->identificationInfo->MD_DataIdentification->operationDate->Date) && $metadataxml->identificationInfo->MD_DataIdentification->operationDate->Date != "") {
                                            $rdrDate = $metadataxml->identificationInfo->MD_DataIdentification->operationDate->Date;
                                        }
                                        ?>
                                        <input class="form-control form-control-sm" type="date" style="width :150px" placeholder="Select Date" name="c8_rdr_date" id="c8_rdr_date" value="{{ $rdrDate }}">
                                    </div>
                                    <?php
                                }
                                if($key == "c8_last_accept_date"){
                                    ?>
                                    <div <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                                        <div class="form-control-label mt-3 mr-3">
                                            Last Acceptable Date
                                        </div>
                                        <?php
                                        $lad = "";
                                        if (isset($metadataxml->identificationInfo->MD_DataIdentification->lastAcceptableDate->Date) && $metadataxml->identificationInfo->MD_DataIdentification->lastAcceptableDate->Date != "") {
                                            $lad = $metadataxml->identificationInfo->MD_DataIdentification->lastAcceptableDate->Date;
                                        }
                                        ?>
                                        <input class="form-control form-control-sm" type="date" style="width :150px" placeholder="Select Date" name="c8_last_accept_date" id="c8_last_accept_date" class="form-control col-lg-4" value="{{ $lad }}">
                                    </div>
                                    <?php
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
