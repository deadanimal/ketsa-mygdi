<div class="card card-primary div_c12" id="div_c12">
    <div class="card-header ftest">
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
    <div id="collapse12" class="panel-collapse collapse" data-parent="#div_c12">
        <div class="card-body">
            <div class="form-group row">
                Data Set Type:
                <?php
                $dataSetType = "";
                if(isset($metadataxml->identificationInfo->SV_ServiceIdentification->spatialRepresentationType) && $metadataxml->identificationInfo->SV_ServiceIdentification->spatialRepresentationType != ""){
                    $dataSetType = trim($metadataxml->identificationInfo->SV_ServiceIdentification->spatialRepresentationType);
                }
                ?>
                <select name="c12_dataset_type" id="c12_dataset_type" class="form-control col-lg-2"> 
                    <option value="Grid" {{($dataSetType == 'Grid' ? "selected":"")}}>Grid</option>
                    <option value="Stereo Model" {{($dataSetType == 'Stereo Model' ? "selected":"")}}>Stereo Model</option>
                    <option value="Text Table" {{($dataSetType == 'Text Table' ? "selected":"")}}>Text Table</option>
                    <option value="Tin" {{($dataSetType == 'Tin' ? "selected":"")}}>Tin</option>
                    <option value="Vector" {{($dataSetType == 'Vector' ? "selected":"")}}>Vector</option>
                    <option value="Video" {{($dataSetType == 'Video' ? "selected":"")}}>Video</option>
                </select>
            </div>
            <div class="form-group row">
                <div class="col-lg-4">
                    Scale in Hardcopy / Softcopy (feature scale):
                    <?php
                    $scale = "";
                    if(isset($metadataxml->identificationInfo->SV_ServiceIdentification->spatialResolution->MD_Resolution->equivalentScale->MD_RepresentativeFraction->denominator) && $metadataxml->identificationInfo->SV_ServiceIdentification->spatialResolution->MD_Resolution->equivalentScale->MD_RepresentativeFraction->denominator != ""){
                        $scale = $metadataxml->identificationInfo->SV_ServiceIdentification->spatialResolution->MD_Resolution->equivalentScale->MD_RepresentativeFraction->denominator;
                    }
                    ?>
                    <input type="text" name="c12_feature_scale" id="c12_feature_scale" class="form-control col-lg-7" placeholder="10:50000" value="{{ $scale }}"> 
                    &nbsp;&nbsp;&nbsp;
                </div>
                <div class="col-lg-4">
                    Image Resolution (GSD):
                    <div class="input-group mb-3">
                        <?php
                        $imgRes = "";
                        if(isset($metadataxml->identificationInfo->SV_ServiceIdentification->spatialResolution->MD_Resolution->distance) && $metadataxml->identificationInfo->SV_ServiceIdentification->spatialResolution->MD_Resolution->distance != ""){
                            $imgRes = $metadataxml->identificationInfo->SV_ServiceIdentification->spatialResolution->MD_Resolution->distance;
                        }
                        ?>
                        <input type="text" class="form-control col-lg-5" name="c12_image_res" id="c12_image_res" placeholder="10.5" value="{{ $imgRes }}">
                        <div class="input-group-append">
                            <span class="input-group-text">meter</span>
                        </div>
                    </div>
                    &nbsp;&nbsp;&nbsp;
                </div>
                <div class="col-lg-4">
                    Language:
                    <?php
                    $lang = "";
                    if(isset($metadataxml->identificationInfo->SV_ServiceIdentification->language) && $metadataxml->identificationInfo->SV_ServiceIdentification->language != ""){
                        $lang = trim($metadataxml->identificationInfo->SV_ServiceIdentification->language);
                    }
                    ?>
                    <select name="c12_language" id="c12_language" class="form-control col-lg-7"> 
                        <option value="English" {{($lang == 'English' ? "selected":"")}}>English</option>
                        <option value="Bahasa Malaysia" {{($lang == 'Bahasa Malaysia' ? "selected":"")}}>Bahasa Malaysia</option>
                    </select>
                </div>
            </div>
        </div>
    </div>
</div>