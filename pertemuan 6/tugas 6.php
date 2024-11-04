<?php

$pemasukan = 50000000;

// Hutang A
$hutangA = 16500000;
$bungaHutangA = 0.05 * $hutangA; // Bunga 5%

// Hutang B
$hutangB = 9500000;
$bungaHutangB = 0.045 * $hutangB; // Bunga 4.5%


// Total Bunga Hutang
$totalBungaHutang = $bungaHutangA + $bungaHutangB;

// Total Hutang
$totalHutang = $hutangA + $hutangB + $totalBungaHutang;

// Sisa Uang
$sisaUang = $pemasukan - $totalHutang;


echo "Sisa Uang: Rp" . number_format($sisaUang, 0, ',', '.') . "<br>";
echo "Jumlah Total Bunga Hutang: Rp" . number_format($totalBungaHutang, 0, ',', '.') . "<br>";
echo "Jumlah Total Hutang: Rp" . number_format($totalHutang, 0, ',', '.') . "<br>";
?>