  <!DOCTYPE html>
<html lang="en" class="perfect-scrollbar-off">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Pipeline Network Sdn. Bhd.">
    <meta name="author" content="Pipeline Network Sdn. Bhd.">
    <title>
        MyGeo Explorer
    </title>
    <!-- Favicon -->
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
    <!-- jQuery -->
    <script src="http://localhost:8888/ketsa-mygdi/public/plugins/jquery/jquery.min.js"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="http://localhost:8888/ketsa-mygdi/public/plugins/jquery-ui/jquery-ui.min.js"></script>
    <link rel="icon" href="http://localhost:8888/ketsa-mygdi/public/assetsangular/img/logo/jata-negara.png" type="image/png">
    <link rel="stylesheet" href="http://localhost:8888/ketsa-mygdi/public/afiqlogin_files/css">
    <!--<link href="./afiqlogin_files/bootstrap.min.css" rel="stylesheet">-->
    <!--        <link href="http://localhost:8888/ketsa-mygdi/public/afiqlogin_files/mapbox-gl.css" rel="stylesheet">-->

    <link rel="stylesheet" href="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-draw/v1.2.0/mapbox-gl-draw.css"
        type="text/css" />
    <meta name="viewport" content="initial-scale=1,maximum-scale=1,user-scalable=no" />
    <script src="https://api.mapbox.com/mapbox-gl-js/v2.0.1/mapbox-gl.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
    <link href="https://api.mapbox.com/mapbox-gl-js/v2.0.1/mapbox-gl.css" rel="stylesheet" />
    <script src="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v4.5.1/mapbox-gl-geocoder.min.js"></script>
    <link rel="stylesheet"
        href="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v4.5.1/mapbox-gl-geocoder.css"
        type="text/css" />

    <link href="http://localhost:8888/ketsa-mygdi/public/css/afiq.css" rel="stylesheet">
    <!--<link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">-->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
    <!-- daterange picker -->
    <link rel="stylesheet" href="http://localhost:8888/ketsa-mygdi/public/plugins/daterangepicker/daterangepicker.css">
    <link href="assetsweb/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Vendor CSS Files -->
    <link href="assetsweb/vendor/icofont/icofont.min.css" rel="stylesheet">
    <link href="assetsweb/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="assetsweb/vendor/venobox/venobox.css" rel="stylesheet">
    <link href="assetsweb/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="assetsweb/vendor/aos/aos.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="assetsweb/css/style.css" rel="stylesheet">


    <style>
        #map {
            position: absolute;
            top: 0;
            bottom: 0;
            width: 100%;
        }

        .calculation-box {
            height: 175px;
            width: 150px;
            position: absolute;
            bottom: 40px;
            left: 10px;
            background-color: rgba(255, 255, 255, 0.9);
            padding: 15px;
            text-align: center;
        }

        #calculated-area {}

        .main-footer {
            background: #0A80B6;
            border-top: none;
            color: white;
            font-weight: 200;
        }

        .main-header {
            border-bottom: none;
        }

        .card {
            background-color: rgba(255, 255, 255, 0.9);
        }

        .finline {
            display: inline;
        }

        .badge-custom {
            color: #303030;
            background-image: linear-gradient(to right, #ebba16, #ed8a19);
            font-size: 110%;
        }

    </style>
    <style>
        .bgland {
            width: 100%;
            min-height: 100vh;
            background: url("./assetsweb/img/bg4.png") top right no-repeat;
            background-size: cover;
            position: relative;
        }

        .bgland:before {
            content: "";
            background: rgba(126, 126, 126, 0.4);
            position: absolute;
            bottom: 0;
            top: 0;
            left: 0;
            right: 0;
        }

    </style>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>
<body>
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
<script src="http://localhost:8888/ketsa-mygdi/public/dist/js/adminlte.min.js"></script>
    <script src="http://localhost:8888/ketsa-mygdi/public/plugins/jquery/jquery.min.js"></script>
    <!-- Datatables -->
    <script src="http://localhost:8888/ketsa-mygdi/public/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="http://localhost:8888/ketsa-mygdi/public/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="http://localhost:8888/ketsa-mygdi/public/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="http://localhost:8888/ketsa-mygdi/public/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script src="http://localhost:8888/ketsa-mygdi/public/plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="http://localhost:8888/ketsa-mygdi/public/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="http://localhost:8888/ketsa-mygdi/public/dist/js/demo.js"></script>
    <!-- daterangepicker -->
    <script src="http://localhost:8888/ketsa-mygdi/public/plugins/moment/moment.min.js"></script>
    <script src="http://localhost:8888/ketsa-mygdi/public/plugins/daterangepicker/daterangepicker.js"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="http://localhost:8888/ketsa-mygdi/public/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            bsCustomFileInput.init();
        });
    </script>

    <!-- Vendor JS Files -->
    <script src="assetsweb/vendor/jquery.easing/jquery.easing.min.js"></script>
    <script src="assetsweb/vendor/php-email-form/validate.js"></script>
    <script src="assetsweb/vendor/waypoints/jquery.waypoints.min.js"></script>
    <script src="assetsweb/vendor/counterup/counterup.min.js"></script>
    <script src="assetsweb/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="assetsweb/vendor/venobox/venobox.min.js"></script>
    <script src="assetsweb/vendor/owl.carousel/owl.carousel.min.js"></script>
    <script src="assetsweb/vendor/typed.js/typed.min.js"></script>
    <script src="assetsweb/vendor/aos/aos.js"></script>

    <!-- Template Main JS File -->
    <script src="assetsweb/js/main.js"></script>
    </body>
</html>