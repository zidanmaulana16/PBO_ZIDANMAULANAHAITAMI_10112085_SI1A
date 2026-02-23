<!DOCTYPE html>
<html>
<head>
    <title>Form Produk</title>
</head>
<body>

    <h2>Input Data Produk</h2>

    <form action="proses_produk.php" method="POST">
        <label>Nama Produk :</label>
        <input type="text" name="nama" required>
        <br><br>

        <label>Harga :</label>
        <input type="number" name="harga" required>
        <br><br>

        <input type="submit" value="Simpan">
    </form>

</body>
</html>