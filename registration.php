<?php
require_once __DIR__ . '/bootstrap.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST' || !isset($_POST['submit'])) {
    header('Location: user_reg.php');
    exit;
}

$name = trim((string) $_POST['adsoyad']);
$gender = trim((string) $_POST['cns']);
$phone = trim((string) $_POST['phone']);
$email = trim((string) $_POST['kullanici']);
$password = (string) $_POST['sifre'];
$confirm = (string) ($_POST['sifre1'] ?? '');

if ($name === '' || $email === '' || !filter_var($email, FILTER_VALIDATE_EMAIL) || strlen($password) < 6 || $password !== $confirm) {
    header('Location: user_reg.php?mvct=' . urlencode('Gecersiz kayit bilgileri.'));
    exit;
}

$check = db()->prepare('SELECT id FROM usertable WHERE Email = ? LIMIT 1');
$check->bind_param('s', $email);
$check->execute();
if ($check->get_result()->fetch_assoc()) {
    header('Location: user_reg.php?mvct=' . urlencode('Bu e-posta zaten kayitli.'));
    exit;
}

$hash = password_hash($password, PASSWORD_DEFAULT);
$insert = db()->prepare('INSERT INTO usertable (adsoyad, cinsiyet, phone, Email, password) VALUES (?, ?, ?, ?, ?)');
$insert->bind_param('sssss', $name, $gender, $phone, $email, $hash);
$insert->execute();
header('Location: user_login.php?scs=' . urlencode('Kaydiniz basariyla tamamlandi.'));
exit;
