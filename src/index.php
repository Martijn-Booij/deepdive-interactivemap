<?php session_start();

if (!isset($_SESSION['id'])) {
      header("Location: login.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vechtstreek Fruit</title>
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.15/tailwind.min.css"> -->
    <link rel="stylesheet" href="../dist/output.css">
    <link rel="stylesheet" href="../dist/leaflet.css">
</head>
<body style="background-color: whitesmoke;">
<!-- 

    <nav id="header" class="w-full z-30 top-10 py-1 bg-white shadow-lg border-b">
        <div class="w-full flex items-center justify-between mt-0 px-6 py-2">
           <label for="menu-toggle" class="cursor-pointer md:hidden block">
              <svg class="fill-current text-blue-600" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20">
                 <title>menu</title>
                 <path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z"></path>
              </svg>
           </label>
           <input class="hidden" type="checkbox" id="menu-toggle">

           <div class="hidden md:flex md:items-center md:w-auto w-full order-3 md:order-1" id="menu">
              <nav>
                  test
              </nav>
           </div>

           <div class="order-2 md:order-3 flex flex-wrap items-center justify-end mr-0 md:mr-4" id="nav-content">
              <div class="auth flex items-center w-full md:w-full">
                 <button class="bg-transparent text-gray-800  p-2 rounded border border-gray-300 mr-4 hover:bg-gray-100 hover:text-gray-700">Login</button>

                 <?php
                     //echo '<a href="./logout.php" class="bg-white hover:bg-gray-100 text-gray-800 font-semibold py-2 px-8 border border-black rounded-full shadow mr-8">logout</a>';
                   ?>
                 <a href="register.php" class="bg-black text-gray-200  p-2 py-2 px-5 rounded-full border border-black hover:bg-white hover:text-black ">Sign up</a>
              </div>
           </div>
        </div>
     </nav>
     -->

      <header>
         <div class="w-full py-3 shadow-xl flex items-center justify-between px-10">
            <div class="flex gap-1 items-center">
               <img class='h-20 w-20' src="../dist/images/logo.png" alt="">
            </div>

            <div>
               <a class='border border-red-500 text-red-500 rounded-full px-5 py-3 hover:bg-red-500 hover:text-white transition-all duration-300 ease-in' href="./logout.php">Log out</a>
            </div>
         </div>
      </header>

      <main class='container mx-auto flex flex-col xl:flex-row justify-between gap-10 mt-10'>
         <div class='border-8 border-black rounded-xl w-full xl:w-2/3'>
            <div class='map w-full h-[500px] rounded-xl' id='map'></div>
         </div>
         
         <div class='shadow-xl rounded-3xl w-fullxl:w-1/3 px-4 py-10'>
            <div class="flex flex-col gap-10 h-full">
               <h2 class='text-5xl font-sans text-center'>{Ras naam boom}</h2>

               <div class="w-full flex flex-col justify-center items-center h-full">
                  <div class='flex flex-col justify-between w-full max-w-sm'>
                     <div class='info'>
                        <span>Soort:</span>
                        <span>Apple</span>
                     </div>

                     <div class='info'>
                        <span>Tijdvak:</span>
                        <span>1970 - 2022</span>
                     </div>

                     <div class='info'>
                        <span>Aantal:</span>
                        <span>2</span>
                     </div>

                     <div class='info'>
                        <span>Jaarcheck:</span>
                        <span>2004</span>
                     </div>

                     <div class="flex flex-col gap-5   xl:flex-row xl:justify-between">
                        <button class='border rounded-full border-green-500 text-green-500 hover:bg-green-500 hover:text-white transition-all duration-300 ease-out xl:w-auto xl:px-5 py-2 text-xl'>Edit</button>
                        <button class='border rounded-full border-green-500 text-green-500 hover:bg-green-500 hover:text-white transition-all duration-300 ease-out px-5 py-2 text-xl'>Add</button>
                     </div>

                  </div>
               </div>
            </div>
         </div>
         
      </main>

      <script src="../dist/js/leaflet.js"></script>
      <script src='../dist/js/script.js'></script>
</body>
</html>
