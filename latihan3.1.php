<?php
class Kendaraan {
    public string $merk = "Pajero";
    public string $warna = "Hitam";
    public string $bahanbakar = "Pertamax";
    public int $harga = 100000000;
    public int $tahun = 2004;
    public int $jumlahroda = 4;

    public function statusHarga() {
        if ($this->harga > 50000000) {
            return "Mahal";
        } else {
            return "Murah";
        }
    }

    public function statusSubsidi() {
        if ($this->tahun < 2005) {
            return "Mendapat subsidi";
        } else {
            return "Tidak mendapat subsidi";
        }
    }
}


$objekkendaraan = new Kendaraan();

echo "<h3>Kendaraan 1</h3>";
echo "Merk : " . $objekkendaraan->merk . "<br>";
echo "Tahun : " . $objekkendaraan->tahun . "<br>";
echo "Jumlah roda : " . $objekkendaraan->jumlahroda . "<br>";
echo "Harga : " . $objekkendaraan->harga . "<br>";
echo "Bahan bakar : " . $objekkendaraan->bahanbakar . "<br>";
echo "Status harga : " . $objekkendaraan->statusHarga() . "<br>";
echo "Status subsidi : " . $objekkendaraan->statusSubsidi() . "<br><br>";


$objekkendaraan1 = new Kendaraan();
$objekkendaraan1->harga = 30000;
$objekkendaraan1->tahun = 2007;
$objekkendaraan1->merk = "Honda";

echo "<h3>Kendaraan 2</h3>";
echo "Merk : " . $objekkendaraan1->merk . "<br>";
echo "Tahun : " . $objekkendaraan1->tahun . "<br>";
echo "Harga : " . $objekkendaraan1->harga . "<br>";
echo "Status harga : " . $objekkendaraan1->statusHarga() . "<br>";
echo "Status subsidi : " . $objekkendaraan1->statusSubsidi() . "<br><br>";


$objekkendaraan2 = new Kendaraan();
$objekkendaraan2->harga = 10000000;
$objekkendaraan2->tahun = 2016;
$objekkendaraan2->merk = "Inova";

echo "<h3>Kendaraan 3</h3>";
echo "Merk : " . $objekkendaraan2->merk . "<br>";
echo "Tahun : " . $objekkendaraan2->tahun . "<br>";
echo "Harga : " . $objekkendaraan2->harga . "<br>";
echo "Status harga : " . $objekkendaraan2->statusHarga() . "<br>";
echo "Status subsidi : " . $objekkendaraan2->statusSubsidi() . "<br>";
?>