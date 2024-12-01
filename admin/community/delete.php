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

if (isset($_GET['id'])) {
    $id_kmnts = intval($_GET['id']);

    $query = "DELETE FROM komunitas WHERE id_kmnts=$id_kmnts";
    if ($conn->query($query) === TRUE) {
        echo "<script>alert('Komunitas berhasil dihapus.'); window.location='index.php';</script>";
    } else {
        echo "<script>alert('Error: " . $conn->error . "'); window.location='index.php';</script>";
    }
} else {
    echo "<script>alert('ID tidak ditemukan.'); window.location='index.php';</script>";
}
?>
