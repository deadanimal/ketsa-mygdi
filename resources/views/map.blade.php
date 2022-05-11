@extends('layouts.app')

@section('content')
  <div class="content-wrapper">
    <div class="content-header">
      <div class="container">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Map</h1>
          </div>
        </div>
      </div>
    </div>
    <div class="content">
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <div class="card" style="height:486px;">
              <div class="card-header">
                <h5 class="card-title m-0">Map</h5>
              </div>
              <div class="card-body">
                <div class="float-right col-lg-2">
                  West Bound Longitude: <input type="text" id="west_bound_longitude" value="101.68,2.91"> <br>
                  East Bound Longitude: <input type="text" id="east_bound_longitude" value="101.68,2.93"> <br>
                  South Bound Latitude: <input type="text" id="south_bound_latitude" value="101.66,2.91"> <br>
                  North Bound Latitude: <input type="text" id="north_bound_latitude" value="101.66,2.93"> <br>
                  <br>
                  <button type="button" id="btn_set_area" class="btn btn-block btn-primary">Set</button>
                  <button type="button" id="btn_reset_map" class="btn btn-block btn-primary">Reset Map</button>
                </div>
                <div id="map" style="width:70%;height:400px;margin-top:66px;"></div>
                <div class="calculation-box" style="top:254px;">
                    <p>Draw a polygon using the draw tools.</p>
                    <div id="calculated-area"></div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

<script src="https://api.tiles.mapbox.com/mapbox.js/plugins/turf/v3.0.11/turf.min.js"></script>
<script src="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-draw/v1.2.0/mapbox-gl-draw.js"></script>
<script>
    // TO MAKE THE MAP APPEAR YOU MUST
    // ADD YOUR ACCESS TOKEN FROM
    // https://account.mapbox.com
    mapboxgl.accessToken = 'pk.eyJ1IjoiZmFyaGFucmkiLCJhIjoiY2tqd2p2cGtxMDJ2ODMzb3l5OTJuMjJ6ZSJ9.OsdgNMv2XB-tkWx_Ug4ivg';
    var map = new mapboxgl.Map({
        container: 'map', // container id
        style: 'mapbox://styles/mapbox/streets-v11', //hosted style id
        center: [101.68,2.91], // starting position
        zoom: 0 // starting zoom
    });
 
    var draw = new MapboxDraw({
        displayControlsDefault: false,
            controls: {
            polygon: true,
            trash: true
        }
    });

    var langlat = []; //coordinates of the user created polygon. currently unused.

    map.addControl(
      new MapboxGeocoder({
        accessToken: mapboxgl.accessToken,
        mapboxgl: mapboxgl
      })
    );
    map.addControl(draw);
    map.addControl(new mapboxgl.FullscreenControl());
    map.addControl(new mapboxgl.NavigationControl());
    map.on('draw.create', updateArea);
    map.on('draw.delete', updateArea);
    map.on('draw.update', updateArea);
    map.on('click', function (e) {
      langlat.push(JSON.stringify(e.lngLat.wrap()));
    });




    function updateArea(e) {
      console.log(e);
        var data = draw.getAll();
        var answer = document.getElementById('calculated-area');
        if (data.features.length > 0) {
            var area = turf.area(data);
            // restrict to area to 2 decimal points
            var rounded_area = Math.round(area * 100) / 100;
            answer.innerHTML =
                '<p><strong>' +
                rounded_area +
                '</strong></p><p>square meters</p>';
        } else {
            answer.innerHTML = '';
            if (e.type !== 'draw.delete'){
                alert('Use the draw tools to draw a polygon!');
            }
        }
    }


    $(document).on('click','#btn_reset_map',function(){
      //delete any existing drawings
      $(".mapbox-gl-draw_trash").click();
      var mapLayer = map.getLayer('ftest');
      if(typeof mapLayer !== 'undefined') {
          map.removeLayer('ftest').removeSource('ftest');
      }
    });

    
    
    $(document).ready(function(){
      $('.mapbox-gl-draw_ctrl-draw-btn.mapbox-gl-draw_trash').click(function(){ 
        //delete any existing drawings
        var mapLayer = map.getLayer('ftest');
        if(typeof mapLayer !== 'undefined') {
            map.removeLayer('ftest').removeSource('ftest');
        }
      });
    });
    


    //user submitted coordinates
    $(document).on('click','#btn_set_area',function(){
      //delete any existing drawings
      var mapLayer = map.getLayer('ftest');
      if(typeof mapLayer !== 'undefined') {
          map.removeLayer('ftest').removeSource('ftest');
      }

      //check if inputs are empty
      var wbl = $("#west_bound_longitude").val();
      var ebl = $("#east_bound_longitude").val();
      var sbl = $("#south_bound_latitude").val();
      var nbl = $("#north_bound_latitude").val();
      if (wbl == null || wbl == "", ebl == null || ebl == "", sbl == null || sbl == "", nbl == null || nbl == "") {
        alert("Isi semua maklumat Longitude dan Latitude");
        return false;
      }

      //add preloaded points to map
      var polygon2 = {
        "type": "FeatureCollection",
        "features": [
          {
            "type": "Feature",
            "properties": {},
            "geometry": {
              "type": "Polygon",
              "coordinates": [[
                wbl.split(","),sbl.split(","),nbl.split(","),ebl.split(","),
              ]]
            }
          }
        ]
      };

      var ts = Date.now();
      map.addSource('ftest', {
        'type': 'geojson',
        'data': polygon2     
      });
      map.addLayer({
        'id': 'ftest',
        'type': 'fill',
        'source': 'ftest',
        'layout': {},
        'paint': {
          'fill-color': 'rgba(128, 255, 0,0.9)',
          'fill-opacity': 0.6
        }
      });



      //calculate area of preloaded points=================
      var area = turf.area(polygon2);
      var rounded_area = Math.round(area * 100) / 100;
      var answer = document.getElementById('calculated-area');
      answer.innerHTML =
          '<p><strong>' +
          rounded_area +
          '</strong></p><p>square meters</p>';
    });
</script>

@stop