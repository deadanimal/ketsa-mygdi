<div class="card card-primary div_c5" id="div_c5">
    <div class="card-header ftest">
        <a data-toggle="collapse" href="#collapse5">
            <h4 class="card-title">
                <?php echo __('lang.accord_5'); ?>
            </h4>
        </a>
    </div>
    <div id="collapse5" class="panel-collapse collapse" data-parent="#div_c5">
        <div class="card-body">
            <div class="form-group row">
                Process Level:
                <?php
                if(isset($metadataxml->identificationInfo->SV_ServiceIdentification->processLevel->CharacterString) && $metadataxml->identificationInfo->SV_ServiceIdentification->processLevel->CharacterString != ""){
                    echo "&nbsp;&nbsp;<p>".$metadataxml->identificationInfo->SV_ServiceIdentification->processLevel->CharacterString."</p>";
                }
                ?>
                &nbsp;&nbsp;&nbsp;
                Resolution:
                <?php
                if(isset($metadataxml->identificationInfo->SV_ServiceIdentification->processResolution->Decimal) && $metadataxml->identificationInfo->SV_ServiceIdentification->processResolution->Decimal != ""){
                    echo "&nbsp;&nbsp;<p>".$metadataxml->identificationInfo->SV_ServiceIdentification->processResolution->Decimal." meter</p>";
                }
                ?>
            </div>
        </div>
    </div>
</div>