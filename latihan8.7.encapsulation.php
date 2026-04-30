<?php

class komputer {
    // Private: Hanya bisa diakses di dalam class ini sendiri
    private $jenis_processor = "Intel Core i7-4790 3.6Ghz";
    
    // Protected: Bisa diakses oleh class ini dan class turunannya
    protected $jenis_RAM = "DDR 4";
    
    // Public: Bisa diakses dari mana saja
    public $jenis_VGA = "PCI Express";

    public function tampilkan_processor() {
        return $this->jenis_processor;
    }

    public function tampilkan_jenisprocessor() {
        return $this->jenis_processor;
    }

    // Diubah ke protected agar bisa diakses oleh class laptop
    protected function tampilkan_ram() {
        return $this->jenis_RAM;
    }

    protected function tampilkan_vga() {
        return $this->jenis_VGA;
    }
}

class laptop extends komputer {
    public function display_processor() {
        // Karena $jenis_processor PRIVATE di induk, kita harus gunakan 
        // method PUBLIC milik induk untuk mengambil nilainya.
        return $this->tampilkan_processor();
    }

    public function display_processor2() {
        return $this->tampilkan_processor();
    }

    public function display_ram() {
        // Bisa akses langsung karena $jenis_RAM adalah PROTECTED
        return $this->jenis_RAM;
    }

    public function display_ram2() {
        // Bisa akses karena tampilkan_ram() sekarang PROTECTED
        return $this->tampilkan_ram();
    }

    public function display_vga() {
        // Memperbaiki typo dari jenis_VGA2 ke tampilkan_vga()
        return $this->tampilkan_vga();
    }

    // Diubah ke PUBLIC agar bisa dipanggil dari objek di luar class
    public function display_processorkomputer() {
        return $this->tampilkan_processor();
    }
}

$komputer = new komputer();
$laptop = new laptop();

echo "Line 61 : " . $komputer->tampilkan_processor() . "<br />";
echo "Line 62 : " . $laptop->display_processor() . "<br />";
echo "Line 63 : " . $laptop->display_processor2() . "<br />";
echo "Line 64 : " . $laptop->tampilkan_jenisprocessor() . "<br />";
echo "Line 65 : " . $laptop->display_ram() . "<br />";
echo "Line 66 : " . $laptop->display_vga() . "<br />";
echo "Line 67 : " . $laptop->display_processorkomputer() . "<br />";

?>