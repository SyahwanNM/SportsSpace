<?php
$base_url = "HTTP://" . $_SERVER['HTTP_HOST'] . "/sportsspace/sports_enthusiast";
require "../../dbconnection.php";
include '../../template/header-user.php';

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
      <div class="flex justify-end">
         <?php
            include '../../template/sidebar-user.php';
         ?>
         <!-- Main Content -->
         <div class="xl:w-3/5 lg:w-3/5 md:w-3/5 p-4 mr-8">
            <!-- Banner -->
            <div class="bg-white p-4 rounded-lg shadow mb-4">
               <h2 class="text-2xl font-bold text-red-700 mb-4">Create Sports Group</h2>
               <a href="<?=$base_url?>/sports_group/add.php">
                  <button class="text-blue-500 flex items-center hover:text-blue-700 mb-4">Click here to add sports group</button>
               </a>
            </div>
            <!-- Post -->
            <div class="bg-white p-4 rounded-lg shadow mb-4">
                  <h1 class="text-center font-extrabold text-xl text-red-700 mb-6">SPORTS GROUP</h1>
               <div class="grid grid-cols-3 gap-8">
                  <?php
                     $query = "SELECT * FROM sports_group";
                     $result = $result = $conn->query($query);
                     if ($result->num_rows>0){
                        while ($row = $result->fetch_assoc()){
                           echo "
                           <a href='{$base_url}/sports_group/detail-group.php?id={$row['id']}'>
                           <div class='my-2 p-2 bg-gray-100 relative rounded-lg shadow'>";
                           $jenis_olahraga = $row['jenis_olahraga'];
                           if ($jenis_olahraga == 'Badminton') {
                              echo "
                              <div class='p-2 bg-red-700  rounded-md absolute -right-3 -top-3  '>
                                 <img src='../../asset/img/badminton-icon.png' alt=''>
                              </div>";
                           } else if ($jenis_olahraga == "Voli") {
                              echo "
                              <div class='p-2 bg-red-700  rounded-md absolute -right-3 -top-3'>
                                 <i class='fa-solid fa-volleyball' style='color:white'></i>
                              </div> ";
                           } else if ($jenis_olahraga == "Futsal") {
                              echo "
                              <div class='p-2 bg-red-700  rounded-md absolute -right-3 -top-3'>
                                 <i class='fa-solid fa-futbol' style='color:white'></i>
                              </div>";
                           } else if ($jenis_olahraga == "Basket") {
                              echo "
                              <div class='p-2 bg-red-700  rounded-md absolute -right-3 -top-3'>
                                 <i class='fa-solid fa-basketball' style='color:white'></i>
                              </div>";
                           }

                        echo"
                        <p class='font-semibold text-center mb-4'>{$row['title']}</p>
                        <div class='flex items-center my-2'>
                           <i class='fa-solid fa-calendar-days mx-2' style='color: #D60505;'></i>
                           <p class='sm: text-none md: text-xs font-medium lg: text-md font-medium'>{$row['event_date']}</p>
                        </div>
                        <div class='flex items-center my-2'>
                           <i class='fa-solid fa-clock mx-2' style='color: #D60505;'></i>
                           <p class='md: text-xs font-medium lg: text-md font-medium'>{$row['start_time']} - {$row['end_time']}</p>
                        </div>
                        <div class='flex items-center my-2 mb-10'>
                           <i class='fa-solid fa-location-dot mx-2' style='color: #D60505;'></i>
                           <p class='md: text-xs font-medium lg: text-md font-medium'>{$row['city']}</p>
                        </div>
                        <div class='py-2 items-center justify-between bg-red-700 absolute bottom-0 right-0 left-0 rounded-b-lg flex'>
                           <div class='items-center mx-2 flex'>
                              <i class='fa-solid fa-user-group fa-xs' style='color:white;'></i>
                              <p class='text-xs text-white'>{$row['current_members']} / {$row['kapasitas_maksimal']}</p>
                           </div>
                           <div class='flex mx-2'>
                              <img class='rounded-full w-6' src='https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcR4cXdyD8JaA2V9NyT62jvDwgzS4CV2cmWdfA&s' alt=''>
                              <img class='rounded-full w-6' src='https://t3.ftcdn.net/jpg/02/43/12/34/360_F_243123463_zTooub557xEWABDLk0jJklDyLSGl2jrr.jpg' alt=''>
                           </div>
                        </div>
                    </div>
                    </a>";
                        }
                     }
                  ?>
               </div>  
            </div>
         </div>
         <div class="lg:w-1/5 md:w-1/4 sm:w-full p-4 sticky top-0">
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