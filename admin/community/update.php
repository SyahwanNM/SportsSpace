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
require '../../dbconnection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $jns_olahraga = $_POST['jns_olahraga'];

    // Handling profile picture upload
    if (!empty($_FILES['foto_profil']['name'])) {
        $foto_profil = 'uploads/' . basename($_FILES['foto_profil']['name']);
        move_uploaded_file($_FILES['foto_profil']['tmp_name'], $foto_profil);
    } else {
        $foto_profil = $_POST['existing_foto_profil'];
    }

    // Handling cover picture upload
    if (!empty($_FILES['foto_sampul']['name'])) {
        $foto_sampul = 'uploads/' . basename($_FILES['foto_sampul']['name']);
        move_uploaded_file($_FILES['foto_sampul']['tmp_name'], $foto_sampul);
    } else {
        $foto_sampul = $_POST['existing_foto_sampul'];
    }

    // Update query
    $sql = "UPDATE komunitas SET 
                nama = ?, 
                jns_olahraga = ?, 
                foto_profil = ?, 
                foto_sampul = ? 
            WHERE id_kmnts = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('ssssi', $nama, $jns_olahraga, $foto_profil, $foto_sampul, $id);

    if ($stmt->execute()) {
        // Redirect to index.php after successful update
        header('Location: index.php');
        exit();
    } else {
        echo "Error updating record: " . $conn->error;
    }

    $stmt->close();
    $conn->close();
}
?>
