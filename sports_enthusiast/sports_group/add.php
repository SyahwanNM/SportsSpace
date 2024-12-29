<?php
session_start();
$base_url = "HTTP://" . $_SERVER['HTTP_HOST'] . "/sportsspace/sorts_enthusiast/";
if (!isset($_SESSION['user_id']) || !isset($_SESSION['role'])) {
    header("Location:". $base_url. "/login.php");
    exit();
}
require '../../dbconnection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'];
    $event_date = $_POST['event_date'];
    $start_time = $_POST['start_time'];
    $end_time = $_POST['end_time'];
    $city = $_POST['city'];
    $address = $_POST['address'];
    $kapasitas_maksimal = $_POST['kapasitas_maksimal'];
    $current_members = 0;
    $sport_type = $_POST['sport_type'];

    // Insert data into database
    $query = "INSERT INTO sports_group (title, event_date, start_time,end_time,city, address, kapasitas_maksimal, current_members, sport_type)
              VALUES ('$title', '$event_date', '$start_time', '$end_time', '$city', '$address', '$kapasitas_maksimal', '$current_members', '$sport_type')";

    if ($conn->query($query) === TRUE) {
        header("Location: http://" .$_SERVER['HTTP_HOST'] ."/sportsspace/sports_enthusiast/sports_group/index.php");
        exit();
    } else {
        echo "Error: " . $conn->error;
    }
}

include "../../template/header-user.php";
include "../../template/sidebar-user.php"
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
            CREATE YOUR SPORTS GROUP
        </h1>

        <!-- Form Add Community -->
        <form method="POST" enctype="multipart/form-data" class="bg-white p-4 rounded shadow">
            <div class="flex space-x-4">
                <!-- Left Column -->
                <div class="w-1/2">
                    <div class="mb-4">
                        <label class="block text-gray-700 font-bold">Title: </label>
                        <input type="text" name="title" class="w-full border border-red-600 rounded p-2" required>
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 font-bold">Event Date: </label>
                        <input type="date" name="event_date" class="w-full border border-red-600 rounded p-2"required>
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 font-bold">Start Time: </label>
                        <input type="time" name="start_time" class="w-full border border-red-600 rounded p-2"required>
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 font-bold">End Time: </label>
                        <input type="time" name="end_time" class="w-full border border-red-600 rounded p-2"required>
                    </div>
                    <div class="mb-4 ">
                        <label class="block text-gray-700 font-bold">Payment Method:</label>
                        <label>
                            <input type="checkbox" name="payment_option" value="cash">
                            Cash
                        </label>
                        <label>
                            <input type="checkbox" name="payment_option" value="free">
                            Transfer
                        </label>
                    </div>
                </div>
                <!-- Right Column -->
                <div class="w-1/2">
                    <div class="mb-4">
                        <label class="block text-gray-700 font-bold">City:</label>
                        <select name="city" id="city" class="w-full border border-red-600 rounded p-2" required>
                            <option value=""></option>
                            <option value="Bandung">Bandung</option>
                            <option value="Jakarta">Jakarta</option>
                            <option value="Yogyakarta">Yogyakarta</option>
                            <option value="Malang">Malang</option>
                        </select>
                    </div>
                    <div class="mb-4" >
                        <label class="block text-gray-700 font-bold">Sports Type:</label>
                        <select name="sport_type" id="sport_type" class="w-full border border-red-600 rounded p-2" required>
                            <option value=""></option>
                            <option value="Futsal">Futsal</option>
                            <option value="Badminton">Badminton</option>
                            <option value="Voli">Voli</option>
                            <option value="Basket">Basket</option>
                        </select>
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 font-bold">Maximum Members:</label>
                        <input type="number" name="kapasitas_maksimal" class="w-full border border-red-600 rounded p-2" required>
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 font-bold">Address (Google Maps Link):</label>
                        <input type="text" name="address" class="w-full border border-red-600 rounded p-2 " required>
                    </div>
                </div>
            </div>

            <div class="text-right">
                <button type="submit" class="bg-red-600 text-white px-4 py-2 rounded">Create Sports Gorup</button>
            </div>
            <div class="text-center mt-6">
            <a href="http://<?= $_SERVER['HTTP_HOST'] ?>/sportsspace/sports_enthusiast/sports_group/index.php" class="bg-blue-600 text-white px-4 py-2 rounded"> Back </a>
            </div>
        </form>
    </div>
    
 </body>
 <footer>
   <?php
   include '../../template/footer.php';
   ?>
</footer>
</html>



