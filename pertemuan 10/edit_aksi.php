<?php
include 'koneksi.php';

$id = $_POST['id'];
$nama = $_POST['nama'];
$nis = $_POST['nis'];
$alamat = $_POST['alamat'];

mysqli_query($konek, " UPDATE class set nama ='$nama',nis='$nis',alamat='$alamat' where id='$id'");

header(
    "location:index.php"
);
?>