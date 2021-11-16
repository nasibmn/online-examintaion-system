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
			<a href="../user_login.php" class="logout_btn">ÇIKIŞ</a>
		</div>
	</header>
	<div class="sidebar">
		<center>
			<img src="img/o1.jpg" class="profile_image">
			<h4>Kişi Bilgisi</h4>
		</center>
		<a href="#"><i class="fas fa-book"></i><span>Derslerim</span></a>
		<a href="#"><i class="fas fa-diagnoses"></i><span>Sınavlarım</span></a>
		<a href="#"><i class="fas fa-chart-pie"></i><span>sonuçlarım</span></a>
		<a href="../user_login.php"><i class="fas fa-sign-out-alt"></i><span>ÇIKIS YAP</span></a>
	</div>
	<div class="content">
						<div class="main">
		<div class="cardBox">
			<div class="card">
				<div>
					<div class="numbers">6</div>
					<div class="cardName">Derslerim</div>
				</div>
				<div class="iconBox">
					<i class="fas fa-book"></i>
				</div>
			</div>
						<div class="card">
				<div>
					<div class="numbers">3</div>
					<div class="cardName">Sınavlarım</div>
				</div>
				<div class="iconBox">
					<i class="fas fa-question"></i>
				</div>
			</div>
						<div class="card">
				<div>
					<div class="numbers">1</div>
					<div class="cardName">Sonuçlarım</div>
				</div>
				<div class="iconBox">
					<i class="fas fa-chart-pie"></i>
				</div>
			</div>
		</div>
		<div class="footer">
		<p>Copyright onexam © 2021. All rights reserved.</p>
	</div>
	</div>
	</div>
</body>
</html>