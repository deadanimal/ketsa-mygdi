<div class="card card-primary mb-4 div_c12" id="div_c12">
    <div class="card-header">
        <a data-toggle="collapse" href="#collapse12">
            <h4 class="card-title">
                <?php echo __('lang.accord_12'); ?>
            </h4>
        </a>
        @if(auth::user()->hasRole(['Penerbit Metadata']) && $metadataSearched->disahkan == "no")
        <button type="button" class="btn btn-secondary float-right" data-toggle="modal" data-target="#modal12">Catatan</button>
        @elseif(auth::user()->hasRole(['Pengesah Metadata','Super Admin']))
        <button type="button" class="btn btn-secondary float-right" data-toggle="modal" data-target="#modal12">Catatan</button>
        @endif
    </div>
    <div id="collapse12" class="panel-collapse collapse in show" data-parent="#div_c12">
        <div class="card-body">
            <div class="acard-body opacity-8">
                <div class="row mb-4">
                    <div class="col-xl-2">
                        <label class="form-control-label" for="input-dataset-type">
                            Spatial Data Set Type
                        </label>
                    </div>
                    <div class="col-xl-3">
                        <?php
                        $dataSetType = "";
                        if (isset($metadataxml->identificationInfo->SV_ServiceIdentification->spatialRepresentationType) && $metadataxml->identificationInfo->SV_ServiceIdentification->spatialRepresentationType != "") {
                            $dataSetType = trim($metadataxml->identificationInfo->SV_ServiceIdentification->spatialRepresentationType);
                        }
                        ?>
                        <select name="c12_dataset_type" id="c12_dataset_type" class="form-control form-control-sm">
                            <option value="Grid" {{($dataSetType == 'Grid' ? "selected":"")}}>Grid</option>
                            <option value="Stereo Model" {{($dataSetType == 'Stereo Model' ? "selected":"")}}>Stereo Model</option>
                            <option value="Text Table" {{($dataSetType == 'Text Table' ? "selected":"")}}>Text Table</option>
                            <option value="Tin" {{($dataSetType == 'Tin' ? "selected":"")}}>Tin</option>
                            <option value="Vector" {{($dataSetType == 'Vector' ? "selected":"")}}>Vector</option>
                            <option value="Video" {{($dataSetType == 'Video' ? "selected":"")}}>Video</option>
                        </select>
                    </div>
                </div>
                <h6 class="heading-small text-muted mb-2">DATA SET RESOLUTION</h6>
                <div class="row mb-2">
                    <div class="col-xl-3">
                        <label class="form-control-label" for="input-hardsoftcopy">
                            Scale in Hardcopy/Softcopy
                            <span style="font-size: smaller;">(feature scale)</span>
                        </label>
                    </div>
                    <div class="col-xl-2">
                        <?php
                        $scale = "";
                        if (isset($metadataxml->identificationInfo->SV_ServiceIdentification->spatialResolution->MD_Resolution->equivalentScale->MD_RepresentativeFraction->denominator) && $metadataxml->identificationInfo->SV_ServiceIdentification->spatialResolution->MD_Resolution->equivalentScale->MD_RepresentativeFraction->denominator != "") {
                            $scale = $metadataxml->identificationInfo->SV_ServiceIdentification->spatialResolution->MD_Resolution->equivalentScale->MD_RepresentativeFraction->denominator;
                        }
                        ?>
                        <input type="text" name="c12_feature_scale" id="c12_feature_scale" class="form-control form-control-sm" placeholder="10:50000" value="{{ $scale }}">
                    </div>
                    <div class="col-xl-2">
                        <label class="form-control-label" for="input-imggsd">
                            Image Resolution (GSD)</label>
                    </div>
                    <div class="col-md-2">
                        <div class="input-group">
                            <?php
                            $imgRes = "";
                            if (isset($metadataxml->identificationInfo->SV_ServiceIdentification->spatialResolution->MD_Resolution->distance) && $metadataxml->identificationInfo->SV_ServiceIdentification->spatialResolution->MD_Resolution->distance != "") {
                                $imgRes = $metadataxml->identificationInfo->SV_ServiceIdentification->spatialResolution->MD_Resolution->distance;
                            }
                            ?>
                            <input type="text" class="form-control form-control-sm" name="c12_image_res" id="c12_image_res" placeholder="10.5" value="{{ $imgRes }}">
                            <div class="input-group-append">
                                <span class="input-group-text input-group-sm py-0">meter</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-1">
                        <label class="form-control-label" for="input-language">
                            Language
                        </label>
                    </div>
                    <div class="col-xl-2">
                        <?php
                        $lang = "";
                        if (isset($metadataxml->identificationInfo->SV_ServiceIdentification->language) && $metadataxml->identificationInfo->SV_ServiceIdentification->language != "") {
                            $lang = trim($metadataxml->identificationInfo->SV_ServiceIdentification->language);
                        }
                        ?>
                        <select name="c12_language" id="c12_language" class="form-control form-control-sm">
                            <option value="English" {{($lang == 'English' ? "selected":"")}}>English</option>
                            <option value="Bahasa Malaysia" {{($lang == 'Bahasa Malaysia' ? "selected":"")}}>Bahasa Malaysia</option>
                        </select>
                    </div>
                </div>
                <h6 class="heading-small text-muted mb-2 divMaintenanceInfo">MAINTENANCE INFORMATION</h6>
                <div class="row mb-2 divMaintenanceInfo">
                    <div class="col-xl-3">
                        <label class="form-control-label" for="input-hardsoftcopy">
                            Maintenance and Update
                        </label>
                    </div>
                    <div class="col-xl-2">
                        <?php
                        $maintenanceUpdate = "";
                        if (isset($metadataxml->metadataMaintenance->MD_MaintenanceInformation->maintenanceAndUpdateFrequency->MD_MaintenanceFrequencyCode) && $metadataxml->metadataMaintenance->MD_MaintenanceInformation->maintenanceAndUpdateFrequency->MD_MaintenanceFrequencyCode != "") {
                            $maintenanceUpdate = $metadataxml->metadataMaintenance->MD_MaintenanceInformation->maintenanceAndUpdateFrequency->MD_MaintenanceFrequencyCode;
                        }
                        ?>
                        <select class="form-control form-control-sm" name="c12_maintenanceUpdate" id="c12_maintenanceUpdate">
                            <option value="">Pilih...</option>
                            <option value="Continual" {{ ($maintenanceUpdate == "Continual" ? "selected":"") }}>Continual</option>
                            <option value="Daily" {{ ($maintenanceUpdate == "Daily" ? "selected":"") }}>Daily</option>
                            <option value="Weekly" {{ ($maintenanceUpdate == "Weekly" ? "selected":"") }}>Weekly</option>
                            <option value="Fortnightly" {{ ($maintenanceUpdate == "Fortnightly" ? "selected":"") }}>Fortnightly</option>
                            <option value="Monthly" {{ ($maintenanceUpdate == "Monthly" ? "selected":"") }}>Monthly</option>
                            <option value="Quarterly" {{ ($maintenanceUpdate == "Quarterly" ? "selected":"") }}>Quarterly</option>
                            <option value="Biannually" {{ ($maintenanceUpdate == "Biannually" ? "selected":"") }}>Biannually</option>
                            <option value="Annually" {{ ($maintenanceUpdate == "Annually" ? "selected":"") }}>Annually</option>
                            <option value="As needed" {{ ($maintenanceUpdate == "As needed" ? "selected":"") }}>As needed</option>
                            <option value="Irregular" {{ ($maintenanceUpdate == "Irregular" ? "selected":"") }}>Irregular</option>
                            <option value="Not planned" {{ ($maintenanceUpdate == "Not planned" ? "selected":"") }}>Not planned</option>
                            <option value="Unknown" {{ ($maintenanceUpdate == "Unknown" ? "selected":"") }}>Unknown</option>
                            <option value="None" {{ ($maintenanceUpdate == "None" ? "selected":"") }}>None</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
