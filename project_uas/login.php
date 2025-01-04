<?php
include 'config.php';
session_start();

if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE email='$email'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if (password_verify($password, $row['password'])) {
            $_SESSION['email'] = $email;
            $_SESSION['level'] = $row['level'];
            if ($row['level'] == 'admin') {
                header("Location: admin_dashboard.php");
            } else {
                header("Location: user_dashboard.php");
            }
        } else {
            echo "Password salah!";
        }
    } else {
        echo "Email tidak ditemukan!";
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <title>login managemen karyawan </title>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <link href="styllp.css" rel="stylesheet" />
</head>
<body>
<div class="vid-container">
  <video id="Video1" class="bgvid back" autoplay="true" muted="muted" preload="auto" loop>
      <source src="profile/assets/lautan awan (3).mp4" type="video/mp4">
  </video>
  <div class="inner-container">
    <div class="box">
      <h1>Login</h1>
      <form method="post" action="process_login.php">
      <input type="email" name="email" placeholder="Email" required>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit" name="login">Login</button>
        </form>
      <p>Belum punya akun? <a href="register.php">Daftar di sini</a></p>
      </div>
  </div>
</div>
<script src="/js/main.js"></script>
</body>
</html>
