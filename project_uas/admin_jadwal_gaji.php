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

// Menambahkan gaji
if (isset($_POST['submit_gaji'])) {
    $email = $_POST['email'];
    $bulan = $_POST['bulan'];
    $tahun = $_POST['tahun'];
    $gaji_bulanan = $_POST['gaji_bulanan'];

    $sql_insert_gaji = "INSERT INTO gaji (email, bulan, tahun, gaji_bulanan) VALUES ('$email', '$bulan', '$tahun', '$gaji_bulanan')";
    if ($conn->query($sql_insert_gaji) === TRUE) {
        echo "Gaji berhasil ditambahkan!";
    } else {
        echo "Error: " . $sql_insert_gaji . "<br>" . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Isi Jadwal dan Gaji</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <h1>Admin - Isi Jadwal dan Gaji</h1>
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

            <h3>Form Pengisian Gaji</h3>
            <form method="post" action="">
                <input type="email" name="email" placeholder="Email Karyawan" required>
                <input type="text" name="bulan" placeholder="Bulan" required>
                <input type="text" name="tahun" placeholder="Tahun" required>
                <input type="number" name="gaji_bulanan" placeholder="Gaji Bulanan" required>
                <button type="submit" name="submit_gaji">Submit</button>
            </form>
            <a href="admin_dashboard.php" class="btn">Kembali</a>
        </section>
    </main>
    <footer>
        <p>&copy; 2024 Pengelolaan Karyawan</p>
    </footer>
</body>
</html>
