<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="initial-scale=1,maximum-scale=1,user-scalable=no" />

        <!-- Load Leaflet from CDN -->
        <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css"
              integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A=="
              crossorigin=""/>
        <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"
                integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA=="
        crossorigin=""></script>

        <!-- Load Esri Leaflet from CDN -->
        <script src="https://unpkg.com/esri-leaflet@3.0.7/dist/esri-leaflet.js"
                integrity="sha512-ciMHuVIB6ijbjTyEdmy1lfLtBwt0tEHZGhKVXDzW7v7hXOe+Fo3UA1zfydjCLZ0/vLacHkwSARXB5DmtNaoL/g=="
        crossorigin=""></script>

        <!-- Load Esri Leaflet Vector from CDN -->
        <script src="https://unpkg.com/esri-leaflet-vector@3.1.2/dist/esri-leaflet-vector.js"
                integrity="sha512-SnA/TobYvMdLwGPv48bsO+9ROk7kqKu/tI9TelKQsDe+KZL0TUUWml56TZIMGcpHcVctpaU6Mz4bvboUQDuU3w=="
        crossorigin=""></script>

        <style>
            body { margin:0; padding:0; }
            #map { position: absolute; top:0; bottom:0; right:0; left:0; }
        </style>
    </head>
    <body>

        <div id="map"></div>

        <?php
        $url = "";
        if (isset($_GET['url']) && trim($_GET['url']) != "") {
            $url = trim($_GET['url']);
        }
        ?>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script>
            var map = L.map('map').setView([4.083085983228963, 108.03290032005208], 6);

            var tiles = L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
                maxZoom: 18,
                attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, ' +
                        'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
                id: 'mapbox/streets-v11',
                tileSize: 512,
                zoomOffset: -1
            }).addTo(map);

            var earthquakes = L.esri.featureLayer({
                //url: 'https://mygos.mygeoportal.gov.my/gisserver/rest/services/MyGeomap/Msia_Coverage/MapServer/1'
                url: '<?php echo $url; ?>'
            }).addTo(map);

            earthquakes.bindPopup(function (layer) {
                var output = "";
                $.each(layer.feature.properties,function(key,value){
                    output += "<p>" + key + ": " + value + "</p>";
                });
//                return L.Util.template('<p>FCD: {FCD}</p>', layer.feature.properties);
                return L.Util.template(output, layer.feature.properties);
            });
            
            /*
            // create wms layer
            var farmerMarkets = L.tileLayer.wms('https://service.mygeomap.gov.my/arcgis/services/Commercial/1MM_Template_Pusat_Komersial/MapServer/WmsServer?request=GetLegendGraphic%26version=1.3.0%26format=image/png%26layer=2', {
                layers: '2',
                format: 'image/png',
                transparent: true
            });
            farmerMarkets.addTo(map);
            */
            
            
            /*
            var wmsLayer = L.tileLayer.wms('http://ows.mundialis.de/services/service?', {
                layers: 'TOPO-OSM-WMS'
            }).addTo(map);
            
            var basemaps = {
                Topography: L.tileLayer.wms('http://ows.mundialis.de/services/service?', {
                    layers: 'TOPO-WMS'
                }),

                Places: L.tileLayer.wms('http://ows.mundialis.de/services/service?', {
                    layers: 'OSM-Overlay-WMS'
                }),

                'Topography, then places': L.tileLayer.wms('http://ows.mundialis.de/services/service?', {
                    layers: 'TOPO-WMS,OSM-Overlay-WMS'
                }),

                'Places, then topography': L.tileLayer.wms('http://ows.mundialis.de/services/service?', {
                    layers: 'OSM-Overlay-WMS,TOPO-WMS'
                })
            };

            L.control.layers(basemaps).addTo(map);

            basemaps.Topography.addTo(map);

            */
        </script>

    </body>
</html>