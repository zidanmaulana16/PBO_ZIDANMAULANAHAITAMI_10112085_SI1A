<?php
include('koneksi.php');
?>

<!DOCTYPE html>
<html>
<head>
    <title>Tambah Data Supplier</title>
</head>
<body>

<h2>TAMBAH DATA SUPPLIER</h2>
<hr>

<form method="POST" action="proses_barang.php?action=add_supplier">

<table>

<tr>
    <td>Nama Supplier</td>
    <td>:</td>
    <td>
        <input
        type="text"
        name="nama_supplier"
        required>
    </td>
</tr>

<tr>
    <td>Alamat Supplier</td>
    <td>:</td>
    <td>
        <textarea
        name="alamat_supplier"
        required></textarea>
    </td>
</tr>

<tr>
    <td>Telepon Supplier</td>
    <td>:</td>
    <td>
        <input
        type="text"
        name="telepon_supplier"
        required>
    </td>
</tr>

<tr>
    <td>Email Supplier</td>
    <td>:</td>
    <td>
        <input
        type="email"
        name="email_supplier"
        required>
    </td>
</tr>

<tr>
    <td>Password Supplier</td>
    <td>:</td>
    <td>
        <input
        type="password"
        name="password_supplier"
        required>
    </td>
</tr>

<tr>
    <td colspan="3">

        <input
        type="submit"
        value="Simpan Data">

        <a href="tampil_supplier.php">
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