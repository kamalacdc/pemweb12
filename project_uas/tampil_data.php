<?php
include 'config.php';
session_start();

if (!isset($_SESSION['email']) || $_SESSION['level'] != 'user') {
    header("Location: login.php");
    exit();
}

$email = $_SESSION['email'];

// Mengambil data karyawan
$sql_karyawan = "SELECT * FROM karyawan WHERE email='$email'";
$result_karyawan = $conn->query($sql_karyawan);
$row_karyawan = $result_karyawan->fetch_assoc();

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Karyawan - Pengelolaan Karyawan</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <h1>Data Karyawan</h1>
    </header>
    <main>
        <section class="data-section">
            <h3>Data Karyawan</h3>
            <div class="karyawan-info">
                <p><strong>ID Karyawan:</strong> <?php echo isset($row_karyawan['id_karyawan']) ? $row_karyawan['id_karyawan'] : 'ID tidak ditemukan'; ?></p>
                <p><strong>Nama Lengkap:</strong> <?php echo isset($row_karyawan['nama_lengkap']) ? $row_karyawan['nama_lengkap'] : 'Nama tidak ditemukan'; ?></p>
                <p><strong>Jenis Kelamin:</strong> <?php echo isset($row_karyawan['jenis_kelamin']) ? $row_karyawan['jenis_kelamin'] : 'Jenis kelamin tidak ditemukan'; ?></p>
                <p><strong>Alamat:</strong> <?php echo isset($row_karyawan['alamat']) ? $row_karyawan['alamat'] : 'Alamat tidak ditemukan'; ?></p>
                <p><strong>Telepon:</strong> <?php echo isset($row_karyawan['telepon']) ? $row_karyawan['telepon'] : 'Telepon tidak ditemukan'; ?></p>
                <p><strong>Foto Profil:</strong> <img src="uploads/<?php echo isset($row_karyawan['foto_profil']) ? $row_karyawan['foto_profil'] : 'default.jpg'; ?>" alt="Foto Profil" width="50"></p>
                <a href="edit_data.php?id=<?php echo $row_karyawan['id_karyawan']; ?>" class="btn">Edit</a>
                <a href="delete_data.php?id=<?php echo $row_karyawan['id_karyawan']; ?>" class="btn" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</a>
            </div>
            <a href="user_dashboard.php" class="btn">Kembali</a>
        </section>
    </main>
    <footer>
        <p>&copy; 2024 Pengelolaan Karyawan</p>
    </footer>
</body>
</html>
