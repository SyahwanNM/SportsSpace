<?php
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
