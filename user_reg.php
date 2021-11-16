<!doctype html>
<html>

<head>
	<meta charset="utf-8">
	<title>Öğrenci kaydı</title>
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
	<link rel="stylesheet" href="css/footerstyle.css">
	<link type="text/css" rel="stylesheet" href="css/style.css">
	<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"> </head>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script type="text/javascript" src="script/js.js"></script>

<body>
	<nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
		<div class="gtg">
			<div class="stsl">
				<ul>
					<li><a class="active" href="index.php"><i class="fa fa-home"></i>Ana Sayfa</i></a>
						<li><a><i class="fas fa-bars"></i></a>
							<div class="sub-menu-1">
								<ul>
									<li><a href="admin_login.php"><i class="fas fa-chalkboard-teacher"></i> Öğretmen</a></li>
									<li><a href="user_login.php"><i class="fas fa-user-graduate"></i> Öğrenci</a></li>
								</ul>
							</div>
						</li>
				</ul>
			</div> <a class="navbar-brand" href="index.php">online sınav sistemi</a> </div>
	</nav>
	<div class="container">
		<div class="reg-box">
			<div class="row">
				<div class="col-md-11 logn">
					<h1 align="center">Öğrenci Kaydı</h1>
					<form onSubmit="return chk()" action="registration.php" method="post">
						<div class="form-group col-sm-10">
							<label>Ad Soyad</label>
							<input type="text" placeholder="Ad Soyad" name="adsoyad" class="form-control" required> </div>
						<div class="form-group col-sm-10">
							<label>Cinsiyet</label>
							<br>
							<select class="form-control" name="cns" required>
								<option value="mt">Cinsiyet Seçin</option>
								<option value="kadın">Kadın</option>
								<option value="erkek">Erkek</option>
							</select>
						</div>
						<div class="form-group col-sm-10">
							<label>Telefon Numarası</label>
							<input type="tel" id="phone" name="phone" placeholder="000 000 00 00" pattern="[0-9]{10}" class="form-control" required> </div>
						<div class="form-group col-sm-10">
							<label>E-posta</label>
							<input type="email" placeholder="ornek@gmail.com" name="kullanici" class="form-control" required> </div>
						<div id="mvct" onMouseOver="m_cl()" class="alert-danger col-md-9">
							<?php
					if (isset($_GET['mvct'])){?>
								<p class="error" style="color: brown" id="cl">
									<?php echo $_GET['mvct']; ?>
								</p>
								<?php }?>
						</div>
						<div class="form-group col-sm-10">
							<label>Şifre</label>
							<input type="password" id="pwd" placeholder="şifre" name="sifre" class="form-control" required> </div>
						<div class="form-group col-sm-10">
							<label>Şifre kontrolu</label>
							<input type="password" id="cpwd" name="sifre1" placeholder="şifre kontrolu" class="form-control" required> </div>
						<div class=" alert-warning col-md-9" id="err_msg" style="margin: auto auto 10px 20px"></div>
						<div class="btnn">
							<button type="submit" id="submit" value="submit" class="btn btn-primary btn-dark btn-sm" name="submit">Kaydet</button>
						</div>
						<br>
						<div class="rdr"> <a href="user_login.php"><span>önceden kaydınız varsa buraya tıklayın!</span></a> </div>
					</form>
				</div>
			</div>
		</div>
	</div>
	<footer id="footer" class="footer-1">
		<div class="footer-copyright">
			<div class="col-md-12 text-center">
				<p>Copyright onexam © 2021. All rights reserved.</p>
			</div>
		</div>
	</footer>
</body>

</html>