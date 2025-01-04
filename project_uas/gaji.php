<?php
include 'config.php';
session_start();

if (!isset($_SESSION['email'])) {
    header("Location: login.php");
    exit();
}

// Menambahkan data gaji
if (isset($_POST['add_gaji'])) {
    $id_karyawan = $_POST['id_karyawan'];
    $bulan = $_POST['bulan'];
    $tahun = $_POST['tahun'];
    $gaji_bulanan = $_POST['gaji_bulanan'];

    $sql = "INSERT INTO gaji (id_karyawan, bulan, tahun, gaji_bulanan) VALUES ('$id_karyawan', '$bulan', '$tahun', '$gaji_bulanan')";
    if ($conn->query($sql) === TRUE) {
        echo "Data gaji berhasil ditambahkan!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Mengambil data gaji
$sql = "SELECT * FROM gaji";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Gaji Karyawan</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <h1>Gaji Karyawan</h1>
    </header>
    <main>
        <section class="form-section">
            <h2>Tambah Data Gaji</h2>
            <form method="post" action="">
                <input type="text" name="id_karyawan" placeholder="ID Karyawan" required>
                <input type="text" name="bulan" placeholder="Bulan" required>
                <input type="text" name="tahun" placeholder="Tahun" required>
                <input type="number" name="gaji_bulanan" placeholder="Gaji Bulanan" required>
                <button type="submit" name="add_gaji">Tambah</button>
            </form>
        </section>

        <section class="table-section">
            <h2>Data Gaji Karyawan</h2>
            <table>
                <tr>
                    <th>ID Karyawan</th>
                    <th>Bulan</th>
                    <th>Tahun</th>
                    <th>Gaji Bulanan</th>
                </tr>
                <?php while ($row = $result->fetch_assoc()) { ?>
                <tr>
                    <td><?php echo $row['id_karyawan']; ?></td>
                    <td><?php echo $row['bulan']; ?></td>
                    <td><?php echo $row['tahun']; ?></td>
                    <td><?php echo $row['gaji_bulanan']; ?></td>
                </tr>
                <?php } ?>
            </table>
        </section>
    </main>
    <main> <!-- Konten Absensi Harian --> <a href="admin_dashboard.php" class="btn">Kembali</a> </main>
    <footer>
        <p>&copy; 2024 Pengelolaan Karyawan</p>
    </footer>
</body>
</html>
