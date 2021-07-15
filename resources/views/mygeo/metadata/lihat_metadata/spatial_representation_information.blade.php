<div class="card card-primary div_c6" id="div_c6">
    <div class="card-header ftest">
        <a data-toggle="collapse" href="#collapse6">
            <h4 class="card-title">
                <?php echo __('lang.accord_6'); ?>
            </h4>
        </a>
    </div>
    <div id="collapse6" class="panel-collapse collapse" data-parent="#div_c6">
        <div class="card-body">
            <div class="form-group row">
                Collection Name:
                <?php
                if(isset($metadataxml->identificationInfo->SV_ServiceIdentification->collectionName->CharacterString) && $metadataxml->identificationInfo->SV_ServiceIdentification->collectionName->CharacterString != ""){
                    echo "&nbsp;&nbsp;<p>".$metadataxml->identificationInfo->SV_ServiceIdentification->collectionName->CharacterString."</p>";
                }
                ?>
                &nbsp;&nbsp;&nbsp;
                Collection Identification:
                <?php
                if(isset($metadataxml->identificationInfo->SV_ServiceIdentification->collectionIdentification->CharacterString) && $metadataxml->identificationInfo->SV_ServiceIdentification->collectionIdentification->CharacterString != ""){
                    echo "&nbsp;&nbsp;<p>".$metadataxml->identificationInfo->SV_ServiceIdentification->collectionIdentification->CharacterString."</p>";
                }
                ?>
            </div>
        </div>
    </div>
</div>