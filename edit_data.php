<?php
include('koneksi.php');

$db = new database();

$kd_barang = isset($_GET['kd_barang']) ? $_GET['kd_barang'] : '';

$data_edit_barang = $db->tampil_edit_data($kd_barang);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Data Barang</title>
</head>
<body>

<h2>FORM EDIT DATA BARANG</h2>

<hr>

<?php

if(!empty($data_edit_barang))
{
    foreach($data_edit_barang as $d)
    {
?>

<form method="POST" action="proses_barang.php?action=edit">

<input
type="hidden"
name="kd_barang"
value="<?php echo $d['kd_barang']; ?>"
>

<table>

<tr>
    <td>Nama Barang</td>
    <td>:</td>
    <td>
        <input
        type="text"
        name="nama_barang"
        value="<?php echo $d['nama_barang']; ?>"
        required>
    </td>
</tr>

<tr>
    <td>Stok</td>
    <td>:</td>
    <td>
        <input
        type="number"
        name="stok"
        value="<?php echo $d['stok']; ?>"
        required>
    </td>
</tr>

<tr>
    <td>Harga Beli</td>
    <td>:</td>
    <td>
        <input
        type="number"
        name="harga_beli"
        value="<?php echo $d['harga_beli']; ?>"
        required>
    </td>
</tr>

<tr>
    <td>Harga Jual</td>
    <td>:</td>
    <td>
        <input
        type="number"
        name="harga_jual"
        value="<?php echo $d['harga_jual']; ?>"
        required>
    </td>
</tr>

<tr>
    <td colspan="3">

        <input
        type="submit"
        value="Update Data">

        <a href="index.php">
            <button type="button">
                Kembali
            </button>
        </a>

    </td>
</tr>

</table>

</form>

<?php
    }
}
else
{
    echo "
    <h3 style='color:red'>
        Data Barang Tidak Ditemukan
    </h3>

    <a href='index.php'>
        Kembali
    </a>
    ";
}
?>

</body>
</html>