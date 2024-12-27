<?php
include '../../dbconnection.php';

if (isset($_POST['btnSubmit'])) {
    $id = $_POST["idKomunitas"];
    $tipe = $_POST["tipe"];
    $nama = $_POST["nama"];
    $maxMember = $_POST["maxMember"];
    $provinsi = $_POST["provinsi"];
    $kota = $_POST["kota"];
    $deskripsi = $_POST["deskripsi"];
    

    $foto = $_FILES['foto']['name'];
    $foto_tmp = $_FILES['foto']['tmp_name'];
    $foto_path = "images/komunitas/" . basename($foto);
    move_uploaded_file($foto_tmp, $foto_path);

    $sampul = $_FILES['sampul']['name'];
    $sampul_tmp = $_FILES['sampul']['tmp_name'];
    $sampul_path = "images/komunitas/" . basename($sampul);
    move_uploaded_file($sampul_tmp, $sampul_path);

    $sqlStatement = "INSERT INTO komunitas VALUES ('$id', '$tipe', '$nama', '$maxMember', '$provinsi', '$kota', '$foto', '$sampul', '$deskripsi')";
    $query = mysqli_query($conn, $sqlStatement);
     if ($query) {
         $succesMsg = "Community added successfully " ;
         header("location:komunitas.php?successMsg=$succesMsg");
     } else {
         $errMsg = "Community failed to add " . mysqli_error($conn);
     }
}

$sqlStatement = "SELECT * FROM komunitas";
$query = mysqli_query($conn, $sqlStatement);
$dtprodi = mysqli_fetch_all($query, MYSQLI_ASSOC);
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
               <a href="komunitas.php" class="flex items-center p-2 text-black rounded-lg hover:bg-red-700 hover:text-white group">
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
            
         <?php
        if (isset($errMsg)) {
        ?>
            <div class="alert alert-danger" role="alert">
                <?= $errMsg ?>
            </div>
        <?php
        }
        ?>
            <h2 class="text-2xl font-bold text-red-700 mb-2 mt-4 text-center ">Create Your Own Community</h2>
            <form method="POST" enctype="multipart/form-data" class="bg-white p-4 rounded shadow">
                <div class="flex space-x-4">
                <div class="w-1/2" >
                    <div class="mb-2">
                        <label class="block text-gray-700 font-bold text-center mr-20">Community Profil</label>              
                        <img src="/asset/img/addFoto.png" class="w-24 h-24 rounded-full items-center ml-20">                        
                        <input type="file" id="foto" name="foto" class="w-64 h-9 border border-red-600 rounded-xl p-0 mt-2">
                    </div>
                    <div class="mb-2">
                        <label class="block text-gray-700 font-bold text-center mr-20">Cover Community</label>              
                        <img src="/asset/img/addFoto2.png" class="w-64 h-24 ">                        
                        <input type="file" id="sampul" name="sampul" class="w-64 h-9 border border-red-600 rounded-xl p-0 mt-2">
                    </div>
                </div>
                <div class="w-1/2">
                    <div class="mb-3">
                        <label class="block text-gray-700 font-bold">Type of Sports:</label>
                        <select id="tipe" name="tipe" class="w-full border border-red-600 rounded-xl h-8 p-1" required>
                            <option value="" disabled selected>Choose the type of sport</option>
                            <option value="Futsal">Futsal</option>
                            <option value="Basket">Basket</option>
                            <option value="Badminton">Badminton</option>
                            <option value="Volly">Volly</option>
                            <option value="Tennis">Tennis</option>
                            <option value="Table Tennis">Table Tennis</option>
                        </select>
                    </div>
                    
                    <div class="mb-3">
                        <label class="block text-gray-700 font-bold">Community Name:</label>
                        <input type="text" id="nama" name="nama" class="w-full h-8 border border-red-600 rounded-xl p-2" placeholder="Enter the community name">
                    </div>
                    <div class="mb-3">
                        <label class="block text-gray-700 font-bold">Maximum Members:</label>
                        <input type="number" id="maxMember" name="maxMember" class="w-full h-8 border border-red-600 rounded-xl p-2" placeholder="Enter the maximum members">
                    </div>
                    <div class="mb-3">
                        <label class="block text-gray-700 font-bold">Comunnity Address:</label>
                        <input type="text" id="provinsi" name="provinsi" class="w-full h-8 border border-red-600 rounded-xl p-2 " placeholder="Province">
                    </div>
                    <div class="mb-3">
                        <input type="text" id="kota" name="kota" class="w-full h-8 border border-red-600 rounded-xl p-2" placeholder="City">
                    </div>
                    <div class="mb-3">
                        <label class="block text-gray-700 font-bold">Description:</label>       
                        <textarea id="deskripsi" name="deskripsi" class="w-full border border-red-600 rounded p-2 h-24"></textarea>
                    </div>
                </div>
                </div>
                <div class="text-center">
                    <input type="submit" class="bg-red-600 text-white px-4 py-2 rounded hover:bg-red-800" name="btnSubmit" value="Create">
                </div>
            </form>
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