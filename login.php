
<?php
include 'koneksi.php';

if (isset($_POST['login'])) {

    //cek akun ada apa tidak
    $cek = mysqli_query($conn, "SELECT * FROM tb_admin WHERE username = 
        '" .htmlspecialchars($_POST['user'])  . "' AND password = '" . $_POST['pass'] . "' ");

    if (mysqli_num_rows($cek) > 0) {
        $a = mysqli_fetch_object($cek);

        session_start(); // Start the session

        $_SESSION['stat_login'] = true;
        $_SESSION['id'] = $a->id_admin;
        $_SESSION['nama'] = $a->nama_admin;

        echo '<script>window.location="beranda.php"</script>';
    } else {
        echo '<script>alert("Gagal, username atau password salah")</script>';
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Afacad:ital,wght@0,700;1,500&display=swap" rel="stylesheet">   
</head>
<body>

    <!--mainlogin-->
    <section class= "main-login">
        <div class= "box-login">
            <h2>Login Admin</h2>


            <!--bagian form login-->
            <form action="" method="post">
                <div class="box">
                    <table>
                        <tr>
                            <td>Username</td>
                            <td>:</td>
                            <td>
                                <input type="text" name="user" class="input-control">
                            </td>
                        </tr>
                            <td>Password</td>
                            <td>:</td>
                            <td>
                                <input type="password" name="pass" class="input-control">
                            </td>
                        </tr>
                        </tr>
                            <td></td>
                            <td></td>
                            <td>
                                <input type="submit" name="login" value="login" class="btn-login">
                            </td>
                        </tr>
                    </table>
                </div>


            </form>

        </div>
    

    </section>
 

</body>
</html>