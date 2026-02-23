<!DOCTYPE html>
<html>
<head>
    <title>Form Produk</title>
</head>
<body>

    <h1>Input Produk</h1>

    <form action="proses_produk.php" method="POST">
        <label>Nama Produk :</label>
        <input type="text" name="nama" required>
        <br><br>

        <label>Harga :</label>
        <input type="number" name="harga" required>
        <br><br>

        <button type="submit">Kirim</button>
    </form>

</body>
</html>