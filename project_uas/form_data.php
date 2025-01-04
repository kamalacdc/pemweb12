<?php
include 'config.php';
session_start();

if (!isset($_SESSION['email']) || $_SESSION['level'] != 'user') {
    header("Location: login.php");
    exit();
}

$email = $_SESSION['email'];

// Menambahkan data baru
if (isset($_POST['submit_data'])) {
    $nama_lengkap = $_POST['nama_lengkap'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $alamat = $_POST['alamat'];
    $telepon = $_POST['telepon'];
    $foto_profil = $_FILES['foto_profil']['name'];
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($foto_profil);

    // Upload file
    if (move_uploaded_file($_FILES['foto_profil']['tmp_name'], $target_file)) {
        $sql_insert = "INSERT INTO karyawan (nama_lengkap, jenis_kelamin, alamat, email, telepon, foto_profil) VALUES ('$nama_lengkap', '$jenis_kelamin', '$alamat', '$email', '$telepon', '$foto_profil')";
        if ($conn->query($sql_insert) === TRUE) {
            echo "Data berhasil ditambahkan!";
            header("Location: tampil_data.php");
        } else {
            echo "Error: " . $sql_insert . "<br>" . $conn->error;
        }
    } else {
        echo "Error uploading file.";
    }
}

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Pengisian Data - Pengelolaan Karyawan</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <h1>Form Pengisian Data</h1>
    </header>
    <main>
        <section class="form-section">
            <h3>Form Pengisian Data</h3>
            <form method="post" action="" enctype="multipart/form-data">
                <input type="text" name="nama_lengkap" placeholder="Nama Lengkap" required>
                <select name="jenis_kelamin" required>
                    <option value="Laki-laki">Laki-laki</option>
                    <option value="Perempuan">Perempuan</option>
                </select>
                <input type="text" name="alamat" placeholder="Alamat" required>
                <input type="text" name="telepon" placeholder="Telepon" required>
                <input type="file" name="foto_profil" required>
                <button type="submit" name="submit_data">Submit</button>
            </form>
            <a href="user_dashboard.php" class="btn">Kembali</a>
        </section>
    </main>
    <footer>
        <p>&copy; 2024 Pengelolaan Karyawan</p>
    </footer>
</body>
</html>
