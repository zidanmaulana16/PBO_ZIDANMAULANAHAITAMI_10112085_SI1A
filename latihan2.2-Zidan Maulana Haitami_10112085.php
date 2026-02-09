<?php

class Belanja { // ini adalah class belanja
    public string $namapembeli;
    public string $namaBarang="Sabun";
    public int $hargaBarang=5000;
    public int $jumlahBarang=2;
    public float $totalBayar;
    public float $diskon;

    public static float $pajak = 0.02;

    public function __construct ($namapembeli){
        $this->namapembeli = $namapembeli;
    }

    public function hitungsubtotal(): float {
        $subtotal = $this->hargaBarang * $this->jumlahBarang;
        return $subtotal;
    }

     public function tampilRincian ($namapembeli): void{
        echo "Nama pembeli : " . $this->namapembeli . "<br>";
        echo "Nama Barang  : " . $this->namaBarang  . "<br>";
        echo "Harga Barang : " . $this->hargaBarang . "<br>";
        echo "Jumlah Barang: " . $this->jumlahBarang . "<br>";
        echo "Subtotal: " . $this->hitungsubtotal() . "<br>";
        echo "Diskon : " . $this->diskon . "<br>";
    }

}

$belanja1 = new Belanja(namapembeli:"Ani");
$belanja1->tampilRincian(namapembeli: $belanja1->namapembeli);

?>