<?php
$base_url = "http://" . $_SERVER['HTTP_HOST'] . "/sportsspace/asset/img"; // Sesuaikan "/project" dengan nama folder root Anda
$url = "http://" .$_SERVER['HTTP_HOST']. "/sportsspace";
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8"/>
  <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
  <title>Sports Space</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet"/>
  <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:ital,wght@0,200..800;1,200..800&display=swap" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/remixicon@4.5.0/fonts/remixicon.css" rel="stylesheet"/>
  <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/2.6.0/uicons-regular-straight/css/uicons-regular-straight.css'>
  <link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.css" rel="stylesheet" />
    


<!-- commit pertama di branch -->
</head>
<style>
   body {
      font-family: 'Plus Jakarta Sans', sans-serif;
   }
</style>
<body class="bg-gray-100">
<script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>
   <header class="bg-white fixed w-full top-0 z-50 shadow-md">
      <nav class="ml-8 flex max-w-7xl items-center justify-between p-4 lg:px-1" aria-label="Global">
         <div class="flex lg:flex-1">
            <a href="#" class="-m-1 p-1">
              <span class="sr-only">SportsSpace</span>
              <img class="h-11 w-auto" src="<?=$base_url?>/logo.png" alt="">
            </a>
          </div>
          <div>
            <a href="<?=$url?>/logout.php">
                <button type="button" class="text-white bg-gray-800 hover:bg-gray-900 focus:outline-none focus:ring-4 focus:ring-gray-300 font-medium rounded-full text-sm px-5 py-2.5 me-2 mb-2 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-700 dark:border-gray-700">Logout</button>
            </a>  
        </div>
      </nav>
    </header>