<?php
include 'config.php';
session_start();

if (!isset($_SESSION['email']) || $_SESSION['level'] != 'admin') {
    header("Location: login.php");
    exit();
}

// Mengambil data jadwal kerja
$sql = "SELECT * FROM jadwal";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jadwal Kerja</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <h1>Jadwal Kerja</h1>
    </header>
    <main>
        <section class="table-section">
            <h2>Data Jadwal Kerja</h2>
            <table>
                <tr>
                    <th>Email</th>
                    <th>Tanggal</th>
                    <th>Shift</th>
                    <th>Aksi</th>
                </tr>
                <?php while ($row = $result->fetch_assoc()) { ?>
                    <tr>
                        <td><?php echo $row['email']; ?></td>
                        <td><?php echo $row['tanggal']; ?></td>
                        <td><?php echo $row['shift']; ?></td>
                        <td>
                            <a href="edit_jadwal.php?id=<?php echo $row['id']; ?>" class="btn">Edit</a>
                            <a href="delete_jadwal.php?id=<?php echo $row['id']; ?>" class="btn" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</a>
                        </td>
                    </tr>
                <?php } ?>
            </table>
            <a href="admin_dashboard.php" class="btn">Kembali</a>
        </section>
    </main>
    <footer>
        <p>&copy; 2024 Pengelolaan Karyawan</p>
    </footer>
</body>
</html>
