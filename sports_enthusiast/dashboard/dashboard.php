
<?php
session_start(); // Panggil session_start() sebelum output apa pun

// Pastikan path benar sesuai dengan struktur folder
include '../../template/header-user.php';
include '../../template/sidebar-user.php';
include '../../template/footer.php';



// Base URL
$base_url = "http://" . $_SERVER['HTTP_HOST'] . "/SportsSpace";

// Cek apakah session user_id dan role ada
if (!isset($_SESSION['user_id']) || !isset($_SESSION['role'])) {
    header("Location: " . $base_url . "/login.php");
    exit();
}

// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sports_space";

$conn = new mysqli($servername, $username, $password, $dbname);

// Cek koneksi
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
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
      <div class="flex justify-end">
         <!-- Main Content -->
         <div class=" xl:w-3/5 lg:w-3/5 md:w-3/5 p-4 mr-8">  
            <!-- Banner -->
            <div class="flex mb-4">
               <div id="default-carousel" class="relative w-full" data-carousel="slide">
                  <!-- Carousel wrapper -->
                  <div class="relative h-60 overflow-hidden rounded-lg md:h-75">
                     <!-- Item 1 -->
                     <div class="hidden duration-700 ease-in-out" data-carousel-item>
                        <img src="https://storage.googleapis.com/a1aa/image/IL9ae7agdAzJXaRDqzdksZzOWFz6IfpUxqdSfYoJUE0xFLqnA.jpg" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
                     </div>
                     <!-- Item 2 -->
                     <div class="hidden duration-700 ease-in-out" data-carousel-item>
                        <img src="https://storage.googleapis.com/a1aa/image/IL9ae7agdAzJXaRDqzdksZzOWFz6IfpUxqdSfYoJUE0xFLqnA.jpg" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
                     </div>
                     <!-- Item 3 -->
                     <div class="hidden duration-700 ease-in-out" data-carousel-item>
                        <img src="https://storage.googleapis.com/a1aa/image/IL9ae7agdAzJXaRDqzdksZzOWFz6IfpUxqdSfYoJUE0xFLqnA.jpg" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
                     </div>
                     <!-- Item 4 -->
                     <div class="hidden duration-700 ease-in-out" data-carousel-item>
                        <img src="https://storage.googleapis.com/a1aa/image/IL9ae7agdAzJXaRDqzdksZzOWFz6IfpUxqdSfYoJUE0xFLqnA.jpg" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
                     </div>
                     <!-- Item 5 -->
                     <div class="hidden duration-700 ease-in-out" data-carousel-item>
                        <img src="https://storage.googleapis.com/a1aa/image/IL9ae7agdAzJXaRDqzdksZzOWFz6IfpUxqdSfYoJUE0xFLqnA.jpg" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
                     </div>
                  </div>
                  <!-- Slider indicators -->
                  <div class="absolute z-30 flex -translate-x-1/2 bottom-5 left-1/2 space-x-3 rtl:space-x-reverse">
                     <button type="button" class="w-3 h-3 rounded-full" aria-current="true" aria-label="Slide 1" data-carousel-slide-to="0"></button>
                     <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 2" data-carousel-slide-to="1"></button>
                     <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 3" data-carousel-slide-to="2"></button>
                     <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 4" data-carousel-slide-to="3"></button>
                     <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 5" data-carousel-slide-to="4"></button>
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
               <div class="w-1/3 h-60 bg-red-700 text-white flex items-center justify-center rounded-lg">
                  <div class="text-center">
                     <p class="text-xl font-bold">MAKE YOUR FUN</p>
                     <p class="text-4xl font-bold">DOING SPORTS</p>
                     <p class="text-sm">ANYWHERE YOU WANT</p>
                  </div>
               </div>
            </div>

            <!-- Form untuk menambahkan postingan -->
            <div class="bg-white p-4 rounded-lg shadow mb-4">
               <h2 class="text-2xl font-bold text-red-700 mb-4">Buat Postingan</h2>
               <button id="createPostBtn" class="text-blue-500 flex items-center hover:text-blue-700 mb-4">
                     Tambahkan Postingan
               </button>
               <div id="postForm" class="hidden">
                     <form action="" method="post" enctype="multipart/form-data" class="bg-gray-100 p-4 rounded-lg shadow">
                        <div class="mb-4">
                           <label for="postTitle" class="block text-sm font-medium text-gray-700">Judul</label>
                           <input type="text" id="postTitle" name="postTitle" class="mt-1 block w-full p-2 border border-gray-300 rounded-md" required>
                        </div>
                        <div class="mb-4">
                           <label for="postContent" class="block text-sm font-medium text-gray-700">Konten</label>
                           <textarea id="postContent" name="postContent" rows="4" class="mt-1 block w-full p-2 border border-gray-300 rounded-md" required></textarea>
                        </div>
                        <div class="mb-4">
                           <label for="postImage" class="block text-sm font-medium text-gray-700">Upload Gambar</label>
                           <input type="file" id="postImage" name="postImage" accept="image/*" class="mt-1 block w-full p-2 border border-gray-300 rounded-md">
                        </div>
                        <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-700">Submit</button>
                     </form>
               </div>
            </div>

            <!-- Daftar postingan -->
            <div class="bg-white p-4 rounded-lg shadow mb-4">
               <h2 class="text-2xl font-bold text-red-700 mb-4">Activity Feed</h2>
               <?php if ($result->num_rows > 0): ?>
                  <?php while ($row = $result->fetch_assoc()): ?>
                     <div class="bg-white p-4 rounded-lg shadow mb-4">
                        <div class="flex items-center mb-4">
                              <img alt="User Profile" class="rounded-full w-12 h-12" height="40" src="/image/football.jpg" width="40" />
                              <div class="ml-3">
                                 <p class="font-bold">Fadil</p>
                                 <p class="text-gray-500 text-sm">
                                    <?php echo date('d M Y h:i A', strtotime($row['created_at'])); ?>
                                 </p>
                              </div>
                        </div>
                        <p class="mb-4"><?php echo htmlspecialchars($row['post_content']); ?></p>
                        <?php if (!empty($row['post_image'])): ?>
                              <div 
                                 class="w-full h-64 bg-cover bg-center rounded-lg mb-4 cursor-pointer" 
                                 style="background-image: url('<?php echo htmlspecialchars($row['post_image']); ?>');"
                                 onclick="showImagePopup('<?php echo htmlspecialchars($row['post_image']); ?>')">
                              </div>
                        <?php endif; ?>
                     </div>
                  <?php endwhile; ?>
               <?php else: ?>
                  <p class="text-gray-500">Belum ada postingan.</p>
               <?php endif; ?>
            </div>
         </div>

         <div class="lg:w-1/5 md:w-1/4 sm:w-full p-4 sticky top-0">
            <?php include '../../template/right-menu-users.php'; ?>
         </diV>
      </div>
   </main>
</body>
</html>
