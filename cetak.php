<?php
include('koneksi.php');

$db = new database();

$data_barang = $db->tampil_data();
?>

<!DOCTYPE html>
<html>
<head>
<title>Laporan Data Barang</title>

<style>

body{
    font-family: Arial;
}

table{
    border-collapse: collapse;
    width:100%;
}

th,td{
    border:1px solid black;
    padding:8px;
}

</style>

</head>
<body>

<h2 align="center">
LAPORAN DATA BARANG
</h2>

<table>

<tr>
    <th>No</th>
    <th>Kode Barang</th>
    <th>Nama Barang</th>
    <th>Stok</th>
    <th>Harga Beli</th>
    <th>Harga Jual</th>
    <th>Keuntungan</th>
</tr>

<?php

$no=1;

foreach($data_barang as $row)
{
?>

<tr>

<td><?php echo $no++; ?></td>

<td><?php echo $row['kd_barang']; ?></td>

<td><?php echo $row['nama_barang']; ?></td>

<td><?php echo $row['stok']; ?></td>

<td>
Rp <?php echo number_format($row['harga_beli'],0,',','.'); ?>
</td>

<td>
Rp <?php echo number_format($row['harga_jual'],0,',','.'); ?>
</td>

<td>
Rp <?php echo number_format(($row['harga_jual']-$row['harga_beli']),0,',','.'); ?>
</td>

</tr>

<?php
}
?>

</table>

<script>
window.print();
</script>

</body>
</html>