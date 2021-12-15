@extends('layouts.app_ketsa_pdf')

@section('content')
    <link href="{{ asset('css/afiq_mygeo.css') }}" rel="stylesheet">
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
            padding: 0.7rem 1.5rem;
        }

        .card-title {
            margin-bottom: 0rem;
        }

        .card,
        .card-header:first-child {
            background-color: white;
            border-radius: 10px;
        }

    </style>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper" style="width:100%;">
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="pl-lg-3 pb-3">
                            <div class="row align-items-center">
                                <div class="col-5">
                                    <h1>
                                        <?php
                                        $metadataName = "";
                                        if (isset($metadataxml->identificationInfo->MD_DataIdentification->citation->CI_Citation->title->CharacterString) && $metadataxml->identificationInfo->MD_DataIdentification->citation->CI_Citation->title->CharacterString != '') {
                                            echo $metadataxml->identificationInfo->MD_DataIdentification->citation->CI_Citation->title->CharacterString;
                                            $metadataName = $metadataxml->identificationInfo->MD_DataIdentification->citation->CI_Citation->title->CharacterString;
                                        }
                                        ?>
                                    </h1>
                                </div>
                                <div class="col-7 text-right">
                                    <!--                            <a href="{{ url('downloadMetadataPdf') . '/' . $metadataSearched->id }}">
                                        <button type="button" class="btn btn-sm btn-default mr-2">Muat Turun PDF</button>
                                    </a>-->
                                    <a href="#">
                                        <button type="button" class="btn btn-sm btn-default mr-2 actionButtons"
                                            data-action="pdf">Muat Turun PDF</button>
                                    </a>
                                    <a href="#">
                                        <button type="button" class="btn btn-sm btn-default mr-2 actionButtons"
                                            data-action="excel"
                                            data-href='{{ url('downloadMetadataExcel') . '/' . $metadataSearched->id }}'>Muat
                                            Turun Excel</button>
                                    </a>
                                    <a href="#">
                                        <button type="button" class="btn btn-sm btn-default mr-2 actionButtons"
                                            data-action="xml"
                                            data-href='{{ url('downloadMetadataXml') . '/' . $metadataSearched->id . '/' . $metadataName }}'>Muat
                                            Turun XML</button>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <input type="hidden" name="metadata_id" value="{{ $metadataSearched->id }}">
                            <div class="card-body">
                                <div class="form-group row col-12 mb-0">
                                    <h4 class="ml-4">
                                        Category :
                                        <span class="text-capitalize">
                                            <?php
                                            $category = '';
                                            if (isset($metadataxml->hierarchyLevel->MD_ScopeCode) && $metadataxml->hierarchyLevel->MD_ScopeCode != '') {
                                                echo $metadataxml->hierarchyLevel->MD_ScopeCode;
                                                $category = $metadataxml->hierarchyLevel->MD_ScopeCode;
                                            }
                                            ?>
                                        </span>
                                        </p>
                                </div>
                                <div id="accordion" class="accordf">
                                    <?php //=== collapse1 =============================================================
                                    ?>
                                    @include('mygeo.metadata.pdf_metadata.general_information')
                                    <?php //=== collapse2 =============================================================
                                    ?>
                                    @include('mygeo.metadata.pdf_metadata.identification_information')
                                    <?php //=== collapse3 =============================================================
                                    ?>
                                    @include('mygeo.metadata.pdf_metadata.topic_category')
                                    <?php //=== collapse4 =============================================================
                                    ?>
                                    @include('mygeo.metadata.pdf_metadata.nominal_resolution')
                                    <?php //=== collapse5 =============================================================
                                    ?>
                                    @include('mygeo.metadata.pdf_metadata.process_step_information')
                                    <?php //=== collapse6 =============================================================
                                    ?>
                                    @include('mygeo.metadata.pdf_metadata.spatial_representation_information')
                                    <?php //=== collapse7 =============================================================
                                    ?>
                                    @include('mygeo.metadata.pdf_metadata.content_information')
                                    <?php //=== collapse8 =============================================================
                                    ?>
                                    @include('mygeo.metadata.pdf_metadata.aquisition_information')
                                    <?php //=== collapse9 =============================================================
                                    ?>
                                    @include('mygeo.metadata.pdf_metadata.spatial_domain')
                                    <?php //=== collapse10 =============================================================
                                    ?>
                                    @include('mygeo.metadata.pdf_metadata.browsing_information')
                                    <?php //=== collapse11 =============================================================
                                    ?>
                                    @include('mygeo.metadata.pdf_metadata.distribution_information')
                                    <?php //=== collapse12 =============================================================
                                    ?>
                                    @include('mygeo.metadata.pdf_metadata.data_set_identification')
                                    <?php //=== collapse13 =============================================================
                                    ?>
                                    @include('mygeo.metadata.pdf_metadata.reference_system_information')
                                    <?php //=== collapse14 =============================================================
                                    ?>
                                    @include('mygeo.metadata.pdf_metadata.constraints')
                                    <?php //=== collapse15 =============================================================
                                    ?>
                                    @include('mygeo.metadata.pdf_metadata.data_quality')
                                    <?php //=== collapse16 =============================================================
                                    ?>
                                    @if (count($customMetadataInput) > 0)
                                        @include('mygeo.metadata.pdf_metadata.custom_input')
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <script>
        $(document).ready(function() {
            $(document).on('click', '.actionButtons', function() {
                if ($(this).data('action') == 'pdf') {
                    $('.actionButtons').hide();
                    document.title = '{{ $metadataName }}';
                    window.print();
                } else if ($(this).data('action') == 'xml') {
                    window.open($(this).data('href'), '_blank');
                } else if ($(this).data('action') == 'excel') {
                    window.open($(this).data('href'), '_blank');
                }
            });

            window.onafterprint = function() {
                $('.actionButtons').show();
            }

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
                $('#refsys_projection,#refsys_semiMajorAxis,#refsys_ellipsoid,#refsys_axis_units,#refsys_datum,#refsys_denomFlatRatio')
                    .prop('readonly', true);
                $('.divDataQualityTabs').show();
                $('.divUseLimitation').hide();
                $('.divMaintenanceInfo').hide();
            } else if (kategori.toLowerCase() == "services") {
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
                $('#refsys_projection,#refsys_semiMajorAxis,#refsys_ellipsoid,#refsys_axis_units,#refsys_datum,#refsys_denomFlatRatio')
                    .prop('readonly', false);
                $('.divDataQualityTabs').hide();
                $('.divUseLimitation').show();
                $('.divMaintenanceInfo').hide();
            } else if (kategori.toLowerCase() == "gridded") {
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
                $('#refsys_projection,#refsys_semiMajorAxis,#refsys_ellipsoid,#refsys_axis_units,#refsys_datum,#refsys_denomFlatRatio')
                    .prop('readonly', true);
                $('.divDataQualityTabs').show();
                $('.divUseLimitation').hide();
                $('.divMaintenanceInfo').show();
            } else if (kategori.toLowerCase() == "imagery") {
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
                $('#refsys_projection,#refsys_semiMajorAxis,#refsys_ellipsoid,#refsys_axis_units,#refsys_datum,#refsys_denomFlatRatio')
                    .prop('readonly', true);
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
    $westBoundLongitude = "";
    if(isset($metadataxml->identificationInfo->MD_DataIdentification->extent->EX_Extent->geographicElement->EX_GeographicBoundingBox->westBoundLongitude->Decimal)){
        $westBoundLongitude = $metadataxml->identificationInfo->MD_DataIdentification->extent->EX_Extent->geographicElement->EX_GeographicBoundingBox->westBoundLongitude->Decimal;
    }elseif(isset($metadataxml->identificationInfo->SV_ServiceIdentification->extent->EX_Extent->geographicElement->EX_GeographicBoundingBox->westBoundLongitude->Decimal)){
        $westBoundLongitude = $metadataxml->identificationInfo->SV_ServiceIdentification->extent->EX_Extent->geographicElement->EX_GeographicBoundingBox->westBoundLongitude->Decimal;
    }

    $eastBoundLongitude = "";
    if(isset($metadataxml->identificationInfo->MD_DataIdentification->extent->EX_Extent->geographicElement->EX_GeographicBoundingBox->eastBoundLongitude->Decimal)){
        $eastBoundLongitude = $metadataxml->identificationInfo->MD_DataIdentification->extent->EX_Extent->geographicElement->EX_GeographicBoundingBox->eastBoundLongitude->Decimal;
    }elseif(isset($metadataxml->identificationInfo->SV_ServiceIdentification->extent->EX_Extent->geographicElement->EX_GeographicBoundingBox->eastBoundLongitude->Decimal)){
        $eastBoundLongitude = $metadataxml->identificationInfo->SV_ServiceIdentification->extent->EX_Extent->geographicElement->EX_GeographicBoundingBox->eastBoundLongitude->Decimal;
    }

    $southBoundLatitude = "";
    if(isset($metadataxml->identificationInfo->MD_DataIdentification->extent->EX_Extent->geographicElement->EX_GeographicBoundingBox->southBoundLatitude->Decimal)){
        $southBoundLatitude = $metadataxml->identificationInfo->MD_DataIdentification->extent->EX_Extent->geographicElement->EX_GeographicBoundingBox->southBoundLatitude->Decimal;
    }elseif(isset($metadataxml->identificationInfo->SV_ServiceIdentification->extent->EX_Extent->geographicElement->EX_GeographicBoundingBox->southBoundLatitude->Decimal)){
        $southBoundLatitude = $metadataxml->identificationInfo->SV_ServiceIdentification->extent->EX_Extent->geographicElement->EX_GeographicBoundingBox->southBoundLatitude->Decimal;
    }

    $northBoundLatitude = "";
    if(isset($metadataxml->identificationInfo->MD_DataIdentification->extent->EX_Extent->geographicElement->EX_GeographicBoundingBox->northBoundLatitude->Decimal)){
        $northBoundLatitude = $metadataxml->identificationInfo->MD_DataIdentification->extent->EX_Extent->geographicElement->EX_GeographicBoundingBox->northBoundLatitude->Decimal;
    }elseif(isset($metadataxml->identificationInfo->SV_ServiceIdentification->extent->EX_Extent->geographicElement->EX_GeographicBoundingBox->northBoundLatitude->Decimal)){
        $northBoundLatitude = $metadataxml->identificationInfo->SV_ServiceIdentification->extent->EX_Extent->geographicElement->EX_GeographicBoundingBox->northBoundLatitude->Decimal;
    }
    ?>

    <script>
        var N = "<?php echo $northBoundLatitude; ?>";
        var W = "<?php echo $westBoundLongitude; ?>";
        var S = "<?php echo $southBoundLatitude; ?>";
        var E = "<?php echo $eastBoundLongitude; ?>";

        var map = L.map('map').setView([5.3105, 107.3854408], 5);

        L.tileLayer(
            'https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
                maxZoom: 18,
                attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, ' +
                    'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
                id: 'mapbox/streets-v11',
                tileSize: 512,
                zoomOffset: -1,
            }).addTo(map);
        map.dragging.disable();
        map.touchZoom.disable();
        map.doubleClickZoom.disable();
        map.scrollWheelZoom.disable();
        map.boxZoom.disable();
        map.keyboard.disable();
        if (map.tap) map.tap.disable();
        document.getElementById('map').style.cursor = 'default';
        $(".leaflet-control-zoom").css("visibility", "hidden");
        $(".leaflet-top").hide();

        var setNbltValue = document.getElementById("nblt").value = N;
        var setWblgValue = document.getElementById("wblg").value = W;
        var serSbltValue = document.getElementById("sblt").value = S;
        var setEblgValue = document.getElementById("eblg").value = E;

        // To trigger onchange function
        var el = document.getElementById('nblt');
        el.dispatchEvent(new Event('change'));

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

                showRectangle(nbltValue, wblgValue, sbltValue, eblgValue)
            }
        }

        function searchLocation() {
            var markerIcon = L.icon({
                iconUrl: 'css/leaflet@1.7.1/images/marker-icon-2x.png',
                iconSize: [30, 53], // size of the icon [width, height] in px
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


        function showRectangle(nblt, wblg, sblt, eblg) {
            var rectangle;

            L.tileLayer(
                'https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
                    maxZoom: 18,
                    attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, ' +
                        'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
                    id: 'mapbox/streets-v11',
                    tileSize: 512,
                    zoomOffset: -1,
                }).addTo(map);

            var bounds = [
                [nblt, wblg],
                [sblt, eblg]
            ];

            rectangle = L.rectangle(bounds).addTo(map);

            var zoomToRectangle = L.rectangle(bounds).addTo(map).getCenter();

            map.fitBounds(bounds);
        }

        function cleaLayer() {
            map.eachLayer((layer) => {
                layer.remove();
            });

            L.tileLayer(
                'https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
                    maxZoom: 18,
                    attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, ' +
                        'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
                    id: 'mapbox/streets-v11',
                    tileSize: 512,
                    zoomOffset: -1
                }).addTo(map);
        }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
@stop
