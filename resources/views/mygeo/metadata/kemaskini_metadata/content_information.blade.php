<div class="card card-primary mb-4 div_c7" id="div_c7">
    <div class="card-header">
        <a data-toggle="collapse" href="#collapse7">
            <h4 class="card-title">
                <?php echo __('lang.accord_7'); ?>
            </h4>
        </a>
        @if(auth::user()->hasRole(['Penerbit Metadata']) && $metadataSearched->disahkan == "no")
        <button type="button" class="btn btn-secondary float-right" data-toggle="modal" data-target="#modal7">Catatan</button>
        @elseif(auth::user()->hasRole(['Pengesah Metadata','Super Admin']))
        <button type="button" class="btn btn-secondary float-right" data-toggle="modal" data-target="#modal7">Catatan</button>
        @endif
    </div>
    <div id="collapse7" class="panel-collapse collapse in show" data-parent="#div_c7">
        <div class="card-body">
            <div class="acard-body opacity-8">
                <h6 class="heading-small text-muted mb-2">Wavelength Band
                    Information</h6>
                <div class="pl-lg-3">
                    <div class="row mb-2">
                        <div class="col-xl-6">
                            <div class="form-inline">
                                <div class="form-control-label mr-3">
                                    Band Boundry
                                </div>
                                <?php
                                $bandBound = "";
                                if (isset($metadataxml->identificationInfo->SV_ServiceIdentification->bandBoundry->CharacterString) && $metadataxml->identificationInfo->SV_ServiceIdentification->bandBoundry->CharacterString != "") {
                                    $bandBound = $metadataxml->identificationInfo->SV_ServiceIdentification->bandBoundry->CharacterString;
                                }
                                ?>
                                <input type="text" name="c7_band_boundary" id="c7_band_boundary" class="form-control form-control-sm" style="width:150px;" value="{{ $bandBound }}">
                            </div>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-xl-6">
                            <div class="form-inline">
                                <div class="form-control-label mr-4">
                                    Transfer Function Type
                                </div>
                                <?php
                                $transFnType = "";
                                if (isset($metadataxml->identificationInfo->SV_ServiceIdentification->transferFunctionType->CharacterString) && $metadataxml->identificationInfo->SV_ServiceIdentification->transferFunctionType->CharacterString != "") {
                                    $transFnType = $metadataxml->identificationInfo->SV_ServiceIdentification->transferFunctionType->CharacterString;
                                }
                                ?>
                                <input class="form-control form-control-sm" type="text" style="width :200px" name="c7_trans_fn_type" id="c7_trans_fn_type" value="{{ $transFnType }}">
                            </div>
                        </div>
                        <div class="col-xl-6">
                            <div class="form-inline">
                                <div class="form-control-label mr-3">
                                    Transmitted Polarization
                                </div>
                                <?php
                                $transmitPolar = "";
                                if (isset($metadataxml->identificationInfo->SV_ServiceIdentification->nominalSpatialResolution->CharacterString) && $metadataxml->identificationInfo->SV_ServiceIdentification->nominalSpatialResolution->CharacterString != "") {
                                    $transmitPolar = $metadataxml->identificationInfo->SV_ServiceIdentification->nominalSpatialResolution->CharacterString;
                                }
                                ?>
                                <input class="form-control form-control-sm" type="text" style="width :180px" name="c7_trans_polar" id="c7_trans_polar" value="{{ $transmitPolar }}">
                            </div>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-xl-6">
                            <div class="form-inline">
                                <div class="form-control-label mr-4">
                                    Nominal Spatial Resolution
                                </div>
                                <?php
                                $nomSpatRes = "";
                                if (isset($metadataxml->identificationInfo->SV_ServiceIdentification->nominalSpatialResolution->CharacterString) && $metadataxml->identificationInfo->SV_ServiceIdentification->nominalSpatialResolution->CharacterString != "") {
                                    $nomSpatRes = $metadataxml->identificationInfo->SV_ServiceIdentification->nominalSpatialResolution->CharacterString;
                                }
                                ?>
                                <input class="form-control form-control-sm" type="text" style="width :100px" placeholder="0.0" name="c7_nominal_spatial_res" id="c7_nominal_spatial_res" value="{{ $nomSpatRes }}">
                                <div class="form-control-label ml-2">
                                    meter
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-6">
                            <div class="form-inline">
                                <div class="form-control-label mr-3">
                                    Detected Polarization
                                </div>
                                <?php
                                $detectPolar = "";
                                if (isset($metadataxml->identificationInfo->SV_ServiceIdentification->detectedPolarisation->CharacterString) && $metadataxml->identificationInfo->SV_ServiceIdentification->detectedPolarisation->CharacterString != "") {
                                    $detectPolar = $metadataxml->identificationInfo->SV_ServiceIdentification->detectedPolarisation->CharacterString;
                                }
                                ?>
                                <input class="form-control form-control-sm" type="text" style="width :180px" placeholder="Detected Polarization" name="c7_detected_polar" id="c7_detected_polar" value="{{ $detectPolar }}">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
