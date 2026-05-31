<?php
include('koneksi.php');
?>

<!DOCTYPE html>
<html>
<head>
    <title>Tambah Customer</title>
</head>
<body>

<h2>TAMBAH DATA CUSTOMER</h2>

<form method="POST" action="proses_barang.php?action=add_customer">

<table>

<tr>
    <td>NIK Customer</td>
    <td>:</td>
    <td>
        <input type="text" name="nik_customer" required>
    </td>
</tr>

<tr>
    <td>Nama Customer</td>
    <td>:</td>
    <td>
        <input type="text" name="nama_customer" required>
    </td>
</tr>

<tr>
    <td>Jenis Kelamin</td>
    <td>:</td>
    <td>
        <select name="jenis_kelamin">
            <option value="Laki-Laki">Laki-Laki</option>
            <option value="Perempuan">Perempuan</option>
        </select>
    </td>
</tr>

<tr>
    <td>Alamat</td>
    <td>:</td>
    <td>
        <textarea name="alamat_customer" required></textarea>
    </td>
</tr>

<tr>
    <td>Telepon</td>
    <td>:</td>
    <td>
        <input type="text" name="telpon_customer" required>
    </td>
</tr>

<tr>
    <td>Email</td>
    <td>:</td>
    <td>
        <input type="email" name="email_customer" required>
    </td>
</tr>

<tr>
    <td>Password</td>
    <td>:</td>
    <td>
        <input type="password" name="pass_customer" required>
    </td>
</tr>

<tr>
    <td colspan="3">
        <input type="submit" value="Simpan">
        <a href="tampil_customer.php">
            <button type="button">Kembali</button>
        </a>
    </td>
</tr>

</table>

</form>

</body>
</html>