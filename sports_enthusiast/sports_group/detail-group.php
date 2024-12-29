<?php
session_start();
require "../../dbconnection.php";
include '../../template/header-user.php';
$base_url = "HTTP://" . $_SERVER['HTTP_HOST'] . "/sportsspace/sports_enthusiast";
$id = $_GET['id'];
$query = "SELECT * FROM sports_group WHERE id = ?";
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
            <div class="flex space-x-6">
                    <div class="bg-white p-4 rounded-lg shadow mb-4 items-center ">
                        <h2 class=" text-2xl font-bold text-red-700 mb-2"><?=$row['title']?></h2>
                        <div class="bg-red-700 p-2 rounded-lg items-center shadow text-white">
                            <p class="text-white text-sm text-center"><?=$row['current_members']?> / <?=$row['kapasitas_maksimal']?></p>
                        </div>
                        <h2 class="text-xl font-bold mt-10">Date and Time</h2>
                        </h2>
                        <div class="flex items-center space-x-2 my-2">
                            <i class="fas fa-calendar-alt text-red-600"></i>
                            <span>
                                <?=$row['event_date']?>
                            </span>
                        </div>
                        <div class="flex items-center space-x-2 my-2">
                            <i class="fas fa-clock text-red-600"></i>
                            <span>
                                <?=$row['start_time']?> - <?=$row['end_time']?>
                            </span>
                        </div>
                        <h2 class="text-xl font-bold">
                            Venue
                        </h2>
                        <div class="flex items-center space-x-2 my-2">
                            <i class="fas fa-map-marker-alt text-red-600"></i>
                            <span>
                                Lapangan 1 Gor Sigma Badminton Arena
                            </span>
                        </div>
                    </div>
                    <div class="bg-white p-4 rounded-lg shadow mb-4 items-center ">
                        <?php
                            $price_format = number_format($row['payment_amount'], 0, ',', '.');
                        ?>
                        <h2 class=" text-2xl font-bold text-red-700 mb-2 text-center">Rp. <?=$price_format?></h2>
                        <div class="flex items-center">
                            <i class="fa-solid fa-circle-exclamation" style="color: #D60505;"></i>
                            <p class="font-semibold text-md ml-1">Receive cash payments and transfers to organizers at the venue.</p>
                        </div>
                        <button class="bg-red-600 text-white py-2 px-4 rounded-md my-2 w-full">JOIN NOW</button>
                        <div class="flex items-center">
                            <i class='fa-solid fa-location-dot mx-2' style='color: #D60505;'></i>
                            <h2 class="font-semibold text-md ml-1">Location</h2>
                        </div>
                        <a href="<?=$row['address']?>">
                            <button class="bg-gray-300 text-red-600 py-2 px-4 rounded-md my-2">Click Here</button>
                        </a>
                    </div>
                    <div class="bg-white p-4 rounded-md shadow-md w-1/3 lg:w-1/4">
                        <h2 class="text-xl font-bold">Members</h2>
                        <ul class="space-y-2">
                            <li class="flex items-center space-x-2">
                                <img alt="Member 1" class="h-10 w-10 rounded-full" height="40" src="https://storage.googleapis.com/a1aa/image/M0Zdfkib2oSNQSAXSm0rfnfxcGhhf1qA7auWKQzNTVCEHRffE.jpg" width="40"/>
                                <span>Wiyah</span>
                            </li>
                            <li class="flex items-center space-x-2">
                                <img alt="Member 2" class="h-10 w-10 rounded-full" height="40" src="https://storage.googleapis.com/a1aa/image/kxFToYerwOyf0U04sP7FfeExJEGNk1FbJPNwqexfdqkXaE9fJA.jpg" width="40"/>
                                <span>Fauzan</span>
                            </li>
                            <li class="flex items-center space-x-2">
                                <img alt="Member 3" class="h-10 w-10 rounded-full" height="40" src="https://storage.googleapis.com/a1aa/image/8UfjNoqfveKVLIwkgItfTQmAuJnlfpjo2nquPIjdT9pLMiefJA.jpg" width="40"/>
                                <span>Alex</span>
                            </li>
                            <li class="flex items-center space-x-2">
                                <img alt="Member 4" class="h-10 w-10 rounded-full" height="40" src="https://storage.googleapis.com/a1aa/image/V0CkgwhXQObBMJHeMSfuKJdKasM73VySzyHeVO2PXJzWjofPB.jpg" width="40"/>
                                <span>Niki</span>
                            </li>
                            <li class="flex items-center space-x-2">
                                <img alt="Member 5" class="h-10 w-10 rounded-full" height="40" src="https://storage.googleapis.com/a1aa/image/d39geqeBSAudTEiEJJKkxeHeHs8X4GLgsQUTBhUm2yWbGRffE.jpg" width="40"/>
                                <span>Gerrard</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
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