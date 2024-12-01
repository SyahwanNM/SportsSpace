<?php
session_start();

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $conn = new mysqli('localhost','root','','sports_space');

    if($conn->connect_error) {
        die("Koneksi gagal: ".$conn->connect_error);
    }

    $stmt = $conn->prepare("SELECT username,password,role,user_id FROM users WHERE username =?");
    $stmt->bind_param('s', $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows>0 ){
        $users = $result->fetch_assoc();
        if(password_verify($password, $users['password'])){
            $_SESSION['username'] = $users['username'];
            $_SESSION['user_id'] = $users['user_id'];
            $_SESSION['role'] = $users['role'];
            if($users['role'] == 'admin'){
                header('Location: admin/index.php');
                exit();
            } else{
                header('Location: users/index.php');
                exit();
            }
            exit();
        }else{
            echo "Password Salah!";
        }
    }else{
        echo"Username Tidak Ditemukan!";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="asset/css/style.css">
</head>
<body>
    <div class="login-container">
        <div class="button-close">
            <button><a href="index.php">&times;</a></button>
        </div>
        <div class="sosial-login">
            <button class="sosial-button">
                <img src="asset/img/logo.jpg" alt="google" class="sosial-icon">
                Sign in With Google
            </button>
            <button class="sosial-button">
                <img src="asset/img/logo2.jpg" alt="facebook" class="sosial-icon">
                Sign in With Facebook
            </button>
        </div>

        <p class="separator"><span>Or Login With Email</span></p>
        
        <form method="POST" action="login.php" class="login-form">
            <div class="input-wrapper">
                <input type="text" class="input-field" name="username"  placeholder="Username" required>
            </div>

            <div class="input-wrapper">
                <input type="password" class="input-field" name="password" placeholder="Password" required>
            </div>
            
            <label for="checkbox">
                <input type="checkbox">Remember me
            </label>

            <button class="login-button" type="submit">Login</button>
        </form>
        <hr>
        <p class="signup-text">Dont Have An Account Yet? <a href="register.php">Sign Up Here</a></p>

        <p class="forgot-password"><a href="#">Forgot Password?</a></p>
    </div>
</body>
</html>
