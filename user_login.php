<!doctype html>
<html>

<head>
	<meta charset="utf-8">
	<title>Öğrenci Girişi</title>
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
	<link rel="stylesheet" href="css/footerstyle.css">
	<link type="text/css" rel="stylesheet" href="css/style.css">
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
					<h1 align="center">Öğrenci Girişi</h1>
					<div id="scs" class="alert-success col-md-9" style="margin-left: 20px;">
						<?php
					if (isset($_GET['scs'])){?>
							<p class="error" style="color: #144700" id="cl">
								<?php echo $_GET['scs']; ?>
							</p>
							<?php }?>
					</div>
					<form action="validation.php" method="post">
						<div class="form-group col-sm-10">
							<label>E-posta</label>
							<input type="text" onClick="clr()" placeholder="E-posta" name="kadi" class="form-control" id="kadi" required> </div>
						<div class="form-group col-sm-10">
							<label>Şifre</label>
							<input type="password" onClick="clr()" placeholder="Şifre" name="ksifre" id="ksifre" class="form-control" required> </div>
						<div class="alert-warning col-md-9" style="margin-left: 20px">
							<?php
					if (isset($_GET['error'])){?>
								<p class="error" style="color: brown" id="cl">
									<?php echo $_GET['error']; ?>
								</p>
								<?php }?>
						</div>
						<button type="submit" value="submit" name="submit" class="btn btn-primary btn-dark btn-sm">Giriş</button>
						<br>
						<div class="rdr"> <a href="user_reg.php"><span>kaydınız bulunmuyorsa buraya tıklayın!</span></a> </div>
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