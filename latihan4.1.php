<?php
class Mahasiswa {

    // Method cek kelulusan
    public function cekKelulusan($nilai){
        return ($nilai >= 70) ? "Lulus Kuis" : "Tidak Lulus Kuis";
    }

    // Method tampilkan data
    public function tampilkanData($dataMahasiswa){
        foreach($dataMahasiswa as $mhs){
            echo "<div class='card'>";
            echo "Nama : " . $mhs['nama'] . "<br>";
            echo "Kelas : " . $mhs['kelas'] . "<br>";
            echo "Mata Kuliah : " . $mhs['matkul'] . "<br>";
            echo "Nilai : " . $mhs['nilai'] . "<br>";
            echo "<b>" . $this->cekKelulusan($mhs['nilai']) . "</b>";
            echo "</div>";
        }
    }
}

// Inisialisasi array kosong
$data = [];

// Jika tombol submit ditekan
if(isset($_POST['simpan'])){
    $data[] = [
        "nama"  => $_POST['nama'],
        "kelas" => $_POST['kelas'],
        "matkul"=> $_POST['matkul'],
        "nilai" => $_POST['nilai']
    ];

    $mahasiswa = new Mahasiswa();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Latihan Array</title>
    <style>
        body{
            font-family: Arial;
            background-color: #f4f4f4;
        }
        .container{
            width: 600px;
            margin: auto;
        }
        h1{
            text-align: center;
            color: #2c8ecb;
        }
        form{
            background: white;
            padding: 20px;
            border-radius: 8px;
            margin-bottom: 20px;
        }
        input{
            width: 100%;
            padding: 8px;
            margin: 5px 0 10px 0;
        }
        button{
            padding: 10px;
            background: #2c8ecb;
            color: white;
            border: none;
            cursor: pointer;
        }
        .card{
            background: white;
            padding: 15px;
            margin-bottom: 10px;
            border-left: 5px solid #2c8ecb;
        }
    </style>
</head>
<body>

<div class="container">
    <h1>Latihan Array</h1>

    <!-- Form Input -->
    <form method="POST">
        <label>Nama</label>
        <input type="text" name="nama" required>

        <label>Kelas</label>
        <input type="text" name="kelas" required>

        <label>Mata Kuliah</label>
        <input type="text" name="matkul" value="Pemrograman Berorientasi Objek" required>

        <label>Nilai</label>
        <input type="number" name="nilai" required>

        <button type="submit" name="simpan">Simpan</button>
    </form>

    <!-- Output Data -->
    <?php
    if(!empty($data)){
        $mahasiswa->tampilkanData($data);
    }
    ?>

</div>

</body>
</html>