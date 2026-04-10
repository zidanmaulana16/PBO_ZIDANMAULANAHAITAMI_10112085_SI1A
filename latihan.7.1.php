<?php

class Produk {
    public $nama;
    public $harga;

    public function __construct($nama, $harga) {
        $this->nama = $nama;
        $this->harga = $harga;
    }

    public function getInfo() {
        return "Produk: $this->nama - Rp " . number_format($this->harga, 0, ",", ".");
    }
}

class ProdukDigital extends Produk {
    public $ukuranFile;

    public function __construct($nama, $harga, $ukuranFile) {
        parent::__construct($nama, $harga);
        $this->ukuranFile = $ukuranFile;
    }

    // OVERRIDING
    public function getInfo() {
        return "Produk Digital: $this->nama - Rp " 
            . number_format($this->harga, 0, ",", ".") 
            . " - Ukuran: $this->ukuranFile MB";
    }
}

// Object
$p1 = new Produk("Buku", 50000);
$p2 = new ProdukDigital("Ebook PHP", 200000, 100);

// Output
echo $p1->getInfo();
echo "<br>";
echo $p2->getInfo();
echo "<br><br>";

$data = [
    ["tipe"=>"produk","nama"=>"Buku","harga"=>5000],
    ["tipe"=>"digital","nama"=>"Ebook","harga"=>100000,"size"=>25]
];

foreach($data as $d){

    if($d["tipe"] == "produk"){
        $obj = new Produk($d["nama"], $d["harga"]);
    } else {
        // PERBAIKAN DI SINI
        $obj = new ProdukDigital($d["nama"], $d["harga"], $d["size"]);
    }

    echo $obj->getInfo()."<br>";
}

?>