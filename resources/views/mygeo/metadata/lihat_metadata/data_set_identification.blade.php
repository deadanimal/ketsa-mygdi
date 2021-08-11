<div class="card card-primary div_c12" id="div_c12">
    <div class="card-header">
        <a data-toggle="collapse" href="#collapse12">
            <h4 class="card-title">
                <?php echo __('lang.accord_12'); ?>
            </h4>
        </a>
    </div>
    <div id="collapse12" class="panel-collapse collapse in show" data-parent="#div_c12">
        <div class="card-body">
            <div class="acard-body opacity-8">
                <?php
                if (isset($metadataxml->identificationInfo->SV_ServiceIdentification->spatialRepresentationType) && $metadataxml->identificationInfo->SV_ServiceIdentification->spatialRepresentationType != "") {
                    ?>
                    <div class="row mb-4">
                        <div class="col-xl-2">
                            <label class="form-control-label" for="input-dataset-type">
                                Spatial Data Set Type
                            </label>
                        </div>
                        <div class="col-xl-3">
                            <?php echo "&nbsp;&nbsp;<p>" . $metadataxml->identificationInfo->SV_ServiceIdentification->spatialRepresentationType . "</p>"; ?>
                        </div>
                    </div>
                    <?php
                }
                ?>
                
                <div class="row mb-2">
                    <?php
                    if (isset($metadataxml->identificationInfo->SV_ServiceIdentification->spatialResolution->MD_Resolution->equivalentScale->MD_RepresentativeFraction->denominator) && $metadataxml->identificationInfo->SV_ServiceIdentification->spatialResolution->MD_Resolution->equivalentScale->MD_RepresentativeFraction->denominator != "") {
                        ?>
                        <div class="col-xl-3">
                            <label class="form-control-label" for="input-hardsoftcopy">
                                Scale in Hardcopy/Softcopy
                                <span style="font-size: smaller;">(feature scale)</span>
                            </label>
                        </div>
                        <div class="col-xl-2">
                            <?php echo "&nbsp;&nbsp;<p>" . $metadataxml->identificationInfo->SV_ServiceIdentification->spatialResolution->MD_Resolution->equivalentScale->MD_RepresentativeFraction->denominator . "</p>"; ?>
                        </div>
                        <?php
                    }
                    ?>
                    <?php
                    if (isset($metadataxml->identificationInfo->SV_ServiceIdentification->spatialResolution->MD_Resolution->distance) && $metadataxml->identificationInfo->SV_ServiceIdentification->spatialResolution->MD_Resolution->distance != "") {
                        ?>
                        <div class="col-xl-2">
                            <label class="form-control-label" for="input-imggsd">
                                Image Resolution (GSD)</label>
                        </div>
                        <div class="col-md-2">
                            <?php echo "&nbsp;&nbsp;<p>" . $metadataxml->identificationInfo->SV_ServiceIdentification->spatialResolution->MD_Resolution->distance . " meter</p>"; ?>
                        </div>
                        <?php
                    }
                    ?>
                    <?php
                    if (isset($metadataxml->identificationInfo->SV_ServiceIdentification->language) && $metadataxml->identificationInfo->SV_ServiceIdentification->language != "") {
                        ?>
                        <div class="col-xl-1">
                            <label class="form-control-label" for="input-language">
                                Language
                            </label>
                        </div>
                        <div class="col-xl-2">
                            <?php echo "&nbsp;&nbsp;<p>" . $metadataxml->identificationInfo->SV_ServiceIdentification->language . "</p>"; ?>
                        </div>
                        <?php 
                    }
                    ?>
                    
                    <h6 class="heading-small text-muted mb-2 divMaintenanceInfo">MAINTENANCE INFORMATION</h6> 
                    <?php
                    if (isset($metadataxml->metadataMaintenance->MD_MaintenanceInformation->maintenanceAndUpdateFrequency->MD_MaintenanceFrequencyCode) && $metadataxml->metadataMaintenance->MD_MaintenanceInformation->maintenanceAndUpdateFrequency->MD_MaintenanceFrequencyCode != "") {
                        ?>
                        <div class="col-xl-1">
                            <label class="form-control-label" for="input-language">
                                MAINTENANCE INFORMATION
                            </label>
                        </div>
                        <div class="col-xl-2">
                            <?php echo trim($metadataxml->metadataMaintenance->MD_MaintenanceInformation->maintenanceAndUpdateFrequency->MD_MaintenanceFrequencyCode); ?>
                        </div>
                        <?php
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>
