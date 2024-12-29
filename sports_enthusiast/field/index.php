<?php
session_start();
include '../../dbconnection.php';
include '../../template/header-user.php';
$base_url = "HTTP://" . $_SERVER['HTTP_HOST'] . "/sportsspace/sports_enthusiast";
$query = "SELECT * FROM field LIMIT 3";
$result = $conn->query($query);
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
    


<!-- commit pertama di branch -->
</head>
<style>
   body {
      font-family: 'Plus Jakarta Sans', sans-serif;
   }
</style>
<body class="bg-gray-100">
   <main class="pt-20 pb-20">
    <div class="flex flex-col lg:flex-row">
      <div class="lg:w-1/5 md:w-1/4 sm:w-full p-4 sticky top-0 lg:static">
         <?php include '../../template/sidebar-user.php'; ?>
      </div>
        <!-- Main Content -->
        <div class="flex-grow lg:w-4/5 md:w-3/4 sm:w-full p-4">
            <div class="bg-white p-4 rounded-lg shadow mb-4">
               <h2 class="text-2xl font-bold text-red-700 mb-4">Add Field</h2>
               <a href="<?=$base_url?>/field/add.php">
                  <button class="text-blue-500 flex items-center hover:text-blue-700 mb-4">Click here to add field</button>
               </a>
            </div>
            <div>
                <h2 class="text-2xl font-bold mb-4">Trending</h2>
                    <!-- Tampilkan setiap lapangan dalam card -->
                    <div class="grid grid-cols-4 gap-4">
                     <?php
                     if ($result->num_rows > 0) {
                       while ($row = $result->fetch_assoc()) {
                           $price_format = number_format($row['price'], 0, ',', '.');
                           echo "<a href='{$base_url}/field/detail-field.php?id={$row['id_field']}'>
                                    <div class='bg-white p-4 rounded-lg shadow-lg hover:bg-gray-200'>
                                       <img alt='Field Photo' class='rounded-lg mb-4 h-24 w-40' src='{$row['foto']}'/>
                                       <h3 class='text-sm font-semibold'>{$row['nama_lapangan']}</h3>
                                       <p class='text-sm'>Price: Rp {$price_format} /Jam</p>
                                       <div class='flex items-center space-x-2'>
                                          <i class='fi fi-rs-marker text-red-600'></i>
                                          <p class='text-sm'>{$row['lokasi']}</p>
                                       </div>
                                    </div>
                                 </a>";
                         }
                     }
                     ?>
                  </div>
               </div>

            <!-- Recommended For You Section -->
            <div class="mt-8">
                <h2 class="text-2xl font-bold mb-4">Recommended For You</h2>
                <div class="grid grid-cols-3 gap-4">
                  <?php
                     $sql = "SELECT f.* from field f JOIN users u ON f.lokasi = u.kota where u.user_id = ?";
                     $stmt = $conn->prepare($sql);
                     $stmt->bind_param("i", $_SESSION['user_id']); 
                     $stmt->execute();
                     $hasil = $stmt->get_result();
                     while ($data = $hasil->fetch_assoc()) {
                        echo "<div class='bg-white p-4 rounded-lg shadow-lg'>
                                 <img alt='Rajawali Futsal' class='rounded-lg mb-4 h-40 w-60' src='{$data['foto']}'/>
                                 <h3 class='text- font-semibold'>{$data['nama_lapangan']}</h3>
                                 <p>Price: {$data['price']}</p>
                                 <div class='flex items-center space-x-2'>
                                    <i class='fi fi-rs-marker text-red-600'></i>
                                    <span>{$data['lokasi']}</span>
                                 </div>
                              </div>";
                     }
                     $stmt->close();
                     $conn->close();
                  ?>
                </div>
            </div>
        </div>

        <!-- Right Sidebar -->
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