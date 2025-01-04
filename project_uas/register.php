<?php
include 'config.php';

if (isset($_POST['register'])) {
    $nama_lengkap = $_POST['nama_lengkap'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $level = $_POST['level'];

    $sql = "INSERT INTO users (nama_lengkap, email, password, level) VALUES ('$nama_lengkap', '$email', '$password', '$level')";
    if ($conn->query($sql) === TRUE) {
        echo "Registrasi berhasil! <a href='login.php'>Login di sini</a>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - Pengelolaan Karyawan</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="register-container">
        <h2>Register</h2>
        <form method="post" action="">
            <input type="text" name="nama_lengkap" placeholder="Nama Lengkap" required>
            <input type="email" name="email" placeholder="Email" required>
            <input type="password" name="password" placeholder="Password" required>
            <select name="level" required>
                <option value="user">Daftar sebagai User</option>
                <option value="admin">Daftar sebagai Admin</option>
            </select>
            <button type="submit" name="register">Register</button>
            <a href="login.php" class="btn">Kembali</a>

        </form>
    </div>
</body>
</html>

