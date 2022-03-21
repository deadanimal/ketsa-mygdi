<div class="card card-primary div_c12" id="div_c12">
    <div class="card-header">
        <a data-toggle="collapse" href="#collapse12">
            <h4 class="card-title">
                <?php echo __('lang.accord_12'); ?>
            </h4>
        </a>
    </div>
    <div id="collapse12" class="panel-collapse collapse in" data-parent="#div_c12">
        <div class="card-body">
            <div class="acard-body opacity-8">
                <?php
                foreach($template->template[strtolower($catSelected)]['accordion12'] as $key=>$val){
                    if($val['status'] == "customInput"){
                        ?>
                        <div class="row mb-2 sortIt">
                            <div class="col-3 pl-5">
                                <label class="form-control-label mr-4 customInput_label" for="uname">{{ $val['label_'.$langSelected] }}</label>
                                <label class="float-right">:</label>
                            </div>
                            <div class="col-8">
                                {{ $metadataxml->customInputs->accordion12->$key }}
                            </div>
                        </div>
                        <?php
                    }
                    if($key == "c12_dataset_type"){
                        $dataSetType = "";
                        if (isset($metadataxml->identificationInfo->MD_DataIdentification->spatialRepresentationType->MD_SpatialRepresentationTypeCode) && $metadataxml->identificationInfo->MD_DataIdentification->spatialRepresentationType->MD_SpatialRepresentationTypeCode != "") {
                            $dataSetType = ucwords(trim($metadataxml->identificationInfo->MD_DataIdentification->spatialRepresentationType->MD_SpatialRepresentationTypeCode));
                        }elseif (isset($metadataxml->identificationInfo->SV_ServiceIdentification->spatialRepresentationType->MD_SpatialRepresentationTypeCode) && $metadataxml->identificationInfo->SV_ServiceIdentification->spatialRepresentationType->MD_SpatialRepresentationTypeCode != "") {
                            $dataSetType = ucwords(trim($metadataxml->identificationInfo->SV_ServiceIdentification->spatialRepresentationType->MD_SpatialRepresentationTypeCode));
                        }
                        if($dataSetType == "TextTable"){
                            $dataSetType = "Text Table";
                        }elseif($dataSetType == "StereoModel"){
                            $dataSetType = "Stereo Model";
                        }
                        if($dataSetType != ""){
                            ?>
                            <div class="row mb-4" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                                <div class="col-xl-2">
                                    <label class="form-control-label" for="input-dataset-type">
                                        Spatial Data Set Type
                                    </label>
                                </div>
                                <div class="col-xl-3">
                                    <?php echo "&nbsp;&nbsp;<p>" . $dataSetType . "</p>"; ?>
                                </div>
                            </div>
                            <?php
                        }
                    }
                }                
                ?>
                
                <div class="row mb-2">
                    <?php
                    foreach($template->template[strtolower($catSelected)]['accordion12'] as $key=>$val){
                        if($key == "c12_feature_scale"){
                            $scale = "";
                            if (isset($metadataxml->identificationInfo->MD_DataIdentification->spatialResolution->MD_Resolution->equivalentScale->MD_RepresentativeFraction->denominator->Integer) && $metadataxml->identificationInfo->MD_DataIdentification->spatialResolution->MD_Resolution->equivalentScale->MD_RepresentativeFraction->denominator->Integer != "") {
                                $scale = $metadataxml->identificationInfo->MD_DataIdentification->spatialResolution->MD_Resolution->equivalentScale->MD_RepresentativeFraction->denominator->Integer;
                            }
                            if($scale != ""){
                                ?>
                                <div class="col-xl-3" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                                    <label class="form-control-label" for="input-hardsoftcopy">
                                        Scale in Hardcopy/Softcopy
                                        <span style="font-size: smaller;">(feature scale)</span>
                                    </label>
                                </div>
                                <div class="col-xl-2" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                                    <?php echo "&nbsp;&nbsp;<p>" . $scale . "</p>"; ?>
                                </div>
                                <?php
                            }
                        }
                        if($key == "c12_image_res"){
                            $imgRes = "";
                            if (isset($metadataxml->identificationInfo->MD_DataIdentification->spatialResolution->MD_Resolution->distance->Distance) && $metadataxml->identificationInfo->MD_DataIdentification->spatialResolution->MD_Resolution->distance->Distance != "") {
                                $imgRes = $metadataxml->identificationInfo->MD_DataIdentification->spatialResolution->MD_Resolution->distance->Distance;
                            }
                            if($imgRes != ""){
                                ?>
                                <div class="col-xl-2" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                                    <label class="form-control-label" for="input-imggsd">
                                        Image Resolution (GSD)</label>
                                </div>
                                <div class="col-md-2" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                                    <?php echo "&nbsp;&nbsp;<p>" . $imgRes . " meter</p>"; ?>
                                </div>
                                <?php
                            }
                        }
                        if($key == "c12_language"){
                            $lang = "";
                            if (isset($metadataxml->identificationInfo->MD_DataIdentification->language->CharacterString) && $metadataxml->identificationInfo->MD_DataIdentification->language->CharacterString != "") {
                                $lang = ucwords(trim($metadataxml->identificationInfo->MD_DataIdentification->language->CharacterString));
                            }elseif (isset($metadataxml->identificationInfo->SV_ServiceIdentification->language->CharacterString) && $metadataxml->identificationInfo->SV_ServiceIdentification->language->CharacterString != "") {
                                $lang = ucwords(trim($metadataxml->identificationInfo->SV_ServiceIdentification->language->CharacterString));
                            }
                            if($lang == "english" || $lang == "enms"){
                                $lang = "English";
                            }elseif($lang == "bahasaMelayu"){
                                $lang = "Bahasa Malaysia";
                            }
                            if($lang != ""){
                                ?>
                                <div class="col-xl-1" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                                    <label class="form-control-label" for="input-language">
                                        Language
                                    </label>
                                </div>
                                <div class="col-xl-2" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                                    <?php echo "&nbsp;&nbsp;<p>" . $lang . "</p>"; ?>
                                </div>
                                <?php
                            }
                        }
                    }
                    ?>
                    
                    <h6 class="heading-small text-muted mb-2 divMaintenanceInfo">MAINTENANCE INFORMATION</h6> 
                    <?php
                    foreach($template->template[strtolower($catSelected)]['accordion12'] as $key=>$val){
                        if($key == "c12_maintenanceUpdate"){
                            $maintenanceUpdate = "";
                            if (isset($metadataxml->metadataMaintenance->MD_MaintenanceInformation->maintenanceAndUpdateFrequency->MD_MaintenanceFrequencyCode) && $metadataxml->metadataMaintenance->MD_MaintenanceInformation->maintenanceAndUpdateFrequency->MD_MaintenanceFrequencyCode != "") {
                                $maintenanceUpdate = trim($metadataxml->metadataMaintenance->MD_MaintenanceInformation->maintenanceAndUpdateFrequency->MD_MaintenanceFrequencyCode);
                            }elseif (isset($metadataxml->metadataMaintenance->MD_MaintenanceInformation->maintenanceAndUpdateFrequency->MD_MaintenanceFrequencyCode) && $metadataxml->metadataMaintenance->MD_MaintenanceInformation->maintenanceAndUpdateFrequency->MD_MaintenanceFrequencyCode != "") {
                                $maintenanceUpdate = trim($metadataxml->metadataMaintenance->MD_MaintenanceInformation->maintenanceAndUpdateFrequency->MD_MaintenanceFrequencyCode);
                            }
                            if($maintenanceUpdate != ""){
                                ?>
                                <div class="col-xl-1" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                                    <label class="form-control-label" for="input-language">
                                        Maintenance and Update
                                    </label>
                                </div>
                                <div class="col-xl-2" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                                    <?php echo trim($maintenanceUpdate); ?>
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
