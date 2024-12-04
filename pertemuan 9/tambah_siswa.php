<?php
include 'koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST['nama'];
    $umur = $_POST['umur'];
    $kelas = $_POST['kelas'];
    $alamat = $_POST['alamat'];

    // Menyimpan data ke database
    $sql = "INSERT INTO siswa (nama, umur, kelas, alamat) VALUES ('$nama', '$umur', '$kelas', '$alamat')";

    if ($conn->query($sql) === TRUE) {
        echo "Data siswa berhasil disimpan!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Data Siswa</title>
</head>
<body>
    <h2>Form Data Siswa</h2>
    <form method="post" action="">
        <label for="nama">Nama:</label><br>
        <input type="text" id="nama" name="nama" required><br><br>
        
        <label for="umur">Umur:</label><br>
        <input type="number" id="umur" name="umur" required><br><br>
        
        <label for="kelas">Kelas:</label><br>
        <input type="text" id="kelas" name="kelas" required><br><br>
        
        <label for="alamat">Alamat:</label><br>
        <textarea id="alamat" name="alamat" required></textarea><br><br>
        
        <input type="submit" value="Simpan">
    </form>
</body>
</html>