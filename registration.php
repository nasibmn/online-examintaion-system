<?php
session_start();
$db = mysqli_connect('localhost', 'root', '', 'userinformation');

if (isset($_POST['submit']))
{
    $username = mysqli_real_escape_string($db, $_POST['adsoyad']);
    $gender = mysqli_real_escape_string($db, $_POST['cns']);
    $phone = mysqli_real_escape_string($db, $_POST['phone']);
    $email = mysqli_real_escape_string($db, $_POST['kullanici']);
    $password = ($_POST['sifre']);
    $user_check_query = mysqli_query($db, "SELECT `Email` FROM `usertable` WHERE Email='$email'");
    if (mysqli_num_rows($user_check_query) > 0)
    {
        header('location: user_reg.php?mvct=E-posta mevcuttur');
    }
    else
    {

        $query = "INSERT INTO usertable (adsoyad,cinsiyet,phone, Email, password) 
          VALUES('$username','$gender','$phone', '$email', '$password')";
        mysqli_query($db, $query);
        $_SESSION['success'] = "Giriş Başarılı";
        header('location: user_login.php?scs=Kaydınız başarılı');
    }
}
?>
