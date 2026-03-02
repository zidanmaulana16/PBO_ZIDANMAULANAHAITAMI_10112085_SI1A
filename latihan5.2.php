<?php

// Function untuk format Rupiah
function formatRupiah($angka): string {
    return "Rp " . number_format($angka, 0, ',', '.');
}

// Class BelanjaWarung
class BelanjaWarung {

    public $namaPembeli;
    public $namaBarang;
    public $hargaBarang;
    public $jumlahBeli;

    // Hitung Subtotal
    public function hitungSubtotal(): float|int {
        return $this->hargaBarang * $this->jumlahBeli;
    }

    // Hitung Diskon (10% jika subtotal > 100000)
    public function hitungDiskon($subtotal): float|int {
        if ($subtotal > 100000) {
            return $subtotal * 0.1;
        }
        return 0;
    }

    // Hitung Total
    public function hitungTotal(): float|int {
        $subtotal = $this->hitungSubtotal();
        $diskon   = $this->hitungDiskon($subtotal);
        return $subtotal - $diskon;
    }
}


// ================= DATA TRANSAKSI =================

$dataBelanja = [

    [
        "nama"   => "Budi",
        "barang" => "Gula 1 Kg",
        "harga"  => 65000,
        "jumlah" => 2
    ],

    [
        "nama"   => "Sinta",
        "barang" => "Minyak 1 L",
        "harga"  => 140000,
        "jumlah" => 1
    ]

];

echo "<h2>TRANSAKSI</h2>";


// ================= PROSES TRANSAKSI =================

foreach ($dataBelanja as $index => $data) {

    $errors = [];

    $nama   = $data["nama"];
    $barang = $data["barang"];
    $harga  = $data["harga"];
    $jumlah = $data["jumlah"];

    // Validasi
    if (empty($nama)) {
        $errors[] = "Nama pembeli tidak boleh kosong.";
    }

    if ($harga <= 0) {
        $errors[] = "Harga harus lebih dari 0.";
    }

    if ($jumlah <= 0) {
        $errors[] = "Jumlah beli harus lebih dari 0.";
    }

    echo "<hr>";

    // Jika ada error
    if (!empty($errors)) {

        echo "<h3>Terjadi Kesalahan:</h3>";
        foreach ($errors as $error) {
            echo "<p style='color:red;'>$error</p>";
        }

    } else {

        // Buat object
        $belanja = new BelanjaWarung();
        $belanja->namaPembeli = $nama;
        $belanja->namaBarang  = $barang;
        $belanja->hargaBarang = $harga;
        $belanja->jumlahBeli  = $jumlah;

        // Hitung
        $subtotal = $belanja->hitungSubtotal();
        $diskon   = $belanja->hitungDiskon($subtotal);
        $total    = $belanja->hitungTotal();

        // Tampilkan
        echo "<p><strong>Nama Pembeli:</strong> $nama</p>";
        echo "<p><strong>Barang:</strong> $barang</p>";
        echo "<p><strong>Harga:</strong> " . formatRupiah($harga) . "</p>";
        echo "<p><strong>Jumlah:</strong> $jumlah</p>";
        echo "<p><strong>Subtotal:</strong> " . formatRupiah($subtotal) . "</p>";
        echo "<p><strong>Diskon:</strong> " . formatRupiah($diskon) . "</p>";
        echo "<p><strong>Total Bayar:</strong> <b>" . formatRupiah($total) . "</b></p>";
    }
}

?>