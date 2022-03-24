<<<<<<< HEAD
var map = L.map('map-div').setView([5.3105,107.3854408], 5);

L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
    maxZoom: 18,
    attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, ' +
        'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
    id: 'mapbox/streets-v11',
    tileSize: 512,
    zoomOffset: -1
}).addTo(map);


  // Initialise the FeatureGroup to store editable layers
  var editableLayers = new L.FeatureGroup();
  map.addLayer(editableLayers);
  
  var drawPluginOptions = {
    position: 'topleft',
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
  
  // drawnItems.addLayer(layer);
  
  map.on('draw:created', function(e) {
    var type = e.layerType,
      layer = e.layer;
  
      console.log(layer.getLatLngs());
  
    //   var coordinatesData = layer.getLatLngs();
  
      // el.value='New Value'
    //   el.dispatchEvent(new Event('change'));
  
    editableLayers.addLayer(layer);
  
  
=======
var map = L.map('map-div').setView([5.3105,107.3854408], 5);

L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
    maxZoom: 18,
    attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, ' +
        'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
    id: 'mapbox/streets-v11',
    tileSize: 512,
    zoomOffset: -1
}).addTo(map);


  // Initialise the FeatureGroup to store editable layers
  var editableLayers = new L.FeatureGroup();
  map.addLayer(editableLayers);
  
  var drawPluginOptions = {
    position: 'topleft',
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
  
  // drawnItems.addLayer(layer);
  
  map.on('draw:created', function(e) {
    var type = e.layerType,
      layer = e.layer;
  
      console.log(layer.getLatLngs());
  
    //   var coordinatesData = layer.getLatLngs();
  
      // el.value='New Value'
    //   el.dispatchEvent(new Event('change'));
  
    editableLayers.addLayer(layer);
  
  
>>>>>>> 62c86d455ffba8b54e2c114732403a5178fed0e6
  }); 