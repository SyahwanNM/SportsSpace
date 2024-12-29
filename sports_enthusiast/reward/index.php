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

    <style>
        .bg-silver {
            background: linear-gradient(135deg, #C0C0C0 0%, #FFFFFF 100%);
        }
        
        .bg-custom-orange {
            background-color: #FF9900; /* Warna oranye keemasan */
        }
    </style>
</head>
<body class="bg-gray-100">
<main class="pt-20">
    <div class="flex justify-end">
        <div class="bg-red-700 lg:w-3/5 md:w-3/5 p-6 mr-9 mt-4 rounded-lg flex items-center">

            <!-- Card untuk Nama dan Poin Pengguna -->
            <div class="bg-custom-orange w-60 p-4 rounded-lg shadow mb-4 mr-4 flex-shrink-0">
                <h2 class="text-xl font-bold text-white text-center">User Name</h2>
                <div class="bg-white rounded-lg w-50">
                    <p class="text-lg text-black text-center">Points: 1500</p>
                </div>
            </div>

            <!-- Konten Medali - div card baru -->
            <div class="bg-white w-60 p-4 rounded-lg shadow mb-4 flex-shrink-0">
                <div class="flex justify-end mb-4">
                    <button class="text-gray-800 hover:text-grey-600">ⓘ</button>  <!-- Info button -->
                </div>
                <img src="silver-medal.png" alt="Silver Badge" class="mx-auto mb-4 w-24 h-24 md:w-32 md:h-32">  <!-- Responsive badge image -->
                <h2 class="text-2xl font-bold mb-2">SILVER</h2>
                <div class="flex justify-between mb-4">  <!-- Level indicators -->
                    <div class="flex items-center">
                        <img src="silver-medal.png" alt="Silver Icon" class="w-6 h-6 mr-2">
                        <span>Silver</span>
                    </div>
                    <div class="flex items-center">
                        <img src="gold-medal.png" alt="Gold Icon" class="w-6 h-6 mr-2">
                        <span>Gold</span>
                    </div>
                </div>

                <div class="relative mb-4">  <!-- Progress bar -->
                    <div class="h-2 bg-gray-600 rounded-full">
                        <div class="h-full bg-green-500 rounded-full" style="width: 50%;"></div>  <!-- Adjust width dynamically -->
                    </div>
                </div>
                    
                <div class="flex justify-between mb-4 text-sm"> <!-- Numbers -->
                    <span>100 000</span>
                    <span>250 000</span>
                </div>
            </div>

        </div> <!-- Akhir div dengan kelas bg-red-700 -->

        <!-- Konten penukaran voucher -->
        <div class="grid grid-cols-2 gap-4 lg:w-1/5 md:w-1/5 sm:w-full p-4">
            <div class="bg-white p-4 rounded-md shadow-md">
                <img alt="Gopay" class="mb-2" height="50" src="https://storage.googleapis.com/a1aa/image/WEuqg8VAn7bOIpr72ylvnKs1EWqxdibTOWyK0osgKKrKp7fJA.jpg" width="100"/>
                <p>Gopay</p>
                <p>Saldo Rp 5.000</p>
                <button class="bg-red-500 text-white p-2 rounded-md mt-2">300 Poin</button>
            </div>
            <div class="bg-white p-4 rounded-md shadow-md">
                <img alt="Gopay" class="mb-2" height="50" src="https://storage.googleapis.com/a1aa/image/WEuqg8VAn7bOIpr72ylvnKs1EWqxdibTOWyK0osgKKrKp7fJA.jpg" width="100"/>
                <p>Gopay</p>
                <p>Saldo Rp 10.000</p>
                <button class="bg-red-500 text-white p-2 rounded-md mt-2">500 Poin</button>
            </div>
        </div>
</body>
</html>