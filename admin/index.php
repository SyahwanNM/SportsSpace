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
include "../dbconnection.php";
include "../template/header-admin.php";
include "../template/sidebar-admin.php";
// include "..\auth.php";
// $required_role = "admin"; // Tentukan role yang diperlukan
?>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
    </head>
    <body>
        <div class="grid grid-cols-3">
            <a href="#" class="block max-w-xs p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700 text-center">
                    <p class="mb-2 text-3xl font-extrabold">
                        <?php 
                            $sql_field = "SELECT COUNT(*) AS count_field FROM field";
                            $result_field = $conn->query($sql_field);
                            if ($result_field->num_rows > 0) {
                                // Ambil data
                                $row = $result_field->fetch_assoc();
                                $count_field = $row['count_field'];
                                echo $count_field;
                            }
                            ?>
                    </p>
                    <p class="text-gray-500 dark:text-gray-400 font-semibold">FIELD</p>
            </a>
            <a href="#" class="block max-w-xs p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700 text-center">
                    <p class="mb-2 text-3xl font-extrabold">
                        <?php 
                            $sql_community = "SELECT COUNT(*) AS count_community FROM komunitas";
                            $result_community = $conn->query($sql_community);
                            if ($result_community->num_rows > 0) {
                                // Ambil data
                                $row = $result_community->fetch_assoc();
                                $count_community = $row['count_community'];
                                echo $count_community;
                            }
                            ?>
                    </p>
                    <p class="text-gray-500 dark:text-gray-400 font-semibold">COMMUNITY</p>
            </a>
            <a href="#" class="block max-w-xs p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700 text-center">
                    <p class="mb-2 text-3xl font-extrabold">
                        <?php 
                            $sql_users = "SELECT COUNT(*) AS count_users FROM users";
                            $result_users = $conn->query($sql_users);
                            if ($result_users->num_rows > 0) {
                                // Ambil data
                                $row = $result_users->fetch_assoc();
                                $count_users = $row['count_users'];
                                echo $count_users;
                            }
                            ?>
                    </p>
                    <p class="text-gray-500 dark:text-gray-400 font-semibold">USERS</p>
            </a>
        </div>
                        </div>
                        </div>
    </body>
</html>
<?php
include "../template/footer.php";
?>