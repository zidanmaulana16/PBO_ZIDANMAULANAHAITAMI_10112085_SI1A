<?php

class manusia {
    public $nama="Ardi";
    var $kelas = "SI 2";

    function tampilkan_nama() {
        return $this->nama;
    }

    public function tampilkan_kelas() {
        return $this->kelas;
    }
}

$manusia = new manusia();

echo "Nama : ".$manusia->tampilkan_nama()."<br/>";
echo "Kelas : ".$manusia->tampilkan_kelas();
?>