<div class="card card-primary div_c7" id="div_c7">
    <div class="card-header">
        <a data-toggle="collapse" href="#collapse7">
            <h4 class="card-title">
                <?php echo __('lang.accord_7'); ?>
            </h4>
        </a>
    </div>
    <div id="collapse7" class="panel-collapse collapse in show" data-parent="#div_c7">
        <div class="card-body">
            <div class="acard-body opacity-8">
                <h6 class="heading-small text-muted mb-2">Wavelength Band
                    Information</h6>
                <div class="pl-lg-3">
                    <?php
                    if (isset($metadataxml->identificationInfo->SV_ServiceIdentification->bandBoundry->CharacterString) && $metadataxml->identificationInfo->SV_ServiceIdentification->bandBoundry->CharacterString != "") {
                        ?>
                        <div class="row mb-2">
                            <div class="col-xl-6">
                                <div class="form-inline">
                                    <div class="form-control-label mr-3">
                                        Band Boundry:
                                    </div>
                                    <?php echo "&nbsp;&nbsp;<p>" . $metadataxml->identificationInfo->SV_ServiceIdentification->bandBoundry->CharacterString . "</p>"; ?>
                                </div>
                            </div>
                        </div>
                        <?php
                    }
                    ?>
                    
                    <div class="row mb-2">
                        <?php
                        if (isset($metadataxml->identificationInfo->SV_ServiceIdentification->transferFunctionType->CharacterString) && $metadataxml->identificationInfo->SV_ServiceIdentification->transferFunctionType->CharacterString != "") {
                            ?>
                            <div class="col-xl-6">
                                <div class="form-inline">
                                    <div class="form-control-label mr-4">
                                        Transfer Function Type:
                                    </div>
                                    <?php echo "&nbsp;&nbsp;<p>" . $metadataxml->identificationInfo->SV_ServiceIdentification->transferFunctionType->CharacterString . "</p>"; ?>
                                </div>
                            </div>
                            <?php
                        }
                        ?>
                        <?php
                        if (isset($metadataxml->identificationInfo->SV_ServiceIdentification->transmittedPolarization->CharacterString) && $metadataxml->identificationInfo->SV_ServiceIdentification->transmittedPolarization->CharacterString != "") {
                            ?>
                            <div class="col-xl-6">
                                <div class="form-inline">
                                    <div class="form-control-label mr-3">
                                        Transmitted Polarization:
                                    </div>
                                    <?php echo "&nbsp;&nbsp;<p>" . $metadataxml->identificationInfo->SV_ServiceIdentification->transmittedPolarization->CharacterString . "</p>"; ?>
                                </div>
                            </div>
                            <?php
                        }
                        ?>
                    </div>
                    <div class="row mb-2">
                        <?php
                        if (isset($metadataxml->identificationInfo->SV_ServiceIdentification->nominalSpatialResolution->CharacterString) && $metadataxml->identificationInfo->SV_ServiceIdentification->nominalSpatialResolution->CharacterString != "") {
                            ?>
                            <div class="col-xl-6">
                                <div class="form-inline">
                                    <div class="form-control-label mr-4">
                                        Nominal Spatial Resolution:
                                    </div>
                                    <?php echo "&nbsp;&nbsp;<p>" . $metadataxml->identificationInfo->SV_ServiceIdentification->nominalSpatialResolution->CharacterString . "</p>"; ?>
                                    <div class="form-control-label ml-2">
                                        meter
                                    </div>
                                </div>
                            </div>
                            <?php
                        }
                        ?>
                        <?php
                        if (isset($metadataxml->identificationInfo->SV_ServiceIdentification->detectedPolarisation->CharacterString) && $metadataxml->identificationInfo->SV_ServiceIdentification->detectedPolarisation->CharacterString != "") {
                            ?>
                            <div class="col-xl-6">
                                <div class="form-inline">
                                    <div class="form-control-label mr-3">
                                        Detected Polarization:
                                    </div>
                                    <?php echo "&nbsp;&nbsp;<p>" . $metadataxml->identificationInfo->SV_ServiceIdentification->detectedPolarisation->CharacterString . "</p>"; ?>
                                </div>
                            </div>
                            <?php
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
