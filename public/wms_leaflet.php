<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!-- leaflet css link  -->
    <link
      rel="stylesheet"
      href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css"
    />

    <title>Web-GIS with geoserver and leaflet</title>

    <style>
      body {
        margin: 0;
        padding: 0;
      }
      #map {
        width: 100%;
        height: 95vh;
      }
    </style>
  </head>
  <body>
    <div id="map"></div>
    <!-- <script> -->
    <div>
      <h2>
        <a
          href="https://service.mygeomap.gov.my/arcgis/rest/services/Commercial/1MM_Template_Pusat_Komersial/MapServer/find?searchText=+&contains=true&searchFields=&sr=&layers=0%2C2%2C3%2C5%2C6%2C7%2C9%2C10%2C11&layerDefs=%7B%220%22%3A%22here.SDE.Shopping_1.OBJECTID%3C2000%22%2C+%222%22%3A%22OBJECTID%3C2000%22%2C+%223%22%3A%22OBJECTID%3C2000%22%2C+%225%22%3A%22OBJECTID%3C2000%22%2C+%226%22%3A%22OBJECTID%3C2000%22%2C+%227%22%3A%22OBJECTID%3C2000%22%2C+%229%22%3A%22here.SDE.Business_1.OBJECTID%3C2000%22%2C+%2210%22%3A%22OBJECTID%3C2000%22%2C+%2211%22%3A%22OBJECTID%3C2000%22%7D&returnGeometry=true&maxAllowableOffset=&geometryPrecision=&dynamicLayers=&returnZ=false&returnM=false&gdbVersion=&returnUnformattedValues=false&returnFieldName=false&datumTransformations=&layerParameterValues=&mapRangeValues=&layerRangeValues=&f=pjson"
        >
          JSON
        </a>
      </h2>
      <h2>
        <a
          href="https://service.mygeomap.gov.my/arcgis/rest/services/Commercial/1MM_Template_Pusat_Komersial/MapServer/find?searchText=+&contains=true&searchFields=&sr=&layers=0%2C2%2C3%2C5%2C6%2C7%2C9%2C10%2C11&layerDefs=%7B%220%22%3A%22here.SDE.Shopping_1.OBJECTID%3C2000%22%2C+%222%22%3A%22OBJECTID%3C2000%22%2C+%223%22%3A%22OBJECTID%3C2000%22%2C+%225%22%3A%22OBJECTID%3C2000%22%2C+%226%22%3A%22OBJECTID%3C2000%22%2C+%227%22%3A%22OBJECTID%3C2000%22%2C+%229%22%3A%22here.SDE.Business_1.OBJECTID%3C2000%22%2C+%2210%22%3A%22OBJECTID%3C2000%22%2C+%2211%22%3A%22OBJECTID%3C2000%22%7D&returnGeometry=true&maxAllowableOffset=&geometryPrecision=&dynamicLayers=&returnZ=false&returnM=false&gdbVersion=&returnUnformattedValues=false&returnFieldName=false&datumTransformations=&layerParameterValues=&mapRangeValues=&layerRangeValues=&f=html"
        >
          HTML
        </a>
      </h2>
      <h2>
        <a
          href="https://service.mygeomap.gov.my/arcgis/rest/services/Commercial/1MM_Template_Pusat_Komersial/MapServer/generatekml?docName=pusat_komersial&layers=0,1,2,3,4,5,6,7,8,9,10,11&layerOptions=composite"
        >
          KML
        </a>
      </h2>
    </div>

    <!-- </script> -->
  </body>
</html>

<!-- leaflet js link  -->
<script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>

<!-- jquery link  -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- betterWMS  -->
<!-- <script src="./lib/L.TileLayer.BetterWMS.js"></script> -->

<script>
  var map = L.map("map").setView([4.259399, 102.064359], 7);

  var tile = L.tileLayer.wms(
    "https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png",
    {
      maxZoom: 19,
      attribution:
        '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors',
    }
  );
  tile.addTo(map);

  var landUse = L.tileLayer.wms(
    "<?php echo $_GET['url'] ?>",
//      "https://basemap.mygeoportal.gov.my/geoserver/Projek_BasemapPGN/wms",
    {
      layers: "Projek_BasemapPGN:Existing_Land_Use_Perlis_4kmto60m",
      format: "image/png",
      transparent: true,
    }
  );
   landUse.addTo(map);

  var pCommercial = L.tileLayer.wms(
    "<?php echo $_GET['url'] ?>",
//    "https://service.mygeomap.gov.my/arcgis/services/Commercial/1MM_Template_Pusat_Komersial/MapServer/WMSServer",
    {
      layers: "0,1,2,3,5,6,7,9,10,11",
      format: "image/png",
      transparent: true,
    }
  );
  pCommercial.addTo(map);
</script>
