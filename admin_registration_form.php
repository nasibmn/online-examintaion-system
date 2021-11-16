<?php
session_start();
$db = mysqli_connect('localhost', 'root', '', 'userinformation');

if (isset($_POST['submit']))
{
    $adsoyad = mysqli_real_escape_string($db, $_POST['adsoyad']);
    $email = mysqli_real_escape_string($db, $_POST['kullanici']);
    $password = ($_POST['pwd']);

    $check_email = mysqli_query($db, "SELECT `Email` FROM `teacher_table` WHERE Email = '$email'");
    if (mysqli_num_rows($check_email) > 0)
    {
        header('location: admin_reg.php?mvct=E-posta Mevcuttur!');
    }
    else
    {

        $query = "INSERT INTO `teacher_table` (adsoyad ,Email, password) 
          VALUES('$adsoyad','$email', '$password')";
        mysqli_query($db, $query);
        $_SESSION['success'] = "Giriş Başarılı";
        header('location: admin_login.php?success=Kaydınız başarıyla tamamlandı');
    }
}
?>
