//NOTE: this file loads /dist/leaflet.wms.js

requirejs.config({
    'baseUrl': '../lib',
    'paths': {
        'leaflet.wms': '../dist/leaflet.wms' //.js'
    }
});

define(['leaflet', 'leaflet.wms'],
function(L, wms) {

var overlayMap = createMap('overlay-map', false);

function createMap(div, tiled) {
    // Map configuration
    var map = L.map(div);
    map.setView([45, -93.2], 6);

    var basemaps = {
        'Basemap': basemap().addTo(map),
        'Blank': blank()
    };

    //retrieve get parameters
    var url = null, tmp = [];
    location.search.substr(1).split("&").forEach(function (item) {
        tmp = item.split("=");
        if (tmp[0] === 'url') url = decodeURIComponent(tmp[1]);
    });

    // Add WMS source/layers
    var source = wms.source(
        url != null ? url : "http://ows.terrestris.de/osm/service",
        // "https://mygos.mygeoportal.gov.my/gisserver/rest/services/MyGeomap/Msia_Coverage/MapServer",
        // "https://service.mygeomap.gov.my/arcgis/services/Commercial/1MM_Template_Pusat_Komersial/MapServer/WMSServer?request=GetCapabilities&service=WMS",
        {
            "format": "image/png",
            "transparent": "true",
            "attribution": "<a href='http://ows.terrestris.de/'>terrestris</a>",
            "info_format": "text/html",
            "tiled": tiled
        }        
    );

    var layers = {
        'Topographic': source.getLayer("TOPO-WMS").addTo(map),
        'OSM Overlay': source.getLayer("OSM-Overlay-WMS").addTo(map)
    };

    // Create layer control
    L.control.layers(basemaps, layers).addTo(map);

    // Opacity slider
    var slider = L.DomUtil.get('range-' + div);
    L.DomEvent.addListener(slider, 'change', function() {
        source.setOpacity(this.value);
    });
    return map;
}

function basemap() {
    // maps.stamen.com
    var attr = 'Map tiles by <a href="http://stamen.com">Stamen Design</a>, under <a href="http://creativecommons.org/licenses/by/3.0">CC BY 3.0</a>. Data by <a href="http://openstreetmap.org">OpenStreetMap</a>, under <a href="http://www.openstreetmap.org/copyright">ODbL</a>.';
    return L.tileLayer("http://tile.stamen.com/toner-background/{z}/{x}/{y}.png", {
        opacity: 0.1,
        attribution: attr
    });
}

function blank() {
    var layer = new L.Layer();
    layer.onAdd = layer.onRemove = function() {};
    return layer;
}

// Export maps for console experimentation
return {
    'maps': {
        'overlay': overlayMap,
    }
};

});

