<?php
session_start();
require "../../dbconnection.php";
include '../../template/header-user.php';
$base_url = "HTTP://" . $_SERVER['HTTP_HOST'] . "/sportsspace/sports_enthusiast";
$id = $_GET['id'];
$query = "SELECT * FROM field WHERE id_field = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param('i', $id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
} else {
    echo "Field not found.";
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8"/>
  <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
  <title>Sports Space</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:ital,wght@0,200..800;1,200..800&display=swap" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
  <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/2.6.0/uicons-regular-straight/css/uicons-regular-straight.css'>
  <link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.css" rel="stylesheet" />
  <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>
    


<!-- commit pertama di branch -->
</head>
<style>
   body {
      font-family: 'Plus Jakarta Sans', sans-serif;
   }
</style>
<body class="bg-gray-100">
   <main class="pt-20">
      <div class="flex flex-col lg:flex-row">
         <div class="lg:w-1/5 md:w-1/4 sm:w-full p-4 sticky top-0 lg:static">
            <?php include '../../template/sidebar-user.php'; ?>
         </div>
         <!-- Main Content -->
         <div class="flex-grow lg:w-4/5 md:w-3/4 sm:w-full p-4">
            <div class="bg-white p-4 rounded-lg shadow mb-4 flex items-center space-x-40">
               <i class="fa-solid fa-xmark fa-xl" style="color: #D60505;"></i>
               <h2 class=" text-2xl font-bold text-red-700 mb-2"><?=$row['nama_lapangan']?></h2>
            </div>
            <!-- Banner -->

            <div class="flex mb-4">
               <div id="default-carousel" class="relative w-full" data-carousel="slide">
                  <!-- Carousel wrapper -->
                  <div class="relative h-52 overflow-hidden rounded-lg md:h-75">
                     <!-- Item 1 -->
                     <div class="hidden duration-700 ease-in-out" data-carousel-item>
                        <img src="<?=$row['foto']?>" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
                     </div>
                     <!-- Item 2 -->
                     <div class="hidden duration-700 ease-in-out" data-carousel-item>
                        <img src="<?=$row['foto']?>" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
                     </div>
                  </div>
                  <!-- Slider indicators -->
                  <div class="absolute z-30 flex -translate-x-1/2 bottom-5 left-1/2 space-x-3 rtl:space-x-reverse">
                     <button type="button" class="w-3 h-3 rounded-full" aria-current="true" aria-label="Slide 1" data-carousel-slide-to="0"></button>
                     <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 2" data-carousel-slide-to="1"></button>
                  </div>
                  <!-- Slider controls -->
                  <button type="button" class="absolute top-0 start-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-prev>
                     <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                        <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                              <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 1 1 5l4 4"/>
                        </svg>
                        <span class="sr-only">Previous</span>
                     </span>
                  </button>
                  <button type="button" class="absolute top-0 end-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-next>
                     <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                        <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                              <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                        </svg>
                        <span class="sr-only">Next</span>
                     </span>
                  </button>
               </div>
            </div>
            <!-- Detail Field -->
            <div class="bg-white p-4 rounded-lg shadow mb-4">
               <div class="flex items-center justify-between">
               <div class="flex items-center">
                  <!-- <svg class="w-4 h-4 text-yellow-300 me-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                     <path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z"/>
                  </svg> -->
                  <!-- <p class="ms-2 text-sm font-bold text-gray-900 dark:text-white">4.95</p> -->
                  <span class="w-1 h-1 mx-1.5 bg-gray-500 rounded-full dark:bg-gray-400"></span>
                  <!-- <a href="#" class="text-sm font-medium text-gray-900 underline hover:no-underline dark:text-white">73 reviews</a> -->
               </div>
               <p class="bg-red-700 rounded-md my-4 mr-4 p-2 text-white text-sm text-center font-extrabold"><?=$row['type']?></p>
               </div>
               <?php
                   $price_format = number_format($row['price'], 0, ',', '.');
               ?>
               <p class="bg-red-700 rounded-md my-4 mr-4 p-1 text-white text-sm text-center w-1/4 font-bold"><?=$price_format?> /Jam</p>
               <div class="flex items-center">
                  <i class="fa-solid fa-circle-chevron-right mr-2"></i>
                  <h2 class="font-semibold text-md">Description</h2>
               </div>
               <p class="text-justify mb-2"><?=$row['description']?></p>
               

               
               <!-- Fasilitas -->
            <div class="flex items-left space-x-40">
               <div class="flex items-center mt-4 ">
                  <i class="fa-solid fa-circle-chevron-right mr-2"></i>
                  <h2 class="font-semibold text-md text-center">Facilities</h2>
               </div>
               <div class="flex items-center mt-4 border-l-4 ">
                  <i class="fa-solid fa-circle-chevron-right mr-2 ml-10"></i>
                  <h2 class="font-semibold text-md text-center">Operational Hours</h2>
               </div>
            </div>
            <div class="flex items-left space-x-10">
               <div class="flex items-center space-x-2 ">
                  <div class="flex items-center bg-gray-200 rounded-full p-2 my-2 ">
                     <i class="fa-solid fa-mosque mx-1"></i>
                     <p class="text-xs">Musholla</p>
                  </div>
                  <div class="flex items-center bg-gray-200 rounded-full p-2 my-2">
                     <i class="fa-solid fa-mug-saucer mx-1"></i>
                     <p class="text-xs">Food & Beverage</p>
                  </div>
               </div>
               <div class="flex items-center space-x-2 border-l-4">
                  <div class="flex items-center bg-gray-200 rounded-full p-2 my-2 ml-8">
                     <i class="fa-solid fa-clock mx-1"></i>
                     <p class="text-xs">Opening Hours: 08.00</p>
                  </div>
                  <div class="flex items-center bg-gray-200 rounded-full p-2 my-2">
                     <i class="fa-solid fa-clock mx-1"></i>
                     <p class="text-xs">Closing Hours: 23.00</p>
                  </div>
                  <div class="flex items-center bg-gray-900 rounded-full p-2 my-2">
                     <i class="fa-solid fa-circle-xmark mx-1" style="color: white;"></i>
                     <p class="text-white text-xs">Monday Closed</p>
                  </div>
                  </div>
               </div>
            
            
               
               <!--  -->
               
               <div class="flex items-center space-x-4">
               </div>
            
               <div class="flex items-center mt-4">
                  <i class="fa-solid fa-location-dot mr-2"></i>
                  <h2 class="font-semibold text-md">Location</h2>
               </div>
               <p class="text-justify mb-4">Jl. Terusan Buah Batu No.333, Cipagalo, Kec. Bojongsoang, Kabupaten Bandung, Jawa Barat 40287</p>
               <a href="https://maps.app.goo.gl/jNWsvJqY4ZeKarXM7" class="bg-gray-700 text-white text-decoration-none p-2 rounded-lg my-2 hover:bg-gray-100 hover:text-gray-900">click here</a>
           </div>
            <!-- Review -->
            <section class="bg-white p-4 rounded-lg shadow mb-4" id="rating">
               <article>
                  <div class="flex items-center mb-4">
                     <img class="w-10 h-10 me-4 rounded-full" src="https://cdn2.psychologytoday.com/assets/styles/manual_crop_1_1_1200x1200/public/field_blog_entry_images/2018-09/shutterstock_648907024.jpg?itok=1-9sfjwH" alt="">
                     <div class="font-medium dark:text-white">
                        <p>Jese Leos <time datetime="2014-08-16 19:00" class="block text-sm text-gray-500 dark:text-gray-400">Joined on October 2023</time></p>
                     </div>
                  </div>
                  <div class="flex items-center mb-1 space-x-1 rtl:space-x-reverse">
                     <svg class="w-4 h-4 text-yellow-300" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                        <path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z"/>
                     </svg>
                     <svg class="w-4 h-4 text-yellow-300" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                        <path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z"/>
                     </svg>
                     <svg class="w-4 h-4 text-yellow-300" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                        <path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z"/>
                     </svg>
                     <svg class="w-4 h-4 text-yellow-300" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                        <path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z"/>
                     </svg>
                     <svg class="w-4 h-4 text-gray-300 dark:text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                        <path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z"/>
                     </svg>
                     <h3 class="ms-2 text-sm font-semibold text-gray-900 dark:text-white">Good Facilities</h3>
                  </div>
                  <div class="mb-5 text-sm text-gray-500 dark:text-gray-400"><p>Reviewed in the Futsal Yogya Bojongsoang on <time datetime="2024-03-03 19:00">March 3, 2024</time></p></div>
                  <p class="mb-2 text-gray-500 dark:text-gray-400">Pencahayaan lapangan terang, sehingga saya dapat bermain dengan nyaman</p>
                  <p class="mb-3 text-gray-500 dark:text-gray-400">Toilet bersih, ada kantin yang lengkap</p>
                  <div>
                     <p class="mt-1 text-xs text-gray-500 dark:text-gray-400">19 people found this helpful</p>
                     <div class="flex items-center mt-3">
                        <a href="#" class="px-2 py-1.5 text-xs font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Helpful</a>
                        <a href="#" class="ps-4 text-sm font-medium text-blue-600 hover:underline dark:text-blue-500 border-gray-200 ms-4 border-s md:mb-0 dark:border-gray-600">Report abuse</a>
                     </div>
                  </div>
               </article>

               </section>
            </div>
            <!-- Kolom Samping -->
        <div class="flex-grow lg:w-1/5 md:w-1/5 sm:w-full p-4 sticky top-0">
            <?php include '../../template/right-menu-users.php'; ?>
        </div>
      </div>
   </main>
</body>
<footer>
   <?php
   include '../../template/footer.php';
   ?>
</footer>
</html>