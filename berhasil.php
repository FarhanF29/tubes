<?php
include 'koneksi.php';

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

    <h2>Pendaftaran Siswa Baru SMK Konoha Berhasil</h2>
    <div class="box">
    <h4>Kode Pendaftaran Anda adalah <?php echo $_GET['id']; ?></h4>
    <a href="cetak-bukti.php?id=<?php echo  $_GET['id'] ?> " target="_blank" >Cetak Bukti Daftar</a>

    </div>
    

    </section>

</body>
</html>