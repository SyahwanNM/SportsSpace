<?php
session_start();  
var_dump($_SESSION);
$login = "HTTPS://" . $_SERVER['HTTP_HOST'] . "/sportsspace";
// Cek apakah session 'username' ada
if (!isset($_SESSION['username'])) {
    // Jika tidak ada, redirect ke halaman login
    header('Location:'.$login. '/login.php');
    exit();
}

$base_url = "http://" . $_SERVER['HTTP_HOST'] . "/sportsspace/asset/img"; 
$url = "http://" . $_SERVER['HTTP_HOST'] . "/sportsspace";
$username = $_SESSION['username'];  // Mengambil username dari session
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
              <span class="sr-only">Your Company</span>
              <img class="h-11 w-auto" src="<?=$base_url?>/logo.png" alt="">
            </a>
          </div>
          <!-- Search button -->
        <div class="flex-grow flex justify-center">
         <div class="flex items-center w-3/4">
           <input class="border rounded-full px-6 py-2 w-full" placeholder="Search Here" type="text"/>
           <button class="ml-2 p-2 rounded-full bg-gray-200 hover:bg-gray-300">
             <i class="fas fa-search"></i>
           </button>
         </div>
       </div>
       <!-- Notification, Masssege & User Profile -->
      <div class="flex items-center space-x-4">
         <button class="p-2 rounded-full bg-gray-200 hover:bg-red-500">
            <i class="fi fi-rs-bell"></i>
         </button>
         <button class="p-2 rounded-full bg-gray-200 hover:bg-red-500">
            <i class="fi fi-rs-comment"></i>
         </button>
         <div class="items-center">
            <img alt="User Profile" class="rounded-full mr-2" height="40" src="https://storage.googleapis.com/a1aa/image/tkocYm96vf31EyzV9lKuARJvtv5uJCebXk4fhFFlTwTtFLqnA.jpg" width="40"/>
            <span><?= htmlspecialchars($username) ?></span>
         </div>
      <div class=" mr-2 ml-2 items-center">
         <a href="<?=$url?>/index.php" class="text-sm font-semibold text-gray-900">Log out <span aria-hidden="true">&rarr;</span></a>
      </div>
        </div>
      </nav>
    </header>