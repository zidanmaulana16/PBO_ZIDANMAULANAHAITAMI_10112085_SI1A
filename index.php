<?php
include('koneksi.php');

$db = new database();

// Pencarian
$cari = isset($_GET['cari']) ? $_GET['cari'] : '';
$data_barang = $db->tampil_data($cari);
?>

<!DOCTYPE html>
<html>
<head>
    <title>CRUD OOP - Data Barang</title>
</head>
<body>

<h2>DATA BARANG</h2>

<p>
    <a href="index.php">Beranda</a> |
    <a href="index.php">Data Barang</a> |
    <a href="tampil_customer.php">Data Customer</a> |
    <a href="tampil_supplier.php">Data Supplier</a> |
    <a href="proses_barang.php?action=logout">Logout</a>
</p>

<hr>

<button onclick="window.location='tambah_data.php'">
    Tambah Data
</button>

<button onclick="window.location='cetak.php'" target="_blank">
    Print Data Barang
</button>

<br><br>

<form method="GET" action="">
    <input
        type="text"
        name="cari"
        placeholder="Cari Nama Barang"
        value="<?php echo htmlspecialchars($cari); ?>"
    >

    <input type="submit" value="Cari">
</form>

<br>

<table border="1" width="100%" cellpadding="5" cellspacing="0">

    <tr>
        <th>No</th>
        <th>Kode Barang</th>
        <th>Nama Barang</th>
        <th>Stok</th>
        <th>Harga Beli</th>
        <th>Harga Jual</th>
        <th>Action</th>
    </tr>

    <?php

    if(!empty($data_barang))
    {
        $no = 1;

        foreach($data_barang as $row)
        {
    ?>

    <tr>
        <td><?php echo $no++; ?></td>

        <td><?php echo $row['kd_barang']; ?></td>

        <td><?php echo $row['nama_barang']; ?></td>

        <td><?php echo $row['stok']; ?></td>

        <td>
            Rp <?php echo number_format($row['harga_beli'],0,',','.'); ?>
        </td>

        <td>
            Rp <?php echo number_format($row['harga_jual'],0,',','.'); ?>
        </td>

        <td>

            <a href="edit_data.php?kd_barang=<?php echo $row['kd_barang']; ?>">
                Edit
            </a>

            |

            <a
            href="proses_barang.php?action=delete&kd_barang=<?php echo $row['kd_barang']; ?>"
            onclick="return confirm('Yakin ingin menghapus data ini ?')">
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
                Data tidak ditemukan
            </td>
        </tr>
        ";
    }
    ?>

</table>

<br>

<?php
if($cari != "")
{
    echo "<b>Hasil pencarian : ".htmlspecialchars($cari)."</b>";
}
?>

<br><br>

<center>

<form method="GET" action="cetak_satuan.php" target="_blank">

    <input
        type="text"
        name="kd_barang"
        placeholder="Masukkan Kode Barang"
        required
    >

    <input
        type="submit"
        value="Print Satuan Barang"
    >

</form>

</center>

<br><br>

<button onclick="window.location='proses_barang.php?action=logout'">
    Keluar Aplikasi
</button>

</body>
</html>