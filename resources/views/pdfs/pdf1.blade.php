@extends('layouts.app_afiq')

@section('content')

  <style>
    .card-primary:not(.card-outline)>.card-header{
      background-color:#b3ecff;
      color:black;
    }
    .card-primary:not(.card-outline)>.card-header a{
      color:black;
    }

    .p-2{
      width:150px;
    }
    .p-8{
      width:285px;
      padding-bottom:3px;
    }
    .accordf .card-title{
        width:85%;
    }
  </style>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper" style="width:100%;">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1></h1>
          </div>
          <div class="col-sm-6">
          </div>
        </div>
      </div>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
                <div class="card-header">
                    <div class="row align-items-center">
                        <div class="col-5">
                            <h1>
                                <?php 
                                if(isset($metadataxml->identificationInfo->MD_DataIdentification->citation->CI_Citation->title->CharacterString) && $metadataxml->identificationInfo->MD_DataIdentification->citation->CI_Citation->title->CharacterString != ""){
                                  echo $metadataxml->identificationInfo->MD_DataIdentification->citation->CI_Citation->title->CharacterString;
                                }
                                ?>
                            </h1>
                        </div>
                        <div class="col-7 text-right">
                            <a href="{{ url('downloadMetadataPdf').'/'.$metadataSearched->id }}">
                                <button type="button" class="btn btn-sm btn-default mr-2">Muat Turun PDF</button>
                            </a>
                            <a href="{{ url('downloadMetadataPdf').'/'.$metadataSearched->id }}">
                                <button type="button" class="btn btn-sm btn-default mr-2">Muat Turun XML</button>
                            </a>
                        </div>
                    </div>
                </div>
            <div class="card">
                <input type="hidden" name="metadata_id" value="{{ $metadataSearched->id }}">
                <div class="card-body">
                  <div class="form-group row">
                    <p>
                        Category:
                        <?php
                        $category = "";
                        if(isset($metadataxml->hierarchyLevel->MD_ScopeCode) && $metadataxml->hierarchyLevel->MD_ScopeCode != ""){
                            echo $metadataxml->hierarchyLevel->MD_ScopeCode;
                            $category = $metadataxml->hierarchyLevel->MD_ScopeCode;
                        }
                        ?>
                    </p>
                  </div>
                  <div id="accordion" class="accordf">
                    <?php //=== collapse1 =============================================================?>
                    @include('mygeo.metadata.lihat_metadata.general_information')
                    <?php //=== collapse2 =============================================================?>
                    @include('mygeo.metadata.lihat_metadata.identification_information')
                    <?php //=== collapse3 =============================================================?>
                    @include('mygeo.metadata.lihat_metadata.topic_category')
                    <?php //=== collapse4 =============================================================?>
                    @include('mygeo.metadata.lihat_metadata.nominal_resolution')
                    <?php //=== collapse5 =============================================================?>
                    @include('mygeo.metadata.lihat_metadata.process_step_information')
                    <?php //=== collapse6 =============================================================?>
                    @include('mygeo.metadata.lihat_metadata.spatial_representation_information')
                    <?php //=== collapse7 =============================================================?>
                    @include('mygeo.metadata.lihat_metadata.content_information')
                    <?php //=== collapse8 =============================================================?>
                    @include('mygeo.metadata.lihat_metadata.aquisition_information')
                    <?php //=== collapse9 =============================================================?>
                    @include('mygeo.metadata.lihat_metadata.spatial_domain')
                    <?php //=== collapse10 =============================================================?>
                    @include('mygeo.metadata.lihat_metadata.browsing_information')
                    <?php //=== collapse11 =============================================================?>
                    @include('mygeo.metadata.lihat_metadata.distribution_information')
                    <?php //=== collapse12 =============================================================?>
                    @include('mygeo.metadata.lihat_metadata.data_set_identification')
                    <?php //=== collapse13 =============================================================?>
                    @include('mygeo.metadata.lihat_metadata.reference_system_information')
                    <?php //=== collapse14 =============================================================?>
                    @include('mygeo.metadata.lihat_metadata.constraints')
                    <?php //=== collapse15 =============================================================?>
                    @include('mygeo.metadata.lihat_metadata.data_quality')
                  </div>
                </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>

<script>
  $(document).ready(function(){
    $('#c10_date_div,#c10_t1_commission_date_div,#c10_t1_omission_date_div,#c10_t2_conceptual_date_div,#c10_t2_domain_date_div,#c10_t2_format_date_div,#c10_t2_topological_date_div,#c10_t3_absExt_date_div,#c10_t3_relInt_date_div,#c10_t3_gridded_date_div,#c10_t4_accuTimeMeasure_date_div,#c10_t4_tempConsist_date_div,#c10_t4_tempValid_date_div,#c10_t5_classCorrect_date_div,#c10_t5_nonQuant_date_div,#c10_t5_quant_date_div').datetimepicker({
      // format:'DD/MM/YYYY',
      // format: 'L'
    });

    <?php
    if(count($categories) > 0){
      $type = (isset($metadataxml->hierarchyLevel->MD_ScopeCode) ? $metadataxml->hierarchyLevel->MD_ScopeCode:"");
      if(isset($type) && $type != "" && (strtolower($type) == "dataset" || strtolower($type) == "services")){
        ?>
        $(".div_c4, .div_c5, .div_c6, .div_c7, .div_c8").hide();
        <?php
      }elseif(isset($type) && $type != "" && (strtolower($type) == "imagery" || strtolower($type) == "gridded")){
        ?>
        $(".div_c4, .div_c5, .div_c6, .div_c7, .div_c8").show();
        <?php
      }
    }
    ?>
            
    var kategori = "<?php echo $category; ?>";
    if (kategori.toLowerCase() == "dataset") {
        $('.lblMetadataName').html('Title<span class="text-warning">*</span>');
        $('.aTopicCategory').html('<?php echo __('lang.accord_3'); ?><span class="text-warning">*</span>');
        $('.divPublisherRole').show();
        $('.divMetadataDate').show();
        $('.divMetadataDateType').show();
        $('.divMetadataStatus').show();
        $('.divResponsiblePartyRole').show();
        $('.optContentInfo_dataset').show();
        $('.optContentInfo_services').hide();
        $('.optContentInfo_gridded').hide();
        $('.optContentInfo_imagery').hide();
        $('.optStatus_dataset').show();
        $('.optStatus_services').hide();
        $('.divTypeOfServices').hide();
        $('.divOperationName').hide();
        $('.divServiceUrl').hide();
        $('.divTypeOfCouplingDataset').hide();
        $('.refSys_Services').hide();
        $('#refsys_projection,#refsys_semiMajorAxis,#refsys_ellipsoid,#refsys_axis_units,#refsys_datum,#refsys_denomFlatRatio').prop('readonly',true);
        $('.divDataQualityTabs').show();
        $('.divUseLimitation').hide();
        $('.divMaintenanceInfo').hide();
    }else if (kategori.toLowerCase() == "services") {
        $('.optContentInfo_dataset').hide();
        $('.optContentInfo_services').show();
        $('.optContentInfo_gridded').hide();
        $('.optContentInfo_imagery').hide();
        $('.optStatus_dataset').hide();
        $('.optStatus_services').show();
        $('.divTypeOfServices').show();
        $('.divOperationName').show();
        $('.divServiceUrl').show();
        $('.divTypeOfCouplingDataset').show();
        $('.refSys_Services').show();
        $('#refsys_projection,#refsys_semiMajorAxis,#refsys_ellipsoid,#refsys_axis_units,#refsys_datum,#refsys_denomFlatRatio').prop('readonly',false);
        $('.divDataQualityTabs').hide();
        $('.divUseLimitation').show();
        $('.divMaintenanceInfo').hide();
    }else if (kategori.toLowerCase() == "gridded") {
        $('.optContentInfo_dataset').hide();
        $('.optContentInfo_services').hide();
        $('.optContentInfo_gridded').show();
        $('.optContentInfo_imagery').hide();
        $('.optStatus_dataset').hide();
        $('.optStatus_services').show()
        $('.divTypeOfServices').hide();
        $('.divOperationName').hide();
        $('.divServiceUrl').hide();
        $('.divTypeOfCouplingDataset').hide();
        $('.refSys_Services').hide();
        $('#refsys_projection,#refsys_semiMajorAxis,#refsys_ellipsoid,#refsys_axis_units,#refsys_datum,#refsys_denomFlatRatio').prop('readonly',true);
        $('.divDataQualityTabs').show();
        $('.divUseLimitation').hide();
        $('.divMaintenanceInfo').show();
    }else if (kategori.toLowerCase() == "imagery") {
        $('.optContentInfo_dataset').hide();
        $('.optContentInfo_services').hide();
        $('.optContentInfo_gridded').hide();
        $('.optContentInfo_imagery').show();
        $('.optStatus_dataset').hide();
        $('.optStatus_services').show();
        $('.divTypeOfServices').hide();
        $('.divOperationName').hide();
        $('.divServiceUrl').hide();
        $('.divTypeOfCouplingDataset').hide();
        $('.refSys_Services').hide();
        $('#refsys_projection,#refsys_semiMajorAxis,#refsys_ellipsoid,#refsys_axis_units,#refsys_datum,#refsys_denomFlatRatio').prop('readonly',true);
        $('.divDataQualityTabs').show();
        $('.divUseLimitation').hide();
        $('.divMaintenanceInfo').show();
    }

    if (kategori.toLowerCase() == "dataset" || kategori.toLowerCase() == "services") {
        $(".div_c4, .div_c5, .div_c6, .div_c7, .div_c8").hide();
        $('#accordion').show();
        $('#div_action_buttons').show();
    } else if (kategori.toLowerCase() == "imagery" || kategori.toLowerCase() == "gridded") {
        $(".div_c4, .div_c5, .div_c6, .div_c7, .div_c8").show();
        $('#accordion').show();
        $('#div_action_buttons').show();
    }
  });
</script>

<?php
$westBoundLongitude = (isset($metadataxml->identificationInfo->MD_DataIdentification->extent->EX_Extent->geographicElement->EX_GeographicBoundingBox->westBoundLongitude->Decimal) ? $metadataxml->identificationInfo->MD_DataIdentification->extent->EX_Extent->geographicElement->EX_GeographicBoundingBox->westBoundLongitude->Decimal : "");
$eastBoundLongitude = (isset($metadataxml->identificationInfo->MD_DataIdentification->extent->EX_Extent->geographicElement->EX_GeographicBoundingBox->eastBoundLongitude->Decimal) ? $metadataxml->identificationInfo->MD_DataIdentification->extent->EX_Extent->geographicElement->EX_GeographicBoundingBox->eastBoundLongitude->Decimal : "");
$southBoundLatitude = (isset($metadataxml->identificationInfo->MD_DataIdentification->extent->EX_Extent->geographicElement->EX_GeographicBoundingBox->southBoundLatitude->Decimal) ? $metadataxml->identificationInfo->MD_DataIdentification->extent->EX_Extent->geographicElement->EX_GeographicBoundingBox->southBoundLatitude->Decimal : "");
$northBoundLatitude = (isset($metadataxml->identificationInfo->MD_DataIdentification->extent->EX_Extent->geographicElement->EX_GeographicBoundingBox->northBoundLatitude->Decimal) ? $metadataxml->identificationInfo->MD_DataIdentification->extent->EX_Extent->geographicElement->EX_GeographicBoundingBox->northBoundLatitude->Decimal : "");
?>

<script>
  var N = "<?php echo $northBoundLatitude; ?>";
    var W = "<?php echo $westBoundLongitude; ?>";
    var S = "<?php echo $southBoundLatitude; ?>";
    var E = "<?php echo $eastBoundLongitude; ?>";

    var map = L.map('map').setView([5.3105, 107.3854408], 5);

    L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
        maxZoom: 18,
        attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, ' +
                'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
        id: 'mapbox/streets-v11',
        tileSize: 512,
        zoomOffset: -1,
    }).addTo(map);

        var setNbltValue = document.getElementById("nblt").value = N;
        var setWblgValue = document.getElementById("wblg").value = W;
        var serSbltValue = document.getElementById("sblt").value = S;
        var setEblgValue = document.getElementById("eblg").value = E;

        // To trigger onchange function
        var el = document.getElementById('nblt');
        el.dispatchEvent(new Event('change'));

// drawRectangleEditor()
// var wblgValue = document.getElementById('wblg').value = '';
    searchLocation()

    function updateLayer() {

        var nbltValue = document.getElementById("nblt").value;
        var wblgValue = document.getElementById("wblg").value;
        var sbltValue = document.getElementById("sblt").value;
        var eblgValue = document.getElementById("eblg").value;

        if (wblgValue != '' && eblgValue != '' && nbltValue != '' && sbltValue != '') {
            map.eachLayer((layer) => {
                layer.remove();
            });

            console.log("all onchange: " + wblgValue + "," + eblgValue + "," + nbltValue + "," + sbltValue);

            showRectangle(nbltValue, wblgValue, sbltValue, eblgValue)
        }
    }


    function searchLocation() {

        var markerIcon = L.icon({
            iconUrl: 'css/leaflet@1.7.1/images/marker-icon-2x.png',
// shadowUrl: 'leaf-shadow.png',

            iconSize: [30, 53], // size of the icon [width, height] in px
// shadowSize:   [50, 64], // size of the shadow
            iconAnchor: [22, 94], // point of the icon which will correspond to marker's location
// shadowAnchor: [4, 62],  // the same for the shadow
// popupAnchor:  [-3, -76] // point from which the popup should open relative to the iconAnchor
        });

        var searchControl = new L.esri.Controls.Geosearch().addTo(map);

        var results = new L.LayerGroup().addTo(map);

        searchControl.on('results', function (data) {
            results.clearLayers();
            for (var i = data.results.length - 1; i >= 0; i--) {
// results.addLayer(L.marker(data.results[i].latlng));
                console.log(data.results[i].latlng.lat);
                L.marker([data.results[i].latlng.lat, data.results[i].latlng.lng], {icon: markerIcon}).addTo(map);
            }
        });
    }


    function showRectangle(nblt, wblg, sblt, eblg) {
        var rectangle;
        // var resetBound = [[0, 0],[0, 0]];
        // rectangle = L.rectangle(resetBound).addTo(map);
        // var map = L.map('map').setView([4.6161396,101.8562205], 6);

        L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
            maxZoom: 18,
            attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, ' +
                    'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
            id: 'mapbox/streets-v11',
            tileSize: 512,
            zoomOffset: -1,
        }).addTo(map);

        // nblt = parseFloat(nblt); 
        // wblg = parseFloat(wblg); 
        // sblt = parseFloat(sblt); 
        // eblg = parseFloat(eblg); 

        console.log(nblt); // 6.3171
        console.log(wblg); // 101.7046
        console.log(sblt); // 2.7158
        console.log(eblg); // 104.4547

        // var bounds = [[6.3171, 101.7046], [2.7158, 104.4547]];

        // var bounds = [[0+nblt, 0+wblg], [0+sblt, 0+eblg]];

        var bounds = [[nblt, wblg], [sblt, eblg]];

        rectangle = L.rectangle(bounds).addTo(map);

        var zoomToRectangle = L.rectangle(bounds).addTo(map).getCenter();

        console.log("zoomToRectangle values:");
        console.log(zoomToRectangle);
        
        map.fitBounds(bounds);

        // var map = L.map('map').setView([5.3105,107.3854408], 5);

        // rectangle.remove();

        // rectangle = L.rectangle(bounds).addTo(map);
    }

    function cleaLayer() {
        map.eachLayer((layer) => {
            layer.remove();
        });

        L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
            maxZoom: 18,
            attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, ' +
                    'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
            id: 'mapbox/streets-v11',
            tileSize: 512,
            zoomOffset: -1
        }).addTo(map);
    }

    function saveData() {

        var nbltValue = document.getElementById("nblt").value;
        var wblgValue = document.getElementById("wblg").value;
        var sbltValue = document.getElementById("sblt").value;
        var eblgValue = document.getElementById("eblg").value;

        // var data = "North Bound Latitude: "+nbltValue+"";
        //     data += "West Bound Longitude: "+wblgValue+"";

        var data = ["North Bound Latitude: " + nbltValue, "West Bound Longitude: " + wblgValue, "South Bound Latitude: " + sbltValue, "East Bound Longitude: " + eblgValue];

        alert(data);
    }
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
@stop
