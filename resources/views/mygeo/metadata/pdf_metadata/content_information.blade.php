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
                    foreach($template->template[strtolower($catSelected)]['accordion7'] as $key=>$val){
                        if($val['status'] == "customInput"){
                            ?>
                            <div class="row mb-2 sortIt">
                                <div class="col-3 pl-5">
                                    <label class="form-control-label mr-4 customInput_label" for="uname">{{ $val['label_'.$langSelected] }}</label>
                                    <label class="float-right">:</label>
                                </div>
                                <div class="col-8">
                                    {{ $metadataxml->customInputs->accordion7->$key }}
                                </div>
                            </div>
                            <?php
                        }
                        if($key == "c7_band_boundary"){
                            $bandBound = "";
                            if (isset($metadataxml->identificationInfo->MD_DataIdentification->bandBoundry->CharacterString) && $metadataxml->identificationInfo->MD_DataIdentification->bandBoundry->CharacterString != "") {
                                $bandBound = $metadataxml->identificationInfo->MD_DataIdentification->bandBoundry->CharacterString;
                            }
                            if($bandBound != ""){
                                $flag *= 0;
                                ?>
                                <div class="row mb-2" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                                    <div class="col-xl-6">
                                        <div class="form-inline">
                                            <div class="form-control-label mr-3">
                                                Band Boundry:
                                            </div>
                                            <?php echo "&nbsp;&nbsp;<p>" . $bandBound . "</p>"; ?>
                                        </div>
                                    </div>
                                </div>
                                <?php
                            }
                        }
                    }
                    
                    
                    ?>
                    
                    <div class="row mb-2">
                        <?php
                        foreach($template->template[strtolower($catSelected)]['accordion7'] as $key=>$val){
                            if($key == "c7_trans_fn_type"){
                                $transFnType = "";
                                if (isset($metadataxml->identificationInfo->MD_DataIdentification->transferFunctionType->CharacterString) && $metadataxml->identificationInfo->MD_DataIdentification->transferFunctionType->CharacterString != "") {
                                    $transFnType = $metadataxml->identificationInfo->MD_DataIdentification->transferFunctionType->CharacterString;
                                }
                                if($transFnType != ""){
                                    $flag *= 0;
                                    ?>
                                    <div class="col-xl-6" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                                        <div class="form-inline">
                                            <div class="form-control-label mr-4">
                                                Transfer Function Type:
                                            </div>
                                            <?php echo "&nbsp;&nbsp;<p>" . $transFnType . "</p>"; ?>
                                        </div>
                                    </div>
                                    <?php
                                }
                            }
                            if($key == "c7_trans_polar"){
                                $transmitPolar = "";
                                if (isset($metadataxml->identificationInfo->MD_DataIdentification->transmittedPolarization->CharacterString) && $metadataxml->identificationInfo->MD_DataIdentification->transmittedPolarization->CharacterString != "") {
                                    $transmitPolar = $metadataxml->identificationInfo->MD_DataIdentification->transmittedPolarization->CharacterString;
                                }
                                if($transmitPolar != ""){
                                    $flag *= 0;
                                    ?>
                                    <div class="col-xl-6" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                                        <div class="form-inline">
                                            <div class="form-control-label mr-3">
                                                Transmitted Polarization:
                                            </div>
                                            <?php echo "&nbsp;&nbsp;<p>" . $transmitPolar . "</p>"; ?>
                                        </div>
                                    </div>
                                    <?php
                                }
                            }
                        }
                        
                        
                        ?>
                        <?php
                        
                        ?>
                    </div>
                    <div class="row mb-2">
                        <?php
                        foreach($template->template[strtolower($catSelected)]['accordion7'] as $key=>$val){
                            if($key == "c7_nominal_spatial_res"){
                                $nomSpatRes = "";
                                if (isset($metadataxml->identificationInfo->MD_DataIdentification->nominalSpatialResolution->CharacterString) && $metadataxml->identificationInfo->MD_DataIdentification->nominalSpatialResolution->CharacterString != "") {
                                    $nomSpatRes = $metadataxml->identificationInfo->MD_DataIdentification->nominalSpatialResolution->CharacterString;
                                }
                                if($nomSpatRes != ""){
                                    $flag *= 0;
                                    ?>
                                    <div class="col-xl-6" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                                        <div class="form-inline">
                                            <div class="form-control-label mr-4">
                                                Nominal Spatial Resolution:
                                            </div>
                                            <?php echo "&nbsp;&nbsp;<p>" . $nomSpatRes . "</p>"; ?>
                                            <div class="form-control-label ml-2">
                                                meter
                                            </div>
                                        </div>
                                    </div>
                                    <?php
                                }
                            }
                            if($key == "c7_detected_polar"){
                                $detectPolar = "";
                                if (isset($metadataxml->identificationInfo->MD_DataIdentification->detectedPolarisation->CharacterString) && $metadataxml->identificationInfo->MD_DataIdentification->detectedPolarisation->CharacterString != "") {
                                    $detectPolar = $metadataxml->identificationInfo->MD_DataIdentification->detectedPolarisation->CharacterString;
                                }
                                if($detectPolar != ""){
                                    $flag *= 0;
                                    ?>
                                    <div class="col-xl-6" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                                        <div class="form-inline">
                                            <div class="form-control-label mr-3">
                                                Detected Polarization:
                                            </div>
                                            <?php echo "&nbsp;&nbsp;<p>" . $detectPolar . "</p>"; ?>
                                        </div>
                                    </div>
                                    <?php
                                }
                            }
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
