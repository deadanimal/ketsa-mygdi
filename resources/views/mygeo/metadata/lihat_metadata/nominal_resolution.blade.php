<div class="card card-primary div_c4" id="div_c4">
    <div class="card-header ftest">
        <a data-toggle="collapse" href="#collapse4">
            <h4 class="card-title">
                <?php echo __('lang.accord_4'); ?>
            </h4>
        </a>
    </div>
    <div id="collapse4" class="panel-collapse collapse" data-parent="#div_c4">
        <div class="card-body">
            <div class="form-group row">
                Scanning Resolution:
                <?php
                if(isset($metadataxml->identificationInfo->SV_ServiceIdentification->scanningResolution->CharacterString) && $metadataxml->identificationInfo->SV_ServiceIdentification->scanningResolution->CharacterString != ""){
                    echo "&nbsp;&nbsp;<p>".$metadataxml->identificationInfo->SV_ServiceIdentification->scanningResolution->CharacterString."</p>";
                }
                ?>
                &nbsp;&nbsp;&nbsp;
                Ground Scanning:
                <?php
                    if(isset($metadataxml->identificationInfo->SV_ServiceIdentification->groundScanning->Decimal) && $metadataxml->identificationInfo->SV_ServiceIdentification->groundScanning->Decimal != ""){
                    echo "&nbsp;&nbsp;<p>".$metadataxml->identificationInfo->SV_ServiceIdentification->groundScanning->Decimal." meter</p>";
                }
                ?>
            </div>
        </div>
    </div>
</div>