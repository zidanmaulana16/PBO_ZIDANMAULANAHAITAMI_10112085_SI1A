<!DOCTYPE html>
<html>
<head>
    <title>Program Diskon Belanja</title>
</head>
<body>

<h2>Form Perhitungan Diskon</h2>

<form method="post">
    Status Member:
    <select name="member">
        <option value="ya">Memiliki</option>
        <option value="tidak">Tidak Memiliki</option>
    </select>
    <br><br>

    Total Belanja:
    <input type="number" name="total" required>
    <br><br>

    <input type="submit" name="hitung" value="Hitung">
</form>

<hr>

<?php
if(isset($_POST['hitung'])){

    $member = $_POST['member'];
    $totalBelanja = $_POST['total'];
    $diskon = 0;

    // logika sesuai flowchart
    if($member == "ya"){
        if($totalBelanja > 500000){
            $diskon = 50000;
        }
        elseif($totalBelanja > 100000){
            $diskon = 15000;
        }
    }
    else{
        if($totalBelanja > 100000){
            $diskon = 5000;
        }
    }

    $totalBayar = $totalBelanja - $diskon;

    echo "<h3>Hasil Perhitungan</h3>";
    echo "Status Member : " . ($member=="ya" ? "Memiliki" : "Tidak Memiliki") . "<br>";
    echo "Total Belanja : Rp " . number_format($totalBelanja,0,",",".") . "<br>";
    echo "Diskon : Rp " . number_format($diskon,0,",",".") . "<br>";
    echo "Total Bayar : Rp " . number_format($totalBayar,0,",",".");
}
?>

</body>
</html>