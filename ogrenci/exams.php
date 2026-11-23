<?php
require_once __DIR__ . '/../bootstrap.php';
require_login('student');
$subjects = db()->query('SELECT id, ders_adi, sinav_suresi, soru_sayisi FROM subjects ORDER BY ders_adi')->fetch_all(MYSQLI_ASSOC);
?>
<!doctype html>
<html lang="tr">
<head>
  <meta charset="utf-8">
  <title>Sinavlar</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<main class="container py-5">
  <h2>Aktif Sinavlar</h2>
  <?php if (!$subjects): ?>
    <div class="alert alert-info">Henuz sinav bulunmuyor.</div>
  <?php endif; ?>
  <div class="row">
  <?php foreach ($subjects as $subject): ?>
    <div class="col-md-4 mb-3">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title"><?= htmlspecialchars($subject['ders_adi']) ?></h5>
          <p><?= (int) $subject['soru_sayisi'] ?> soru / <?= (int) $subject['sinav_suresi'] ?> dakika</p>
          <a class="btn btn-primary" href="take_exam.php?subject_id=<?= (int) $subject['id'] ?>">Sinava Basla</a>
        </div>
      </div>
    </div>
  <?php endforeach; ?>
  </div>
</main>
</body>
</html>
