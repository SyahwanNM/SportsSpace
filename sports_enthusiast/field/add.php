<?php
session_start();
$base_url = "HTTP://" . $_SERVER['HTTP_HOST'] . "/sportsspace";
if (!isset($_SESSION['user_id']) || !isset($_SESSION['role'])) {
    header("Location:". $base_url. "/login.php");
    exit();
}
require '../../dbconnection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama_lapangan = $_POST['nama_lapangan'];
    $type = $_POST['type'];
    $categori = $_POST['categori'];
    $lokasi = $_POST['lokasi'];
    $opening_hours = $_POST['opening_hours'];
    $closing_hours = $_POST['closing_hours'];
    $fasility = $_POST['fasility'];
    $price = $_POST['price'];
    $description = $_POST['description'];

    // Upload files
    $foto = 'uploads/' . basename($_FILES['foto']['name']);
    move_uploaded_file($_FILES['foto']['tmp_name'], $foto);

    // Insert data into database
    $query = "INSERT INTO field (nama_lapangan, type, categori, lokasi, foto, opening_hours, closing_hours, fasility, price, description)
              VALUES ('$nama_lapangan', '$type', '$categori', '$lokasi', '$foto', '$opening_hours', '$closing_hours', '$fasility', '$price', '$description')";

    if ($conn->query($query) === TRUE) {
        header("Location: http://" .$_SERVER['HTTP_HOST'] ."/sportsspace/sports_enthusiast/field/index.php");
        exit();
    } else {
        echo "Error: " . $conn->error;
    }
}
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
            Add a New Field
        </h1>

        <!-- Form Add Community -->
        <form method="POST" enctype="multipart/form-data" class="bg-white p-4 rounded shadow">
            <div class="flex space-x-4">
                <!-- Left Column -->
                <div class="w-1/2">
                    <div class="mb-4">
                        <label class="block text-gray-700 font-bold">Field Name:</label>
                        <input type="text" name="nama_lapangan" class="w-full border border-red-600 rounded p-2" required>
                    </div>
                    <div class="mb-4" >
                        <label class="block text-gray-700 font-bold">Field Type:</label>
                        <select name="type" id="jns_olahraga" class="w-full border border-red-600 rounded p-2" required>
                            <option value=""></option>
                            <option value="football">Football</option>
                            <option value="badminton">Badminton</option>
                            <option value="basketball">Basketball</option>
                        </select>
                    </div>
                    <div class="mb-4" >
                        <label class="block text-gray-700 font-bold">Field Category:</label>
                        <select name="categori" id="categori" class="w-full border border-red-600 rounded p-2" required>
                            <option value=""></option>
                            <option value="Paid">Paid</option>
                            <option value="Free">Free</option>
                        </select>
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 font-bold">Location:</label>
                        <select name="lokasi" id="lokasi" class="w-full border border-red-600 rounded p-2" required>
                            <option value=""></option>
                            <option value="Bandung">Bandung</option>
                            <option value="Jakarta">Jakarta</option>
                            <option value="Yogyakarta">Yogyakarta</option>
                            <option value="Malang">Malang</option>
                        </select>
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 font-bold">Field Picture:</label>
                        <input type="file" name="foto" accept="image/*" class="w-full border border-red-600 rounded p-2" required>
                    </div>
                </div>
                <!-- Right Column -->
                <div class="w-1/2">
                    <div class="mb-4">
                        <label class="block text-gray-700 font-bold">Opening Hours:</label>
                        <input type="text" name="opening_hours" class="w-full border border-red-600 rounded p-2 " required></input>
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 font-bold">Closing Hours:</label>
                        <input type="text" name="closing_hours" class="w-full border border-red-600 rounded p-2" required>
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 font-bold">Facility:</label>
                        <input type="text" name="fasility" class="w-full border border-red-600 rounded p-2" required>
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 font-bold">price:</label>
                        <input type="number" name="price" class="w-full border border-red-600 rounded p-2" required>
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 font-bold">Description:</label>
                        <input type="text" name="description" class="w-full border border-red-600 rounded p-2 h-24" required>
                    </div>
                </div>
            </div>

            <div class="text-right">
                <button type="submit" class="bg-red-600 text-white px-4 py-2 rounded">Add Field</button>
            </div>
            <div class="text-center mt-6">
            <a href="http://<?= $_SERVER['HTTP_HOST'] ?>/sportsspace/sports_enthusiast/field/index.php" class="bg-blue-600 text-white px-4 py-2 rounded"> Back Field</a>
            </div>
        </form>
    </div>
    
 </body>
</html>



