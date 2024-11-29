<?php
// Mendefinisikan array nilai
$nilai = [80, 90, 75, 85, 100];

// Menginisialisasi variabel untuk menyimpan jumlah
$jumlah = 0;

// Menghitung jumlah nilai menggunakan perulangan
for ($i = 0; $i < count($nilai); $i++) {
    $jumlah += $nilai[$i]; // Menambahkan nilai ke jumlah
}

// Menghitung rata-rata
$rataRata = $jumlah / count($nilai);

// Menampilkan hasil
echo "Jumlah nilai: $jumlah\n";
echo "Rata-rata nilai: $rataRata\n";
?>