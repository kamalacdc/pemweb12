<?php
include 'config.php';
session_start();

if (!isset($_SESSION['email'])) {
    header("Location: login.php");
}

// Menambahkan data absensi
if (isset($_POST['add_absensi'])) {
    $id_karyawan = $_POST['id_karyawan'];
    $tanggal = $_POST['tanggal'];
    $status = $_POST['status'];

    $sql = "INSERT INTO absensi (id_karyawan, tanggal, status) VALUES ('$id_karyawan', '$tanggal', '$status')";
    $conn->query($sql);
}

// Mengambil data absensi
$sql = "SELECT * FROM absensi";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>

<head>
    <title>Absensi</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <header>
        <h1>Absensi Karyawan</h1>
    </header>
    <main>
        <section class="form-section">
            <h2>Tambah Absensi</h2>
            <form method="post" action="">
                <input type="text" name="id_karyawan" placeholder="ID Karyawan" required>
                <input type="date" name="tanggal" placeholder="Tanggal" required>
                <select name="status" required>
                    <option value="Hadir">Hadir</option>
                    <option value="Sakit">Sakit</option>
                    <option value="Izin">Izin</option>
                    <option value="Alpa">Alpa</option>
                </select>
                <button type="submit" name="add_absensi">Tambah</button>
            </form>
        </section>

        <section class="table-section">
            <h2>Data Absensi</h2>
            <table>
                <tr>
                    <th>ID Absensi</th>
                    <th>ID Karyawan</th>
                    <th>Tanggal</th>
                    <th>Status</th>
                </tr>
                <?php while ($row = $result->fetch_assoc()) { ?>
                    <tr>
                        <td><?php echo $row['id_absensi']; ?></td>
                        <td><?php echo $row['id_karyawan']; ?></td>
                        <td><?php echo $row['tanggal']; ?></td>
                        <td><?php echo $row['status']; ?></td>
                    </tr>
                <?php } ?>
            </table>
        </section>
    </main>
    <main>
        <a href="admin_dashboard.php" class="btn">Kembali</a>
    </main>
    <footer>
        <p>&copy; 2024 Pengelolaan Karyawan</p>
    </footer>
</body>

</html>