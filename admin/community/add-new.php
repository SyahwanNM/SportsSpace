<?php
session_start();
$base_url = "HTTP://" . $_SERVER['HTTP_HOST'] . "/sportsspace";
if (!isset($_SESSION['user_id']) || !isset($_SESSION['role'])) {
    header("Location:". $base_url. "/login.php");
    exit();
}
if ($_SESSION['role'] !== 'admin') {
    echo "Akses ditolak. Halaman ini hanya untuk admin. <a href=".$base_url."/users/index.php>Kembali</a>";
    exit();
}
include "../../template/header-admin.php";
include "../../template/sidebar-admin.php";
require '../../dbconnection.php';
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sports Space - Tambah Komunitas</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet"/>
    <style>
        body {
            font-family: 'Roboto', sans-serif;
        }
    </style>
</head>
<body class="bg-gray-100">
    <div class="max-w-4xl mx-auto p-4">

        <!-- Page Title -->
        <h1 class="text-3xl font-bold text-red-600 text-center mb-6">
            Add a New Community
        </h1>

        <!-- Form Add Community -->
        <form method="POST" action="add.php" enctype="multipart/form-data" class="bg-white p-4 rounded shadow">
            <div class="flex space-x-4">
                <!-- Left Column -->
                <div class="w-1/2">
                    <div class="mb-4">
                        <label class="block text-gray-700 font-bold">Community Name:</label>
                        <input type="text" name="nama" class="w-full border border-red-600 rounded p-2" required>
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 font-bold">Sports Category:</label>
                        <input type="text" name="jns_olahraga" class="w-full border border-red-600 rounded p-2" required>
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 font-bold">Maximum Members:</label>
                        <input type="number" name="max_members" class="w-full border border-red-600 rounded p-2" required>
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 font-bold">Province:</label>
                        <input type="text" name="provinsi" class="w-full border border-red-600 rounded p-2" required>
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 font-bold">City:</label>
                        <input type="text" name="kota" class="w-full border border-red-600 rounded p-2" required>
                    </div>
                </div>

                <!-- Right Column -->
                <div class="w-1/2">
                    <div class="mb-4">
                        <label class="block text-gray-700 font-bold">Description:</label>
                        <textarea name="deskripsi" class="w-full border border-red-600 rounded p-2 h-24" required></textarea>
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 font-bold">Profile Picture:</label>
                        <input type="file" name="foto_profil" accept="image/*" class="w-full border border-red-600 rounded p-2" required>
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 font-bold">Cover Picture:</label>
                        <input type="file" name="foto_sampul" accept="image/*" class="w-full border border-red-600 rounded p-2" required>
                    </div>
                </div>
            </div>

            <div class="text-right">
                <button type="submit" class="bg-red-600 text-white px-4 py-2 rounded">Create Community</button>
            </div>
            <div class="text-center mt-6">
            <a href="http://<?= $_SERVER['HTTP_HOST'] ?>/sportsspace/admin/community/index.php" class="bg-blue-600 text-white px-4 py-2 rounded"> Back Community</a>
            </div>
        </form>
    </div>
    
 </body>
</html>


