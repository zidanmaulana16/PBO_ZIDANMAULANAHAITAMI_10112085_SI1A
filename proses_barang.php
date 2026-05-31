<?php
include('koneksi.php');

$koneksi = new database();

$action = isset($_GET['action']) ? $_GET['action'] : "";

// LOGIN
if($action == "login")
{
    $username = $_POST['username'];
    $password = $_POST['password'];

    if($koneksi->login($username,$password))
    {
        header("location:index.php");
    }
    else
    {
        header("location:login.php?pesan=gagal");
    }
}

// LOGOUT
else if($action == "logout")
{
    if(session_status() === PHP_SESSION_NONE)
    {
        session_start();
    }

    session_unset();
    session_destroy();

    header("location:login.php?pesan=logout");
    exit();
}

// BARANG
else if($action == "add")
{
    $koneksi->tambah_data(
        $_POST['nama_barang'],
        $_POST['stok'],
        $_POST['harga_beli'],
        $_POST['harga_jual']
    );

    header("location:index.php");
}

else if($action == "edit")
{
    $koneksi->edit_data(
        $_POST['kd_barang'],
        $_POST['nama_barang'],
        $_POST['stok'],
        $_POST['harga_beli'],
        $_POST['harga_jual']
    );

    header("location:index.php");
}

else if($action == "delete")
{
    $koneksi->delete_data($_GET['id']);

    header("location:index.php");
}

// CUSTOMER
// ==================== 4. PROSES DATA CUSTOMER ====================
else if($action == "add_customer") {
    $nik           = $_POST['nik_customer'];
    $nama          = $_POST['nama_customer'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $alamat        = $_POST['alamat_customer'];
    $telepon       = $_POST['telepon_customer'];
    $email         = $_POST['email_customer'];

    // Memanggil fungsi yang berada di koneksi.php
    $koneksi->tambah_customer($nik, $nama, $jenis_kelamin, $alamat, $telepon, $email);
    
    // Alihkan kembali ke halaman tampil data customer
    header('location:tampil_customer.php');
}

else if($action == "edit_customer")
{
    $koneksi->edit_customer(
        $_POST['id_customer'],
        $_POST['nik_customer'],
        $_POST['nama_customer'],
        $_POST['jenis_kelamin'],
        $_POST['alamat_customer'],
        $_POST['telpon_customer'],
        $_POST['email_customer'],
        $_POST['pass_customer']
    );

    header("location:tampil_customer.php");
}

else if($action == "delete_customer")
{
    $koneksi->delete_customer($_GET['id']);

    header("location:tampil_customer.php");
}

// SUPPLIER
else if($action == "add_supplier")
{
    $koneksi->tambah_supplier(
        $_POST['nama_supplier'],
        $_POST['alamat_supplier'],
        $_POST['telpon_supplier'],
        $_POST['email_supplier'],
        $_POST['password_supplier']
    );

    header("location:tampil_supplier.php");
}

else if($action == "edit_supplier")
{
    $koneksi->edit_supplier(
        $_POST['id_supplier'],
        $_POST['nama_supplier'],
        $_POST['alamat_supplier'],
        $_POST['telpon_supplier'],
        $_POST['email_supplier'],
        $_POST['password_supplier']
    );

    header("location:tampil_supplier.php");
}

else if($action == "delete_supplier")
{
    $koneksi->delete_supplier($_GET['id']);

    header("location:tampil_supplier.php");
}

else
{
    echo "Action tidak ditemukan!";
}
?>