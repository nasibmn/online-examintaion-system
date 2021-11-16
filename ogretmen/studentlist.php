

<!DOCTYPE html>
<html>
<head>
 <title>Öğrenciler</title>
 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous">
 <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
 <style type="text/css">
   body{
    background: rgb(0,0,0);
    background: radial-gradient(circle, rgba(0,0,0,0.1) 18%, rgba(184,184,184,0.7) 100%);  
   }
 </style>
</head>
<body>
<div class="container">
<h2 class="py-2 bg-dark text-light  text-center rounded"><i class="fas fa-book"></i> Öğrenci Listesi</h2>

<div class="d-flex table-data">
<table class="table table-striped table-dark rounded" border="1" id="ogrenci">
  <thead class="thead-dark">
  <tr>
    <th>ID</th>
    <th>Ad Soyad</th>
    <th>E-posta</th	>
    <th>Telefon Numarası</th>
    <th>Cinsiyet</th>
  </tr>
  </thead>
<?php

$db = mysqli_connect("localhost","root","","userinformation");

$records = mysqli_query($db,"select * from usertable"); // fetch data from database

while($data = mysqli_fetch_array($records))
{
?>
  <tr>
    <td><?php echo $data['id']; ?></td>
    <td><?php echo $data['adsoyad']; ?></td>
    <td><?php echo $data['Email']; ?></td>
    <td><?php echo $data['phone']; ?></td>
    <td><?php echo $data['cinsiyet']; ?></td>
  </tr>	
<?php
}
?>
</table>
</div>

<?php mysqli_close($db); // Close connection ?>
</div>
</body>
</html>

