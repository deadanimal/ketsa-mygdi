<?php $flag = 1; ?>
<script src="{{ asset('intecxmap/js/leaflet@1.7.1/dist/leaflet.js') }}"></script>

<div class="card card-primary div_c9" id="div_c9">
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
                $flag *= 0;
            }elseif(isset($metadataxml->identificationInfo->SV_ServiceIdentification->extent->EX_Extent->geographicElement->EX_GeographicBoundingBox->westBoundLongitude->Decimal)){
                $west = $metadataxml->identificationInfo->SV_ServiceIdentification->extent->EX_Extent->geographicElement->EX_GeographicBoundingBox->westBoundLongitude->Decimal;
                $flag *= 0;
            }
            
            $east = "";
            if(isset($metadataxml->identificationInfo->MD_DataIdentification->extent->EX_Extent->geographicElement->EX_GeographicBoundingBox->eastBoundLongitude->Decimal)){
                $east = $metadataxml->identificationInfo->MD_DataIdentification->extent->EX_Extent->geographicElement->EX_GeographicBoundingBox->eastBoundLongitude->Decimal;
                $flag *= 0;
            }elseif(isset($metadataxml->identificationInfo->SV_ServiceIdentification->extent->EX_Extent->geographicElement->EX_GeographicBoundingBox->eastBoundLongitude->Decimal)){
                $east = $metadataxml->identificationInfo->SV_ServiceIdentification->extent->EX_Extent->geographicElement->EX_GeographicBoundingBox->eastBoundLongitude->Decimal;
                $flag *= 0;
            }
            
            $south = "";
            if(isset($metadataxml->identificationInfo->MD_DataIdentification->extent->EX_Extent->geographicElement->EX_GeographicBoundingBox->southBoundLatitude->Decimal)){
                $south = $metadataxml->identificationInfo->MD_DataIdentification->extent->EX_Extent->geographicElement->EX_GeographicBoundingBox->southBoundLatitude->Decimal;
                $flag *= 0;
            }elseif(isset($metadataxml->identificationInfo->SV_ServiceIdentification->extent->EX_Extent->geographicElement->EX_GeographicBoundingBox->southBoundLatitude->Decimal)){
                $south = $metadataxml->identificationInfo->SV_ServiceIdentification->extent->EX_Extent->geographicElement->EX_GeographicBoundingBox->southBoundLatitude->Decimal;
                $flag *= 0;
            }
            
            $north = "";
            if(isset($metadataxml->identificationInfo->MD_DataIdentification->extent->EX_Extent->geographicElement->EX_GeographicBoundingBox->northBoundLatitude->Decimal)){
                $north = $metadataxml->identificationInfo->MD_DataIdentification->extent->EX_Extent->geographicElement->EX_GeographicBoundingBox->northBoundLatitude->Decimal;
                $flag *= 0;
            }elseif(isset($metadataxml->identificationInfo->SV_ServiceIdentification->extent->EX_Extent->geographicElement->EX_GeographicBoundingBox->northBoundLatitude->Decimal)){
                $north = $metadataxml->identificationInfo->SV_ServiceIdentification->extent->EX_Extent->geographicElement->EX_GeographicBoundingBox->northBoundLatitude->Decimal;
                $flag *= 0;
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

<?php
if($flag == 1){
    ?>
    <script>
        $(document).ready(function(){
            $('#div_c9').hide();
        });
    </script>
        <?php
}
?>