<?php

// CLASS INDUK 
class Tabungan {
    protected $saldo;

    public function __construct($saldoAwal) {
        $this->saldo = $saldoAwal;
    }

    // Encapsulation
    public function getSaldo() {
        return $this->saldo;
    }

    //Setor Tunai
    public function setorTunai($jumlah) {
        if ($jumlah > 0) {
            $this->saldo += $jumlah;
            return true;
        }
        return false;
    }

    //Tarik Tunai
    public function tarikTunai($jumlah) {
        if ($jumlah > 0 && $jumlah <= $this->saldo) {
            $this->saldo -= $jumlah;
            return true;
        }
        return false;
    }
}

//CLASS ANAK
class Siswa extends Tabungan {
    private $nama;

    public function __construct($nama, $saldoAwal) {
        // Memanggil constructor induk
        parent::__construct($saldoAwal);
        $this->nama = $nama;
    }

    public function getNama() {
        return $this->nama;
    }
}

// MAIN PROGRAM (DISPLAY COMMAND PROMPT)
// Penggunaan Array untuk menampung objek Siswa
$daftarSiswa = [
    new Siswa("Siswa 1", 500000),
    new Siswa("Siswa 2", 750000),
    new Siswa("Siswa 3", 1000000)
];

while (true) {
    echo "\n=== PROGRAM TABUNGAN SEKOLAH (PHP CLI) ===\n";
    
    // Menampilkan saldo awal masing-masing siswa
    foreach ($daftarSiswa as $index => $siswa) {
        echo ($index + 1) . ". " . $siswa->getNama() . " | Saldo: Rp" . number_format($siswa->getSaldo(), 0, ',', '.') . "\n";
    }
    echo "0. Keluar\n";
    echo "Pilih Siswa (1-3): ";

    // Menggunakan fgets untuk mengambil input dari Command Prompt
    $pilihan = trim(fgets(STDIN));

    if ($pilihan === '0') break;

    // Percabangan untuk validasi (f)
    if (!isset($daftarSiswa[$pilihan - 1])) {
        echo "Pilihan tidak valid!\n";
        continue;
    }

    // Siswa hanya dapat mengakses uang miliknya (objek yang dipilih)
    $siswaAktif = $daftarSiswa[$pilihan - 1];

    echo "\nMenu untuk " . $siswaAktif->getNama() . ":\n";
    echo "1. Setor Tunai\n2. Tarik Tunai\n3. Cek Saldo\nPilih: ";
    $aksi = trim(fgets(STDIN));

    if ($aksi == '1') {
        echo "Masukkan nominal setor: ";
        $nominal = (float)trim(fgets(STDIN));
        if ($siswaAktif->setorTunai($nominal)) {
            echo "Berhasil! Saldo terbaru: " . $siswaAktif->getSaldo() . "\n";
        }
    } elseif ($aksi == '2') {
        echo "Masukkan nominal tarik: ";
        $nominal = (float)trim(fgets(STDIN));
        if ($siswaAktif->tarikTunai($nominal)) {
            echo "Berhasil! Sisa saldo: " . $siswaAktif->getSaldo() . "\n";
        } else {
            echo "Gagal! Saldo tidak cukup.\n";
        }
    } elseif ($aksi == '3') {
        echo "Saldo " . $siswaAktif->getNama() . " saat ini: Rp" . number_format($siswaAktif->getSaldo(), 0, ',', '.') . "\n";
    } else {
        echo "Menu tidak dikenali.\n";
    }
}

echo "Program selesai. Sampai jumpa!\n";