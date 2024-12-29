<?php
session_start();
$base_url = "HTTP://" . $_SERVER['HTTP_HOST'] . "/sportsspace";
require '../../dbconnection.php'; // koneksi ke database

// Pastikan user sudah login
if (!isset($_SESSION['user_id']) || !isset($_SESSION['role'])) {
    header("Location: " . $base_url . "/login.php?redirect=" . urlencode($_SERVER['REQUEST_URI']));
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $post_title = $_POST['post_title'];
    $post_content = $_POST['post_content'];

    // Upload files
    $post_image = 'upload_post/' . basename($_FILES['post_image']['name']);
    move_uploaded_file($_FILES['post_image']['tmp_name'], $post_image);

    // Insert data into database
    $query = "INSERT INTO posts (post_title, post_content, post_image)
              VALUES ('$post_title', '$post_content', '$post_image')";

    if ($conn->query($query) === TRUE) {
        header("Location: http://" .$_SERVER['HTTP_HOST'] ."/sportsspace/sports_enthusiast/dashboard/post_list.php");
        exit();
    } else {
        echo "Error: " . $conn->error;
    }
}
include '../../template/header-user.php';
include '../../template/footer.php';
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
</head>
<body class="bg-gray-100">

<main class="pt-20 pb-20">
    <div class="flex justify-end">
        <!-- Kolom Utama -->
            <?php
            include '../../template/sidebar-user.php';
            ?>
        <div class="xl:w-3/5 lg:w-3/5 md:w-3/5 p-4 mr-8">
            <!-- Carousel -->
            <div class="flex mb-4">
                <div id="default-carousel" class="relative w-full" data-carousel="slide">
                    <div class="relative h-60 overflow-hidden rounded-lg md:h-75">
                        <!-- Carousel items -->
                        <div class="hidden duration-700 ease-in-out" data-carousel-item>
                            <img src="https://storage.googleapis.com/a1aa/image/IL9ae7agdAzJXaRDqzdksZzOWFz6IfpUxqdSfYoJUE0xFLqnA.jpg" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
                        </div>
                    </div>
                </div>
            </div>

            <!-- Form untuk menambahkan postingan -->
            <div class="bg-white p-4 rounded-lg shadow mb-4">
               <h2 class="text-2xl font-bold text-red-700 mb-4">Buat Postingan</h2>
               <button id="createPostBtn" class="text-blue-500 flex items-center hover:text-blue-700 mb-4">Tambahkan Postingan</button>
               <!-- Form Buat Postingan -->
               <div id="postForm" class="bg-white p-4 rounded-lg shadow mb-8 hidden">
                   <form action="post_list.php" method="post" enctype="multipart/form-data" class="bg-gray-100 p-4 rounded-lg shadow">
                       <div class="mb-4">
                           <label for="post_title" class="block text-sm font-medium text-gray-700">Judul</label>
                           <input type="text" id="post_title" name="post_title" class="mt-1 block w-full p-2 border border-gray-300 rounded-md" required>
                       </div>
                       <div class="mb-4">
                           <label for="post_content" class="block text-sm font-medium text-gray-700">Konten</label>
                           <textarea id="post_content" name="post_content" rows="4" class="mt-1 block w-full p-2 border border-gray-300 rounded-md" required></textarea>
                       </div>
                       <div class="mb-4">
                           <label for="post_image" class="block text-sm font-medium text-gray-700">Upload Gambar</label>
                           <input type="file" id="post_image" name="post_image" accept="image/*" class="mt-1 block w-full p-2 border border-gray-300 rounded-md">
                       </div>
                       <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-700">Submit</button>
                   </form>
               </div>
            </div>


            <script>
               document.getElementById('createPostBtn').addEventListener('click', function() {
                   const form = document.getElementById('postForm');
                   form.classList.toggle('hidden');
               });
           </script>

            <!-- Daftar Postingan -->
            <div class="bg-white p-4 rounded-lg shadow mb-8">
                <h2 class="text-2xl font-bold text-red-700 mb-4">Activity Feed</h2>
                <?php 
                    $query = "SELECT * FROM posts";
                    $result = $conn->query($query);
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()){
                            $created_at = date('d M Y h:i A', strtotime($row['created_at']));
                            echo "
                            <div class='bg-white p-4 rounded-lg shadow mb-4'>
                            <div class='flex items-center mb-4'>
                            <img alt='User Profile' class='rounded-full w-12 h-12' height='40' src='../../asset/img/football.jpg' width='40' />
                            <div class='ml-3'>
                            <p class='font-bold'>Fadil</p>
                            <p class='text-gray-500 text-sm'>{$row['created_at']}</p>
                            </div>
                            </div>
                            <p class='mb-4'>{$row['post_content']}</p>
                                <div class='w-full h-64 bg-cover bg-center rounded-lg mb-4' style='background-image: url(\"{$row['post_image']}\")'></div>
                                </div>";
                        }
                    }
                else {
                    echo "<p class='text-gray-500'>Belum ada postingan.</p>";
                }
                ?>
            </div>
        </div>

        <!-- Kolom Samping -->
        <div class="lg:w-1/5 md:w-1/4 sm:w-full p-4 sticky top-0">
            <?php include '../../template/right-menu-users.php'; ?>
        </div>

    </div>
</main>

</body>
</html>

