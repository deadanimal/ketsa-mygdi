@extends('layouts.app_mygeo_afiq')

@section('content')
<link href="{{ asset('css/afiq_mygeo.css')}}" rel="stylesheet">
<style>
    .card-primary:not(.card-outline)>.card-header {
        background-color: #b3ecff;
        color: black;
    }

    .card-primary:not(.card-outline)>.card-header a {
        color: black;
    }

    .p-2 {
        width: 150px;
    }

    .p-8 {
        width: 285px;
        padding-bottom: 3px;
    }

    .card-header {
        padding: 0.5rem 1.5rem;
    }

    .card-title {
        margin-bottom: 0rem;
    }

    .card,
    .card-header:first-child {
        background-color: white;
        border-radius: 10px;
    }

    .text-error{
        color:red;
        font-size: 12px;
        float: right;
    }
</style>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <section class="header">
        <div class="container-fluid">
            <div class="header-body">
                <div class="row align-items-center p-3 py-4">
                    <div class="col-lg-6 col-7">
                        <h6 class="h2 text-dark d-inline-block mb-0">Pengisian Metadata</h6>

                        <nav aria-label="breadcrumb" class=" d-none d-md-inline-block ml-md-4">
                            <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                                <li class=" breadcrumb-item">
                                    <a href="javascript:void(0)"> <i class="fas fa-home text-dark"> </i> </a>
                                </li>
                                <li aria-current="page" class="breadcrumb-item active">
                                    Pengisian Metadata
                                </li>
                            </ol>
                        </nav>
                    </div>
                    <div class="col-lg-6 col-5 text-right">
                        <button type="button" class="btn btn-dark float-right" data-toggle="modal" data-target="#modal-muat-naik-xml">
                            <?php echo __('lang.btn_upload_xml'); ?>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!--===== MODALS =====-->
    <div class="modal fade" id="modal-muat-naik-xml">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="POST" action="{{ url('muat_naik_xml') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="row mb-2">
                                        <div class="col-3">
                                            <label class="form-control-label mr-4" for="file_xml">
                                                Muat Naik Fail XML
                                            </label>
                                        </div>
                                        <div class="col-8">
                                            <input class="form-control ml-3" id="file_xml" type="file" name="file_xml" />
                                            <p class="error-message"><span></span></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer justify-content-between1">
                        <button type="submit" class="btn btn-primary" id="btn_muat_naik_xml">Muat Naik</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 my-2">
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                </div>
                <div class="col-12">
                    <div class="card">
                        <form method="post" class="form-horizontal" id="form_metadata" action="{{url('store_metadata')}}" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <!-- <div class="form-group row"> -->
                                <div class="clearfix">
                                    <p id="lbl_kategori"><?php echo __('lang.metadata_category'); ?> : &nbsp;&nbsp;&nbsp;</p>
                                    <select name="kategori" id="kategori" class="form-control float-left" style="width:175px;">
                                        <option selected disabled><?php echo __('lang.dropdown_choose'); ?></option>
                                        <?php
                                        if (count($categories) > 0) {
                                            foreach ($categories as $cat) {
                                                ?><option value="<?php echo $cat->name; ?>"><?php echo $cat->name; ?></option><?php
                                            }
                                        }
                                        ?>
                                    </select>
                                    &nbsp;&nbsp;&nbsp;
                                    <div class="btn-group btn-group-toggle float-right" data-toggle="buttons">
                                        <label class="btn btn-secondary active">
                                            <img src="{{ url('/img/flagMalaysia.jpeg') }}" alt="User Avatar">
                                            <input type="radio" name="flanguage" value="bm" {{ (isset($_GET['bhs']) && $_GET['bhs'] == 'bm' ? 'checked':'') }}>BM
                                        </label>
                                        <label class="btn btn-secondary">
                                            <img src="{{ url('/img/flagUnitedKingdom.jpeg') }}" alt="User Avatar">
                                            <input type="radio" name="flanguage" value="en" {{ (isset($_GET['bhs']) && $_GET['bhs'] == 'en' ? 'checked':'') }}>ENG
                                        </label>
                                    </div>
                                </div>
                                <br>
                                <!-- </div> -->
                                <div id="accordion" class="accordf">
                                    <?php //=== collapse1 =============================================================
                                    ?>
                                    @include('mygeo.metadata.pengisian_metadata.general_information')
                                    <?php //=== collapse2 =============================================================
                                    ?>
                                    @include('mygeo.metadata.pengisian_metadata.identification_information')
                                    <?php //=== collapse3 =============================================================
                                    ?>
                                    @include('mygeo.metadata.pengisian_metadata.topic_category')
                                    <?php //=== collapse4 =============================================================
                                    ?>
                                    @include('mygeo.metadata.pengisian_metadata.nominal_resolution')
                                    <?php //=== collapse5 =============================================================
                                    ?>
                                    @include('mygeo.metadata.pengisian_metadata.process_step_information')
                                    <?php //=== collapse6 =============================================================
                                    ?>
                                    @include('mygeo.metadata.pengisian_metadata.spatial_representation_information')
                                    <?php //=== collapse7 =============================================================
                                    ?>
                                    @include('mygeo.metadata.pengisian_metadata.content_information')
                                    <?php //=== collapse8 =============================================================
                                    ?>
                                    @include('mygeo.metadata.pengisian_metadata.aquisition_information')
                                    <?php //=== collapse9 =============================================================
                                    ?>
                                    @include('mygeo.metadata.pengisian_metadata.spatial_domain')
                                    <?php //=== collapse10 =============================================================
                                    ?>
                                    @include('mygeo.metadata.pengisian_metadata.browsing_information')
                                    <?php //=== collapse11 =============================================================
                                    ?>
                                    @include('mygeo.metadata.pengisian_metadata.distribution_information')
                                    <?php //=== collapse12 =============================================================
                                    ?>
                                    @include('mygeo.metadata.pengisian_metadata.data_set_identification')
                                    <?php //=== collapse13 =============================================================
                                    ?>
                                    @include('mygeo.metadata.pengisian_metadata.reference_system_information')
                                    <?php //=== collapse14 =============================================================
                                    ?>
                                    @include('mygeo.metadata.pengisian_metadata.constraints')
                                    <?php //=== collapse15 =============================================================
                                    ?>
                                    @include('mygeo.metadata.pengisian_metadata.data_quality')
                                </div>
                                <div id="div_action_buttons">
                                    <input type="submit" name="btn_draf" value="Simpan" class="btn btn-primary btnDraf">
                                    <input type="submit" name="btn_save" value="Hantar" class="btn btn-success btnSave">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<script>
    $("#c2_metadataName").focusout(function(){
        var metadataName = $(this).val();
        var thisVal = $(this);
        $.ajax({
            method: "POST",
            url: "validateMetadataName",
            data: {"_token": "{{ csrf_token() }}", "metadataName": metadataName},
        }).done(function (response) {
            if(response == "found"){
                alert('Nama metadata sudah wujud');
                $('.btnDraf').prop('disabled',true);
                $('.btnSave').prop('disabled',true);
            }else{
                $('.btnDraf').prop('disabled',false);
                $('.btnSave').prop('disabled',false);
            }
        });
    });
    var pengesahs = [];

    $(document).ready(function() {
        $('#accordion').hide();
        <?php
        if (isset($_GET['bhs']) && $_GET['bhs'] != "") {
            ?>
            $('#kategori').show();
            $('#lbl_kategori').show();
        <?php
        } else {
            ?>
            $('#kategori').hide();
            $('#lbl_kategori').hide();
        <?php
        }
        ?>
        <?php
        if (empty($pengesahs)) {
            ?>
            alert('Tiada pengesah dari bahagian sama dijumpai');
            $('#kategori').hide();
            $('#lbl_kategori').hide();
            $("#accordion").hide();
        <?php
        }
        ?>
        $('#div_action_buttons').hide();

        $('#c15_date_div,#c15_t1_commission_date_div,#c15_t2_conceptual_date_div,#c15_t3_absExt_date_div,#c15_t4_accuTimeMeasure_date_div,c15_t5_classCorrect_date_div').datetimepicker({
            format: 'DD/MM/YYYY',
            format: 'L'
        });

        $('input:radio[name="flanguage"]').change(function() {
            if ($(this).val() == 'bm') {
                var url = '{{ url("/mygeo_pengisian_metadata") }}';
                url += '?bhs=bm'
                window.location.href = url;
            } else if ($(this).val() == 'en') {
                var url = '{{ url("/mygeo_pengisian_metadata") }}';
                url += '?bhs=en'
                window.location.href = url;
            }
        });

        <?php
        if (count($categories) > 0) {
            $type = (isset($metadata->hierarchyLevel->MD_ScopeCode) ? $metadata->hierarchyLevel->MD_ScopeCode : "");
            if (isset($type) && $type != "" && (strtolower($type) == "dataset" || strtolower($type) == "services")) {
                ?>
                $(".div_c4, .div_c5, .div_c6, .div_c7, .div_c8").hide();
            <?php
                } elseif (isset($type) && $type != "" && (strtolower($type) == "imagery" || strtolower($type) == "gridded")) {
                    ?>
                $(".div_c4, .div_c5, .div_c6, .div_c7, .div_c8").show();
        <?php
            }
        }
        ?>

        $(document).on('change', '#kategori', function() {
            var kategori = $(this).val();
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
        
        $(document).on('change', '#c2_product_type', function() {
            var type = $(this).val();
            if (type == "Application") {
                $('#c2_abstract').attr('placeholder','Nama Aplikasi – Tujuan – Tahun Pembangunan – Kemaskini – Data Terlibat – Sasaran Pengguna – Versi – Perisian Yang Digunakan Dalam Pembangunan');
            }else if (type == "Document") {
                $('#c2_abstract').attr('placeholder','Nama Dokumen – Tujuan – Tahun Terbitan – Edisi');
            }else if (type == "GIS Activity/Project") {
                $('#c2_abstract').attr('placeholder','Nama Aktiviti –Tujuan – Lokasi – Tahun');
            }else if (type == "Map") {
                $('#c2_abstract').attr('placeholder','Nama Peta – Kawasan - Tujuan – Tahun Terbitan – Edisi – No. Siri – Skala – Unit ');
            }else if (type == "Raster Data") {
                $('#c2_abstract').attr('placeholder','Nama Data - Lokasi - Rumusan Tentang Data - Tujuan Data - Kaedah Penyediaan Data – Format - Unit – Skala - Status Data - Tahun Perolehan - Jenis Satelit – Format – Resolusi - Kawasan Litupan');
            }else if (type == "Services") {
                $('#c2_abstract').attr('placeholder','Nama Servis – Lokasi – Tujuan – Data Yang Terlibat – Polisi –Peringkat Capaian- Format');
            }else if (type == "Software") {
                $('#c2_abstract').attr('placeholder','Nama Perisian – Versi- Tujuan – Tahun Penggunaan Perisian – Kaedah Perolehan – Format – Pengeluar – Keupayaan -Data Yang Terlibat –Keperluan Perkakasan');
            }else if (type == "Vector Data") {
                $('#c2_abstract').attr('placeholder','Nama Data - Lokasi - Rumusan Tentang Data - Tujuan Data - Kaedah Penyediaan Data – Format - Unit – Skala - Status Data');
            }
        });

        <?php
        if (!is_null(old('kategori'))) {
            ?>
            $("#kategori").val("{{old('kategori')}}").trigger('change');
        <?php
        }
        ?>
    });
</script>

<script>
    // Set map extent:  Malaysia
    // Map center setView(latitude, longitude, zoomlevel)
    // Below set view was using hardcoded values
    var map = L.map('map').setView([5.3105, 107.3854408], 5);

    L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
        maxZoom: 18,
        attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, ' +
            'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
        id: 'mapbox/streets-v11',
        tileSize: 512,
        zoomOffset: -1
    }).addTo(map);

    drawRectangleEditor();
    searchLocation();

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
            iconUrl: "{{ asset('intecxmap/css/leaflet@1.7.1/images/marker-icon-2x.png') }}",
            iconSize: [30, 53], // size of the icon [width, height] in px
            // shadowSize:   [50, 64], // size of the shadow
            iconAnchor: [22, 94], // point of the icon which will correspond to marker's location
        });

        var searchControl = new L.esri.Controls.Geosearch().addTo(map);
        var results = new L.LayerGroup().addTo(map);

        searchControl.on('results', function(data) {
            results.clearLayers();
            for (var i = data.results.length - 1; i >= 0; i--) {
                console.log(data.results[i].latlng.lat);
                L.marker([data.results[i].latlng.lat, data.results[i].latlng.lng], {
                    icon: markerIcon
                }).addTo(map);
            }
        });
    }

    function drawRectangleEditor() {
        // Initialise the FeatureGroup to store editable layers
        var editableLayers = new L.FeatureGroup();
        map.addLayer(editableLayers);

        var drawPluginOptions = {
            position: 'topright',
            edit: {
                edit: false,
                featureGroup: editableLayers, //REQUIRED!!
                remove: false
            },
            draw: {
                rectangle: {
                    allowIntersection: false, // Restricts shapes to simple polygons
                    drawError: {
                        color: '#e1e100', // Color the shape will turn when intersects
                        message: '<strong>Oh snap!<strong> you can\'t draw that!' // Message that will show when intersect
                    },
                    shapeOptions: {
                        color: '#97009c'
                    }
                },
                // disable toolbar item by setting it to false
                polygon: false,
                polyline: false,
                circle: false, // Turns off this drawing tool
                rectangle: true,
                marker: false,
            }
        };

        // Initialise the draw control and pass it the FeatureGroup of editable layers
        var drawControl = new L.Control.Draw(drawPluginOptions);
        map.addControl(drawControl);

        var editableLayers = new L.FeatureGroup();
        map.addLayer(editableLayers);

        map.on('draw:created', function(e) {
            var type = e.layerType,
                layer = e.layer;

            var coordinatesData = layer.getLatLngs();

            var drawNblt = coordinatesData[0][1];
            var drawWblg = coordinatesData[0][1];
            var drawSblt = coordinatesData[0][3];
            var drawEblg = coordinatesData[0][3];

            var setNbltValue = document.getElementById("nblt").value = drawNblt.lat;
            var setWblgValue = document.getElementById("wblg").value = drawWblg.lng;
            var serSbltValue = document.getElementById("sblt").value = drawSblt.lat;
            var setEblgValue = document.getElementById("eblg").value = drawEblg.lng;

            var el = document.getElementById('nblt');
            el.dispatchEvent(new Event('change'));

            editableLayers.addLayer(layer);
        });
    }

    function showRectangle(nblt, wblg, sblt, eblg) {
        var rectangle;

        L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
            maxZoom: 18,
            attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, ' +
                'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
            id: 'mapbox/streets-v11',
            tileSize: 512,
            zoomOffset: -1
        }).addTo(map);

        var bounds = [
            [nblt, wblg],
            [sblt, eblg]
        ];
        rectangle = L.rectangle(bounds).addTo(map);
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

        var data = ["North Bound Latitude: " + nbltValue, "West Bound Longitude: " + wblgValue, "South Bound Latitude: " + sbltValue, "East Bound Longitude: " + eblgValue];
        alert(data);
    }
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
@stop
