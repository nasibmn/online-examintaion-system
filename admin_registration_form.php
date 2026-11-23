<?php
require_once __DIR__ . '/bootstrap.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST' || !isset($_POST['submit'])) {
    header('Location: admin_reg.php');
    exit;
}

$name = trim((string) $_POST['adsoyad']);
$email = trim((string) $_POST['kullanici']);
$password = (string) $_POST['pwd'];

if ($name === '' || !filter_var($email, FILTER_VALIDATE_EMAIL) || strlen($password) < 6) {
    header('Location: admin_reg.php?mvct=' . urlencode('Gecersiz kayit bilgileri.'));
    exit;
}

$check = db()->prepare('SELECT id FROM teacher_table WHERE Email = ? LIMIT 1');
$check->bind_param('s', $email);
$check->execute();
if ($check->get_result()->fetch_assoc()) {
    header('Location: admin_reg.php?mvct=' . urlencode('Bu e-posta zaten kayitli.'));
    exit;
}

$hash = password_hash($password, PASSWORD_DEFAULT);
$insert = db()->prepare('INSERT INTO teacher_table (adsoyad, Email, password) VALUES (?, ?, ?)');
$insert->bind_param('sss', $name, $email, $hash);
$insert->execute();
header('Location: admin_login.php?success=' . urlencode('Kaydiniz basariyla tamamlandi.'));
exit;
