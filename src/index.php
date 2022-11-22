<?php
include('db.php');
$conn = pdo_connect_mysql();
if(isset($_POST['insert'])){
    $naam = $_POST['naam'];
    $lat = $_POST['lat'];
    $lng = $_POST['lng'];
    $kilo_pj = $_POST['kilo_pj'];

if($naam == null && $coords == null && $kilo_pj && null && $lat == null && $lng == null){
        echo 'U forgot to fill something in';
     } else{
        $insert = $conn->prepare("INSERT INTO `boom` (`naam`, `lat`, `lng`, `kilo_pj`) VALUES (?, ?, ?, ?)");
        $insert->execute([$naam, $lat, $lng, $kilo_pj]);
        echo 'Information inserted';
     }
     }

$prepare = $conn->prepare("SELECT * FROM boom ORDER BY id");
$prepare->execute([]);
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Leaflet Quick Start Example</title>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="stylesheet" href="../map/leaflet.css" />
        <link
            rel="stylesheet"
            href="https://cdn.jsdelivr.net/npm/leaflet.locatecontrol@0.78.0/dist/L.Control.Locate.min.css"
        />
        <script src="../map/leaflet.js"></script>
        <script
            src="https://cdn.jsdelivr.net/npm/leaflet.locatecontrol@0.78.0/dist/L.Control.Locate.min.js"
            charset="utf-8"
        ></script>
    </head>
    <body>
        <div id="map" style="width: 100%; height: 600px"></div>

        <section class="insert">
            <form action="" method="POST">
                <h3>Insert test</h3>

                <div class="flex">
                    <div class="inputBox">
                        <span>Boom naam:</span>
                        <input
                            type="text"
                            name="naam"
                            placeholder="Enter your boom naam"
                            class="box"
                            required
                        />
                    </div>
                    <div class="inputBox">
                        <span>latitude :</span>
                        <input
                            type="number"
                            name="lat"
                            step="any"
                            placeholder="eg. 52.254729"
                            class="box"
                            required
                        />
                    </div>

                    <div class="inputBox">
                        <span>lng :</span>
                        <input
                            type="number"
                            name="lng"
                            step="any"
                            placeholder="eg. 5.041415"
                            class="box"
                            required
                        />
                    </div>

                    <div class="inputBox">
                        <span>Kilo per jaar</span>
                        <input
                            type="text"
                            name="kilo_pj"
                            placeholder="enter your kilo per jaaar"
                            class="box"
                            required
                        />
                    </div>
                </div>

                <a href="hier bezig"
                    ><input type="submit" name="insert" value="Insert"
                /></a>
            </form>
        </section>
    </body>
</html>

<script>
            var map = L.map('map').setView([52.25459030239216, 5.040947601205085], 18.7);
        L.tileLayer('http://{s}.google.com/vt/lyrs=s&x={x}&y={y}&z={z}',{
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
        var naam = a['naam'];
        var date = a['date_added'];
        var kilo = a['kilo_pj'];
        var marker = L.marker([a['lat'], a['lng']], {icon: myIcon}).addTo(map);
        marker.bindPopup(naam + ' ' + date + ' ' + kilo).openPopup();
    }

    L.control.locate().addTo(map);
    L.showPopup();
</script>
