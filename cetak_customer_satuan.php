<?php
include('koneksi.php');
$db = new database();
$id = isset($_GET['id_customer']) ? $_GET['id_customer'] : "";
$row = $db->customer_per_satuan($id);

if(!$row) { echo "<script>alert('ID tidak ditemukan!'); window.close();</script>"; exit; }
?>
<!DOCTYPE html>
<html>
<head>
    <title>Cetak Detail Customer</title>
</head>
<body>
    <h2>Laporan Detail Data Customer: <?php echo $row['nama_customer']; ?></h2>
    <hr>
    <table cellpadding="5">
        <tr><td>ID Customer</td><td>: <?php echo $row['id_customer']; ?></td></tr>
        <tr><td>NIK Customer</td><td>: <?php echo $row['nik_customer']; ?></td></tr>
        <tr><td>Nama</td><td>: <?php echo $row['nama_customer']; ?></td></tr>
        <tr><td>Jenis Kelamin</td><td>: <?php echo $row['jenis_kelamin']; ?></td></tr>
        <tr><td>Alamat</td><td>: <?php echo $row['alamat_customer']; ?></td></tr>
        <tr><td>Telepon</td><td>: <?php echo $row['telepon_customer']; ?></td></tr>
        <tr><td>Email</td><td>: <?php echo $row['email_customer']; ?></td></tr>
    </table>
    <script>window.print();</script>
</body>
</html>