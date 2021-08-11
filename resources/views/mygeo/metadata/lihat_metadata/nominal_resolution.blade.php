<div class="card card-primary div_c4" id="div_c4">
    <div class="card-header">
        <a data-toggle="collapse" href="#collapse4">
            <h4 class="card-title">
                <?php echo __('lang.accord_4'); ?>
            </h4>
        </a>
    </div>
    <div id="collapse4" class="panel-collapse collapse in show" data-parent="#div_c4">
        <div class="card-body">
            <div class="row">
                <?php
                if (isset($metadataxml->identificationInfo->SV_ServiceIdentification->scanningResolution->CharacterString) && $metadataxml->identificationInfo->SV_ServiceIdentification->scanningResolution->CharacterString != "") {
                    ?>
                    <div class="col-xl-6">
                        <div class="form-inline ml-3">
                            <div class="form-control-label mr-3">
                                Scanning Resolution<span class="text-warning">*</span> :
                            </div>
                            <?php echo "&nbsp;&nbsp;<p>" . $metadataxml->identificationInfo->SV_ServiceIdentification->scanningResolution->CharacterString . "</p>"; ?>
                        </div>
                    </div>
                    <?php
                }
                ?>
                <?php
                if (isset($metadataxml->identificationInfo->SV_ServiceIdentification->groundScanning->Decimal) && $metadataxml->identificationInfo->SV_ServiceIdentification->groundScanning->Decimal != "") {
                    ?>
                    <div class="col-xl-6">
                        <div class="form-inline">
                            <div class="form-control-label mr-3">
                                Ground Scanning<span class="text-warning">*</span> :
                            </div>
                            <?php echo "&nbsp;&nbsp;<p>" . $metadataxml->identificationInfo->SV_ServiceIdentification->groundScanning->Decimal . " meter</p>"; ?>
                        </div>
                    </div>
                    <?php
                }
                ?>
            </div>
        </div>
    </div>
</div>
