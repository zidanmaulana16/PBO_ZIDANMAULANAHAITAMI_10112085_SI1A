<?php
class manusia {
    protected $nama = "Ardi";
    var $kelas = "SI 2";

    protected function nama() {
        return "Nama : " . $this->nama;
    }

    public function tampilkan_nama() {
        return $this->nama();
    }

    protected function tampilkan_kelas() {
        return "Kelas : " . $this->kelas;
    }

    // Gunakan method public ini untuk mengakses method protected di atas
    public function getKelas() {
        return $this->tampilkan_kelas();
    }
}

$manusia = new manusia();
echo $manusia->tampilkan_nama() . "<br/>";
echo $manusia->getKelas(); 
?>