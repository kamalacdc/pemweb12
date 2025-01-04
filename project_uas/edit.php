<?php
include 'config.php';
session_start();

if (!isset($_SESSION['email'])) {
    header("Location: login.php");
    exit();
}

if (isset($_POST['tambah'])) {
    $nama_lengkap = $_POST['nama_lengkap'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $alamat = $_POST['alamat'];
    $email = $_POST['email'];
    $telepon = $_POST['telepon'];
    $foto_profil = $_FILES['foto_profil']['name'];
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($foto_profil);

    // Upload file jika ada file yang diunggah
    if (!empty($foto_profil)) {
        move_uploaded_file($_FILES['foto_profil']['tmp_name'], $target_file);
    }

    $sql = "INSERT INTO karyawan (nama_lengkap, jenis_kelamin, alamat, email, telepon, foto_profil) VALUES ('$nama_lengkap', '$jenis_kelamin', '$alamat', '$email', '$telepon', '$foto_profil')";

    if ($conn->query($sql) === TRUE) {
        header("Location: dashboard.php");
    } else {
        echo "Error adding record: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Karyawan</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <h1>Tambah Karyawan</h1>
    </header>
    <main>
        <section class="form-section">
            <h2>Tambah Data Karyawan</h2>
            <form method="post" action="" enctype="multipart/form-data">
                <input type="text" name="nama_lengkap" placeholder="Nama Lengkap" required>
                <select name="jenis_kelamin" required>
                    <option value="Laki-laki">Laki-laki</option>
                    <option value="Perempuan">Perempuan</option>
                </select>
                <input type="text" name="alamat" placeholder="Alamat" required>
                <input type="email" name="email" placeholder="Email" required>
                <input type="text" name="telepon" placeholder="Telepon" required>
                <input type="file" name="foto_profil">
                <button type="submit" name="tambah">Tambah</button>
            </form>
            <a href="admin_dashboard.php" class="btn">Kembali</a>
        </section>
    </main>
    <footer>
        <p>&copy; 2024 Pengelolaan Karyawan</p>
    </footer>
</body>
</html>
