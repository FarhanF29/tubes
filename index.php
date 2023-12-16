<?php
include 'koneksi.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (isset($_POST['submit'])) {
        // Generate id baru dengan format 'P' + tahun sekarang + 5 digit angka
        $getMaxId = mysqli_query($conn, "SELECT MAX(RIGHT(id_pendaftaran,5)) AS id from tb_pendaftaran");
        $d = mysqli_fetch_object($getMaxId);

        $generateId = 'P' . date('Y') . sprintf("%05s", $d->id + 1);

        // Get other form data
        $th_ajaran = "2023/2024"; // You can change this if needed
        $jurusan = isset($_POST['jurusan']) ? $_POST['jurusan'] : '';
        $nama_peserta = isset($_POST['nama_peserta']) ? $_POST['nama_peserta'] : '';
        $tempat_lahir = isset($_POST['tempat_lahir']) ? $_POST['tempat_lahir'] : '';
        $tgl_lahir = !empty($_POST['tgl_lahir']) ? $_POST['tgl_lahir'] : date('Y-m-d'); // Set to current date if empty
        $jk = isset($_POST['jenis_kelamin']) ? $_POST['jenis_kelamin'] : '';

        $agama = isset($_POST['agama']) ? $_POST['agama'] : '';
        $alamat_peserta = isset($_POST['alamat_peserta']) ? $_POST['alamat_peserta'] : '';

        // Insert data into the database
        $insertData = mysqli_query($conn, "INSERT INTO tb_pendaftaran (id_pendaftaran, th_ajaran, jurusan, nama_peserta, tempat_lahir, tgl_lahir, jk, agama, alamat_peserta, tgl_daftar) VALUES ('$generateId', '$th_ajaran', '$jurusan', '$nama_peserta', '$tempat_lahir', '$tgl_lahir', '$jk', '$agama', '$alamat_peserta', NOW())");

        if ($insertData) {
            echo '<script>window.location="berhasil.php?id='.$generateId.'"</script>';
        } else {
            echo "Error: " . mysqli_error($conn);
        }
    } else {
        echo "Submit button not set in the form.";
    }
} 
?>


<!--form-->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pendaftaran</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Afacad:ital,wght@0,700;1,500&display=swap" rel="stylesheet">
    
    

</head>
<body>
    
    <!--box formulir-->

    <section class="box-formulir">

    <h2>Formulir Pendaftaran Siswa Baru SMK Konoha</h2>
    
    <!--form-->
    <form action="index.php" method="post">

    <div = class="box">
        <table border="0" class="table-form">
            <tr>
                <td>Tahun Ajaran</td>
                <td>:</td>
                <td>
                    <input type="text" name="th_ajaran" class="input-control " value="2023/2024" readonly>
                </td>

            </tr>
            <tr>
                <td>Jurusan</td>
                <td>:</td>
                <td>
                    <select class="input-control" name="jurusan">
                        <option value="">--Pilih--</option>
                        <option value="Teknik Mesin">Teknik Mesin</option>
                        <option value="Multimedia">Multimedia</option>
                        <option value="Tata Boga">Tata Boga</option>
                        
                    </select>
                </td>

            </tr>

        </table>

    </div>
    <h3>Data Diri Calon Siswa</h3>
    <div = class="box">
        <table border="0" class="table-form">
            <tr>
                <td>Nama Lengkap</td>
                <td>:</td>
                <td>
                    <input type="text" name="nama_peserta" class="input-control">
                </td>

            </tr>
            <tr>
                <td>Tempat Lahir</td>
                <td>:</td>
                <td>
                    <input type="text" name="tempat_lahir" class="input-control">
                </td>

            </tr>
            <tr>
                <td>Tanggal Lahir</td>
                <td>:</td>
                <td>
                    <input type="date" name="tgl_lahir" class="input-control">
                </td>

            </tr>
            <tr>
                <td>Jenis Kelamin</td>
                <td>:</td>
                <td>
                <input type="radio" name="jenis_kelamin" class="input-control" value="Laki-laki"> Laki-laki &nbsp;&nbsp;
                <input type="radio" name="jenis_kelamin" class="input-control" value="Perempuan"> Perempuan
    </td>
                </td>

            </tr>
            <tr>
                <td>Agama</td>
                <td>:</td>
                <td>
                    <select class="input-control" name="agama">
                        <option value="">--Pilih--</option>
                        <option value="Islam">Islam</option>
                        <option value="Hindu">Hindu</option>
                        <option value="Budha">Budha</option>
                        <option value="Katolik">Katolik</option>
                        <option value="Protestan">Protestan</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Alamat</td>
                <td>:</td>
                <td>
                    <textarea class="input-control" name="alamat_peserta"></textarea>
                </td>

            </tr>
            <tr>
                <td></td>
                <td></td>
                <td>
                <input type="submit" name="submit" class="btn-daftar" value="daftar sekarang">
                </td>

            </tr>
        </table>

    </div>


    </form>

    </section>

</body>
</html>