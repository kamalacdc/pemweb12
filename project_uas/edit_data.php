<?php
include 'config.php';
session_start();

if (!isset($_SESSION['email']) || $_SESSION['level'] != 'user') {
    header("Location: login.php");
    exit();
}

$id_karyawan = $_GET['id'];
$sql = "SELECT * FROM karyawan WHERE id_karyawan='$id_karyawan' AND email='{$_SESSION['email']}'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();

if (isset($_POST['update'])) {
    $nama_lengkap = $_POST['nama_lengkap'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $alamat = $_POST['alamat'];
    $telepon = $_POST['telepon'];
    $foto_profil = $_FILES['foto_profil']['name'];
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($foto_profil);

    // Upload file jika ada file baru yang diunggah
    if (!empty($foto_profil)) {
        move_uploaded_file($_FILES['foto_profil']['tmp_name'], $target_file);
        $sql = "UPDATE karyawan SET nama_lengkap='$nama_lengkap', jenis_kelamin='$jenis_kelamin', alamat='$alamat', telepon='$telepon', foto_profil='$foto_profil' WHERE id_karyawan='$id_karyawan' AND email='{$_SESSION['email']}'";
    } else {
        $sql = "UPDATE karyawan SET nama_lengkap='$nama_lengkap', jenis_kelamin='$jenis_kelamin', alamat='$alamat', telepon='$telepon' WHERE id_karyawan='$id_karyawan' AND email='{$_SESSION['email']}'";
    }

    if ($conn->query($sql) === TRUE) {
        header("Location: user_dashboard.php?id=<?php echo $id_karyawan; ?>");
    } else {
        echo "Error updating record: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profil</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <h1>Edit Profil</h1>
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
                <input type="text" name="telepon" value="<?php echo $row['telepon']; ?>" required>
                <input type="file" name="foto_profil">
                <button type="submit" name="update">Update</button>
            </form>
            <a href="user_dashboard.php?id=<?php echo $id_karyawan; ?>" class="btn">Kembali</a>
        </section>
    </main>
    <footer>
        <p>&copy; 2024 Pengelolaan Karyawan</p>
    </footer>
</body>
</html>
