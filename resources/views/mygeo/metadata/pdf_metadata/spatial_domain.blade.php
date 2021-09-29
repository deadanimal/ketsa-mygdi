<link rel="stylesheet" href="{{ asset('intecxmap/css/leaflet@1.7.1/leaflet.css') }}"/>
<script src="{{ asset('intecxmap/js/leaflet@1.7.1/dist/leaflet.js') }}"></script>
<script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
<link href="{{ asset('intecxmap/css/leaflet.draw/0.2.3/leaflet.draw.css') }}" rel="stylesheet">
<script src="{{ asset('intecxmap/js/leaflet.draw/0.2.3/leaflet.draw.js' ) }}"></script>
<script src="{{ asset('intecxmap/js/esri-leaflet@3.0.2/dist/esri-leaflet-debug.js') }}"></script>
<script src="{{ asset('intecxmap/js/esri-leaflet/0.0.1-beta.5/esri-leaflet.js') }}"></script>
<script src="{{ asset('intecxmap/js/esri-leaflet-geocoder/0.0.1-beta.5/esri-leaflet-geocoder.js') }}"></script>
<link rel="stylesheet" type="text/css" href="{{ asset('intecxmap/css/esri-leaflet-geocoder/0.0.1-beta.5/esri-leaflet-geocoder.css') }}">

<div class="card card-primary div_c9" id="div_c9" style="page-break-before: always;">
    <div class="card-header">
        <a data-toggle="collapse" href="#collapse9" class="fixMap">
            <h4 class="card-title">
                <?php echo __('lang.accord_9'); ?>
            </h4>
        </a>
    </div>
    <div id="collapse9" class="panel-collapse collapse in show" data-parent="#div_c9">
        <div class="card-body">
            <?php
            $west = "";
            if(isset($metadataxml->identificationInfo->MD_DataIdentification->extent->EX_Extent->geographicElement->EX_GeographicBoundingBox->westBoundLongitude->Decimal)){
                $west = $metadataxml->identificationInfo->MD_DataIdentification->extent->EX_Extent->geographicElement->EX_GeographicBoundingBox->westBoundLongitude->Decimal;
            }elseif(isset($metadataxml->identificationInfo->SV_ServiceIdentification->extent->EX_Extent->geographicElement->EX_GeographicBoundingBox->westBoundLongitude->Decimal)){
                $west = $metadataxml->identificationInfo->SV_ServiceIdentification->extent->EX_Extent->geographicElement->EX_GeographicBoundingBox->westBoundLongitude->Decimal;
            }
            
            $east = "";
            if(isset($metadataxml->identificationInfo->MD_DataIdentification->extent->EX_Extent->geographicElement->EX_GeographicBoundingBox->eastBoundLongitude->Decimal)){
                $east = $metadataxml->identificationInfo->MD_DataIdentification->extent->EX_Extent->geographicElement->EX_GeographicBoundingBox->eastBoundLongitude->Decimal;
            }elseif(isset($metadataxml->identificationInfo->SV_ServiceIdentification->extent->EX_Extent->geographicElement->EX_GeographicBoundingBox->eastBoundLongitude->Decimal)){
                $east = $metadataxml->identificationInfo->SV_ServiceIdentification->extent->EX_Extent->geographicElement->EX_GeographicBoundingBox->eastBoundLongitude->Decimal;
            }
            
            $south = "";
            if(isset($metadataxml->identificationInfo->MD_DataIdentification->extent->EX_Extent->geographicElement->EX_GeographicBoundingBox->southBoundLatitude->Decimal)){
                $south = $metadataxml->identificationInfo->MD_DataIdentification->extent->EX_Extent->geographicElement->EX_GeographicBoundingBox->southBoundLatitude->Decimal;
            }elseif(isset($metadataxml->identificationInfo->SV_ServiceIdentification->extent->EX_Extent->geographicElement->EX_GeographicBoundingBox->southBoundLatitude->Decimal)){
                $south = $metadataxml->identificationInfo->SV_ServiceIdentification->extent->EX_Extent->geographicElement->EX_GeographicBoundingBox->southBoundLatitude->Decimal;
            }
            
            $north = "";
            if(isset($metadataxml->identificationInfo->MD_DataIdentification->extent->EX_Extent->geographicElement->EX_GeographicBoundingBox->northBoundLatitude->Decimal)){
                $north = $metadataxml->identificationInfo->MD_DataIdentification->extent->EX_Extent->geographicElement->EX_GeographicBoundingBox->northBoundLatitude->Decimal;
            }elseif(isset($metadataxml->identificationInfo->SV_ServiceIdentification->extent->EX_Extent->geographicElement->EX_GeographicBoundingBox->northBoundLatitude->Decimal)){
                $north = $metadataxml->identificationInfo->SV_ServiceIdentification->extent->EX_Extent->geographicElement->EX_GeographicBoundingBox->northBoundLatitude->Decimal;
            }
            ?>
            <div class="row justify-content-md-center" style="height:425px;max-width:90%;">
                <div class="col col-sm-12">
                    <div id='map'></div>
                </div>
            </div>
            <br><br>
            <div class="row justify-content-md-center mb-4">
                <table>
                    <tr>
                        <td>
                            @if($west != "")
                                <div class="input-group">
                                    <div class="input-group-text" id="btnGroupAddon">W</div>
                                    <input type="number" step="any" id="wblg" onchange="updateLayer()" class="form-control" placeholder="West Bound Longitude"  aria-label="Recipient's username with two button addons" data-bs-toggle="tooltip" data-bs-placement="right" title="West Bound Longitude" value="{{ $west }}" name="c9_west_bound_longitude">
                                </div>
                            @endif
                        </td>
                        <td>
                            @if($east != "")
                                <div class="input-group">
                                    <div class="input-group-text" id="btnGroupAddon">E</div>
                                    <input type="number" id="eblg" onchange="updateLayer()"  step="any" class="form-control" placeholder="East Bound Longitude" aria-label="Recipient's username with two button addons" data-bs-toggle="tooltip" data-bs-placement="bottom" title="East Bound Longitude" value="{{ $east }}" name="c9_east_bound_longitude">
                                </div>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td>
                            @if($south != "")
                                <div class="input-group">
                                    <div class="input-group-text" id="btnGroupAddon">S</div>
                                    <input type="number" id="sblt" onchange="updateLayer()" step="any" class="form-control" placeholder="South Bound Latitude" aria-label="Recipient's username with two button addons" data-bs-toggle="tooltip" data-bs-placement="right" title="South Bound Latitude" value="{{ $south }}" name="c9_south_bound_latitude">
                                </div>
                            @endif
                        </td>
                        <td>
                            @if($north != "")
                                <div class="input-group">
                                    <div class="input-group-text" id="btnGroupAddon">N</div>
                                    <input type="number" id="nblt" onchange="updateLayer()" step="any" class="form-control" placeholder="North Bound Latitude" aria-label="Recipient's username with two button addons" data-bs-toggle="tooltip" data-bs-placement="top" title="North Bound Latitude" value="{{ $north }}" name="c9_north_bound_latitude">
                                </div>
                            @endif
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>
