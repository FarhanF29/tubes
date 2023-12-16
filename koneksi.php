
<?php
$servername = "127.0.0.1";
$database = "db_pendaftaran";
$username = "root";
$password = "";
 

// membuat koneksi
$conn = mysqli_connect($servername, $username, $password, $database);
// // mengecek koneksi
if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

?>