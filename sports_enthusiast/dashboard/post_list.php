<?php
session_start();
include 'db_connection.php'; // koneksi ke database
include '../../template/header-user.php';
include '../../template/sidebar-user.php';
include '../../template/footer.php';

// Pastikan user sudah login
if (!isset($_SESSION['user_id']) || !isset($_SESSION['role'])) {
    header("Location: " . $base_url . "/login.php?redirect=" . urlencode($_SERVER['REQUEST_URI']));
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Menangani form submit
    $postTitle = mysqli_real_escape_string($conn, $_POST['postTitle']);
    $postContent = mysqli_real_escape_string($conn, $_POST['postContent']);
    
    // Menangani gambar yang diupload
    $postImage = '';
    if (isset($_FILES['postImage']) && $_FILES['postImage']['error'] == 0) {
        $imageName = $_FILES['postImage']['name'];
        $imageTmpName = $_FILES['postImage']['tmp_name'];
        $imageSize = $_FILES['postImage']['size'];
        $imageExtension = strtolower(pathinfo($imageName, PATHINFO_EXTENSION));

        // Validasi ekstensi file
        $allowedExtensions = ['jpg', 'jpeg', 'png', 'gif'];
        if (!in_array($imageExtension, $allowedExtensions)) {
            echo "Hanya file dengan ekstensi jpg, jpeg, png, gif yang diizinkan.";
            exit();
        }

        // Validasi ukuran file (misalnya maksimal 5MB)
        if ($imageSize > 5000000) {
            echo "Ukuran file terlalu besar. Maksimal 5MB.";
            exit();
        }

        // Tentukan path untuk menyimpan gambar
        $imagePath = 'sports_enthusiast/dashboard/upload_post' . $imageName;

        // Memindahkan file ke folder yang dituju
        if (move_uploaded_file($imageTmpName, $imagePath)) {
            $postImage = 'upload_post/' . $imageName;
        } else {
            echo "Gagal mengupload gambar.";
            exit();
        }
    }

    // Menambahkan postingan ke database dengan prepared statement
    $stmt = $conn->prepare("INSERT INTO posts (user_id, post_title, post_content, post_image, created_at) 
                            VALUES (?, ?, ?, ?, NOW())");
    $stmt->bind_param("isss", $_SESSION['user_id'], $postTitle, $postContent, $postImage);

    if ($stmt->execute()) {
        echo "Postingan berhasil ditambahkan!";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}

// Mengambil semua postingan dari database
$sql = "SELECT * FROM posts ORDER BY created_at DESC";
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
</head>
<body class="bg-gray-100">

<main class="pt-20 pb-20">
    <div class="flex justify-end">
        <!-- Kolom Utama -->
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


            <script>
               document.getElementById('createPostBtn').addEventListener('click', function() {
                   const form = document.getElementById('postForm');
                   form.classList.toggle('hidden');
               });
           </script>

            <!-- Daftar Postingan -->
            <div class="bg-white p-4 rounded-lg shadow mb-8">
                <h2 class="text-2xl font-bold text-red-700 mb-4">Activity Feed</h2>
                <?php if ($result->num_rows > 0): ?>
                    <?php while ($row = $result->fetch_assoc()): ?>
                        <div class="bg-white p-4 rounded-lg shadow mb-4">
                            <div class="flex items-center mb-4">
                                <img alt="User Profile" class="rounded-full w-12 h-12" height="40" src="/images/football.jpg" width="40" />
                                <div class="ml-3">
                                    <p class="font-bold">Fadil</p>
                                    <p class="text-gray-500 text-sm"><?php echo date('d M Y h:i A', strtotime($row['created_at'])); ?></p>
                                </div>
                            </div>
                            <p class="mb-4"><?php echo htmlspecialchars($row['post_content']); ?></p>
                            <?php if (!empty($row['post_image'])): ?>
                                <div class="w-full h-64 bg-cover bg-center rounded-lg mb-4" style="background-image: url('<?php echo htmlspecialchars($row['post_image']); ?>');"></div>
                            <?php endif; ?>
                        </div>
                    <?php endwhile; ?>
                <?php else: ?>
                    <p class="text-gray-500">Belum ada postingan.</p>
                <?php endif; ?>
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

