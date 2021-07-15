<div class="card card-primary div_c7" id="div_c7">
    <div class="card-header ftest">
        <a data-toggle="collapse" href="#collapse7">
            <h4 class="card-title">
                <?php echo __('lang.accord_7'); ?>
            </h4>
        </a>
    </div>
    <div id="collapse7" class="panel-collapse collapse" data-parent="#div_c7">
        <div class="card-body">
            <b>Wavelength Band Information</b>
            <div class="form-group row">
                Band Boundry:
                <?php
                if(isset($metadataxml->identificationInfo->SV_ServiceIdentification->bandBoundry->CharacterString) && $metadataxml->identificationInfo->SV_ServiceIdentification->bandBoundry->CharacterString != ""){
                    echo "&nbsp;&nbsp;<p>".$metadataxml->identificationInfo->SV_ServiceIdentification->bandBoundry->CharacterString."</p>";
                }
                ?>
            </div>
            <div class="form-group row">
                Transfer Function Type:
                <?php
                if(isset($metadataxml->identificationInfo->SV_ServiceIdentification->transferFunctionType->CharacterString) && $metadataxml->identificationInfo->SV_ServiceIdentification->transferFunctionType->CharacterString != ""){
                    echo "&nbsp;&nbsp;<p>".$metadataxml->identificationInfo->SV_ServiceIdentification->transferFunctionType->CharacterString."</p>";
                }
                ?>
                &nbsp;&nbsp;&nbsp;
                Transmitted Polarization:
                <?php
                if(isset($metadataxml->identificationInfo->SV_ServiceIdentification->transmittedPolarization->CharacterString) && $metadataxml->identificationInfo->SV_ServiceIdentification->transmittedPolarization->CharacterString != ""){
                    echo "&nbsp;&nbsp;<p>".$metadataxml->identificationInfo->SV_ServiceIdentification->transmittedPolarization->CharacterString."</p>";
                }
                ?>
            </div>
            <div class="form-group row">
                Nominal Spatial Resolution:
                <?php
                if(isset($metadataxml->identificationInfo->SV_ServiceIdentification->nominalSpatialResolution->CharacterString) && $metadataxml->identificationInfo->SV_ServiceIdentification->nominalSpatialResolution->CharacterString != ""){
                    echo "&nbsp;&nbsp;<p>".$metadataxml->identificationInfo->SV_ServiceIdentification->nominalSpatialResolution->CharacterString."</p>";
                }
                ?>
                &nbsp;&nbsp;&nbsp;
                Detected Polarization:
                <?php
                if(isset($metadataxml->identificationInfo->SV_ServiceIdentification->detectedPolarisation->CharacterString) && $metadataxml->identificationInfo->SV_ServiceIdentification->detectedPolarisation->CharacterString != ""){
                    echo "&nbsp;&nbsp;<p>".$metadataxml->identificationInfo->SV_ServiceIdentification->detectedPolarisation->CharacterString."</p>";
                }
                ?>
            </div>
        </div>
    </div>
</div>