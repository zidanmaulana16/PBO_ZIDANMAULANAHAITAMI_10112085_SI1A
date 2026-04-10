<?php

function formatRupiah($angka): string {
    return "Rp " . number_format($angka, 0, ',', '.');
}

class BelanjaWarung {

    public $namaPembeli;
    public $namaBarang;
    public $hargaBarang;
    public $jumlahBeli;
    public $member; 

    public function hitungSubtotal() {
        return $this->hargaBarang * $this->jumlahBeli;
    }

    // Diskon
    public function hitungDiskon($subtotal) {

        $diskon = 0;

        // diskon biasa
        if ($subtotal > 100000) {
            $diskon = $subtotal * 0.1;
        }

        // tambahan diskon member
        if ($this->member == true) {
            $diskon += $subtotal * 0.05;
        }

        return $diskon;
    }

    public function hitungTotal() {
        $subtotal = $this->hitungSubtotal();
        $diskon   = $this->hitungDiskon($subtotal);
        return $subtotal - $diskon;
    }
}

$dataBelanja = [

    [
        "nama"   => "Budi",
        "barang" => "Gula 1 Kg",
        "harga"  => 65000,
        "jumlah" => 2,
        "member" => true
    ],

    [
        "nama"   => "Sinta",
        "barang" => "Minyak 1 L",
        "harga"  => 140000,
        "jumlah" => 1,
        "member" => false
    ],

    [
        "nama" => "Yessy",
        "barang" => "Minyak 1 L",
        "harga" => 140000,
        "jumlah" => 3,
        "member" => true
    ]

];

echo "<h2>TRANSAKSI</h2>";

foreach ($dataBelanja as $data) {

    $belanja = new BelanjaWarung();

    $belanja->namaPembeli = $data["nama"];
    $belanja->namaBarang  = $data["barang"];
    $belanja->hargaBarang = $data["harga"];
    $belanja->jumlahBeli  = $data["jumlah"];
    $belanja->member      = $data["member"];

    $subtotal = $belanja->hitungSubtotal();
    $diskon   = $belanja->hitungDiskon($subtotal);
    $total    = $belanja->hitungTotal();

    echo "<hr>";
    echo "<p><strong>Nama Pembeli:</strong> {$belanja->namaPembeli}</p>";
    echo "<p><strong>Status Member:</strong> " . ($belanja->member ? "Member" : "Bukan Member") . "</p>";
    echo "<p><strong>Barang:</strong> {$belanja->namaBarang}</p>";
    echo "<p><strong>Harga:</strong> " . formatRupiah($belanja->hargaBarang) . "</p>";
    echo "<p><strong>Jumlah:</strong> {$belanja->jumlahBeli}</p>";
    echo "<p><strong>Subtotal:</strong> " . formatRupiah($subtotal) . "</p>";
    echo "<p><strong>Diskon:</strong> " . formatRupiah($diskon) . "</p>";
    echo "<p><strong>Total Bayar:</strong> <b>" . formatRupiah($total) . "</b></p>";
}

?>