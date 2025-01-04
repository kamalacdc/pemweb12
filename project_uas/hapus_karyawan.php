<?php
include 'config.php';
session_start();

if (!isset($_SESSION['email']) || $_SESSION['level'] != 'admin') {
    header("Location: login.php");
    exit();
}

$id_karyawan = $_GET['id'];
$sql = "DELETE FROM karyawan WHERE id_karyawan='$id_karyawan'";

if ($conn->query($sql) === TRUE) {
    header("Location: admin_dashboard.php");
} else {
    echo "Error deleting record: " . $conn->error;
}
?>
