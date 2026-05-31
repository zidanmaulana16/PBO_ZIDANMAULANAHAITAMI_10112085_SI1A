<!DOCTYPE html>
<html>
<head>
    <title>Form Login</title>
</head>
<body>
    <h3>Form Login</h3>
    
    <?php 
    if(isset($_GET['pesan'])){
        if($_GET['pesan'] == "gagal"){
            echo "<p style='color:red;'>Username atau password salah!</p>";
        }else if($_GET['pesan'] == "logout"){
            echo "<p style='color:green;'>Anda telah berhasil logout.</p>";
        }else if($_GET['pesan'] == "belum_login"){
            echo "<p style='color:orange;'>Anda harus login terlebih dahulu untuk mengakses halaman utama.</p>";
        }
    }
    ?>

    <form method="post" action="proses_barang.php?action=login">
        <table>
            <tr>
                <td>Username</td>
                <td>:</td>
                <td><input type="text" name="username" required></td>
            </tr>
            <tr>
                <td>Password</td>
                <td>:</td>
                <td><input type="password" name="password" required></td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td>
                    <input type="submit" value="Login">
                    <input type="reset" value="Reset">
                </td>
            </tr>
        </table>
    </form>
</body>
</html>