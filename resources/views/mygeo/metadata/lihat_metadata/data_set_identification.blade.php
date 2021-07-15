<div class="card card-primary div_c12" id="div_c12">
    <div class="card-header ftest">
        <a data-toggle="collapse" href="#collapse12">
            <h4 class="card-title">
                <?php echo __('lang.accord_12'); ?>
            </h4>
        </a>
    </div>
    <div id="collapse12" class="panel-collapse collapse" data-parent="#div_c12">
        <div class="card-body">
            <div class="form-group row">
                Data Set Type:
                <?php
                if(isset($metadataxml->identificationInfo->SV_ServiceIdentification->spatialRepresentationType) && $metadataxml->identificationInfo->SV_ServiceIdentification->spatialRepresentationType != ""){
                    echo "&nbsp;&nbsp;<p>".$metadataxml->identificationInfo->SV_ServiceIdentification->spatialRepresentationType."</p>";
                }
                ?>
            </div>
            <div class="form-group row">
                <div class="col-lg-4">
                    Scale in Hardcopy / Softcopy (feature scale):
                    <?php
                    if(isset($metadataxml->identificationInfo->SV_ServiceIdentification->spatialResolution->MD_Resolution->equivalentScale->MD_RepresentativeFraction->denominator) && $metadataxml->identificationInfo->SV_ServiceIdentification->spatialResolution->MD_Resolution->equivalentScale->MD_RepresentativeFraction->denominator != ""){
                        echo "&nbsp;&nbsp;<p>".$metadataxml->identificationInfo->SV_ServiceIdentification->spatialResolution->MD_Resolution->equivalentScale->MD_RepresentativeFraction->denominator."</p>";
                    }
                    ?>
                </div>
                <div class="col-lg-4">
                    Image Resolution (GSD):
                    <?php
                    if(isset($metadataxml->identificationInfo->SV_ServiceIdentification->spatialResolution->MD_Resolution->distance) && $metadataxml->identificationInfo->SV_ServiceIdentification->spatialResolution->MD_Resolution->distance != ""){
                        echo "&nbsp;&nbsp;<p>".$metadataxml->identificationInfo->SV_ServiceIdentification->spatialResolution->MD_Resolution->distance." meter</p>";
                    }
                    ?>
                </div>
                <div class="col-lg-4">
                    Language:
                    <?php
                    if(isset($metadataxml->identificationInfo->SV_ServiceIdentification->language) && $metadataxml->identificationInfo->SV_ServiceIdentification->language != ""){
                        echo "&nbsp;&nbsp;<p>".$metadataxml->identificationInfo->SV_ServiceIdentification->language."</p>";
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>