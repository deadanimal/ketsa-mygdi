<div class="card card-primary mb-4 div_c7" id="div_c7">
    <div class="card-header">
        <a data-toggle="collapse" href="#collapse7">
            <h4 class="card-title">
                <?php echo __('lang.accord_7'); ?>
            </h4>
        </a>
        @if(auth::user()->hasRole(['Penerbit Metadata']) && $metadataSearched->disahkan == "no")
        <button type="button" class="btn btn-secondary float-right" data-toggle="modal" data-target="#modal7">Catatan</button>
        @elseif(auth::user()->hasRole(['Pengesah Metadata','Super Admin','Pentadbir Aplikasi']))
        <button type="button" class="btn btn-secondary float-right" data-toggle="modal" data-target="#modal7">Catatan</button>
        @endif
    </div>
    <div id="collapse7" class="panel-collapse collapse in show" data-parent="#div_c7">
        <div class="card-body">
            <div class="acard-body opacity-8">
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
                                <input class="form-control form-control-sm ml-3 sortable" type="text" name="{{ $key }}" data-status="<?php echo $val['status']; ?>" value="{{ $metadataxml->customInputs->accordion7->$key }}"/>
                            </div>
                        </div>
                        <?php
                    }
                }
                ?>
                <h6 class="heading-small text-muted mb-2">Wavelength Band
                    Information</h6>
                <div class="pl-lg-3">
                    <?php
                    foreach($template->template[strtolower($catSelected)]['accordion7'] as $key=>$val){
                        if($key == "c7_band_boundary"){
                            ?>
                            <div class="row mb-2" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                                <div class="col-xl-6">
                                    <div class="form-inline">
                                        <div class="form-control-label mr-3">
                                            Band Boundry
                                        </div>
                                        <?php
                                        $bandBound = "";
                                        if (isset($metadataxml->identificationInfo->MD_DataIdentification->bandBoundry->CharacterString) && $metadataxml->identificationInfo->MD_DataIdentification->bandBoundry->CharacterString != "") {
                                            $bandBound = $metadataxml->identificationInfo->MD_DataIdentification->bandBoundry->CharacterString;
                                        }
                                        ?>
                                        <select name="c7_band_boundary" id="c7_band_boundary" class="form-control form-control-sm">
                                            <option value="">Pilih...</option>
                                            <option value="Equivalent Width" {{ ($bandBound == "Equivalent Width" ? "selected":"") }}>Equivalent Width</option>
                                            <option value="Fifty Percent" {{ ($bandBound == "Fifty Percent" ? "selected":"") }}>Fifty Percent</option>
                                            <option value="One Over E" {{ ($bandBound == "One Over E" ? "selected":"") }}>One Over E</option>
                                            <option value="3d B" {{ ($bandBound == "3d B" ? "selected":"") }}>3d B</option>
                                            <option value="Half Mazimum" {{ ($bandBound == "Half Mazimum" ? "selected":"") }}>Half Mazimum</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <?php
                        }
                    }
                    ?>
                    <div class="row mb-2">
                        <?php
                        foreach($template->template[strtolower($catSelected)]['accordion7'] as $key=>$val){
                            if($key == "c7_trans_fn_type"){
                                ?>
                                <div class="col-xl-6" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                                    <div class="form-inline">
                                        <div class="form-control-label mr-4">
                                            Transfer Function Type
                                        </div>
                                        <?php
                                        $transFnType = "";
                                        if (isset($metadataxml->identificationInfo->MD_DataIdentification->transferFunctionType->CharacterString) && $metadataxml->identificationInfo->MD_DataIdentification->transferFunctionType->CharacterString != "") {
                                            $transFnType = $metadataxml->identificationInfo->MD_DataIdentification->transferFunctionType->CharacterString;
                                        }
                                        ?>
                                        <input class="form-control form-control-sm" type="text" style="width :200px" name="c7_trans_fn_type" id="c7_trans_fn_type" value="{{ $transFnType }}">
                                    </div>
                                </div>
                                <?php
                            }
                            if($key == "c7_trans_polar"){
                                ?>
                                <div class="col-xl-6" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                                    <div class="form-inline">
                                        <div class="form-control-label mr-3">
                                            Transmitted Polarization
                                        </div>
                                        <?php
                                        $transmitPolar = "";
                                        if (isset($metadataxml->identificationInfo->MD_DataIdentification->transmittedPolarization->CharacterString) && $metadataxml->identificationInfo->MD_DataIdentification->transmittedPolarization->CharacterString != "") {
                                            $transmitPolar = $metadataxml->identificationInfo->MD_DataIdentification->transmittedPolarization->CharacterString;
                                        }
                                        ?>
                                        <input class="form-control form-control-sm" type="text" style="width :180px" name="c7_trans_polar" id="c7_trans_polar" value="{{ $transmitPolar }}">
                                    </div>
                                </div>
                                <?php
                            }
                        }
                        ?>
                    </div>
                    <div class="row mb-2">
                        <?php
                        foreach($template->template[strtolower($catSelected)]['accordion7'] as $key=>$val){
                            if($key == "c7_nominal_spatial_res"){
                                ?>
                                <div class="col-xl-6" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                                    <div class="form-inline">
                                        <div class="form-control-label mr-4">
                                            Nominal Spatial Resolution
                                        </div>
                                        <?php
                                        $nomSpatRes = "";
                                        if (isset($metadataxml->identificationInfo->MD_DataIdentification->nominalSpatialResolution->CharacterString) && $metadataxml->identificationInfo->MD_DataIdentification->nominalSpatialResolution->CharacterString != "") {
                                            $nomSpatRes = $metadataxml->identificationInfo->MD_DataIdentification->nominalSpatialResolution->CharacterString;
                                        }
                                        ?>
                                        <input class="form-control form-control-sm" type="text" style="width :100px" placeholder="0.0" name="c7_nominal_spatial_res" id="c7_nominal_spatial_res" value="{{ $nomSpatRes }}">
                                        <div class="form-control-label ml-2">
                                            meter
                                        </div>
                                    </div>
                                </div>
                                <?php
                            }
                            if($key == "c7_detected_polar"){
                                ?>
                                <div class="col-xl-6" <?php if($val['status'] == "inactive"){ ?>style="display:none;"<?php } ?>>
                                    <div class="form-inline">
                                        <div class="form-control-label mr-3">
                                            Detected Polarization
                                        </div>
                                        <?php
                                        $detectPolar = "";
                                        if (isset($metadataxml->identificationInfo->MD_DataIdentification->detectedPolarisation->CharacterString) && $metadataxml->identificationInfo->MD_DataIdentification->detectedPolarisation->CharacterString != "") {
                                            $detectPolar = $metadataxml->identificationInfo->MD_DataIdentification->detectedPolarisation->CharacterString;
                                        }
                                        ?>
                                        <input class="form-control form-control-sm" type="text" style="width :180px" placeholder="Detected Polarization" name="c7_detected_polar" id="c7_detected_polar" value="{{ $detectPolar }}">
                                    </div>
                                </div>
                                <?php
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
