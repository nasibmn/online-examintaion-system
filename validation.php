<?php
if (isset($_POST['submit']))
{
    $db = mysqli_connect("localhost", "root", "", "userinformation");
    $username = $_POST['kadi'];
    $password = ($_POST['ksifre']);

    $result = mysqli_query($db, "SELECT * FROM usertable WHERE Email = '$username' AND password = '$password'") or die("baglanamadi" . mysql_error());
    if (mysqli_num_rows($result) > 0)
    {
        header("location: ogrenci/userMain.php");
    }
    else
    {
        header("location:user_login.php?error=bilgiler yanlistir!");
        exit();
    }

}
?>
