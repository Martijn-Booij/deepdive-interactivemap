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
        $insert = $conn->prepare("INSERT INTO `boom` (`naam`, `lat`, `lng`, `kilo-pj`) VALUES (?, ?, ?, ?)");
        $insert->execute([$naam, $lat, $lng, $kilo_pj]);
        echo 'Information inserted';
     }
     }
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Home</title>
</head>

<body>
<section class="insert">

   <form action="" method="POST">

      <h3>Insert test</h3>

      <div class="flex">
         <div class="inputBox">
            <span>Boom naam:</span>
            <input type="text" name="naam" placeholder="Enter your boom naam" class="box" required>
         </div>
         <div class="inputBox">
            <span>latitude :</span>
            <input type="number" name="lat" step="any" placeholder="eg. 52.254729" class="box" required>
         </div>

         <div class="inputBox">
            <span>lng :</span>
            <input type="number" name="lng" step="any" placeholder="eg. 5.041415" class="box" required>
         </div>

         <div class="inputBox">
            <span>Kilo per jaar</span>
            <input type="text" name="kilo_pj" placeholder="enter your kilo per jaaar" class="box" required>
         </div>
      </div>

      <a href="hier bezig"><input type="submit" name="insert" value="Insert"></a>

   </form>

</section>


</body>
</html>