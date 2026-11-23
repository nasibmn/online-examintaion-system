<?php
require_once __DIR__ . '/../bootstrap.php';
require_login('student');

$attemptId = (int) ($_GET['attempt'] ?? 0);
$stmt = db()->prepare(
    'SELECT a.*, s.ders_adi FROM exam_attempts a JOIN subjects s ON s.id = a.subject_id
     WHERE a.id = ? AND a.student_id = ? ORDER BY a.created_at DESC'
);
$stmt->bind_param('ii', $attemptId, $_SESSION['user_id']);
$stmt->execute();
$attempt = $stmt->get_result()->fetch_assoc();

$listStmt = db()->prepare(
    'SELECT a.*, s.ders_adi FROM exam_attempts a JOIN subjects s ON s.id = a.subject_id
     WHERE a.student_id = ? ORDER BY a.created_at DESC'
);
$listStmt->bind_param('i', $_SESSION['user_id']);
$listStmt->execute();
$attempts = $listStmt->get_result()->fetch_all(MYSQLI_ASSOC);
?>
<!doctype html>
<html lang="tr">
<head>
  <meta charset="utf-8">
  <title>Sonuclarim</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<main class="container py-5">
  <?php if ($attempt): ?>
    <div class="alert alert-success">
      <strong><?= htmlspecialchars($attempt['ders_adi']) ?>:</strong>
      <?= (int) $attempt['correct_answers'] ?> dogru,
      <?= (int) $attempt['wrong_answers'] ?> yanlis,
      <?= (int) $attempt['unanswered'] ?> bos — Puan: <?= (int) $attempt['score'] ?>
    </div>
  <?php endif; ?>
  <h2>Sonuclarim</h2>
  <table class="table table-striped bg-white">
    <thead><tr><th>Sinav</th><th>Dogru</th><th>Yanlis</th><th>Bos</th><th>Puan</th><th>Tarih</th></tr></thead>
    <tbody>
    <?php foreach ($attempts as $row): ?>
      <tr>
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
