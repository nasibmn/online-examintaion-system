<?php 
	require_once("dizi.php");
	require_once("db.php");
	  
?>

<!DOCTYPE html>
<html>
<head>
	<title>Sınav Eklme Çıkarma</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
<link rel="stylesheet" type="text/css" href="css/dersEkle.css">
</head>
<body>
<main>
	<div class="container text-center">
		<h2 class="py-4 bg-dark text-light rounded"><i class="fas fa-swatchbook"></i>  Sınav Ekleme Çıkarma</h2>
		<div class="d-flex justify-content-center">
			<form action="" method="post" class="w-50">
				<div class="row pt-2">
				<div class="col">
					<?php inputElement('<i class="fas fa-fingerprint"></i>',"Ders Kodu","ders_kodu",setID()); ?>
				</div>
				<div class="col">
					<?php inputElement('<i class="fas fa-id-badge"></i>',"Ders Adı","ders_adi",""); ?>
				</div>
				</div>
				<div class="row pt-2">
					<div class="col">
						<?php inputElement('<i class="fas fa-calculator"></i>',"AKTS","akts",""); ?>
					</div>
					<div class="col">
						<?php inputElement('<i class="fas fa-chalkboard-teacher"></i>',"Ders Koordinatörü","hoca",""); ?>
					</div>
					<div class="col">
					<?php inputElement('<i class="fas fa-hourglass-half"></i>',"Sınav süresi","sinav_suresi",""); ?>
					</div>
				</div>
				<div class="row pt-2">
					<div class="col">
					<?php inputElement('<i class="fas fa-sort-numeric-up-alt"></i>',"Soru Sayısı","soru_sayisi",""); ?>
					</div>
					<div class="col">
						<?php inputElement('<i class="fas fa-check-circle"></i>',"Doğru cevap Puanı","dogru_cevap_puani",""); ?>
					</div>
					<div class="col">
						<?php inputElement('<i class="fas fa-times-circle"></i>',"yanlış cevap puanı","yanlis_cevap_puani",""); ?>
					</div>
				</div>
				<div class="d-flex justify-content-center">
					<?php buttonElement("btn-create","btn btn-success","<i class='fas fa-plus'></i>","create","dat-toggle='tooltip' data-placement='bottom' title='EKLE'"); ?>
					<?php buttonElement("btn-read","btn btn-primary","<i class='fas fa-sync'></i>","read","dat-toggle='tooltip' data-placement='bottom' title='tabloyo yenile'"); ?>
					<?php buttonElement("btn-update","btn btn-light border","<i class='fas fa-pen-alt'></i>","update","dat-toggle='tooltip' data-placement='bottom' title='güncelle'"); ?>
					<?php buttonElement("btn-delete","btn btn-danger","<i class='fas fa-trash'></i>","delete","dat-toggle='tooltip' data-placement='bottom' title='sil'"); ?>
					<?php deleteBtn(); ?>
				</div>
			</form>
		</div>
		<!-- table -->
		<div class="table-data">
			<table class="table table-striped table-dark">
				<thead class="thead-dark">
					<tr>
						<th>Ders Kodu</th>
						<th>Ders Adı</th>
						<th>AKTS</th>
						<th>Ders Koordinatörü</th>
						<th>Sınav Süresi</th>
						<th>Soru Sayısı</th>
						<th>Doğru Cevap Puanı</th>
						<th>Yanlış Cevap Puanı</th>
						<th>Değiştir</th>
					</tr>
				</thead>
				<tbody id="tbody">
					<?php
						if (isset($_POST['read'])) {
							$result = getData();
							if ($result) {
								while ($row = mysqli_fetch_assoc($result)) { ?>
									<tr>
										<td data-id="<?php echo $row['id']; ?>"><?php echo $row['id']; ?></td>
										<td data-id="<?php echo $row['id']; ?>"><?php echo $row['ders_adi']; ?></td>
										<td data-id="<?php echo $row['id']; ?>"><?php echo $row['AKTS']; ?></td>
										<td data-id="<?php echo $row['id']; ?>"><?php echo $row['dersin_koordinatoru']; ?></td>
										<td data-id="<?php echo $row['id']; ?>"><?php echo $row['sinav_suresi']; ?></td>
										<td data-id="<?php echo $row['id']; ?>"><?php echo $row['soru_sayisi']; ?></td>
										<td data-id="<?php echo $row['id']; ?>"><?php echo $row['dogru_cevap_puani']; ?></td>
										<td data-id="<?php echo $row['id']; ?>"><?php echo $row['yanlis_cevap_puani']; ?></td>
										<td><i class="fas fa-edit btnedit" data-id="<?php echo $row['id']; ?>"></i></td>
									</tr>
								<?php
								}
							}
						}
						?>
				</tbody>
			</table>
		</div>
	</div>
</main>


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script type="text/javascript" src="script/ogrtmn.js"></script>

</body>
</html>