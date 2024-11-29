<?php
// Fungsi untuk mengecek apakah angka adalah bilangan prima
function isPrima($angka) {
    if ($angka <= 1) {
        return false; // 0 dan 1 bukan bilangan prima
    }
    for ($i = 2; $i <= sqrt($angka); $i++) {
        if ($angka % $i == 0) {
            return false; // Jika angka habis dibagi i, bukan bilangan prima
        }
    }
    return true; // Jika tidak ada pembagi, maka bilangan prima
}

// Mencetak bilangan prima antara 1 hingga 50
echo "Bilangan prima antara 1 hingga 50:<br>";
for ($angka = 1; $angka <= 50; $angka++) {
    if (isPrima($angka)) {
        echo $angka . " ";
    }
}
?>