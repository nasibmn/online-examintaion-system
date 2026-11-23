<?php
require_once __DIR__ . '/bootstrap.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST' || !isset($_POST['submit'])) {
    header('Location: user_login.php');
    exit;
}

$email = trim((string) $_POST['kadi']);
$password = (string) $_POST['ksifre'];
$stmt = db()->prepare('SELECT id, adsoyad, Email, password FROM usertable WHERE Email = ? LIMIT 1');
$stmt->bind_param('s', $email);
$stmt->execute();
$user = $stmt->get_result()->fetch_assoc();

$valid = $user && password_verify($password, (string) $user['password']);
if ($user && !$valid && hash_equals((string) $user['password'], $password)) {
    $valid = true;
    $hash = password_hash($password, PASSWORD_DEFAULT);
    $update = db()->prepare('UPDATE usertable SET password = ? WHERE id = ?');
    $update->bind_param('si', $hash, $user['id']);
    $update->execute();
}

if ($valid) {
    session_regenerate_id(true);
    $_SESSION['user_id'] = (int) $user['id'];
    $_SESSION['user_name'] = $user['adsoyad'];
    $_SESSION['role'] = 'student';
    header('Location: ogrenci/userMain.php');
    exit;
}

header('Location: user_login.php?error=' . urlencode('Bilgiler yanlis.'));
exit;
