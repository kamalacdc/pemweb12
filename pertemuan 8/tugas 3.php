<?php
// Meminta input angka dari user
$input = readline("Masukkan angka: ");

// Menginisialisasi variabel untuk menyimpan jumlah total digit
$total = 0;

// Menghitung jumlah total digit menggunakan perulangan
for ($i = 0; $i < strlen($input); $i++) {
    // Menambahkan nilai digit ke total
    $total += (int)$input[$i];
}

// Menampilkan hasil
echo"masukan angka $input";
echo "Jumlah total digit: $total\n";
?>