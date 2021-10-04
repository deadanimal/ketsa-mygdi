<?php $flag = 1; ?>
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
                if (isset($metadataxml->identificationInfo->MD_DataIdentification->spatialRepresentationType->MD_SpatialRepresentationTypeCode) && trim($metadataxml->identificationInfo->MD_DataIdentification->spatialRepresentationType->MD_SpatialRepresentationTypeCode) != "") {
                    $flag *= 0;
                    ?>
                    <div class="row mb-2">
                        <div class="col-xl-2">
                            <label class="form-control-label" for="input-dataset-type">
                                Spatial Data Set Type :
                            </label>
                        </div>
                        <div class="col-xl-3">
                            <?php echo "<p>" . $metadataxml->identificationInfo->MD_DataIdentification->spatialRepresentationType->MD_SpatialRepresentationTypeCode . "</p>"; ?>
                        </div>
                    </div>
                    <?php
                }
                ?>

                <div class="row mb-2">
                    <?php
                    if (isset($metadataxml->identificationInfo->MD_DataIdentification->spatialResolution->MD_Resolution->equivalentScale->MD_RepresentativeFraction->denominator->Integer) && trim($metadataxml->identificationInfo->MD_DataIdentification->spatialResolution->MD_Resolution->equivalentScale->MD_RepresentativeFraction->denominator->Integer) != "") {
                        $flag *= 0;
                        ?>
                        <div class="col-xl-3">
                            <label class="form-control-label" for="input-hardsoftcopy">
                                Scale in Hardcopy/Softcopy
                                <span style="font-size: smaller;">(feature scale)</span>
                                 :
                            </label>
                        </div>
                        <div class="col-xl-2">
                            <?php echo "<p>" . $metadataxml->identificationInfo->MD_DataIdentification->spatialResolution->MD_Resolution->equivalentScale->MD_RepresentativeFraction->denominator->Integer . "</p>"; ?>
                        </div>
                        <?php
                    }
                    ?>
                    <?php
                    if (isset($metadataxml->identificationInfo->MD_DataIdentification->spatialResolution->MD_Resolution->distance->Distance) && trim($metadataxml->identificationInfo->MD_DataIdentification->spatialResolution->MD_Resolution->distance->Distance) != "") {
                        $flag *= 0;
                        ?>
                        <div class="col-xl-2">
                            <label class="form-control-label" for="input-imggsd">
                                Image Resolution (GSD) :</label>
                        </div>
                        <div class="col-md-2">
                            <?php echo "<p>" . $metadataxml->identificationInfo->MD_DataIdentification->spatialResolution->MD_Resolution->distance->Distance . " meter</p>"; ?>
                        </div>
                        <?php
                    }
                    ?>
                    <?php
                    if (isset($metadataxml->identificationInfo->MD_DataIdentification->language->CharacterString) && trim($metadataxml->identificationInfo->MD_DataIdentification->language->CharacterString) != "") {
                        $flag *= 0;
                        ?>
                        <div class="col-xl-1">
                            <label class="form-control-label" for="input-language">
                                Language :
                            </label>
                        </div>
                        <div class="col-xl-2">
                            <?php echo "<p>" . $metadataxml->identificationInfo->MD_DataIdentification->language->CharacterString . "</p>"; ?>
                        </div>
                        <?php
                    }
                    ?>

                    <h6 class="heading-small text-muted mb-2 divMaintenanceInfo">MAINTENANCE INFORMATION</h6>
                    <?php
                    if (isset($metadataxml->metadataMaintenance->MD_MaintenanceInformation->maintenanceAndUpdateFrequency->MD_MaintenanceFrequencyCode) && trim($metadataxml->metadataMaintenance->MD_MaintenanceInformation->maintenanceAndUpdateFrequency->MD_MaintenanceFrequencyCode) != "") {
                        $flag *= 0;
                        ?>
                        <div class="col-xl-1">
                            <label class="form-control-label" for="input-language">
                                Maintenance and Update :
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

<?php
if($flag == 1){
    ?>
    <script>
        $(document).ready(function(){
            $('#div_c12').hide();
        });
    </script>
    <?php
}
?>