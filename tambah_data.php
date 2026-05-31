<?php
include('koneksi.php');
?>

<!DOCTYPE html>
<html>
<head>
    <title>Tambah Data Barang</title>
</head>
<body>

<h2>TAMBAH DATA BARANG</h2>

<form method="POST" action="proses_barang.php?action=add">

<table>

<tr>
    <td>Nama Barang</td>
    <td>:</td>
    <td>
        <input type="text"
               name="nama_barang"
               required>
    </td>
</tr>

<tr>
    <td>Stok</td>
    <td>:</td>
    <td>
        <input type="number"
               name="stok"
               required>
    </td>
</tr>

<tr>
    <td>Harga Beli</td>
    <td>:</td>
    <td>
        <input type="number"
               name="harga_beli"
               required>
    </td>
</tr>

<tr>
    <td>Harga Jual</td>
    <td>:</td>
    <td>
        <input type="number"
               name="harga_jual"
               required>
    </td>
</tr>

<tr>
    <td colspan="3">
        <input type="submit" value="Simpan">

        <a href="index.php">
            <button type="button">
                Kembali
            </button>
        </a>
    </td>
</tr>

</table>

</form>

</body>
</html>