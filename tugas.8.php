<?php

class Karyawan {
    public $nama;
    public $golongan;
    public $jamLembur;
    public $gajiPokok;

    public function __construct($nama, $golongan, $jamLembur) {
        $this->nama = $nama;
        $this->golongan = $golongan;
        $this->jamLembur = $jamLembur;
        $this->gajiPokok = $this->getGajiPokok($golongan);
    }

    public function getGajiPokok($gol) {
        $daftarGaji = [
            "Ib" => 1250000, "Ic" => 1300000, "Id" => 1350000,
            "IIa" => 2000000, "IIb" => 2100000, "IIc" => 2200000, "IId" => 2300000,
            "IIIa" => 2400000, "IIIb" => 2500000, "IIIc" => 2600000, "IIId" => 2700000,
            "IVa" => 2800000, "IVb" => 2900000, "IVc" => 3000000, "IVd" => 3100000
        ];
        return $daftarGaji[$gol] ?? 0;
    }

    public function hitungTotalGaji() {
        return $this->gajiPokok + ($this->jamLembur * 15000);
    }
}

class SistemGaji {
    private $data = [];

    public function tambahData() {
        echo "Nama: ";
        $nama = trim(fgets(STDIN));

        echo "Golongan: ";
        $gol = trim(fgets(STDIN));

        echo "Jam Lembur: ";
        $jam = trim(fgets(STDIN));

        $karyawan = new Karyawan($nama, $gol, $jam);

        if ($karyawan->gajiPokok == 0) {
            echo "Golongan tidak valid!\n";
            return;
        }

        $this->data[] = $karyawan;
        echo "Data berhasil ditambahkan.\n";
    }

    public function tampilkanData() {
        echo "\n===== DATA GAJI KARYAWAN =====\n";
        if (empty($this->data)) {
            echo "Belum ada data.\n";
            return;
        }

        echo "No | Nama | Golongan | Jam | Total Gaji\n";

        foreach ($this->data as $i => $k) {
            echo ($i+1)." | ".
                 $k->nama." | ".
                 $k->golongan." | ".
                 $k->jamLembur." | Rp".
                 number_format($k->hitungTotalGaji(),0,",",".")."\n";
        }
    }

    public function hapusData() {
        $this->tampilkanData();
        echo "Hapus nomor: ";
        $no = trim(fgets(STDIN));

        if (isset($this->data[$no-1])) {
            unset($this->data[$no-1]);
            $this->data = array_values($this->data);
            echo "Data berhasil dihapus.\n";
        } else {
            echo "Nomor tidak valid.\n";
        }
    }
}

// MAIN PROGRAM
$sistem = new SistemGaji();

do {
    echo "\n===== MENU GAJI KARYAWAN =====\n";
    echo "1. Tampilkan Data\n";
    echo "2. Tambah Data\n";
    echo "3. Hapus Data\n";
    echo "4. Keluar\n";
    echo "Pilih: ";

    $pilih = trim(fgets(STDIN));

    switch ($pilih) {
        case 1:
            $sistem->tampilkanData();
            break;
        case 2:
            $sistem->tambahData();
            break;
        case 3:
            $sistem->hapusData();
            break;
        case 4:
            echo "Keluar...\n";
            break;
        default:
            echo "Menu tidak valid!\n";
    }

} while ($pilih != 4);

?>