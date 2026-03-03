<?php

class Transaksi {

    // properti
    public $punyaKartu;
    public $totalBelanja;
    public $diskon = 0;
    public $totalBayar;

    // constructor
    public function __construct($punyaKartu, $totalBelanja) {
        $this->punyaKartu = $punyaKartu;
        $this->totalBelanja = $totalBelanja;
    }

    // method hitung diskon
    public function hitungDiskon() {

        if ($this->punyaKartu == true) {

            if ($this->totalBelanja > 500000) {
                $this->diskon = 50000;
            } 
            elseif ($this->totalBelanja > 100000) {
                $this->diskon = 15000;
            }

        } else {

            if ($this->totalBelanja > 100000) {
                $this->diskon = 5000;
            }

        }

        $this->totalBayar = $this->totalBelanja - $this->diskon;
    }

    // method tampilkan hasil
    public function tampilkanHasil() {
        echo "Status Member : " . ($this->punyaKartu ? "Memiliki" : "Tidak Memiliki") . "<br>";
        echo "Total Belanja : Rp " . number_format($this->totalBelanja,0,",",".") . "<br>";
        echo "Diskon        : Rp " . number_format($this->diskon,0,",",".") . "<br>";
        echo "Total Bayar   : Rp " . number_format($this->totalBayar,0,",",".");
    }
}


// membuat objek
$transaksi1 = new Transaksi(true, 334000);

// proses
$transaksi1->hitungDiskon();
$transaksi1->tampilkanHasil();

?>
