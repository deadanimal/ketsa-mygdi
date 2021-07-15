<div class="card card-primary div_c7" id="div_c7">
    <div class="card-header ftest">
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
    <div id="collapse7" class="panel-collapse collapse" data-parent="#div_c7">
        <div class="card-body">
            <b>Wavelength Band Information</b>
            <div class="form-group row">
                Band Boundry:
                <?php
                $bandBound = "";
                if(isset($metadataxml->identificationInfo->SV_ServiceIdentification->bandBoundry->CharacterString) && $metadataxml->identificationInfo->SV_ServiceIdentification->bandBoundry->CharacterString != ""){
                    $bandBound = $metadataxml->identificationInfo->SV_ServiceIdentification->bandBoundry->CharacterString;
                }
                ?>
                <input type="text" name="c7_band_boundary" id="c7_band_boundary" class="form-control col-lg-4" value="{{ $bandBound }}">
            </div>
            <div class="form-group row">
                Transfer Function Type:
                <?php
                $transFnType = "";
                if(isset($metadataxml->identificationInfo->SV_ServiceIdentification->transferFunctionType->CharacterString) && $metadataxml->identificationInfo->SV_ServiceIdentification->transferFunctionType->CharacterString != ""){
                    $transFnType = $metadataxml->identificationInfo->SV_ServiceIdentification->transferFunctionType->CharacterString;
                }
                ?>
                <input type="text" name="c7_trans_fn_type" id="c7_trans_fn_type" class="form-control col-lg-4" value="{{ $transFnType }}"> 
                &nbsp;&nbsp;&nbsp;
                Transmitted Polarization:
                <?php
                $transmitPolar = "";
                if(isset($metadataxml->identificationInfo->SV_ServiceIdentification->nominalSpatialResolution->CharacterString) && $metadataxml->identificationInfo->SV_ServiceIdentification->nominalSpatialResolution->CharacterString != ""){
                    $transmitPolar = $metadataxml->identificationInfo->SV_ServiceIdentification->nominalSpatialResolution->CharacterString;
                }
                ?>
                <input type="text" name="c7_trans_polar" id="c7_trans_polar" class="form-control col-lg-4" value="{{ $transmitPolar }}"> 
            </div>
            <div class="form-group row">
                Nominal Spatial Resolution:
                <?php
                $nomSpatRes = "";
                if(isset($metadataxml->identificationInfo->SV_ServiceIdentification->nominalSpatialResolution->CharacterString) && $metadataxml->identificationInfo->SV_ServiceIdentification->nominalSpatialResolution->CharacterString != ""){
                    $nomSpatRes = $metadataxml->identificationInfo->SV_ServiceIdentification->nominalSpatialResolution->CharacterString;
                }
                ?>
                <input type="text" name="c7_nominal_spatial_res" id="c7_nominal_spatial_res" class="form-control col-lg-4" value="{{ $nomSpatRes }}"> 
                &nbsp;&nbsp;&nbsp;
                Detected Polarization:
                <?php
                $detectPolar = "";
                if(isset($metadataxml->identificationInfo->SV_ServiceIdentification->detectedPolarisation->CharacterString) && $metadataxml->identificationInfo->SV_ServiceIdentification->detectedPolarisation->CharacterString != ""){
                    $detectPolar = $metadataxml->identificationInfo->SV_ServiceIdentification->detectedPolarisation->CharacterString;
                }
                ?>
                <input type="text" name="c7_detected_polar" id="c7_detected_polar" class="form-control col-lg-4" value="{{ $detectPolar }}"> 
            </div>
        </div>
    </div>
</div>