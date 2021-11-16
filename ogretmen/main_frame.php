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
	<div class="main">
		<div class="cardBox" id="cardBox">
			<a id="card" href="studentlist.php" target="all_display">
				<div class="card">
				<div>
					<div class="numbers">
						<?php
							$db = mysqli_connect("localhost","root","","userinformation");
							$records = mysqli_query($db,"select count(*) as osayi from usertable");
							$data = mysqli_fetch_array($records); 
							 echo $data['osayi']; 
							 ?>
					 </div>
					<div class="cardName">Öğrenci sayısı</div>
				</div>
				<div class="iconBox">
					<i class="fas fa-eye"></i>
				</div>
			</div></a>
			<a id="card" href="dersEC.php" target="all_display">
					<div class="card">
				<div>
					<div class="numbers">
						<?php
							$db = mysqli_connect("localhost","root","","userinformation");
							$records = mysqli_query($db,"select count(*) as osayi from subjects");
							$data = mysqli_fetch_array($records); 
							 echo $data['osayi']; 
							 ?>
					</div>
					<div class="cardName">Dersler</div>
				</div>
				<div class="iconBox">
					<i class="fas fa-book"></i>
				</div>
			</div></a>
					<a id="card" href="#" target="all_display">	<div class="card">
				<div>
					<div class="numbers">10</div>
					<div class="cardName">Sonuçlar</div>
				</div>
				<div class="iconBox">
					<i class="fas fa-chart-pie"></i>
				</div>
			</div></a>
		</div>
		<div class="footer">
		<p>Copyright onexam © 2021. All rights reserved.</p>
	</div>
	</div>
</body>
</html>