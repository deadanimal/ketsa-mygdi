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
              <h1>
                <?php 
                if(isset($metadataxml->identificationInfo->SV_ServiceIdentification->citation->CI_Citation->title->CharacterString) && $metadataxml->identificationInfo->SV_ServiceIdentification->citation->CI_Citation->title->CharacterString != ""){
                  echo $metadataxml->identificationInfo->SV_ServiceIdentification->citation->CI_Citation->title->CharacterString;
                }
                ?>
              </h1>
            <div class="card">
                <input type="hidden" name="metadata_id" value="{{ $metadataSearched->id }}">
                <div class="card-body">
                  <div class="form-group row">
                    <p>
                        Category:
                        <?php
                        if(isset($metadataxml->categoryTitle->categoryItem->CharacterString) && $metadataxml->categoryTitle->categoryItem->CharacterString != ""){
                            echo $metadataxml->categoryTitle->categoryItem->CharacterString;
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
  });
</script>

<script>
  // Set map extent:  Malaysia
  // Map center setView(latitude, longitude, zoomlevel)
  // Below set view was using hardcoded values
  var map = L.map('map').setView([5.3105,107.3854408], 5);

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

      console.log("all onchange: "+wblgValue+","+eblgValue+","+nbltValue+","+sbltValue);
      showRectangle(nbltValue, wblgValue, sbltValue, eblgValue)
    }
  }

  function searchLocation() {
    var markerIcon = L.icon({
        iconUrl: "{{ asset('intecxmap/css/leaflet@1.7.1/images/marker-icon-2x.png') }}",
        iconSize:     [30, 53], // size of the icon [width, height] in px
        // shadowSize:   [50, 64], // size of the shadow
        iconAnchor:   [22, 94], // point of the icon which will correspond to marker's location
    });

    var searchControl = new L.esri.Controls.Geosearch().addTo(map);
    var results = new L.LayerGroup().addTo(map);

    searchControl.on('results', function(data){
        results.clearLayers();
        for (var i = data.results.length - 1; i >= 0; i--) {
          console.log(data.results[i].latlng.lat);
          L.marker([data.results[i].latlng.lat,data.results[i].latlng.lng], {icon: markerIcon}).addTo(map);
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
        polygon:false,
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

        var setNbltValue = document.getElementById("nblt").value =  drawNblt.lat;
        var setWblgValue = document.getElementById("wblg").value =  drawWblg.lng;
        var serSbltValue = document.getElementById("sblt").value =  drawSblt.lat;
        var setEblgValue = document.getElementById("eblg").value =  drawEblg.lng;

        var el = document.getElementById('nblt');
        el.dispatchEvent(new Event('change'));

        editableLayers.addLayer(layer);
    }); 
  }

  function showRectangle(nblt, wblg, sblt, eblg)  {
    var rectangle;
 
    L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
      maxZoom: 18,
      attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, ' +
        'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
      id: 'mapbox/streets-v11',
      tileSize: 512,
      zoomOffset: -1
    }).addTo(map);

    var bounds = [[nblt, wblg], [sblt, eblg]];
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

    var data = ["North Bound Latitude: "+nbltValue, "West Bound Longitude: "+wblgValue,"South Bound Latitude: "+sbltValue,"East Bound Longitude: "+eblgValue];
    alert(data);
  }
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
@stop
