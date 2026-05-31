<?php

include('koneksi.php');

$db = new database();

$kd_barang = isset($_GET['kd_barang']) ? $_GET['kd_barang'] : '';

$row = $db->tampil_per_satuan($kd_barang);

if(!$row)
{
    die("Data Barang Tidak Ditemukan");
}

?>

<!DOCTYPE html>
<html>
<head>
<title>Cetak Barang Satuan</title>

<style>

body{
    font-family: Arial;
    margin:40px;
}

table{
    width:400px;
}

td{
    padding:5px;
}

</style>

</head>
<body>

<h2>DETAIL DATA BARANG</h2>

<hr>

<table>

<tr>
<td>Kode Barang</td>
<td>:</td>
<td><?php echo $row['kd_barang']; ?></td>
</tr>

<tr>
<td>Nama Barang</td>
<td>:</td>
<td><?php echo $row['nama_barang']; ?></td>
</tr>

<tr>
<td>Stok</td>
<td>:</td>
<td><?php echo $row['stok']; ?></td>
</tr>

<tr>
<td>Harga Beli</td>
<td>:</td>
<td>
Rp <?php echo number_format($row['harga_beli'],0,',','.'); ?>
</td>
</tr>

<tr>
<td>Harga Jual</td>
<td>:</td>
<td>
Rp <?php echo number_format($row['harga_jual'],0,',','.'); ?>
</td>
</tr>

<tr>
<td>Keuntungan</td>
<td>:</td>
<td>
Rp <?php echo number_format(($row['harga_jual']-$row['harga_beli']),0,',','.'); ?>
</td>
</tr>

</table>

<script>
window.print();
</script>

</body>
</html>