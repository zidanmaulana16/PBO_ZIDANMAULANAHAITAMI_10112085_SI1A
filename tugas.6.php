<?php

// Class untuk menghitung volume bangun ruang
class BangunRuang {
    public $jenis;
    public $sisi;
    public $jariJari;
    public $tinggi;
    public $volume;

    public function __construct($jenis, $sisi = 0, $jariJari = 0, $tinggi = 0) {
        $this->jenis = $jenis;
        $this->sisi = $sisi;
        $this->jariJari = $jariJari;
        $this->tinggi = $tinggi;
        $this->volume = 0;
    }

    // Method untuk menghitung volume sesuai jenis bangun ruang
    public function hitungVolume() {
        switch (strtolower($this->jenis)) {
            case "bola":
                // Volume bola = 4/3 * pi * r^3
                $this->volume = (4/3) * pi() * pow($this->jariJari, 3);
                break;

            case "kerucut":
                // Volume kerucut = 1/3 * pi * r^2 * t
                $this->volume = (1/3) * pi() * pow($this->jariJari, 2) * $this->tinggi;
                break;

            case "limas segi empat":
                // Volume limas segi empat = (1/3) * luas alas * tinggi
                // luas alas = sisi^2
                $luasAlas = pow($this->sisi, 2);
                $this->volume = (1/3) * $luasAlas * $this->tinggi;
                break;

            case "kubus":
                // Volume kubus = sisi^3
                $this->volume = pow($this->sisi, 3);
                break;

            case "tabung":
                // Volume tabung = pi * r^2 * t
                $this->volume = pi() * pow($this->jariJari, 2) * $this->tinggi;
                break;

            default:
                $this->volume = 0;
                break;
        }
    }
}


// Data beberapa bangun ruang dalam array objek
$daftarBangun = [
    new BangunRuang("Bola", 0, 7, 0),
    new BangunRuang("Kerucut", 0, 14, 10),
    new BangunRuang("Limas Segi Empat", 8, 0, 24),
    new BangunRuang("Kubus", 30, 0, 0),
    new BangunRuang("Tabung", 0, 7, 10),
];

// Hitung volume untuk masing-masing objek
foreach ($daftarBangun as $bangun) {
    $bangun->hitungVolume();
}

?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Volume Bangun Ruang</title>
    <style>
        table {
            border-collapse: collapse;
            width: 70%;
            margin: 20px auto;
            font-family: Arial, sans-serif;
        }
        th, td {
            border: 1px solid #555;
            padding: 8px 12px;
            text-align: center;
        }
        th {
            background-color: #0052cc;
            color: white;
        }
    </style>
</head>
<body>

<h2 style="text-align:center;">Volume Bangun Ruang</h2>

<table>
    <thead>
        <tr>
            <th>Jenis Bangun Ruang</th>
            <th>Sisi</th>
            <th>Jari-jari</th>
            <th>Tinggi</th>
            <th>Volume</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($daftarBangun as $bangun): ?>
        <tr>
            <td><?= htmlspecialchars($bangun->jenis) ?></td>
            <td><?= $bangun->sisi ?></td>
            <td><?= $bangun->jariJari ?></td>
            <td><?= $bangun->tinggi ?></td>
            <td><?= number_format($bangun->volume, 10) ?></td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>

</body>
</html>