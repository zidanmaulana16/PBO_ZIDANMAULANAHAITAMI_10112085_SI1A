<?php
include('koneksi.php');

$db = new database();

$id_customer = isset($_GET['id']) ? $_GET['id'] : '';

$data_customer = $db->tampil_edit_customer($id_customer);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Customer</title>
</head>
<body>

<h2>EDIT DATA CUSTOMER</h2>
<hr>

<?php
if(!empty($data_customer))
{
    foreach($data_customer as $d)
    {
?>

<form method="POST" action="proses_barang.php?action=edit_customer">

<input
type="hidden"
name="id_customer"
value="<?php echo $d['id_customer']; ?>"
>

<table>

<tr>
    <td>NIK Customer</td>
    <td>:</td>
    <td>
        <input
        type="text"
        name="nik_customer"
        value="<?php echo $d['nik_customer']; ?>"
        required>
    </td>
</tr>

<tr>
    <td>Nama Customer</td>
    <td>:</td>
    <td>
        <input
        type="text"
        name="nama_customer"
        value="<?php echo $d['nama_customer']; ?>"
        required>
    </td>
</tr>

<tr>
    <td>Jenis Kelamin</td>
    <td>:</td>
    <td>
        <select name="jenis_kelamin">
            <option value="Laki-Laki" <?php if($d['jenis_kelamin']=="Laki-Laki") echo "selected"; ?>>
                Laki-Laki
            </option>

            <option value="Perempuan" <?php if($d['jenis_kelamin']=="Perempuan") echo "selected"; ?>>
                Perempuan
            </option>
        </select>
    </td>
</tr>

<tr>
    <td>Alamat Customer</td>
    <td>:</td>
    <td>
        <textarea
        name="alamat_customer"
        required><?php echo $d['alamat_customer']; ?></textarea>
    </td>
</tr>

<tr>
    <td>Telepon Customer</td>
    <td>:</td>
    <td>
        <input
        type="text"
        name="telpon_customer"
        value="<?php echo $d['telpon_customer']; ?>"
        required>
    </td>
</tr>

<tr>
    <td>Email Customer</td>
    <td>:</td>
    <td>
        <input
        type="email"
        name="email_customer"
        value="<?php echo $d['email_customer']; ?>"
        required>
    </td>
</tr>

<tr>
    <td>Password Customer</td>
    <td>:</td>
    <td>
        <input
        type="text"
        name="pass_customer"
        value="<?php echo $d['pass_customer']; ?>"
        required>
    </td>
</tr>

<tr>
    <td colspan="3">
        <input type="submit" value="Update Data">

        <a href="tampil_customer.php">
            <button type="button">Kembali</button>
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
    echo "<h3>Data Customer Tidak Ditemukan</h3>";
}
?>

</body>
</html>