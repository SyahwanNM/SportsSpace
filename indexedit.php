<?php
include "../../template/header-admin.php";
include "../../template/sidebar-admin.php";
require '../../dbconnection.php';

$id = $_GET['id'];
$query = "SELECT * FROM komunitas WHERE id_kmnts = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param('i', $id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
} else {
    echo "Community not found.";
    exit();
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Community</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <div class="max-w-4xl mx-auto ">
        <h1 class="text-3xl font-bold text-red-600 text-center mb-6">
            Edit Community
        </h1>
        <form method="POST" action="update.php" enctype="multipart/form-data" class="bg-white p-6 rounded shadow">
            <input type="hidden" name="id" value="<?php echo $row['id_kmnts']; ?>">
            
            <div class="mb-4">
                <label class="block text-gray-700">Community Name</label>
                <input type="text" name="nama" value="<?php echo $row['nama']; ?>" class="w-full border border-gray-300 p-2 rounded" required>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700">Sports Category</label>
                <input type="text" name="jns_olahraga" value="<?php echo $row['jns_olahraga']; ?>" class="w-full border border-gray-300 p-2 rounded" required>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700">Profile Picture</label>
                <input type="file" name="foto_profil" accept="image/*" class="w-full border border-gray-300 p-2 rounded">
                <input type="hidden" name="existing_foto_profil" value="<?php echo $row['foto_profil']; ?>">
                <img src="<?php echo $row['foto_profil']; ?>" alt="Profile Picture" class="w-16 h-16 mt-2">
            </div>

            <div class="mb-4">
                <label class="block text-gray-700">Cover Picture</label>
                <input type="file" name="foto_sampul" accept="image/*" class="w-full border border-gray-300 p-2 rounded">
                <input type="hidden" name="existing_foto_sampul" value="<?php echo $row['foto_sampul']; ?>">
                <img src="<?php echo $row['foto_sampul']; ?>" alt="Cover Picture" class="w-24 h-16 mt-2">
            </div>

            <div class="text-right">
                <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Update</button>
            </div>
        </form>
    </div>
</body>
</html>
