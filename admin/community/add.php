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

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama = $_POST['nama'];
    $jns_olahraga = $_POST['jns_olahraga'];
    $max_members = $_POST['max_members'];
    $provinsi = $_POST['provinsi'];
    $kota = $_POST['kota'];
    $deskripsi = $_POST['deskripsi'];

    // Upload files
    $foto_profil = 'uploads/' . basename($_FILES['foto_profil']['name']);
    $foto_sampul = 'uploads/' . basename($_FILES['foto_sampul']['name']);
    move_uploaded_file($_FILES['foto_profil']['tmp_name'], $foto_profil);
    move_uploaded_file($_FILES['foto_sampul']['tmp_name'], $foto_sampul);

    // Insert data into database
    $query = "INSERT INTO komunitas (nama, jns_olahraga, max_members, provinsi, kota, deskripsi, foto_profil, foto_sampul)
              VALUES ('$nama', '$jns_olahraga', '$max_members', '$provinsi', '$kota', '$deskripsi', '$foto_profil', '$foto_sampul')";

    if ($conn->query($query) === TRUE) {
        header("Location: http://" .$_SERVER['HTTP_HOST'] ."/sportsspace/admin/community/index.php");
        exit();
    } else {
        echo "Error: " . $conn->error;
    }
}
?>
