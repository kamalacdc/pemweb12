<?php
include 'config.php';
session_start();

if (!isset($_SESSION['email'])) {
    header("Location: login.php");
    exit();
}

$id_karyawan = $_GET['id'];
$sql = "DELETE FROM karyawan WHERE id_karyawan='$id_karyawan'";

if ($conn->query($sql) === TRUE) {
    header("Location: dashboard.php");
} else {
    echo "Error deleting record: " . $conn->error;
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Karyawan</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <h1>Edit Karyawan</h1>
    </header>
    <main>
        <section class="form-section">
            <h2>Edit Data Karyawan</h2>
            <form method="post" action="" enctype="multipart/form-data">
                <input type="text" name="nama_lengkap" value="<?php echo $row['nama_lengkap']; ?>" required>
                <select name="jenis_kelamin" required>
                    <option value="Laki-laki" <?php if ($row['jenis_kelamin'] == 'Laki-laki') echo 'selected'; ?>>Laki-laki</option>
                    <option value="Perempuan" <?php if ($row['jenis_kelamin'] == 'Perempuan') echo 'selected'; ?>>Perempuan</option>
                </select>
                <input type="text" name="alamat" value="<?php echo $row['alamat']; ?>" required>
                <input type="email" name="email" value="<?php echo $row['email']; ?>" required>
                <input type="text" name="telepon" value="<?php echo $row['telepon']; ?>" required>
                <input type="file" name="foto_profil">
                <button type="submit" name="update">Update</button>
            </form>
        </section>
    </main>
    <footer>
        <p>&copy; 2024 Pengelolaan Karyawan</p>
    </footer>
</body>
</html>
