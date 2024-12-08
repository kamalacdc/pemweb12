<?php

include 'koneksi.php';

$nama = $_POST['nama'];
$nis = $_POST['nis'];
$alamat = $_POST['alamat'];

mysqli_query($konek, " INSERT INTO class VALUES ('','$nama','$nis','$alamat')");

header("location:index.php");
?>