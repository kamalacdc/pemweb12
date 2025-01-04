<?php
include 'config.php';
session_start();

if (!isset($_SESSION['email']) || $_SESSION['level'] != 'admin') {
    header("Location: login.php");
    exit();
}

// Menambahkan jadwal kerja
if (isset($_POST['submit_jadwal'])) {
    $email = $_POST['email'];
    $tanggal = $_POST['tanggal'];
    $shift = $_POST['shift'];

    $sql_insert_jadwal = "INSERT INTO jadwal (email, tanggal, shift) VALUES ('$email', '$tanggal', '$shift')";
    if ($conn->query($sql_insert_jadwal) === TRUE) {
        echo "Jadwal berhasil ditambahkan!";
    } else {
        echo "Error: " . $sql_insert_jadwal . "<br>" . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Isi Jadwal</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <h1>Admin - Isi Jadwal</h1>
    </header>
    <main>
        <section class="form-section">
            <h3>Form Pengisian Jadwal Kerja</h3>
            <form method="post" action="">
                <input type="email" name="email" placeholder="Email Karyawan" required>
                <input type="date" name="tanggal" placeholder="Tanggal" required>
                <input type="text" name="shift" placeholder="Shift" required>
                <button type="submit" name="submit_jadwal">Submit</button>
            </form>
            <a href="admin_dashboard.php" class="btn">Kembali</a>
        </section>
    </main>
    <footer>
        <p>&copy; 2024 Pengelolaan Karyawan</p>
    </footer>
</body>
</html>
