<div class="card card-primary div_c5" id="div_c5">
    <div class="card-header">
        <a data-toggle="collapse" href="#collapse5">
            <h4 class="card-title">
                <?php echo __('lang.accord_5'); ?>
            </h4>
        </a>
    </div>
    <div id="collapse5" class="panel-collapse collapse in show" data-parent="#div_c5">
        <div class="card-body">
            <div class="row">
                <?php
                foreach($template->template[strtolower($catSelected)]['accordion5'] as $key=>$val){
                    if($val['status'] == "customInput"){
                        ?>
                        <div class="row mb-2 sortIt">
                            <div class="col-3 pl-5">
                                <label class="form-control-label mr-4 customInput_label" for="uname">{{ $val['label_'.$langSelected] }}</label>
                                <label class="float-right">:</label>
                            </div>
                            <div class="col-8">
                                {{ $metadataxml->customInputs->accordion5->$key }}
                            </div>
                        </div>
                        <?php
                    }
                    if($key == "c5_process_lvl"){
                        $processLevel = "";
                        if (isset($metadataxml->identificationInfo->MD_DataIdentification->processLevel->CharacterString) && $metadataxml->identificationInfo->MD_DataIdentification->processLevel->CharacterString != "") {
                            $processLevel = $metadataxml->identificationInfo->MD_DataIdentification->processLevel->CharacterString;
                        }
                        if($processLevel != ""){
                            ?>
                            <div class="col-xl-6" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                                <div class="form-inline ml-3">
                                    <div class="form-control-label mr-3">
                                        Process Level
                                    </div>
                                    <?php echo "&nbsp;&nbsp;<p>" . $metadataxml->identificationInfo->MD_DataIdentification->processLevel->CharacterString . "</p>"; ?>
                                </div>
                            </div>
                            <?php
                        }
                    }
                    if($key == "c5_resolution"){
                        $res = "";
                        if (isset($metadataxml->identificationInfo->MD_DataIdentification->processResolution->Decimal) && $metadataxml->identificationInfo->MD_DataIdentification->processResolution->Decimal != "") {
                            $res = $metadataxml->identificationInfo->MD_DataIdentification->processResolution->Decimal;
                        }
                        if($res != ""){
                            ?>
                            <div class="col-xl-6" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                                <div class="form-inline">
                                    <div class="form-control-label mr-3">
                                        Resolution
                                    </div>                
                                    <?php echo "&nbsp;&nbsp;<p>" . $metadataxml->identificationInfo->MD_DataIdentification->processResolution->Decimal . " meter</p>"; ?>
                                </div>
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
