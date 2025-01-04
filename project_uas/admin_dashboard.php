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

// Mengambil data absensi
$sql_absensi = "SELECT * FROM absensi";
$result_absensi = $conn->query($sql_absensi);

// Mengambil data gaji
$sql_gaji = "SELECT * FROM gaji";
$result_gaji = $conn->query($sql_gaji);

// Menghapus data absensi
if (isset($_GET['delete_absensi'])) {
    $id_absensi = $_GET['delete_absensi'];
    $sql_delete_absensi = "DELETE FROM absensi WHERE id='$id_absensi'";
    $conn->query($sql_delete_absensi);
    header("Location: admin_dashboard.php");
    exit();
}

// Menghapus data gaji
if (isset($_GET['delete_gaji'])) {
    $id_gaji = $_GET['delete_gaji'];
    $sql_delete_gaji = "DELETE FROM gaji WHERE id='$id_gaji'";
    $conn->query($sql_delete_gaji);
    header("Location: admin_dashboard.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Pengelolaan Karyawan</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <h1>Admin Dashboard Pengelolaan Karyawan</h1>
        <p>Perusahaan XYZ adalah perusahaan terkemuka di bidang teknologi yang berfokus pada inovasi dan kualitas.</p>
    </header>
    <main>
        <section class="dashboard-section">
            <h2>Selamat Datang, Admin <?php echo $_SESSION['email']; ?></h2>
            <div class="dashboard-menu">
                <a href="tambah_jadwal.php" class="btn">Isi Jadwal</a>
                <a href="tambah_gaji.php" class="btn">Isi Gaji</a>
                <a href="logout.php" class="btn">Logout</a>
                <a href="data_karyawan.php" class="btn">Tampilkan Data Karyawan</a>
            </div>
        </section>

        <section class="table-section">
            <h2>Data Absensi</h2>
            <table>
                <tr>
                    <th>ID Absensi</th>
                    <th>Email</th>
                    <th>Tanggal</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
                <?php while ($row_absensi = $result_absensi->fetch_assoc()) { ?>
                    <tr>
                        <td><?php echo $row_absensi['id']; ?></td>
                        <td><?php echo $row_absensi['email']; ?></td>
                        <td><?php echo $row_absensi['tanggal']; ?></td>
                        <td><?php echo $row_absensi['status']; ?></td>
                        <td><a href="?delete_absensi=<?php echo $row_absensi['id']; ?>" class="btn">Hapus</a></td>
                    </tr>
                <?php } ?>
            </table>
        </section>

        <section class="table-section">
            <h2>Data Gaji</h2>
            <table>
                <tr>
                    <th>ID Gaji</th>
                    <th>Email</th>
                    <th>Bulan</th>
                    <th>Tahun</th>
                    <th>Jumlah</th>
                    <th>Aksi</th>
                </tr>
                <?php while ($row_gaji = $result_gaji->fetch_assoc()) { ?>
                    <tr>
                        <td><?php echo $row_gaji['id']; ?></td>
                        <td><?php echo $row_gaji['email']; ?></td>
                        <td><?php echo $row_gaji['bulan']; ?></td>
                        <td><?php echo $row_gaji['tahun']; ?></td>
                        <td><?php echo $row_gaji['gaji_bulanan']; ?></td>
                        <td><a href="?delete_gaji=<?php echo $row_gaji['id']; ?>" class="btn">Hapus</a></td>
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
