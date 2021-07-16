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
                <div class="col-xl-6">
                    <div class="form-inline ml-3">
                        <div class="form-control-label mr-3">
                            Process Level
                        </div>
                        <?php
                        if (isset($metadataxml->identificationInfo->SV_ServiceIdentification->processLevel->CharacterString) && $metadataxml->identificationInfo->SV_ServiceIdentification->processLevel->CharacterString != "") {
                            echo "&nbsp;&nbsp;<p>" . $metadataxml->identificationInfo->SV_ServiceIdentification->processLevel->CharacterString . "</p>";
                        }
                        ?>
                    </div>
                </div>
                <div class="col-xl-6">
                    <div class="form-inline">
                        <div class="form-control-label mr-3">
                            Resolution
                        </div>
                        <?php
                        if (isset($metadataxml->identificationInfo->SV_ServiceIdentification->processResolution->Decimal) && $metadataxml->identificationInfo->SV_ServiceIdentification->processResolution->Decimal != "") {
                            echo "&nbsp;&nbsp;<p>" . $metadataxml->identificationInfo->SV_ServiceIdentification->processResolution->Decimal . " meter</p>";
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
