<?php
include('db.php');
session_start();
$conn = pdo_connect_mysql();
if(isset($_POST['insert'])){
    $rasnaam = $_POST['rasnaam'];
    $soort = $_POST['soort'];
    $aantal = $_POST['aantal'];
    $tijdvak = $_POST['tijdvak'];
    $tijdcheck = $_POST['tijdcheck'];
    $latitude = $_POST['latitude'];
    $longitude = $_POST['longitude'];

    if (empty($rasnaam) || empty($soort) || empty($aantal) || empty($tijdvak) || empty($tijdcheck) || empty($latitude) || empty($longitude)) {
        echo 'U forgot to fill something in';
     } else{
        $insert = $conn->prepare("INSERT INTO `boom` (`rasnaam`, `soort`, `aantal`, `tijdvak`, `tijdcheck`, `latitude`, `longitude`) VALUES (?, ?, ?, ?, ?, ?, ?)"); 
        $insert->execute([$rasnaam, $soort, $aantal, $tijdvak, $tijdcheck, $latitude, $longitude]); echo 'Information inserted'; 
        header("Location: index.php"); } 
    
    }

        $prepare = $conn->prepare("SELECT * FROM boom ORDER BY id");
        $prepare->execute([]);
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Leaflet Quick Start Example</title>
        <meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
        <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.3/dist/leaflet.css" integrity="sha256-kLaT2GOSpHechhsozzB+flnD+zUyjE2LlfWPgU04xyI=" crossorigin="" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/leaflet.locatecontrol@0.78.0/dist/L.Control.Locate.min.css"/>
        <link rel="stylesheet" href="https://unpkg.com/flowbite@1.5.4/dist/flowbite.min.css" />
        <script src="https://unpkg.com/leaflet@1.9.3/dist/leaflet.js" integrity="sha256-WBkoXOwTeyKclOHuWtc+i2uENFpDZ9YPdf5Hf+D7ewM=" crossorigin=""></script>
        <script src="https://cdn.jsdelivr.net/npm/leaflet.locatecontrol@0.78.0/dist/L.Control.Locate.min.js" charset="utf-8"></script>
        <script src="https://cdn.tailwindcss.com"></script>
    </head>
    <body>
        <div id="map" class="z-0" style="width: 100%; height: 600px"></div>

<!-- Main modal -->
<div id="authentication-modal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 p-4 w-full md:inset-0 h-modal md:h-full">
    <div class="relative w-full max-w-md h-full md:h-auto">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <button type="button" id="close" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white">
                <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                <span class="sr-only">Close modal</span>
            </button>
            <div class="py-6 px-6 lg:px-8">
                <h3 class="mb-4 text-xl font-medium text-gray-900 dark:text-white">Voeg een boom toe</h3>
                <form id="form" class="space-y-6" action="" method="POST">
                    <div class="inputBox">
                    <label for="rasnaam" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">rasnaam:</label>
                        <input
                            type="text"
                            name="rasnaam"
                            placeholder="Enter your rasnaam"
                            class="box"
                            required
                        />
                    </div>
                    <label for="soort" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Soort:</label>
                        <div class="inputBox">
                        <input
                            type="text"
                            name="soort"
                            placeholder="Enter your soort"
                            class="box"
                            required
                        />
                        </div>
                        <label for="aantal" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">aantal:</label>
                        <div class="inputBox">
                        <input
                            type="number"
                            name="aantal"
                            placeholder="Enter your aantal"
                            class="box"
                            required
                        />
                        </div>

                        <label for="tijdvak" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">tijdvak:</label>
                        <div class="inputBox">
                        <input
                            type="text"
                            name="tijdvak"
                            placeholder="Enter your tijdvak"
                            class="box"
                            required
                        />
                        </div>
                        <label for="tijdcheck" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">tijdcheck:</label>
                        <div class="inputBox">
                        <input
                            type="text"
                            name="tijdcheck"
                            placeholder="Enter your tijdcheck"
                            class="box"
                            required
                        />
                        </div>
                        <label for="latitude" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">latitude:</label>
                        <div class="inputBox">
                        <input
                            type="number"
                            id="latitude"
                            name="latitude"
                            step="any"
                            class="box"
                            required
                        />
                        </div>
                        <label for="longitude" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">longitude:</label>
                        <div class="inputBox">
                        <input
                            type="number"
                            id="longitude"
                            name="longitude"
                            step="any"
                            class="box"
                            required
                        />
                        </div>

                    <div class="flex justify-between">
                        <div class="flex items-start">
                    <button type="submit" class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" name="insert" value="Insert">Insert information</button>
                </form>
            </div>
        </div>
    </div>
</div> 
        <script src="https://unpkg.com/flowbite@1.5.4/dist/flowbite.js"></script>
    </body>
</html>

<script>
           var map = L.map('map').setView([52.25459030239216, 5.040947601205085], 18.7);

           L.tileLayer('http://{s}.google.com/vt/lyrs=s&x={x}&y={y}&z={z}',{ noWrap: true,
       maxZoom: 20,
       subdomains:['mt0','mt1','mt2','mt3']
       }).addTo(map);

       var myIcon = L.icon({
           iconUrl: './images/tree.svg',
           iconSize: [30, 41],
           iconAnchor: [12, 41],
           popupAnchor: [1, -34],
           shadowSize: [41, 41]
       });

       var database = <?php echo json_encode($prepare->fetchAll(PDO::FETCH_ASSOC)); ?>;
       for (var i = 0; i < database.length; i++) {
           var a = database[i];
           let rasnaam = a.rasnaam;
              let soort = a.soort;
                let aantal = a.aantal;
                let tijdvak = a.tijdvak;
                let tijdcheck = a.tijdcheck;
                let latitude = a.latitude;
                let longitude = a.longitude;
           var marker = L.marker([a['latitude'], a['longitude']], {icon: myIcon}).addTo(map);
           marker.bindPopup(
               '<b>rasnaam:</b> ' + rasnaam + '<br>' + 
                '<b>soort:</b> ' + soort + '<br>' +
                '<b>aantal:</b> ' + aantal + '<br>' +
                '<b>tijdvak:</b> ' + tijdvak + '<br>' +
                '<b>tijdcheck:</b> ' + tijdcheck + '<br>' +
                '<b>latitude:</b> ' + latitude + '<br>' +
                '<b>longitude:</b> ' + longitude + '<br>'

           );
        }

       map.addEventListener('click', function(e) {
        var lat = e.latlng.lat;
        var lng = e.latlng.lng;
        document.getElementById('latitude').value = lat;
        document.getElementById('longitude').value = lng;
        modal = document.getElementById('authentication-modal');
        modal.classList.add('active');
        modal.classList.remove('hidden');
           }
);

if (document.getElementById('close')) {
    document.getElementById('close').addEventListener('click', function() {
        modal = document.getElementById('authentication-modal');
        modal.classList.remove('active');
        modal.classList.add('hidden');
    });
}
       L.control.locate().addTo(map);
</script>
