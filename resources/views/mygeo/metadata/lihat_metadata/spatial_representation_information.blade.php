<div class="card card-primary div_c6" id="div_c6">
    <div class="card-header">
        <a data-toggle="collapse" href="#collapse6">
            <h4 class="card-title">
                <?php echo __('lang.accord_6'); ?>
            </h4>
        </a>
    </div>
    <div id="collapse6" class="panel-collapse collapse in show" data-parent="#div_c6">
        <div class="card-body">
            <div class="row">
                <div class="col-xl-7">
                    <div class="form-inline ml-3">
                        <div class="form-control-label mr-3">
                            Collection Name<span class="text-warning">*</span>
                        </div>
                        <?php
                        if (isset($metadataxml->identificationInfo->SV_ServiceIdentification->collectionName->CharacterString) && $metadataxml->identificationInfo->SV_ServiceIdentification->collectionName->CharacterString != "") {
                            echo "&nbsp;&nbsp;<p>" . $metadataxml->identificationInfo->SV_ServiceIdentification->collectionName->CharacterString . "</p>";
                        }
                        ?>
                    </div>
                </div>
                <div class="col-xl-5">
                    <div class="form-inline">
                        <div class="form-control-label mr-3">
                            Collection Identification<span class="text-warning">*</span>
                        </div>
                        <?php
                        if (isset($metadataxml->identificationInfo->SV_ServiceIdentification->collectionIdentification->CharacterString) && $metadataxml->identificationInfo->SV_ServiceIdentification->collectionIdentification->CharacterString != "") {
                            echo "&nbsp;&nbsp;<p>" . $metadataxml->identificationInfo->SV_ServiceIdentification->collectionIdentification->CharacterString . "</p>";
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
