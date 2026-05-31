<?php
include('koneksi.php');
$db = new database();
$id = isset($_GET['id_supplier']) ? $_GET['id_supplier'] : "";
$row = $db->supplier_per_satuan($id);

if(!$row) { echo "<script>alert('ID tidak ditemukan!'); window.close();</script>"; exit; }
?>
<!DOCTYPE html>
<html>
<head>
    <title>Cetak Detail Supplier</title>
</head>
<body>
    <h2>Laporan Detail Data Supplier: <?php echo $row['nama_supplier']; ?></h2>
    <hr>
    <table cellpadding="5">
        <tr><td>ID Supplier</td><td>: <?php echo $row['id_supplier']; ?></td></tr>
        <tr><td>Nama Supplier</td><td>: <?php echo $row['nama_supplier']; ?></td></tr>
        <tr><td>Alamat</td><td>: <?php echo $row['alamat_supplier']; ?></td></tr>
        <tr><td>Telepon</td><td>: <?php echo $row['telepon_supplier']; ?></td></tr>
        <tr><td>Email</td><td>: <?php echo $row['email_supplier']; ?></td></tr>
    </table>
    <script>window.print();</script>
</body>
</html>