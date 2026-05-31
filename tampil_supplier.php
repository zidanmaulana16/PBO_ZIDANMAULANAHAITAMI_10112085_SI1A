<?php
include('koneksi.php');

$db = new database();

$cari = isset($_GET['cari']) ? $_GET['cari'] : '';

$data_supplier = $db->tampil_supplier($cari);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Data Supplier</title>
</head>
<body>

<h2>DATA SUPPLIER</h2>

<p>
    <a href="index.php">Data Barang</a> |
    <a href="tampil_customer.php">Data Customer</a> |
    <a href="tampil_supplier.php">Data Supplier</a> |
    <a href="proses_barang.php?action=logout">Logout</a>
</p>

<hr>

<button onclick="window.location='tambah_supplier.php'">
Tambah Data Supplier
</button>

<button onclick="window.location='cetak_supplier.php'">
Print Data Supplier
</button>

<br><br>

<form method="GET">

    <input
        type="text"
        name="cari"
        placeholder="Cari Nama Supplier"
        value="<?php echo htmlspecialchars($cari); ?>"
    >

    <input type="submit" value="Cari">

</form>

<br>

<table border="1" width="100%" cellpadding="5">

<tr>
    <th>ID Supplier</th>
    <th>Nama Supplier</th>
    <th>Alamat Supplier</th>
    <th>Telepon Supplier</th>
    <th>Email Supplier</th>
    <th>Password</th>
    <th>Action</th>
</tr>

<?php

if(!empty($data_supplier))
{
    foreach($data_supplier as $row)
    {
?>

<tr>

<td><?php echo $row['id_supplier']; ?></td>

<td><?php echo $row['nama_supplier']; ?></td>

<td><?php echo $row['alamat_supplier']; ?></td>

<td><?php echo $row['telepon_supplier']; ?></td>

<td><?php echo $row['email_supplier']; ?></td>

<td>********</td>

<td>

<a href="edit_supplier.php?id_supplier=<?php echo $row['id_supplier']; ?>">
Edit
</a>

|

<a
href="proses_barang.php?action=delete_supplier&id_supplier=<?php echo $row['id_supplier']; ?>"
onclick="return confirm('Yakin ingin menghapus supplier ini ?')">
Hapus
</a>

</td>

</tr>

<?php
    }
}
else
{
    echo "
    <tr>
        <td colspan='7' align='center'>
            Data supplier tidak ditemukan
        </td>
    </tr>
    ";
}
?>

</table>

<br><br>

<form method="GET"
      action="cetak_supplier_satuan.php"
      target="_blank">

<input
type="text"
name="id_supplier"
placeholder="Masukkan ID Supplier"
required>

<input
type="submit"
value="Print Supplier Satuan">

</form>

<br><br>

<button onclick="window.location='proses_barang.php?action=logout'">
Keluar Aplikasi
</button>

</body>
</html>