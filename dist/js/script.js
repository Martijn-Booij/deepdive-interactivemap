// 52.2550063, 5.0415578 coordinatie

var treeIcon = L.icon({
    iconUrl: '../dist/images/tree-marker-64x64.png',

    iconAnchor: [52.2550063, 5.0415578],
    popupAnchor: [-20, -5]
});


var geojsonFeature = [
    {
        "type": "Feature",
        "properties": {
            "name": "Apple tree",
            "popupContent": ''
        },
        "geometry": {
            "type": "Point",
            "coordinates": [5.0415578, 52.2550063]
        }
    },
    {
        "type": "Feature",
        "properties": {
            "name": "Coors Field",
            "amenity": "Baseball Stadium",
            "popupContent": "This is where the Rockies play!"
        },
        "geometry": {
            "type": "Point",
            "coordinates": [5.0416579, 52.2550063]
        }
    }
];


var map = L.map('map', {
}).setView([52.2550063, 5.0415578], 15);

L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
    maxZoom: 19,
    attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
}).addTo(map);


L.geoJSON(geojsonFeature, {
    pointToLayer: function(feature,latlng) {
        return L.marker(latlng, {icon: treeIcon}).bindPopup(feature.properties.popupContent);
    },
}).addTo(map);
