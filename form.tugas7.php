<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Sistem Input Gaji Karyawan</title>
    <style>
        body { font-family: sans-serif; margin: 20px; line-height: 1.6; }
        .container { max-width: 600px; margin: auto; padding: 20px; border: 1px solid #ddd; border-radius: 8px; }
        .form-group { margin-bottom: 15px; }
        label { display: block; font-weight: bold; }
        input, select { width: 100%; padding: 8px; margin-top: 5px; box-sizing: border-box; }
        button { background: #28a745; color: white; padding: 10px 15px; border: none; border-radius: 4px; cursor: pointer; }
        .result { margin-top: 20px; padding: 15px; background: #e9ecef; border-left: 5px solid #28a745; }
    </style>
</head>
<body>

<div class="container">
    <h2>Form Hitung Gaji Karyawan</h2>
    <form method="POST">
        <div class="form-group">
            <label>Nama Karyawan:</label>
            <input type="text" name="nama" required>
        </div>

        <div class="form-group">
            <label>Gaji Pokok:</label>
            <input type="number" name="gaji_pokok" required>
        </div>

        <div class="form-group">
            <label>Jabatan (Class):</label>
            <select name="jabatan" id="jabatan" onchange="toggleFields()" required>
                <option value="programmer">Programmer</option>
                <option value="direktur">Direktur</option>
                <option value="mingguan">Pegawai Mingguan</option>
            </select>
        </div>

        <div id="div_masa_kerja" class="form-group">
            <label id="label_masa_kerja">Masa Kerja (Tahun):</label>
            <input type="number" name="masa_kerja">
        </div>

        <div id="div_mingguan" style="display:none;">
            <div class="form-group">
                <label>Harga Barang:</label>
                <input type="number" name="harga_barang">
            </div>
            <div class="form-group">
                <label>Target Stok (Harus Terjual):</label>
                <input type="number" name="stok_target">
            </div>
            <div class="form-group">
                <label>Total Penjualan (Inputan):</label>
                <input type="number" name="total_jual">
            </div>
        </div>

        <button type="submit" name="hitung">Hitung Gaji</button>
    </form>

    <?php
    if (isset($_POST['hitung'])) {
        // Sertakan Class PHP yang tadi kita buat
        require_once 'solusi.php'; // Atau paste class-class tadi di atas file ini

        $nama = $_POST['nama'];
        $gaji = $_POST['gaji_pokok'];
        $jabatan = $_POST['jabatan'];
        $hasil = 0;

        switch ($jabatan) {
            case 'programmer':
                $p = new Programmer($nama, $gaji, $_POST['masa_kerja']);
                $hasil = $p->hitungGajiTotal();
                break;
            case 'direktur':
                $d = new Direktur($nama, $gaji, $_POST['masa_kerja']);
                $hasil = $d->hitungGajiTotal();
                break;
            case 'mingguan':
                $m = new PegawaiMingguan($nama, $gaji, $_POST['harga_barang'], $_POST['stok_target'], $_POST['total_jual']);
                $hasil = $m->hitungGajiTotal();
                break;
        }

        echo "<div class='result'>";
        echo "<strong>Hasil Perhitungan:</strong><br>";
        echo "Nama: $nama <br>";
        echo "Jabatan: " . ucfirst($jabatan) . "<br>";
        echo "Total Gaji: <strong>Rp " . number_format($hasil, 0, ',', '.') . "</strong>";
        echo "</div>";
    }
    ?>
</div>

<script>
// JavaScript untuk menyembunyikan/menampilkan input sesuai jabatan
function toggleFields() {
    var jabatan = document.getElementById("jabatan").value;
    var divMasaKerja = document.getElementById("div_masa_kerja");
    var divMingguan = document.getElementById("div_mingguan");

    if (jabatan === "mingguan") {
        divMasaKerja.style.display = "none";
        divMingguan.style.display = "block";
    } else {
        divMasaKerja.style.display = "block";
        divMingguan.style.display = "none";
    }
}
</script>

</body>
</html>