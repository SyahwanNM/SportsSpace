<?php
include '../../template/header-user.php';
include '../../template/footer.php';
include '../../template/sidebar-user.php';
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
<main class="pt-20">
        <div class="flex justify-end">
        <!-- Main Content -->
        <div class="lg:w-4/5 md:w-4/5 p-6">
            <!-- Your Content Here -->
            <div class="bg-white p-6 rounded-lg shadow-md mb-6">
               <img alt="Profile Picture" class="w-24 h-24 rounded-full" height="100" 
               src="/image/football.jpg" width="100"/>
                <div class="flex items-center space-x-6">
                    <div>
                        <h2 class="text-xl font-bold">
                            FADIL RAHMAN </h2>
                        <div class="grid grid-cols-3 gap-10">
                            <div>
                                <p>Email</p>
                                <p class="font-semibold">fadil@gmail.com</p>
                            </div>
                            <div>
                                <p>Name</p>
                                <p class="font-semibold">Fadil Rahman</p>
                            </div>
                            <div>
                                <p>Gender</p>
                                <p class="font-semibold">Male</p>
                            </div>
                            <div>
                                <p>City</p>
                                <p class="font-semibold">Bandung</p>
                            </div>
                            <div>
                                <p>Phone Number</p>
                                <p class="font-semibold">0822-5678-9012</p>
                            </div>
                            <div>
                                <p>Favorite Sports</p>
                                <p class="font-semibold">Running</p>
                                <p class="font-semibold">Football</p>
                            </div>
                            </div>
                                <button class="mt-4 px-6 py-2 bg-red-500 text-white rounded-full hover:bg-red-700">
                                    EDIT PROFIL
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

    <div class="bg-gray-100 p-6 rounded-lg shadow-md text-white w-full max-w-sm">  <!-- Responsive width -->
        <div class="flex justify-end mb-4">
            <button class="text-gray-300 hover:text-white">ⓘ</button>  <!-- Info button -->
        </div>
        <img src="your_badge_image.png" alt="Silver Badge" class="mx-auto mb-4 w-24 h-24 md:w-32 md:h-32">  <!-- Responsive badge image -->
        <h2 class="text-2xl font-bold mb-2">SILVER</h2>
        <div class="flex justify-between mb-4">  <!-- Level indicators -->
            <div class="flex items-center">
                <img src="your_silver_icon.png" alt="Silver Icon" class="w-6 h-6 mr-2">
                <span>Silver</span>
            </div>
            <div class="flex items-center">
                <img src="your_gold_icon.png" alt="Gold Icon" class="w-6 h-6 mr-2">
                <span>Gold</span>
            </div>
        </div>

        <div class="relative mb-4">  <!-- Progress bar -->
            <div class="h-2 bg-gray-600 rounded-full">
                <div class="h-full bg-green-500 rounded-full" style="width: 50%;"> </div>  <!-- Adjust width dynamically -->
            </div>
        </div>

        <div class="flex justify-between mb-4 text-sm"> <!-- Numbers -->
            <span>100 000</span>
            <span>250 000</span>
        </div>

        <div class="flex space-x-2">  <!-- Buttons -->
            <button class="bg-yellow-500 hover:bg-yellow-600 text-black font-medium py-2 px-4 rounded focus:outline-none">Take the bonus 5,000</button>
            <button class="bg-yellow-500 hover:bg-yellow-600 text-black font-medium py-2 px-4 rounded focus:outline-none">Claim</button>
        </div>
    </div>
</body>