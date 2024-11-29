<?php
// Jumlah baris bintang yang ingin ditampilkan
$jumlah_baris = 5;

// Perulangan untuk setiap baris
for ($i = 1; $i <= $jumlah_baris; $i++) {
    // Perulangan untuk mencetak bintang
    for ($j = 1; $j <= $i; $j++) {
        echo "* ";
    }
    // Pindah ke baris berikutnya
    echo "<br>";
}
?>