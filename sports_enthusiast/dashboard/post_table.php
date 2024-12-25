<?php
$servername = "localhost"; // Ganti dengan host database Anda
$username = "root";        // Ganti dengan username database Anda
$password = "";            // Ganti dengan password database Anda
$dbname = "sports_space";  // Ganti dengan nama database Anda

// Membuat koneksi
$conn = new mysqli($servername, $username, $password, $dbname);

// Cek koneksi
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// SQL untuk membuat tabel
$sql = "CREATE TABLE posts (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    post_title VARCHAR(255) NOT NULL,
    post_content TEXT NOT NULL,
    post_image VARCHAR(255),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";

// Eksekusi query
if ($conn->query($sql) === TRUE) {
    echo "Table posts created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}

$conn->close();
?>
