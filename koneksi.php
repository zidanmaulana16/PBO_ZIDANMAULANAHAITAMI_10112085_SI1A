<?php
// 1. Aktifkan session di bagian paling atas file
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// 2. Definisi Class Database
class database {
    var $host = "localhost";
    var $username = "root";
    var $password = "";
    var $database = "belajar_oop";
    var $koneksi = "";

    function __construct() {
        $this->koneksi = mysqli_connect($this->host, $this->username, $this->password, $this->database);
        if (mysqli_connect_error()) {
            echo "Koneksi database gagal : " . mysqli_connect_error();
        }
    }

    // ==================== FITUR LOGIN & LOGOUT ====================
    function login($username, $password) {
        $query = mysqli_query($this->koneksi, "SELECT * FROM tb_user WHERE username='$username' AND password='$password'");
        $cek = mysqli_num_rows($query);
        
        if($cek > 0){
            $data = mysqli_fetch_assoc($query);
            $_SESSION['username'] = $username;
            $_SESSION['status'] = "login";
            return true;
        } else {
            return false;
        }
    }

    function cek_login() {
        if($_SESSION['status'] != "login"){
            header("location:login.php?pesan=belum_login");
            exit();
        }
    }

    // ==================== QUERY DATA BARANG (SINKRON DENGAN INDEX) ====================
    function tampil_data($cari = "") {
        if ($cari != "") {
            $query = "SELECT * FROM tb_barang WHERE nama_barang LIKE '%$cari%'";
        } else {
            $query = "SELECT * FROM tb_barang";
        }
        
        $data = mysqli_query($this->koneksi, $query);
        $hasil = [];
        if ($data) {
            while ($row = mysqli_fetch_array($data)) {
                $hasil[] = $row;
            }
        }
        return $hasil;
    }

    function tampil_per_satuan($kd_barang) {
        $query = "SELECT * FROM tb_barang WHERE kd_barang = '$kd_barang'";
        $data = mysqli_query($this->koneksi, $query);
        return mysqli_fetch_array($data);
    }

    function tambah_data($nama_barang, $stok, $harga_beli, $harga_jual) {
        // Mengosongkan kolom pertama ('') agar diisi auto_increment oleh kd_barang
        mysqli_query($this->koneksi, "INSERT INTO tb_barang VALUES ('', '$nama_barang', '$stok', '$harga_beli', '$harga_jual')");
    }

    function tampil_edit_data($kd_barang) {
        $hasil = [];
        $data = mysqli_query($this->koneksi, "SELECT * FROM tb_barang WHERE kd_barang='$kd_barang'");
        if ($data) {
            while ($d = mysqli_fetch_array($data)) {
                $hasil[] = $d;
            }
        }
        return $hasil;
    }

    function edit_data($kd_barang, $nama_barang, $stok, $harga_beli, $harga_jual) {
        mysqli_query($this->koneksi, "UPDATE tb_barang SET nama_barang='$nama_barang', stok='$stok', harga_beli='$harga_beli', harga_jual='$harga_jual' WHERE kd_barang='$kd_barang'");
    }

    function delete_data($kd_barang) {
        mysqli_query($this->koneksi, "DELETE FROM tb_barang WHERE kd_barang='$kd_barang'");
    }

    // ==================== QUERY DATA CUSTOMER NEW ====================
    function tampil_customer($cari = "") {
        if ($cari != "") {
            $query = "SELECT * FROM tb_customer WHERE nama_customer LIKE '%$cari%'";
        } else {
            $query = "SELECT * FROM tb_customer";
        }
        $data = mysqli_query($this->koneksi, $query);
        $hasil = [];
        if ($data) {
            while ($row = mysqli_fetch_array($data)) {
                $hasil[] = $row;
            }
        }
        return $hasil;
    }

    function customer_per_satuan($id_customer) {
        $query = "SELECT * FROM tb_customer WHERE id_customer = '$id_customer'";
        $data = mysqli_query($this->koneksi, $query);
        return mysqli_fetch_array($data);
    }

    // ==================== QUERY DATA SUPPLIER (UPDATE TABEL BARU) ====================
    function tampil_supplier($cari = "") {
        if ($cari != "") {
            $query = "SELECT * FROM tb_supplier_baru WHERE nama_supplier LIKE '%$cari%'";
        } else {
            $query = "SELECT * FROM tb_supplier_baru";
        }
        $data = mysqli_query($this->koneksi, $query);
        $hasil = [];
        if ($data) {
            while ($row = mysqli_fetch_array($data)) {
                $hasil[] = $row;
            }
        }
        return $hasil;
    }

    function supplier_per_satuan($id_supplier) {
        $query = "SELECT * FROM tb_supplier_baru WHERE id_supplier = '$id_supplier'";
        $data = mysqli_query($this->koneksi, $query);
        return mysqli_fetch_array($data);
    }

    function tampil_edit_supplier($id_supplier) {
        $hasil = [];
        $data = mysqli_query($this->koneksi, "SELECT * FROM tb_supplier_baru WHERE id_supplier='$id_supplier'");
        if ($data) {
            while ($d = mysqli_fetch_array($data)) {
                $hasil[] = $d;
            }
        }
        return $hasil;
    }

   function edit_supplier($id_supplier, $nama_supplier, $alamat_supplier, $telpon_supplier, $email_supplier, $password_supplier)
{
    if(!empty($password_supplier))
    {
        $query = "UPDATE tb_supplier_baru SET
        nama_supplier='$nama_supplier',
        alamat_supplier='$alamat_supplier',
        telpon_supplier='$telpon_supplier',
        email_supplier='$email_supplier',
        password_supplier='$password_supplier'
        WHERE id_supplier='$id_supplier'";
    }
    else
    {
        $query = "UPDATE tb_supplier_baru SET
        nama_supplier='$nama_supplier',
        alamat_supplier='$alamat_supplier',
        telpon_supplier='$telpon_supplier',
        email_supplier='$email_supplier'
        WHERE id_supplier='$id_supplier'";
    }

    mysqli_query($this->koneksi,$query);
}

   function tambah_supplier(
    $nama_supplier,
    $alamat_supplier,
    $telpon_supplier,
    $email_supplier,
    $password_supplier
)
{
    mysqli_query($this->koneksi,"
        INSERT INTO tb_supplier_baru
        (
            nama_supplier,
            alamat_supplier,
            telpon_supplier,
            email_supplier,
            password_supplier
        )
        VALUES
        (
            '$nama_supplier',
            '$alamat_supplier',
            '$telpon_supplier',
            '$email_supplier',
            '$password_supplier'
        )
    ");
}

    // ==================== CUSTOMER ====================

function tambah_customer(
    $id_customer,
    $nik_customer,
    $nama_customer,
    $jenis_kelamin,
    $alamat_customer,
    $telpon_customer,
    $email_customer,
    $pass_customer
){
    mysqli_query($this->koneksi,"
        INSERT INTO tb_customer
        VALUES(
        '$id_customer',
        '$nik_customer',
        '$nama_customer',
        '$jenis_kelamin',
        '$alamat_customer',
        '$telpon_customer',
        '$email_customer',
        '$pass_customer'
        )
    ");
}

function tampil_edit_customer($id_customer){
    $hasil = [];
    $data = mysqli_query(
        $this->koneksi,
        "SELECT * FROM tb_customer WHERE id_customer='$id_customer'"
    );

    while($d = mysqli_fetch_array($data)){
        $hasil[] = $d;
    }

    return $hasil;
}

function edit_customer(
    $id_customer,
    $nik_customer,
    $nama_customer,
    $jenis_kelamin,
    $alamat_customer,
    $telpon_customer,
    $email_customer,
    $pass_customer
){
    mysqli_query($this->koneksi,"
        UPDATE tb_customer SET
        nik_customer='$nik_customer',
        nama_customer='$nama_customer',
        jenis_kelamin='$jenis_kelamin',
        alamat_customer='$alamat_customer',
        telpon_customer='$telpon_customer',
        email_customer='$email_customer',
        pass_customer='$pass_customer'
        WHERE id_customer='$id_customer'
    ");
}

function delete_customer($id_customer){
    mysqli_query(
        $this->koneksi,
        "DELETE FROM tb_customer WHERE id_customer='$id_customer'"
    );
}


// ==================== SUPPLIER ====================

function delete_supplier($id_supplier){
    mysqli_query(
        $this->koneksi,
        "DELETE FROM tb_supplier_baru
         WHERE id_supplier='$id_supplier'"
    );
}
}
?>