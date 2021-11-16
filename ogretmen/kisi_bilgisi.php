<?php
	require_once("../admin_login_validation.php");	
	function textboxValue($value){
		$con = mysqli_connect("localhost","root","","userinformation");
		$textbox = mysqli_real_escape_string($con,trim($_POST[$value]));
		if(empty($textbox)){
			return false;
		}
		else{
			return $textbox;
		}
	}

	function takeName(){
	$con = mysqli_connect("localhost","root","","userinformation");
	$username = textboxValue('kullanici');
	$password = textboxValue('sifre');
	$sql = "SELECT adsoyad FROM teacher_table WHERE Email='$username AND password='$password";
	$records = mysqli_query($db,$sql);
	$data = mysqli_fetch_array($records); 
	echo $data['adsoyad'];
}

	?>