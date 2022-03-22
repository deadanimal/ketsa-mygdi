<?php $flag = 1; ?>
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
                    if (isset($metadataxml->identificationInfo->MD_DataIdentification->bandBoundry->CharacterString) && $metadataxml->identificationInfo->MD_DataIdentification->bandBoundry->CharacterString != "") {
                        $flag *= 0;
                        ?>
                        <div class="row mb-2">
                            <div class="col-xl-6">
                                <div class="form-inline">
                                    <div class="form-control-label mr-3">
                                        Band Boundry:
                                    </div>
                                    <?php echo "&nbsp;&nbsp;<p>" . $metadataxml->identificationInfo->MD_DataIdentification->bandBoundry->CharacterString . "</p>"; ?>
                                    <?php echo "&nbsp;&nbsp;<p>" . $metadataxml->identificationInfo->MD_DataIdentification->transferFunctionType->CharacterString . "</p>"; ?>
                                </div>
                            </div>
                        </div>
                        <?php
                    }
                    ?>
                    
                    <div class="row mb-2">
                        <?php
                        if (isset($metadataxml->identificationInfo->MD_DataIdentification->transferFunctionType->CharacterString) && $metadataxml->identificationInfo->MD_DataIdentification->transferFunctionType->CharacterString != "") {
                            $flag *= 0;
                            ?>
                            <div class="col-xl-6">
                                <div class="form-inline">
                                    <div class="form-control-label mr-4">
                                        Transfer Function Type:
                                    </div>
                                    <?php echo "&nbsp;&nbsp;<p>" . $metadataxml->identificationInfo->MD_DataIdentification->transferFunctionType->CharacterString . "</p>"; ?>
                                </div>
                            </div>
                            <?php
                        }
                        ?>
                        <?php
                        if (isset($metadataxml->identificationInfo->MD_DataIdentification->transmittedPolarization->CharacterString) && $metadataxml->identificationInfo->MD_DataIdentification->transmittedPolarization->CharacterString != "") {
                            $flag *= 0;
                            ?>
                            <div class="col-xl-6">
                                <div class="form-inline">
                                    <div class="form-control-label mr-3">
                                        Transmitted Polarization:
                                    </div>
                                    <?php echo "&nbsp;&nbsp;<p>" . $metadataxml->identificationInfo->MD_DataIdentification->transmittedPolarization->CharacterString . "</p>"; ?>
                                </div>
                            </div>
                            <?php
                        }
                        ?>
                    </div>
                    <div class="row mb-2">
                        <?php
                        if (isset($metadataxml->identificationInfo->MD_DataIdentification->nominalSpatialResolution->CharacterString) && $metadataxml->identificationInfo->MD_DataIdentification->nominalSpatialResolution->CharacterString != "") {
                            $flag *= 0;
                            ?>
                            <div class="col-xl-6">
                                <div class="form-inline">
                                    <div class="form-control-label mr-4">
                                        Nominal Spatial Resolution:
                                    </div>
                                    <?php echo "&nbsp;&nbsp;<p>" . $metadataxml->identificationInfo->MD_DataIdentification->nominalSpatialResolution->CharacterString . "</p>"; ?>
                                    <div class="form-control-label ml-2">
                                        meter
                                    </div>
                                </div>
                            </div>
                            <?php
                        }
                        ?>
                        <?php
                        if (isset($metadataxml->identificationInfo->MD_DataIdentification->detectedPolarisation->CharacterString) && $metadataxml->identificationInfo->MD_DataIdentification->detectedPolarisation->CharacterString != "") {
                            $flag *= 0;
                            ?>
                            <div class="col-xl-6">
                                <div class="form-inline">
                                    <div class="form-control-label mr-3">
                                        Detected Polarization:
                                    </div>
                                    <?php echo "&nbsp;&nbsp;<p>" . $metadataxml->identificationInfo->MD_DataIdentification->detectedPolarisation->CharacterString . "</p>"; ?>
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

<?php
if($flag == 1){
    ?>
    <script>
        $(document).ready(function(){
            $('#div_c7').hide();
        });
    </script>
        <?php
}
?>