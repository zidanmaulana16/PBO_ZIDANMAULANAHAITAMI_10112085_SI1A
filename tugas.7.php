<?php
// ==========================================
// BAGIAN LOGIKA BACKEND (CLASS & OOP)
// ==========================================

class Employee {
    protected $nama;
    protected $gajiPokok;

    public function __construct($nama, $gajiPokok) {
        $this->nama = $nama;
        $this->gajiPokok = $gajiPokok;
    }

    public function getGajiPokok() {
        return $this->gajiPokok;
    }

    public function hitungGajiTotal() {
        return $this->gajiPokok;
    }
}

class Programmer extends Employee {
    private $masaKerja;

    public function __construct($nama, $gajiPokok, $masaKerja) {
        parent::__construct($nama, $gajiPokok);
        $this->masaKerja = $masaKerja;
    }

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

class Direktur extends Employee {
    private $lamaKerja;

    public function __construct($nama, $gajiPokok, $lamaKerja) {
        parent::__construct($nama, $gajiPokok);
        $this->lamaKerja = $lamaKerja;
    }

    public function hitungGajiTotal() {
        $bonus = 0.5 * $this->lamaKerja * $this->gajiPokok;
        $tunjangan = 0.1 * $this->lamaKerja * $this->gajiPokok;
        return $this->gajiPokok + $bonus + $tunjangan;
    }
}

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

    public function hitungGajiTotal() {
        // Cek apakah penjualan > 70% dari target stok
        if ($this->totalPenjualan > (0.7 * $this->stokHarusTerjual)) {
            $tambahan = 0.10 * $this->hargaBarang * $this->totalPenjualan;
        } else {
            $tambahan = 0.03 * $this->hargaBarang * $this->totalPenjualan;
        }
        return $this->gajiPokok + $tambahan;
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Gaji Karyawan - Studi Kasus</title>
    <style>
        body { font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; background-color: #f4f7f6; padding: 40px; }
        .card { max-width: 500px; margin: auto; background: white; padding: 25px; border-radius: 10px; box-shadow: 0 4px 15px rgba(0,0,0,0.1); }
        h2 { text-align: center; color: #333; margin-bottom: 20px; }
        .form-group { margin-bottom: 15px; }
        label { display: block; margin-bottom: 5px; font-weight: 600; color: #555; }
        input, select { width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px; box-sizing: border-box; }
        button { width: 100%; padding: 12px; background-color: #007bff; color: white; border: none; border-radius: 5px; cursor: pointer; font-size: 16px; margin-top: 10px; }
        button:hover { background-color: #0056b3; }
        .result-box { margin-top: 25px; padding: 15px; border-radius: 5px; background-color: #d4edda; border: 1px solid #c3e6cb; color: #155724; }
        hr { margin: 20px 0; border: 0; border-top: 1px solid #eee; }
    </style>
</head>
<body>

<div class="card">
    <h2>Input Data Karyawan</h2>
    <form method="POST" action="">
        <div class="form-group">
            <label>Nama Karyawan</label>
            <input type="text" name="nama" placeholder="Masukkan nama..." required>
        </div>

        <div class="form-group">
            <label>Gaji Pokok (Rp)</label>
            <input type="number" name="gaji_pokok" placeholder="Contoh: 5000000" required>
        </div>

        <div class="form-group">
            <label>Jabatan / Kategori</label>
            <select name="jabatan" id="jabatan" onchange="updateForm()">
                <option value="programmer">Programmer</option>
                <option value="direktur">Direktur</option>
                <option value="mingguan">Pegawai Mingguan</option>
            </select>
        </div>

        <hr>

        <div id="field_masa_kerja" class="form-group">
            <label id="label_kerja">Masa Kerja (Tahun)</label>
            <input type="number" name="masa_kerja" value="0">
        </div>

        <div id="field_mingguan" style="display: none;">
            <div class="form-group">
                <label>Harga Barang (Rp)</label>
                <input type="number" name="harga_barang" value="0">
            </div>
            <div class="form-group">
                <label>Stok Target (Harus Terjual)</label>
                <input type="number" name="stok_target" value="0">
            </div>
            <div class="form-group">
                <label>Total Penjualan Realisasi</label>
                <input type="number" name="total_jual" value="0">
            </div>
        </div>

        <button type="submit" name="proses">Hitung Total Gaji</button>
    </form>

    <?php
    if (isset($_POST['proses'])) {
        $nama = $_POST['nama'];
        $gaji = $_POST['gaji_pokok'];
        $jabatan = $_POST['jabatan'];
        $finalGaji = 0;

        if ($jabatan == "programmer") {
            $obj = new Programmer($nama, $gaji, $_POST['masa_kerja']);
        } elseif ($jabatan == "direktur") {
            $obj = new Direktur($nama, $gaji, $_POST['masa_kerja']);
        } else {
            $obj = new PegawaiMingguan($nama, $gaji, $_POST['harga_barang'], $_POST['stok_target'], $_POST['total_jual']);
        }

        $finalGaji = $obj->hitungGajiTotal();

        echo "<div class='result-box'>";
        echo "<strong>Hasil Perhitungan:</strong><br>";
        echo "Nama: $nama<br>";
        echo "Jabatan: " . ucfirst($jabatan) . "<br>";
        echo "Total Gaji: <strong>Rp " . number_format($finalGaji, 0, ',', '.') . "</strong>";
        echo "</div>";
    }
    ?>
</div>

<script>
function updateForm() {
    var jabatan = document.getElementById("jabatan").value;
    var fMasaKerja = document.getElementById("field_masa_kerja");
    var fMingguan = document.getElementById("field_mingguan");

    if (jabatan === "mingguan") {
        fMasaKerja.style.display = "none";
        fMingguan.style.display = "block";
    } else {
        fMasaKerja.style.display = "block";
        fMingguan.style.display = "none";
    }
}
</script>

</body>
</html>