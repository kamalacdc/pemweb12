<?php
$nilai = 88;
if ($nilai < 100) {
    $garde = "A";
} elseif ($nilai < 80) {
    $garde = "B";
} elseif ($nilai < 60) {
    $garde = "C";
} elseif ($nilai < 40) {
    $garde = "D";
} else {
    $garde = "F";
}

echo "nilai anda:$nilai<br>";
echo "garde:$garde";
?>