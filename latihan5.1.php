<?php
$nilai = 105;

if ($nilai < 0 || $nilai > 100) {
    echo "Maaf nilai yang diinputkan tidak sesuai";
}elseif ($nilai >= 80) {
    echo "Sangat Baik";
}
elseif ($nilai >= 60) {
    echo "Lulus";
} else {
    echo "Tidak Lulus";
}

