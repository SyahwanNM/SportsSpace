<?php
include '../../dbconnection.php';
$sql = "SELECT * FROM komunitas";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8"/>
  <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
  <title>Sports Space</title>
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
   <nav class="fixed top-0 z-50 w-full bg-white border-red-700">
      <div class="px-3 py-3 lg:px-5 lg:pl-3">
      <div class="flex items-center justify-between">
         <div class="flex items-center justify-start rtl:justify-end">
            <button data-drawer-target="logo-sidebar" data-drawer-toggle="logo-sidebar" aria-controls="logo-sidebar" type="button" class="inline-flex items-center p-2 text-sm text-black rounded-lg sm:hidden hover:bg-red-100 focus:outline-none focus:ring-2 focus:ring-red-400">
               <span class="sr-only">Open sidebar</span>
               <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                  <path clip-rule="evenodd" fill-rule="evenodd" d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z"></path>
               </svg>
            </button>
            <a href="#" class="flex ms-2 md:me-24">
            <img src="/image/logo.png" class="h-10 me-3" alt="FlowBite Logo" />
            <span class="self-center text-xl font-semibold sm:text-2xl whitespace-nowrap dark:text-white">SportsSpace</span>
            </a>
         </div>
         
         <div class="flex items-center w-1/2 mr-40">
            <div class="rounded-full bg-gray-200 hover:bg-red-500 mr-2">
               <button class="p-2 rounded-lg bg-gray-200 hover:bg-red-500">
                  <i class="fi fi-rs-bars-filter"></i>
               </button>
            </div>
            <input class="border rounded-full px-6 py-2 w-full" placeholder="Search Here" type="text" />
            <button class="ml-2 p-2 rounded-full bg-gray-200 hover:bg-gray-300">
               <i class="fi fi-rs-search"></i>
            </button>
         </div>
         
         <div class="flex items-center">
            <button class="p-2 rounded-full bg-gray-200 hover:bg-red-500">
               <i class="fi fi-rs-bell"></i>
            </button>
            <div class="flex items-center ms-3">
               <div>
                  <button type="button" class="flex text-sm bg-white rounded-full focus:ring-4 focus:ring-red-500" aria-expanded="false" data-dropdown-toggle="dropdown-user">
                  <span class="sr-only">Open user menu</span>
                  <img class="w-10 h-10 rounded-full" src="/image/football.jpg" alt="user photo">
                  </button>
               </div>
               <div class="z-50 hidden my-4 text-base list-none bg-white divide-y divide-red-200 rounded shadow" id="dropdown-user">
                  <div class="px-4 py-3" role="none">
                  <p class="text-sm text-black" role="none">
                     Fadil Rahman
                  </p>
                  <p class="text-sm font-medium text-black truncate" role="none">
                     Fadilrahman@gmail.com
                  </p>
                  </div>
                  <ul class="py-1" role="none">
                     <li>
                        <a href="#" class="block px-4 py-2 text-sm text-black hover:bg-red-700 hover:text-white" role="menuitem">About Us</a>
                     </li>
                     <li>
                        <a href="#" class="block px-4 py-2 text-sm text-black hover:bg-red-700 hover:text-white" role="menuitem">Contact Us</a>
                     </li>
                     <li>
                        <a href="#" class="block px-4 py-2 text-black hover:bg-red-700 hover:text-white" role="menuitem">Settings</a>
                     </li>
                  </ul>
               </div>
            </div>
            <button data-modal-target="logout-modal" data-modal-toggle="logout-modal" class="text-red-900 hover:bg-red-600 hover:text-white font-medium rounded-full text-sm ml-2 px-5 py-2.5 text-center" type="button">
               Log Out
            </button>

               <div id="logout-modal" tabindex="-1" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                  <div class="relative p-4 w-full max-w-md max-h-full">
                     <div class="relative bg-white rounded-lg shadow dark:bg-white">
                        <!-- Tombol Close -->
                        <button type="button" class="absolute top-3 end-2.5 text-red-600 bg-transparent hover:bg-red-600 hover:text-white rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-red-700 dark:hover:text-white" data-modal-hide="logout-modal">
                           <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                              <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                           </svg>
                           <span class="sr-only">Close modal</span>
                        </button>
                           
                           <!-- Konten Modal -->
                        <div class="p-4 md:p-5 text-center">
                           <h3 class="mb-5 text-lg font-normal text-gray-900 dark:text-gray-900">Are you sure you want to log out?</h3>
                              
                           <!-- Tombol Yes -->
                           <a href="/landingpage/firstpage.html" class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center">
                              Yes, log out
                           </a>
                              
                           <!-- Tombol No -->
                           <button data-modal-hide="logout-modal" type="button" class="py-2.5 px-5 ms-3 text-sm font-medium text-white focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">
                              No, cancel
                           </button>
                        </div>
                     </div>
                  </div>
               </div>  
            </div>
         </div>
      </div>
   </nav>
   
   <aside id="logo-sidebar" class="fixed top-0 left-0 z-40 w-64 h-screen pt-20 transition-transform -translate-x-full bg-white border-r sm:translate-x-0" aria-label="Sidebar">
      <div class="h-full px-3 pb-4 overflow-y-auto bg-white">
         <ul class="space-y-2 font-medium">
            <li>
               <a href="#" class="flex items-center p-2 text-black rounded-lg hover:bg-red-700 hover:text-white group">
                  <i class="fi fi-rs-home">
                  </i>
                  <span class="ms-3">Dashboard</span>
               </a>
            </li>
            <li>
               <a href="#" class="flex items-center p-2 text-black rounded-lg hover:bg-red-700 hover:text-white group">
                  <i class="fi fi-rs-users-alt"></i>
                  <span class="flex-1 ms-3 whitespace-nowrap">Community</span>
               </a>
            </li>
            <li>
               <a href="#" class="flex items-center p-2 text-black rounded-lg hover:bg-red-700 hover:text-white group">
                  <i class="fi fi-rs-court-sport">
                  </i>
                  <span class="flex-1 ms-3 whitespace-nowrap">Field</span>
               </a>
            </li>
            <li>
               <a href="#" class="flex items-center p-2 text-black rounded-lg hover:bg-red-700 hover:text-white group">
                  <i class="fi fi-rs-trophy-star"></i>
                  </i>
                  <span class="flex-1 ms-3 whitespace-nowrap">Reward</span>
               </a>
            </li>
            <li>
               <a href="#" class="flex items-center p-2 text-black rounded-lg hover:bg-red-700 hover:text-white group">
                  <i class="fi fi-rs-two-swords"></i>
                  <span class="flex-1 ms-3 whitespace-nowrap">Sports Group</span>
               </a>
            </li>
            <li>
               <a href="/profile/profile.html" class="flex items-center p-2 text-black rounded-lg hover:bg-red-700 hover:text-white group">
                  <i class="fi fi-rs-user">
                  </i>
                  <span class="flex-1 ms-3 whitespace-nowrap">Profile</span>
               </a>
            </li>
         </ul>
      </div>
   </aside>
   
   </div>
   <main class="pt-20">
      <div class="flex justify-end">
         <!-- Main Content -->
         <div class="lg:w-3/5 md:w-3/5 p-4 ">  
            <!-- Container Utama -->

            <div class="max-w-5xl mx-auto bg-white shadow-lg rounded-lg overflow-hidden mt-8">
                <!-- Gambar Header -->
                <?php
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) { 
                 ?> 
                <div class="relative">
                    <?php echo '<img src="images/komunitas/' . $row['sampul'] . '" class="w-full h-32 object-cover">'; ?>
                </div>

                <!-- Bagian Profil Komunitas -->
                <div class="flex items-center justify-center -mt-12">
                  <?php echo '<img src="images/komunitas/' . $row['foto'] . '"class="w-32 h-32 rounded-full border-4 border-white shadow-md z-10">'; ?>
                </div>

                <!-- Informasi Komunitas -->
                <div class="text-center mt-4 mb-6">
                    <?php echo '<h2 class="text-2xl font-bold text-gray-800 items-center">'. $row['nama'] .'</h2>'; ?>
                    <?php echo '<p class="text-gray-600">'.$row['tipe']. '|' .$row['kota']. '|' .$row['maxMember'].'</p>'; ?>
                </div>
                <div class="flex justify-end mb-6 pr-6">
                    <button class="items-center bg-red-600 text-white w-24 px-4 py-2 rounded-lg hover:bg-red-700">JOIN</button>
                </div>
            </div>

                <!-- Tab Menu -->
                <div class="mt-6">
                    <div class="flex space-x-4">
                    <!-- Buttons -->
                    <button class="tab-btn bg-red-500 text-white px-4 py-2 rounded-t-lg" data-tab="About-community">About Community</button>
                    <button class="tab-btn bg-gray-200 text-gray-700 px-4 py-2 rounded-t-lg" data-tab="Members">Members</button>
                    </div>
                </div>

                <div id="About-community" class="tab-content bg-white p-6 rounded-b-lg shadow-md">
                    <div class="p-4">
                        <?php echo '<p class="text-gray-700 leading-relaxed">'.$row['Deskripsi'].'</p>';?>
                    </div>
                </div>

                <div id="Members" class="tab-content hidden bg-white p-6 rounded-b-lg shadow-md">
                    <div class="grid grid-cols-2 gap-4 p-6">
                        <div>
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
                         <?php
                            }}
                         ?>
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
            <div class="lg:w-1/5 md:w-1/4 sm:w-full p-4">
               <div class="fixed md:relative sm:relative">
                  <!-- Friends List -->
                  <div class="bg-white p-4 rounded-lg shadow mb-4">
                     <h3 class="text-lg font-bold mb-4">Friend</h3>
                     <ul>
                        <li class="flex items-center mb-2 hover:bg-gray-100 p-2 rounded-lg">
                           <img alt="Friend 1" class="rounded-full mr-2" height="30" src="https://storage.googleapis.com/a1aa/image/oDJoEMVqSvYhGBkeGM3OOYudbjHWHZwNX96KKC7DZwRfiF1TA.jpg" width="30"/>
                           <div>
                              <p class="font-medium">Wiyah</p>
                              <p class="text-gray-500 text-sm">Online 3 Jam yang lalu</p>
                           </div>
                        </li>
                        <!-- Tambahkan teman lainnya... -->
                     </ul>
                  </div>
                  <!-- Incoming Activity -->
                  <div class="bg-white p-4 rounded-lg shadow">
                     <h3 class="text-lg text-red-700 font-bold mb-4">Incoming Activity</h3>
                     <div class="flex items-center mb-2 hover:bg-gray-100 hover:scale-105 transform p-2 rounded-lg">
                        <div class="bg-red-700 text-white rounded-full w-10 h-10 flex items-center justify-center mr-2">
                           <p class="font-bold">20</p>
                        </div>
                        <div>
                           <p class="font-medium">Badminton</p>
                           <p class="text-gray-500 text-sm">14.00 - 16.00</p>
                           <p class="text-gray-500 text-sm">Fun Game Bersama</p>
                        </div>
                     </div>
                     <!-- Tambahkan aktivitas lainnya... -->
                  </div>
               </div>
            </div>
            
         </div>
      </div>
   </main>
</body>
</html>