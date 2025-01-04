<?php
include 'config.php';
session_start();

if (!isset($_SESSION['email']) || $_SESSION['level'] != 'admin') {
    header("Location: login.php");
    exit();
}

// Mengambil data karyawan
$sql_karyawan = "SELECT * FROM karyawan";
$result_karyawan = $conn->query($sql_karyawan);

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Karyawan</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <h1>Data Karyawan</h1>
        <p>Perusahaan XYZ adalah perusahaan terkemuka di bidang teknologi yang berfokus pada inovasi dan kualitas.</p>
    </header>
    <main>
        <section class="table-section">
            <h2>Data Karyawan</h2>
            <div class="dashboard-menu">
                <a href="dashboard.php" class="btn">Kembali</a>
                <a href="edit.php" class="btn">Tambah Karyawan</a>
            </div>
            <table>
                <tr>
                    <th>ID Karyawan</th>
                    <th>Nama Lengkap</th>
                    <th>Jenis Kelamin</th>
                    <th>Alamat</th>
                    <th>Email</th>
                    <th>Telepon</th>
                    <th>Foto Profil</th>
                    <th>Aksi</th>
                </tr>
                <?php while ($row = $result_karyawan->fetch_assoc()) { ?>
                    <tr>
                        <td><?php echo $row['id_karyawan']; ?></td>
                        <td><?php echo $row['nama_lengkap']; ?></td>
                        <td><?php echo $row['jenis_kelamin']; ?></td>
                        <td><?php echo $row['alamat']; ?></td>
                        <td><?php echo $row['email']; ?></td>
                        <td><?php echo $row['telepon']; ?></td>
                        <td><img src="uploads/<?php echo $row['foto_profil']; ?>" alt="Foto Profil" width="50"></td>
                        <td>
                            <a href="edit_karyawan.php?id=<?php echo $row['id_karyawan']; ?>" class="btn">Edit</a>
                            <a href="hapus_karyawan.php?id=<?php echo $row['id_karyawan']; ?>" class="btn" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?');">Hapus</a>
                        </td>
                    </tr>
                <?php } ?>
            </table>
        </section>
    </main>
    <footer>
        <p>&copy; 2024 Pengelolaan Karyawan</p>
    </footer>
</body>
</html>
