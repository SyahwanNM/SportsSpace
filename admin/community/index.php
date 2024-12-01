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
    <title>Community List</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <div class="max-w-6xl">
        <!-- Button kembali ke halaman tambah komunitas -->
        <div class="text-center mb-6">
            <a href="add-new.php" class="bg-red-700 text-white px-4 py-2 rounded">Add New Community</a>
        </div>

        <!-- Tabel daftar komunitas -->
        <table class="table-auto w-full bg-white rounded shadow border-collapse border border-gray-300">
            <thead>
                <tr class="bg-red-700 text-white">
                    <th class="p-2 border">ID</th>
                    <th class="p-2 border">Name</th>
                    <th class="p-2 border">Sports Category</th>
                    <th class="p-2 border">Province</th>
                    <th class="p-2 border">City</th>
                    <th class="p-2 border">Description</th>
                    <th class="p-2 border">Profile Picture</th>
                    <th class="p-2 border">Cover Picture</th>
                    <th class="p-2 border text-center">Actions</th>
                </tr>
            </thead>
            <tbody class="text-center">
                <?php
                $query = "SELECT * FROM komunitas";
                $result = $conn->query($query);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr class='hover:bg-gray-100'>
                                <td class='p-2 border'>{$row['id_kmnts']}</td>
                                <td class='p-2 border'>{$row['nama']}</td>
                                <td class='p-2 border'>{$row['jns_olahraga']}</td>
                                <td class='p-2 border'>{$row['provinsi']}</td>
                                <td class='p-2 border'>{$row['kota']}</td>
                                <td class='p-2 border'>{$row['deskripsi']}</td>
                                <td class='p-2 border text-center'>
                                    <img src='{$row['foto_profil']}' alt='Profile Picture' class='w-16 h-16 object-cover mx-auto'>
                                </td>
                                <td class='p-2 border text-center'>
                                    <img src='{$row['foto_sampul']}' alt='Cover Picture' class='w-24 h-16 object-cover mx-auto'>
                                </td>
                                <td class='p-2 border text-center'>
                                    <a href='indexedit.php?id={$row['id_kmnts']}' class='bg-blue-600 text-white px-2 py-1 rounded'>Edit</a>
                                    <a href='delete.php?id={$row['id_kmnts']}' onclick='return confirm(\"Yakin ingin menghapus?\");' class='bg-red-600 text-white px-2 py-1 rounded'>Delete</a>
                                </td>
                              </tr>";
                    }
                } else {
                    echo "<tr>
                            <td colspan='9' class='p-4 text-center text-gray-500'>No communities found.</td>
                          </tr>";
                }
                ?>
            </tbody>
        </table>

        
    </div>
</body>
</html>
