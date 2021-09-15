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
                if (isset($metadataxml->identificationInfo->MD_DataIdentification->processLevel->CharacterString) && $metadataxml->identificationInfo->MD_DataIdentification->processLevel->CharacterString != "") {
                    ?>
                    <div class="col-xl-6">
                        <div class="form-inline ml-3">
                            <div class="form-control-label mr-3">
                                Process Level
                            </div>
                            <?php echo "&nbsp;&nbsp;<p>" . $metadataxml->identificationInfo->MD_DataIdentification->processLevel->CharacterString . "</p>"; ?>
                        </div>
                    </div>
                    <?php
                }
                ?>
                <?php
                if (isset($metadataxml->identificationInfo->MD_DataIdentification->processResolution->Decimal) && $metadataxml->identificationInfo->MD_DataIdentification->processResolution->Decimal != "") {
                    ?>
                    <div class="col-xl-6">
                        <div class="form-inline">
                            <div class="form-control-label mr-3">
                                Resolution
                            </div>                
                            <?php echo "&nbsp;&nbsp;<p>" . $metadataxml->identificationInfo->MD_DataIdentification->processResolution->Decimal . " meter</p>"; ?>
                        </div>
                    </div>
                    <?php
                }
                ?>
            </div>
        </div>
    </div>
</div>
