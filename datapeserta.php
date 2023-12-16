<?php
include 'koneksi.php';

?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Administrator</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  </head>
  <body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>
<body>
<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="beranda.php">Admin PSB</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="beranda.php">Beranda</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="datapeserta.php">Data Peserta</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="keluar.php">Keluar</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
</body>

<!--bagian konten-->

<section class="konten">
    <h2>Data Peserta</h2>
    <div class="box">
        <table class="table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>ID Pendaftaran</th>
                    <th>Nama</th>
                    <th>Jenis Kelamin</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    $no = 1;
                    $list_peserta = mysqli_query($conn, "SELECT * FROM tb_pendaftaran");
                    while($row = mysqli_fetch_array($list_peserta)){
                ?>
                    <tr>
                        <td><?php echo $no++ ?></td>
                        <td><?php echo $row['id_pendaftaran']; ?></td>
                        <td><?php echo $row['nama_peserta']; ?></td>
                        <td><?php echo $row['jk']; ?></td>
                        <td>
                            <a href="detail-peserta.php ?id=<?php echo $row['id_pendaftaran'] ?>">Detail</a> ||
                            <a href="hapus-peserta.php ?id=<?php echo $row['id_pendaftaran'] ?>" onclick="return confirm('yakin hapus')">Hapus</a>

                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</section>
