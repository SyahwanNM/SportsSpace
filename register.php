<?php
include "dbconnection.php";
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Hash password
    $role = $_POST['role']; // Role bisa 'admin' atau 'user'
    $kota = $_POST['kota'];
    $gender = $_POST['gender'];


    // Menyisipkan data ke tabel users
    $stmt = $conn->prepare("INSERT INTO users (username, password, role, kota,gender) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param('sssss', $username, $password, $role, $kota, $gender);

    if ($stmt->execute()) {
        $message = "Registrasi berhasil! <a href='login.php'>Login di sini</a>";
    } else {
        $message = "Terjadi kesalahan: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Register</title>
  <link rel="stylesheet" href="asset/css/register.css">
</head>
<body>
  <div class="signup-container">
    <?php if (!empty($message)): ?>
      <div class="message-box">
        <?= $message; ?>
      </div>
    <?php endif; ?>
    <div class="button-close">
      <button><a href="index.php">&times;</a></button>
      <h3 class="signup-text">Sign in For Sport Space</h3>
    </div>
    <form method="POST" action="register.php" class="signup-form">
      <div class="input-wrapper">
        <input type="email" name="email" id="email" class="input-field" placeholder="Your Email" required>
      </div>

      <div class="input-wrapper">
        <input type="text" name="username" id="username" class="input-field" placeholder="Username" required>
      </div>
      <div class="select-container">
        <div class="select-item">
          <select name="kota" id="kota" class="item" required>
            <option value="" disabled selected>Your City</option>
            <option value="bandung">Bandung</option>
            <option value="jakarta">Jakarta</option>
            <option value="surabaya">Surabaya</option>
            <option value="yogyakarta">Yogyakarta</option>
            <option value="medan">Medan</option>
            <option value="makassar">Makassar</option>
            <option value="denpasar">Denpasar</option>
          </select>
        </div>
        <div class="select-item" >
          <select name="gender" id="gender" class="item" required>
            <option value="" disabled selected>Gender</option>
            <option value="male">Male</option>
            <option value="female">Female</option>
          </select>
        </div>
        <div class="select-item" >
          <select name="role" id="role" class="item" required>
            <option value="" disabled selected>role</option>
            <option value="admin">Admin</option>
            <option value="user">User</option>
          </select>
        </div>
      </div>
      
      <div class="input-wrapper">
        <input type="password" name="password" class="input-field" placeholder="Password" required>
      </div>
      <div class="input-wrapper">
        <input type="password" name="password" class="input-field" placeholder="Confirm Password" required>
      </div>

      <button class="signup-button">Sign Up</button>
    </form>
    <hr>
    <p class="signup-text">Have An Account Yet? <a href="login.php">Sign In Here</a></p>
  </div>
</body>
</html>
