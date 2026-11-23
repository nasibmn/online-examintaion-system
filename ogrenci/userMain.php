<?php
require_once __DIR__ . '/../bootstrap.php';
require_login('student');
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Öğrenci Sayfas‌ı</title>
<link rel="stylesheet" type="text/css" href="css/student_style.css">
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>

<body>
	<input type="checkbox" id="check">
	<header>
		<label for="check">
			<i class="fas fa-bars" id="sidebar_btn"></i>
		</label>
		<div class="left_area">
			<h3>On<span>exam</span></h3>
		</div>
		<div class="otitle"><span class="ogrenci">Öğrenci </span><span class="sayfasi"> Sayfası</span></div>
		<div class="right_area">
			<a href="../logout.php" class="logout_btn">ÇIKIŞ</a>
		</div>
	</header>
	<div class="sidebar">
		<center>
			<img src="img/o1.jpg" class="profile_image">
			<h4>Kişi Bilgisi</h4>
		</center>
		<a href="exams.php" target="student_content"><i class="fas fa-book"></i><span>Sinavlar</span></a>
		<a href="exams.php" target="student_content"><i class="fas fa-diagnoses"></i><span>Sınavlarım</span></a>
		<a href="results.php" target="student_content"><i class="fas fa-chart-pie"></i><span>Sonucularım</span></a>
		<a href="../logout.php"><i class="fas fa-sign-out-alt"></i><span>ÇIKIS YAP</span></a>
	</div>
	<div class="content">
						<div class="main">
						<iframe name="student_content" src="exams.php" style="width:100%;height:85%;border:0;"></iframe>
		<div class="footer">
		<p>Copyright onexam © 2021. All rights reserved.</p>
	</div>
	</div>
	</div>
</body>
</html>