<?php

class KalkulatorSuhu {

    private $nilai;
    private $dari;
    private $ke;

    public function __construct($nilai, $dari, $ke) {
        $this->nilai = $nilai;
        $this->dari = $dari;
        $this->ke = $ke;
    }

    public function konversi() {

        if ($this->dari == "C" && $this->ke == "F") {
            return ($this->nilai * 9/5) + 32;

        } elseif ($this->dari == "F" && $this->ke == "C") {
            return ($this->nilai - 32) * 5/9;

        } elseif ($this->dari == "C" && $this->ke == "K") {
            return $this->nilai + 273.15;

        } elseif ($this->dari == "K" && $this->ke == "C") {
            return $this->nilai - 273.15;

        } elseif ($this->dari == "F" && $this->ke == "K") {
            return (($this->nilai - 32) * 5/9) + 273.15;

        } elseif ($this->dari == "K" && $this->ke == "F") {
            return (($this->nilai - 273.15) * 9/5) + 32;

        } elseif ($this->dari == $this->ke) {
            return $this->nilai;

        } else {
            return "Konversi tidak valid!";
        }
    }
}

$hasil = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nilai = $_POST["nilai"];
    $dari = $_POST["dari"];
    $ke = $_POST["ke"];

    $kalkulator = new KalkulatorSuhu($nilai, $dari, $ke);
    $hasil = $kalkulator->konversi();
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Kalkulator Konversi Suhu</title>
</head>
<body>

<h2>Kalkulator Konversi Suhu</h2>

<form method="POST">
    <label>Masukkan Nilai:</label>
    <input type="number" step="any" name="nilai" required>
    <br><br>

    <label>Dari:</label>
    <select name="dari">
        <option value="C">Celsius</option>
        <option value="F">Fahrenheit</option>
        <option value="K">Kelvin</option>
    </select>

    <label>Ke:</label>
    <select name="ke">
        <option value="C">Celsius</option>
        <option value="F">Fahrenheit</option>
        <option value="K">Kelvin</option>
    </select>

    <br><br>
    <button type="submit">Konversi</button>
</form>

<?php
if ($hasil !== "") {
    echo "<h3>Hasil: $hasil</h3>";
}
?>

</body>
</html>

