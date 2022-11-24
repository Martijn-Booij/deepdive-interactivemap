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
            "name": "Type boom: Appel",
            "aanplant": 'Aanplant: 2019',
            'onderhoud': 'Onderhoud: ',
            'snoeiwerkzaamheden': 'Snoeiwerkzaamheden: ',
            'oogst': 'Oogst: ',
            'aantalkilos': 'Aantal kilo\'s: 50',
        },
        "geometry": {
            "type": "Point",
            "coordinates": [5.0415578, 52.2550063]
        }
    },
    {
        "type": "Feature",
        "properties": {
            "name": "Type boom: Appel",
            "aanplant": 'Aanplant: 2019',
            'onderhoud': 'Onderhoud: ',
            'snoeiwerkzaamheden': 'Snoeiwerkzaamheden: ',
            'oogst': 'Oogst: ',
            'aantalkilos': 'Aantal kilo\'s: 50',
        },
        "geometry": {
            "type": "Point",
            "coordinates": [5.0490578, 52.2550063]
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
        return L.marker(latlng, {icon: treeIcon}).bindPopup('<div><p>'+feature.properties.name+'</p><p>'+feature.properties.aanplant+'</p><p>'+feature.properties.onderhoud+'</p><p>'+feature.properties.snoeiwerkzaamheden+'</p><p>'+feature.properties.oogst+'</p><p>'+feature.properties.aantalkilos+'</p></div>');
    },
}).addTo(map);
