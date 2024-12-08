<?php

include 'koneksi.php';

$id = $_GET['id'];

mysqli_query($konek, " DELETE from class where id='$id'");

header("location:index.php");

?>