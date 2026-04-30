<?php
// CLASS INDUK (PARENT CLASS)
class Employee {
    protected $nama;        // bisa dipakai di class turunan (inheritance)
    protected $gajiPokok;

    // Constructor 
    public function __construct($nama, $gajiPokok) {
        $this->nama = $nama;
        $this->gajiPokok = $gajiPokok;
    }

    // Method untuk mengambil gaji pokok
    public function getGajiPokok() {
        return $this->gajiPokok;
    }

    // Method hitung gaji 
    public function hitungGajiTotal() {
        return $this->gajiPokok;
    }
}

// CLASS PROGRAMMER (CHILD CLASS)
class Programmer extends Employee {
    private $masaKerja; 

    // Constructor 
    public function __construct($nama, $gajiPokok, $masaKerja) {
        parent::__construct($nama, $gajiPokok);
        $this->masaKerja = $masaKerja;
    }

    // OVERRIDING 
    public function hitungGajiTotal() {
        $bonus = 0;

        if ($this->masaKerja >= 1 && $this->masaKerja <= 10) {
            $bonus = 0.01 * $this->masaKerja * $this->gajiPokok;
        } elseif ($this->masaKerja > 10) {
            $bonus = 0.02 * $this->masaKerja * $this->gajiPokok;
        }

        return $this->gajiPokok + $bonus;
    }
}

// CLASS DIREKTUR (CHILD CLASS)
class Direktur extends Employee {
    private $lamaKerja;

    public function __construct($nama, $gajiPokok, $lamaKerja) {
        parent::__construct($nama, $gajiPokok);
        $this->lamaKerja = $lamaKerja;
    }

    // OVERRIDING
    public function hitungGajiTotal() {
        $bonus = 0.5 * $this->lamaKerja * $this->gajiPokok;
        $tunjangan = 0.1 * $this->lamaKerja * $this->gajiPokok;

        return $this->gajiPokok + $bonus + $tunjangan;
    }
}

// CLASS PEGAWAI MINGGUAN (CHILD CLASS)
class PegawaiMingguan extends Employee {
    private $hargaBarang;
    private $stokHarusTerjual;
    private $totalPenjualan;

    public function __construct($nama, $gajiPokok, $hargaBarang, $stokHarusTerjual, $totalPenjualan) {
        parent::__construct($nama, $gajiPokok);
        $this->hargaBarang = $hargaBarang;
        $this->stokHarusTerjual = $stokHarusTerjual;
        $this->totalPenjualan = $totalPenjualan;
    }

    // OVERRIDING
    public function hitungGajiTotal() {

        // Jika penjualan > 70% target
        if ($this->totalPenjualan > (0.7 * $this->stokHarusTerjual)) {
            $tambahan = 0.10 * $this->hargaBarang * $this->totalPenjualan;
        } else {
            $tambahan = 0.03 * $this->hargaBarang * $this->totalPenjualan;
        }

        return $this->gajiPokok + $tambahan;
    }
}
?>

BAGIAN HTML (FORM INPUT)
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Gaji Karyawan</title>
</head>

<body>

<div class="card">
    <h2>Input Data Karyawan</h2>

    <form method="POST">

        <!-- INPUT NAMA -->
        <input type="text" name="nama" placeholder="Nama Karyawan" required>

        <!-- INPUT GAJI POKOK -->
        <input type="number" name="gaji_pokok" placeholder="Gaji Pokok" required>

        <!-- PILIH JABATAN -->
        <select name="jabatan" id="jabatan" onchange="updateForm()">
            <option value="programmer">Programmer</option>
            <option value="direktur">Direktur</option>
            <option value="mingguan">Pegawai Mingguan</option>
        </select>

        <hr>

        <!-- INPUT MASA KERJA (UNTUK PROGRAMMER & DIREKTUR) -->
        <div id="field_masa_kerja">
            <input type="number" name="masa_kerja" placeholder="Masa Kerja">
        </div>

        <!-- INPUT KHUSUS PEGAWAI MINGGUAN -->
        <div id="field_mingguan" style="display:none;">
            <input type="number" name="harga_barang" placeholder="Harga Barang">
            <input type="number" name="stok_target" placeholder="Stok Target">
            <input type="number" name="total_jual" placeholder="Total Penjualan">
        </div>

        <button type="submit" name="proses">Hitung Gaji</button>
    </form>


<?php
// PROSES HITUNG GAJI
if (isset($_POST['proses'])) {

    // ambil data dari form
    $nama = $_POST['nama'];
    $gaji = $_POST['gaji_pokok'];
    $jabatan = $_POST['jabatan'];

    // POLIMORFISME
    if ($jabatan == "programmer") {
        $obj = new Programmer($nama, $gaji, $_POST['masa_kerja']);

    } elseif ($jabatan == "direktur") {
        $obj = new Direktur($nama, $gaji, $_POST['masa_kerja']);

    } else {
        $obj = new PegawaiMingguan(
            $nama,
            $gaji,
            $_POST['harga_barang'],
            $_POST['stok_target'],
            $_POST['total_jual']
        );
    }

    // memanggil method overriding
    $finalGaji = $obj->hitungGajiTotal();

    // tampilkan hasil
    echo "<div>";
    echo "Nama: $nama <br>";
    echo "Jabatan: $jabatan <br>";
    echo "Total Gaji: Rp " . number_format($finalGaji,0,',','.');
    echo "</div>";
}
?>

</div>

</body>
</html>