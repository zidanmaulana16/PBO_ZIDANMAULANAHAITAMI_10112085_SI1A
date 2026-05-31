<?php
include('koneksi.php');
$db = new database();

$cari = isset($_GET['cari']) ? $_GET['cari'] : '';
$data_customer = $db->tampil_customer($cari);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Data Customer</title>
</head>
<body>

<h2>DATA CUSTOMER</h2>

<p>
    <a href="index.php">Data Barang</a> |
    <a href="tampil_customer.php">Data Customer</a> |
    <a href="tampil_supplier.php">Data Supplier</a> |
    <a href="proses_barang.php?action=logout">Logout</a>
</p>

<hr>

<button onclick="window.location='tambah_customer.php'">
Tambah Data Customer
</button>

<button onclick="window.location='cetak_customer.php'">
Print Data Customer
</button>

<br><br>

<form method="GET">
    <input
        type="text"
        name="cari"
        placeholder="Cari Nama Customer"
        value="<?php echo htmlspecialchars($cari); ?>"
    >

    <input type="submit" value="Cari">
</form>

<br>

<table border="1" width="100%" cellpadding="5">

<tr>
    <th>ID</th>
    <th>NIK</th>
    <th>Nama</th>
    <th>Jenis Kelamin</th>
    <th>Alamat</th>
    <th>Telepon</th>
    <th>Email</th>
    <th>Password</th>
    <th>Action</th>
</tr>

<?php

if(!empty($data_customer))
{
    foreach($data_customer as $row)
    {
?>

<tr>

<td><?php echo $row['id_customer']; ?></td>

<td><?php echo $row['nik_customer']; ?></td>

<td><?php echo $row['nama_customer']; ?></td>

<td><?php echo $row['jenis_kelamin']; ?></td>

<td><?php echo $row['alamat_customer']; ?></td>

<td><?php echo $row['telpon_customer']; ?></td>

<td><?php echo $row['email_customer']; ?></td>

<td>********</td>

<td>

<a href="edit_customer.php?id_customer=<?php echo $row['id_customer']; ?>">
Edit
</a>

|

<a
href="proses_barang.php?action=delete_customer&id_customer=<?php echo $row['id_customer']; ?>"
onclick="return confirm('Yakin hapus customer ini ?')">
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
        <td colspan='9' align='center'>
            Data customer tidak ditemukan
        </td>
    </tr>
    ";
}
?>

</table>

<br><br>

<form method="GET"
      action="cetak_customer_satuan.php"
      target="_blank">

<input
type="text"
name="id_customer"
placeholder="Masukkan ID Customer"
required>

<input
type="submit"
value="Print Customer Satuan">

</form>

<br><br>

<button onclick="window.location='proses_barang.php?action=logout'">
Keluar Aplikasi
</button>

</body>
</html>