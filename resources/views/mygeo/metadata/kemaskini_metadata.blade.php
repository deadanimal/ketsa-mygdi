@extends('layouts.app_mygeo_afiq')

@section('content')

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

    .accordf .card-title {
        width: 85%;
    }

    .card-header {
        padding: 0.5rem 1.5rem;
    }

    .card-title {
        margin-bottom: 0rem;
    }
</style>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <section class="header">
        <div class="container-fluid">
            <div class="header-body">
                <div class="row align-items-center p-3 py-4">
                    <div class="col-lg-6 col-7">
                        <h6 class="h2 text-dark d-inline-block mb-0">Kemas Kini Metadata</h6>

                        <nav aria-label="breadcrumb" class=" d-none d-md-inline-block ml-md-4">
                            <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                                <li class=" breadcrumb-item">
                                    <a href="javascript:void(0)"> <i class="fas fa-home text-dark"> </i> </a>
                                </li>
                                <li aria-current="page" class="breadcrumb-item active">
                                    Kemas Kini Metadata
                                </li>
                            </ol>
                        </nav>
                    </div>
                    <div class="col-lg-6 col-5 text-right">

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
                <div class="card-body">
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    <h1 class="float-left">Kemaskini Metadata</h1>
                    <button type="button" class="btn btn-dark float-right" data-toggle="modal" data-target="#modal-muat-naik-xml">
                        <?php echo __('lang.btn_upload_xml'); ?>
                    </button>
                </div>
                <div class="col-12">
                    <div class="card">
                        <form method="post" class="form-horizontal" id="form_metadata" action="{{url('simpan_kemaskini_metadata')}}" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="metadata_id" value="{{ $metadataSearched->id }}">
                            @if(auth::user()->hasRole(['Penerbit Metadata','Pengesah Metadata','Super Admin']))
                            @include('mygeo.metadata.modal_metadata.modal_catatan')
                            @endif
                            <div class="card-body">
                                <!-- <div class="form-group row"> -->
                                <div class="clearfix">
                                    <p id="lbl_kategori"><?php echo __('lang.metadata_category'); ?> : &nbsp;&nbsp;&nbsp;</p>
                                    <select name="kategori" id="kategori" class="form-control float-left" style="width:175px;">
                                        <option disabled><?php echo __('lang.dropdown_choose'); ?></option>
                                        <?php
                                        if (count($categories) > 0) {
                                            $catSelected = "";
                                            if (isset($metadataxml->categoryTitle) && $metadataxml->categoryTitle != "") {
                                                $catSelected = strtolower(trim($metadataxml->categoryTitle));
                                            }
                                            foreach ($categories as $cat) {
                                                if (strtolower(trim($cat->name)) == $catSelected) {
                                                    ?><option value="<?php echo $cat->name; ?>" selected><?php echo $cat->name; ?></option><?php
                                                                                                                                    } else {
                                                                                                                                        ?><option value="<?php echo $cat->name; ?>"><?php echo $cat->name; ?></option><?php
                                                                                                                            }
                                                                                                                        }
                                                                                                                    }
                                                                                                                    ?>
                                    </select>
                                    &nbsp;&nbsp;&nbsp;
                                    <div class="btn-group btn-group-toggle float-right" data-toggle="buttons">
                                        <label class="btn btn-secondary active">
                                            <img src="{{ url('/img/flagMalaysia.jpeg') }}" alt="User Avatar">
                                            <input type="radio" name="flanguage" value="bm" {{ (isset($_GET['bhs']) && $_GET['bhs'] == 'bm' ? 'checked':'') }} {{ (!isset($_GET['bhs']) ? 'checked':'') }}>BM
                                        </label>
                                        <label class="btn btn-secondary">
                                            <img src="{{ url('/img/flagUnitedKingdom.jpeg') }}" alt="User Avatar">
                                            <input type="radio" name="flanguage" value="en" {{ (isset($_GET['bhs']) && $_GET['bhs'] == 'en' ? 'checked':'') }}>ENG
                                        </label>
                                    </div>
                                </div>
                                <br>
                                <div id="accordion" class="accordf">
                                    <?php //=== collapse1 =============================================================
                                    ?>
                                    @include('mygeo.metadata.kemaskini_metadata.general_information')
                                    <?php //=== collapse2 =============================================================
                                    ?>
                                    @include('mygeo.metadata.kemaskini_metadata.identification_information')
                                    <?php //=== collapse3 =============================================================
                                    ?>
                                    @include('mygeo.metadata.kemaskini_metadata.topic_category')
                                    <?php //=== collapse4 =============================================================
                                    ?>
                                    @include('mygeo.metadata.kemaskini_metadata.nominal_resolution')
                                    <?php //=== collapse5 =============================================================
                                    ?>
                                    @include('mygeo.metadata.kemaskini_metadata.process_step_information')
                                    <?php //=== collapse6 =============================================================
                                    ?>
                                    @include('mygeo.metadata.kemaskini_metadata.spatial_representation_information')
                                    <?php //=== collapse7 =============================================================
                                    ?>
                                    @include('mygeo.metadata.kemaskini_metadata.content_information')
                                    <?php //=== collapse8 =============================================================
                                    ?>
                                    @include('mygeo.metadata.kemaskini_metadata.aquisition_information')
                                    <?php //=== collapse9 =============================================================
                                    ?>
                                    @include('mygeo.metadata.kemaskini_metadata.spatial_domain')
                                    <?php //=== collapse10 =============================================================
                                    ?>
                                    @include('mygeo.metadata.kemaskini_metadata.browsing_information')
                                    <?php //=== collapse11 =============================================================
                                    ?>
                                    @include('mygeo.metadata.kemaskini_metadata.distribution_information')
                                    <?php //=== collapse12 =============================================================
                                    ?>
                                    @include('mygeo.metadata.kemaskini_metadata.data_set_identification')
                                    <?php //=== collapse13 =============================================================
                                    ?>
                                    @include('mygeo.metadata.kemaskini_metadata.reference_system_information')
                                    <?php //=== collapse14 =============================================================
                                    ?>
                                    @include('mygeo.metadata.kemaskini_metadata.constraints')
                                    <?php //=== collapse15 =============================================================
                                    ?>
                                    @include('mygeo.metadata.kemaskini_metadata.data_quality')
                                </div>
                                <div id="div_action_buttons">
                                    @if(auth::user()->hasRole(['Penerbit Metadata','Super Admin']))
                                    <input type="submit" name="btn_draf" value="Simpan" class="btn btn-primary">
                                    @endif
                                    <input type="submit" name="btn_save" value="Hantar" class="btn btn-success">
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
    var pengesahs = [];

    $(document).ready(function() {
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

        $('#c15_date_div,#c15_t1_commission_date_div,#c15_t2_conceptual_date_div,#c15_t3_absExt_date_div,#c15_t4_accuTimeMeasure_date_div,c15_t5_classCorrect_date_div').datetimepicker({
            format: 'DD/MM/YYYY',
            format: 'L'
        });

        $('input:radio[name="flanguage"]').change(function() {
            if ($(this).val() == 'bm') {
                var url = '{{ url("/kemaskini_metadata/$metadataSearched->id") }}';
                url += '?bhs=bm'
                window.location.href = url;
            } else if ($(this).val() == 'en') {
                var url = '{{ url("/kemaskini_metadata/$metadataSearched->id") }}';
                url += '?bhs=en'
                window.location.href = url;
            }
        });

        <?php
        if ($catSelected == "dataset" || $catSelected == "services") {
            ?>
            $(".div_c4, .div_c5, .div_c6, .div_c7, .div_c8").hide();
        <?php
        } elseif ($catSelected == "imagery" || $catSelected == "gridded") {
            ?>
            $(".div_c4, .div_c5, .div_c6, .div_c7, .div_c8").show();
        <?php
        }
        ?>

        $(document).on('change', '#kategori', function() {
            var kategori = $(this).val();
            if (kategori.toLowerCase() == "dataset" || kategori.toLowerCase() == "services") {
                $(".div_c4, .div_c5, .div_c6, .div_c7, .div_c8").hide();
                $('#accordion').show();
            } else if (kategori.toLowerCase() == "imagery" || kategori.toLowerCase() == "gridded") {
                $(".div_c4, .div_c5, .div_c6, .div_c7, .div_c8").show();
                $('#accordion').show();
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
