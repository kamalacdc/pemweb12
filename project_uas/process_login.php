<?php
include 'config.php';
session_start();

$error_message = '';

if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if (password_verify($password, $row['password'])) {
            $_SESSION['email'] = $email;
            $_SESSION['level'] = isset($row['level']) ? $row['level'] : 'user'; 
            if ($row['level'] == 'admin') {
                header("Location: admin_dashboard.php");
            } else {
                header("Location: user_dashboard.php");
            }
        } else {
            $error_message = "Password salah!";
        }
    } else {
        $error_message = "Email tidak ditemukan!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Login Managemen Karyawan</title>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <link href="styllp.css" rel="stylesheet" />
  <style>
    .error-message {
        text-align: center;
        color: red;
        margin-top: 10px;
    }
  </style>
</head>
<body>
<div class="vid-container">
  <video id="Video1" class="bgvid back" autoplay="true" muted="muted" preload="auto" loop>
      <source src="profile/assets/lautan awan (3).mp4" type="video/mp4">
  </video>
  <div class="inner-container">
    <div class="box">
      <h1>Login</h1>
      <form method="post" action="">
        <input type="email" name="email" placeholder="Email" required>
        <input type="password" name="password" placeholder="Password" required>
        <button type="submit" name="login">Login</button>
      </form>
      <?php if ($error_message != ''): ?>
        <div class="error-message"><?php echo $error_message; ?></div>
      <?php endif; ?>
    </div>
  </div>
</div>
<script src="/js/main.js"></script>
</body>
</html>
