<?php
session_start();
$base_url = "HTTP://" . $_SERVER['HTTP_HOST'] . "/sportsspace";
if (!isset($_SESSION['user_id']) || !isset($_SESSION['role'])) {
    header("Location:". $base_url. "/login.php");
    exit();
}
if ($_SESSION['role'] !== 'user') {
    echo "Akses ditolak. Halaman ini hanya untuk user. <a href=".$base_url."/admin/index.php>Kembali</a>";
    exit();
}
include "../template/header-user.php";
include "../template/sidebar-user.php";
include "../template/right-menu-users.php";
include "../template/footer.php";
?>

         <!-- Header -->
         
         <!-- Banner -->
         <div class="flex mb-4">
            <img alt="Sports Field" class="w-2/3 h-48 object-cover rounded-lg mr-2" height="200" src="https://storage.googleapis.com/a1aa/image/IL9ae7agdAzJXaRDqzdksZzOWFz6IfpUxqdSfYoJUE0xFLqnA.jpg" width="600"/>
            <div class="w-1/3 h-48 bg-red-500 text-white flex items-center justify-center rounded-lg">
               <div class="text-center">
                  <p class="text-xl font-bold">DISCOUNT START FROM</p>
                  <p class="text-4xl font-bold">20% - 50%</p>
                  <p class="text-sm">JUST IN SPORTS SPACE</p>
               </div>
            </div>
         </div>
         <!-- Weekly Activity -->
         <div class="bg-white p-4 rounded-lg shadow mb-4">
            <h2 class="text-2xl font-bold text-red-500 mb-2">Weekly Activity</h2>
            <p class="text-gray-500 mb-4">Activity Feed</p>
            <button class="text-blue-500 flex items-center hover:text-blue-700">
            Buat Postingan
            <i class="fas fa-plus ml-2"></i>
            </button>
         </div>
         <!-- Post -->
         <div class="bg-white p-4 rounded-lg shadow mb-4">
            <div class="flex items-center mb-4">
               <img alt="User Profile" class="rounded-full mr-2" height="40" src="https://storage.googleapis.com/a1aa/image/tkocYm96vf31EyzV9lKuARJvtv5uJCebXk4fhFFlTwTtFLqnA.jpg" width="40"/>
               <div>
                  <p class="font-bold">Anto</p>
                  <p class="text-gray-500 text-sm">Hari ini 6.59 PM</p>
               </div>
            </div>
            <p class="mb-4">Rutinitas dihari libur!</p>
               <img alt="Playing Soccer" class="w-full rounded-lg" height="300" src="https://storage.googleapis.com/a1aa/image/j2eYnaJFczzsHC1aZzAyEOWuAIEeteVgrKnucLWeSwGxLWUPB.jpg" width="600"/>
        </div>
    </div>
    <!-- Right Sidebar