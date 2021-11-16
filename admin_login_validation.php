<?php
session_start();
if (isset($_POST['submit']))
{
    $db = mysqli_connect("localhost", "root", "", "userinformation");
    $username = $_POST['kullanici'];
    $password = ($_POST['sifre']);

    $sayi = mysqli_query($db, "SELECT count * from usertable");
    $data = mysqli_fetch_array($sayi);

    $result = mysqli_query($db, "SELECT * FROM teacher_table WHERE Email = '$username' AND password = '$password'") or die("baglanamadi" . mysql_error());
    if (mysqli_num_rows($result) > 0)
    {
        header("location: ogretmen/adminMain.php");
    }
    else
    {
        header("location:admin_login.php?error=bilgiler yanlistir!");
        exit();
    }
}
?>
