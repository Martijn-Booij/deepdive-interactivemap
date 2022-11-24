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
</head>
<body style="background-color: whitesmoke;">
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

              </nav>
           </div>

           <div class="order-2 md:order-3 flex flex-wrap items-center justify-end mr-0 md:mr-4" id="nav-content">
              <div class="auth flex items-center w-full md:w-full">
                 <!-- <button class="bg-transparent text-gray-800  p-2 rounded border border-gray-300 mr-4 hover:bg-gray-100 hover:text-gray-700">Login</button> -->

                 <?php
                     echo '<a href="./logout.php" class="bg-white hover:bg-gray-100 text-gray-800 font-semibold py-2 px-8 border border-black rounded-full shadow mr-8">logout</a>';
                   ?>
                 <a href= "register.php" class="bg-black text-gray-200  p-2 py-2 px-5 rounded-full border border-black hover:bg-white hover:text-black ">Sign up</a>
              </div>
           </div>
        </div>
     </nav>

      <img src="map.png" style="border-width: 13px; width: 80%; height: auto;" class="rounded-xl h-full overflow-hidden border-8 rounded-xl m-44 h-auto border-black" alt="">

      <!-- flex space justify-between -->
      <footer class="p-4 bg-white rounded-lg shadow md:px-6 md:py-8 dark:bg-gray-900">
         <!-- div  -->
         <!-- div -->

         <span class="block text-sm text-gray-500 sm:text-center dark:text-gray-400">© 2022 <a href="https://flowbite.com/" class="hover:underline">Flowbite™</a>. All Rights Reserved.</span>
      </footer>
</body>
</html>
