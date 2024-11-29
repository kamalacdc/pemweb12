<?php
// Meminta input angka dari user
$angka = (int)readline("Masukkan angka: 12");

// Menampilkan semua faktor dari angka tersebut
echo "Faktor dari $angka adalah: ";

for ($i = 1; $i <= $angka; $i++) {
    if ($angka % $i == 0) {
        echo $i . " ";
    }
}

echo "\n"; // Menambahkan baris baru setelah output
?>