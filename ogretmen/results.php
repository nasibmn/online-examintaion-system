<?php
require_once __DIR__ . '/../bootstrap.php';
require_login('teacher');
$results = db()->query(
    'SELECT a.*, u.adsoyad, u.Email, s.ders_adi
     FROM exam_attempts a
     JOIN usertable u ON u.id = a.student_id
     JOIN subjects s ON s.id = a.subject_id
     ORDER BY a.created_at DESC'
)->fetch_all(MYSQLI_ASSOC);
?>
<!doctype html>
<html lang="tr">
<head>
  <meta charset="utf-8">
  <title>Sinav Sonuclari</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<main class="container py-4">
  <h2>Sinav Sonuclari</h2>
  <table class="table table-striped table-dark">
    <thead><tr><th>Ogrenci</th><th>E-posta</th><th>Sinav</th><th>Dogru</th><th>Yanlis</th><th>Bos</th><th>Puan</th><th>Tarih</th></tr></thead>
    <tbody>
    <?php foreach ($results as $row): ?>
      <tr>
        <td><?= htmlspecialchars($row['adsoyad']) ?></td>
        <td><?= htmlspecialchars($row['Email']) ?></td>
        <td><?= htmlspecialchars($row['ders_adi']) ?></td>
        <td><?= (int) $row['correct_answers'] ?></td>
        <td><?= (int) $row['wrong_answers'] ?></td>
        <td><?= (int) $row['unanswered'] ?></td>
        <td><?= (int) $row['score'] ?></td>
        <td><?= htmlspecialchars($row['created_at']) ?></td>
      </tr>
    <?php endforeach; ?>
    </tbody>
  </table>
</main>
</body>
</html>
