<?php
require_once __DIR__ . '/../bootstrap.php';
require_login('student');

$subjectId = (int) ($_GET['subject_id'] ?? 0);
$subjectStmt = db()->prepare('SELECT * FROM subjects WHERE id = ?');
$subjectStmt->bind_param('i', $subjectId);
$subjectStmt->execute();
$subject = $subjectStmt->get_result()->fetch_assoc();
if (!$subject) {
    http_response_code(404);
    exit('Sinav bulunamadi.');
}

$questionStmt = db()->prepare(
    'SELECT q.id, q.soru, o.shk1, o.shk2, o.shk3, o.shk4, o.dogru_cevap
     FROM questions q JOIN question_options o ON o.soru_kodu = q.id
     WHERE q.ders_kodu = ? LIMIT ?'
);
$limit = (int) $subject['soru_sayisi'];
$questionStmt->bind_param('ii', $subjectId, $limit);
$questionStmt->execute();
$questions = $questionStmt->get_result()->fetch_all(MYSQLI_ASSOC);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $correct = 0;
    $wrong = 0;
    $unanswered = 0;
    foreach ($questions as $question) {
        $answer = (int) ($_POST['answer_' . $question['id']] ?? 0);
        if ($answer === 0) {
            $unanswered++;
        } elseif ($answer === (int) $question['dogru_cevap']) {
            $correct++;
        } else {
            $wrong++;
        }
    }
    $score = $correct * (int) $subject['dogru_cevap_puani'] - $wrong * (int) $subject['yanlis_cevap_puani'];
    $insert = db()->prepare('INSERT INTO exam_attempts (student_id, subject_id, correct_answers, wrong_answers, unanswered, score) VALUES (?, ?, ?, ?, ?, ?)');
    $insert->bind_param('iiiiii', $_SESSION['user_id'], $subjectId, $correct, $wrong, $unanswered, $score);
    $insert->execute();
    header('Location: results.php?attempt=' . $insert->insert_id);
    exit;
}
?>
<!doctype html>
<html lang="tr">
<head>
  <meta charset="utf-8">
  <title><?= htmlspecialchars($subject['ders_adi']) ?></title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<main class="container py-4">
  <h2><?= htmlspecialchars($subject['ders_adi']) ?></h2>
  <?php if (!$questions): ?>
    <div class="alert alert-warning">Bu sinavda henuz soru yok.</div>
  <?php else: ?>
  <form method="post">
    <?php foreach ($questions as $index => $question): ?>
      <div class="card mb-3">
        <div class="card-body">
          <h5><?= $index + 1 ?>. <?= htmlspecialchars($question['soru']) ?></h5>
          <?php for ($choice = 1; $choice <= 4; $choice++): ?>
            <div class="form-check">
              <input class="form-check-input" type="radio" name="answer_<?= (int) $question['id'] ?>" id="q<?= (int) $question['id'] ?>_<?= $choice ?>" value="<?= $choice ?>">
              <label class="form-check-label" for="q<?= (int) $question['id'] ?>_<?= $choice ?>">
                <?= htmlspecialchars($question['shk' . $choice]) ?>
              </label>
            </div>
          <?php endfor; ?>
        </div>
      </div>
    <?php endforeach; ?>
    <button class="btn btn-success" type="submit">Sinavi Bitir</button>
  </form>
  <?php endif; ?>
</main>
</body>
</html>
