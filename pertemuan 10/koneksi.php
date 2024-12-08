<?php
$konek = mysqli_connect("localhost", "root", "", "school");

if (mysqli_connect_errno()) {
    echo "Koneksi gagal: " . mysqli_connect_error();
}

?>