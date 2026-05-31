<?php
include('koneksi.php');

$db = new database();

$id_supplier = isset($_GET['id_supplier']) ? $_GET['id_supplier'] : '';

$data_edit = $db->tampil_edit_supplier($id_supplier);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Supplier</title>
</head>
<body>

<h2>FORM EDIT DATA SUPPLIER</h2>

<hr>

<?php

if(!empty($data_edit))
{
    foreach($data_edit as $d)
    {
?>

<form method="POST" action="proses_barang.php?action=edit_supplier">

<input
type="hidden"
name="id_supplier"
value="<?php echo $d['id_supplier']; ?>"
>

<table>

<tr>
    <td>Nama Supplier</td>
    <td>:</td>
    <td>
        <input
        type="text"
        name="nama_supplier"
        value="<?php echo $d['nama_supplier']; ?>"
        required>
    </td>
</tr>

<tr>
    <td>Alamat Supplier</td>
    <td>:</td>
    <td>
        <textarea
        name="alamat_supplier"
        required><?php echo $d['alamat_supplier']; ?></textarea>
    </td>
</tr>

<tr>
    <td>Telepon</td>
    <td>:</td>
    <td>
        <input
        type="text"
        name="telepon_supplier"
        value="<?php echo $d['telpon_supplier']; ?>"
        required>
    </td>
</tr>

<tr>
    <td>Email</td>
    <td>:</td>
    <td>
        <input
        type="email"
        name="email_supplier"
        value="<?php echo $d['email_supplier']; ?>"
        required>
    </td>
</tr>

<tr>
    <td>Password Baru</td>
    <td>:</td>
    <td>
        <input
        type="password"
        name="password_supplier">

        <br>

        <small>
            Kosongkan jika password tidak ingin diubah
        </small>
    </td>
</tr>

<tr>
    <td colspan="3">

        <input
        type="submit"
        value="Update Data">

        <a href="tampil_supplier.php">
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
        Data Supplier Tidak Ditemukan
    </h3>

    <a href='tampil_supplier.php'>
        Kembali
    </a>
    ";
}
?>

</body>
</html>