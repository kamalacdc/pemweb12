<?php
include 'config.php';
session_start();

if (!isset($_SESSION['email']) || $_SESSION['level'] != 'user') {
    header("Location: login.php");
    exit();
}

$id_absensi = $_GET['id'];
$sql = "SELECT * FROM absensi WHERE id='$id_absensi'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();

if (isset($_POST['update'])) {
    $status = $_POST['status'];

    $sql = "UPDATE absensi SET status='$status' WHERE id='$id_absensi'";
    if ($conn->query($sql) === TRUE) {
        header("Location: user_dashboard.php");
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
    <title>Edit Absensi</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <h1>Edit Absensi</h1>
    </header>
    <main>
        <section class="form-section">
            <h2>Edit Data Absensi</h2>
            <form method="post" action="">
                <select name="status" required>
                    <option value="Hadir" <?php if ($row['status'] == 'Hadir') echo 'selected'; ?>>Hadir</option>
                    <option value="Tidak Hadir" <?php if ($row['status'] == 'Tidak Hadir') echo 'selected'; ?>>Tidak Hadir</option>
                </select>
                <button type="submit" name="update">Update</button>
            </form>
            <a href="user_dashboard.php" class="btn">Kembali</a>
        </section>
    </main>
    <footer>
        <p>&copy; 2024 Pengelolaan Karyawan</p>
    </footer>
</body>
</html>
