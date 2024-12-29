<?php
include '../../template/header-user.php';
include '../../template/footer.php';
include '../../template/sidebar-user.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:ital,wght@0,200..800;1,200..800&display=swap" rel="stylesheet">
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/2.6.0/uicons-regular-straight/css/uicons-regular-straight.css'>
    <link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>
</head>
<style>
   body {
      font-family: 'Plus Jakarta Sans', sans-serif;
   }
</style>
<body class="bg-gray-100">
     <main class="pt-20">
        <div class="flex justify-end">
        <!-- Main Content -->
        <div class="lg:w-4/5 md:w-4/5 p-6">
            <!-- Your Content Here -->
            <div class="bg-white p-6 rounded-lg shadow-md mb-6">
               <img alt="Profile Picture" class="w-24 h-24 rounded-full" height="100" 
               src="/image/football.jpg" width="100"/>
                <div class="flex items-center space-x-6">
                    <div>
                        <h2 class="text-xl font-bold">
                            FADIL RAHMAN </h2>
                        <div class="grid grid-cols-3 gap-10">
                            <div>
                                <p>Email</p>
                                <p class="font-semibold">fadil@gmail.com</p>
                            </div>
                            <div>
                                <p>Name</p>
                                <p class="font-semibold">Fadil Rahman</p>
                            </div>
                            <div>
                                <p>Gender</p>
                                <p class="font-semibold">Male</p>
                            </div>
                            <div>
                                <p>City</p>
                                <p class="font-semibold">Bandung</p>
                            </div>
                            <div>
                                <p>Phone Number</p>
                                <p class="font-semibold">0822-5678-9012</p>
                            </div>
                            <div>
                                <p>Favorite Sports</p>
                                <p class="font-semibold">Running</p>
                                <p class="font-semibold">Football</p>
                            </div>
                            </div>
                                <button class="mt-4 px-6 py-2 bg-red-500 text-white rounded-full hover:bg-red-700">
                                    EDIT PROFIL
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="flex justify-end">
               <div class="lg:w-4/5 md:w-4/5 p-6">
                  <div class="mt-6">
                     <div class="flex space-x-4">
                        <!-- Buttons -->
                        <button class="tab-btn bg-red-500 text-white px-4 py-2 rounded-t-lg" data-tab="my-posts">MY POST</button>
                        <button class="tab-btn bg-gray-200 text-gray-700 px-4 py-2 rounded-t-lg" data-tab="friends">FRIENDS</button>
                        <button class="tab-btn bg-gray-200 text-gray-700 px-4 py-2 rounded-t-lg" data-tab="favorite-venue">FAVORITE VENUE</button>
                     </div>
                  </div>
            
                  <div id="my-posts" class="tab-content bg-white p-6 rounded-b-lg shadow-md">
                     <!-- Wrapper with border -->
                     <div class="border border-gray-300 rounded-lg p-4 max-w-md">
                        <!-- User info -->
                        <div class="flex items-center space-x-4">
                           <img alt="User Profile Picture" class="h-10 w-10 rounded-full" src="/image/football.jpg" />
                           <div>
                              <p class="font-bold">Fadil</p>
                              <p class="text-gray-500">Today 6.59 PM</p>
                           </div>
                        </div>
                        <!-- Post text -->
                        <p class="mt-4">Rutinitas dihari libur!</p>
                        <!-- Post image -->
                        <img alt="Post Image" class="mt-4 max-w-full rounded-lg" src="https://storage.googleapis.com/a1aa/image/j2eYnaJFczzsHC1aZzAyEOWuAIEeteVgrKnucLWeSwGxLWUPB.jpg" />
                     </div>

                     <div class="border border-gray-300 rounded-lg p-4 max-w-md mt-6">
                        <!-- User info -->
                        <div class="flex items-center space-x-4">
                           <img alt="User Profile Picture" class="h-10 w-10 rounded-full" src="/image/football.jpg" />
                           <div>
                              <p class="font-bold">Fadil</p>
                              <p class="text-gray-500">Today 6.59 PM</p>
                           </div>
                        </div>
                        <!-- Post text -->
                        <p class="mt-4">Rutinitas dihari libur!</p>
                        <!-- Post image -->
                        <img alt="Post Image" class="mt-4 max-w-full rounded-lg" src="https://storage.googleapis.com/a1aa/image/j2eYnaJFczzsHC1aZzAyEOWuAIEeteVgrKnucLWeSwGxLWUPB.jpg" />
                     </div>
                  </div>
                                    
            
                  <div id="friends" class="tab-content hidden bg-white p-6 rounded-b-lg shadow-md">
                     <!-- Header -->
                     <h2 class="font-bold text-xl mb-4">Friends List</h2>
                     
                     <!-- Friends List -->
                     <ul>
                        <!-- Friend 1 -->
                        <li class="flex items-center mb-4 hover:bg-gray-100 p-4 rounded-lg">
                           <img alt="Friend 1" class="rounded-full w-10 h-10 mr-4" src="https://via.placeholder.com/150" />
                           <div>
                              <p class="font-medium">Wiyah</p>
                              <p class="text-gray-500 text-sm">Online 3 hours ago</p>
                           </div>
                        </li>
                        
                        <!-- Friend 2 -->
                        <li class="flex items-center mb-4 hover:bg-gray-100 p-4 rounded-lg">
                           <img alt="Friend 2" class="rounded-full w-10 h-10 mr-4" src="https://via.placeholder.com/150" />
                           <div>
                              <p class="font-medium">Madli</p>
                              <p class="text-gray-500 text-sm">Online 2 hours ago</p>
                           </div>
                        </li>
                        
                        <!-- Friend 3 -->
                        <li class="flex items-center mb-4 hover:bg-gray-100 p-4 rounded-lg">
                           <img alt="Friend 3" class="rounded-full w-10 h-10 mr-4" src="https://via.placeholder.com/150" />
                           <div>
                              <p class="font-medium">Natan</p>
                              <p class="text-gray-500 text-sm">Online 5 hours ago</p>
                           </div>
                        </li>
                     </ul>
                  </div>
                  
            
                  <div id="favorite-venue" class="tab-content hidden bg-white p-6 rounded-b-lg shadow-md">
                     <!-- Header -->
                     <h2 class="font-bold text-xl mb-4">Favorite Venues</h2>
                     
                     <!-- Venue List -->
                     <ul>
                        <!-- Venue 1 -->
                        <li class="flex items-center mb-4 p-4 hover:bg-gray-100 rounded-lg">
                           <img alt="Venue 1" class="rounded-lg w-20 h-20 object-cover mr-4" src="/image/basketball-court.jpg" />
                           <div>
                              <p class="font-bold">Basketball Telkom</p>
                              <p class="text-gray-500">Location: Bandung</p>
                              <p class="text-yellow-500 flex items-center">
                                 ★★★★☆ (4.5)
                              </p>
                           </div>
                        </li>
                        
                        <!-- Venue 2 -->
                        <li class="flex items-center mb-4 p-4 hover:bg-gray-100 rounded-lg">
                           <img alt="Venue 2" class="rounded-lg w-20 h-20 object-cover mr-4" src="/image/indoors-tennis-court.jpg" />
                           <div>
                              <p class="font-bold">GOR Spontan</p>
                              <p class="text-gray-500">Location: Bandung</p>
                              <p class="text-yellow-500 flex items-center">
                                 ★★★★★ (5.0)
                              </p>
                           </div>
                        </li>
                        
                        <!-- Venue 3 -->
                        <li class="flex items-center mb-4 p-4 hover:bg-gray-100 rounded-lg">
                           <img alt="Venue 3" class="rounded-lg w-20 h-20 object-cover mr-4" src="/image/runway-stadium.jpg" />
                           <div>
                              <p class="font-bold">Lapangan Bola Telkom</p>
                              <p class="text-gray-500">Location: Bandung</p>
                              <p class="text-yellow-500 flex items-center">
                                 ★★★★☆ (4.2)
                              </p>
                           </div>
                        </li>
                     </ul>
                  </div>
                  
               </div>
            </div>

            <script>
               // Select all buttons and tab contents
               const tabButtons = document.querySelectorAll('.tab-btn');
               const tabContents = document.querySelectorAll('.tab-content');
            
               // Add click event to each button
               tabButtons.forEach(button => {
                  button.addEventListener('click', () => {
                     const targetTab = button.getAttribute('data-tab');
            
                     // Hide all tabs
                     tabContents.forEach(content => content.classList.add('hidden'));
            
                     // Remove active class from all buttons
                     tabButtons.forEach(btn => {
                        btn.classList.remove('bg-red-500', 'text-white');
                        btn.classList.add('bg-gray-200', 'text-gray-700');
                     });
            
                     // Show the targeted tab
                     document.getElementById(targetTab).classList.remove('hidden');
            
                     // Highlight the active button
                     button.classList.add('bg-red-500', 'text-white');
                     button.classList.remove('bg-gray-200', 'text-gray-700');
                  });
               });
            </script>     
        </div>              
    </main>
</body>

</html>