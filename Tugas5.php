<?php
// input data
$punyaKartu = true;   // true = punya kartu, false = tidak
$totalBelanja = 334000;

// variabel diskon
$diskon = 0;

// proses seleksi sesuai flowchart
if ($punyaKartu == true) {

    if ($totalBelanja > 500000) {
        $diskon = 50000;
    } 
    elseif ($totalBelanja > 100000) {
        $diskon = 15000;
    }

} else {

    if ($totalBelanja > 100000) {
        $diskon = 5000;
    }

}

// hitung total bayar
$totalBayar = $totalBelanja - $diskon;

// output
echo "Status Member : " . ($punyaKartu ? "Memiliki" : "Tidak Memiliki") . "<br>";
echo "Total Belanja : Rp " . number_format($totalBelanja,0,",",".") . "<br>";
echo "Diskon        : Rp " . number_format($diskon,0,",",".") . "<br>";
echo "Total Bayar   : Rp " . number_format($totalBayar,0,",",".");
?>