<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Öğretmen Paneli</title>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script type="text/javascript" src="ogrtmn.js"></script>
<link rel="stylesheet" type="text/css" href="css/admin_style.css">
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>

<body>
	<input type="checkbox" id="check">
	<header>
		<label for="check">
			<i class="fas fa-bars" id="sidebar_btn"></i>
		</label>
		<div class="left_area">
			<a class="admintitle" href="adminMain.php"><h3>On<span>exam</span></h3></a>
		</div>
		<div class="otitle"><span class="ogrenci">Öğretmen </span><span class="sayfasi"> Sayfası</span></div>
		<div class="right_area">
			<a href="../admin_login.php" class="logout_btn">ÇIKIŞ</a>
		</div>
	</header>
	<div class="sidebar">
		<center>
			<img src="img/o1.jpg" class="profile_image">
			<h4>Ad Soyad</h4>
		</center>
		<a href="studentlist.php" target="all_display"><i class="fas fa-user-graduate"></i><span>Öğrenciler</span></a>
		<a href="dersEC.php" target="all_display"><i class="fas fa-calculator"></i><span>Sınav Ekleme Çıkarma</span></a>
		<a href="sorular.php" target="all_display"><i class="fas fa-question"></i><span>Sorular</span></a>
		<a href="#"><i class="fas fa-chart-pie"></i><span>Sonuçlar</span></a>
		<a href="../admin_login.php"><i class="fas fa-sign-out-alt"></i><span>ÇIKIS YAP</span></a>
	</div>
	<div class="content">
		<iframe class="fram" name="all_display" src="main_frame.php"></iframe>
	</div>
</body>
</html>