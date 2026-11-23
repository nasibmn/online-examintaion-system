<?php
require_once __DIR__ . '/bootstrap.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST' || !isset($_POST['submit'])) {
    header('Location: admin_login.php');
    exit;
}

$email = trim((string) $_POST['kullanici']);
$password = (string) $_POST['sifre'];
$stmt = db()->prepare('SELECT id, adsoyad, Email, password FROM teacher_table WHERE Email = ? LIMIT 1');
$stmt->bind_param('s', $email);
$stmt->execute();
$teacher = $stmt->get_result()->fetch_assoc();

$valid = $teacher && password_verify($password, (string) $teacher['password']);
if ($teacher && !$valid && hash_equals((string) $teacher['password'], $password)) {
    $valid = true;
    $hash = password_hash($password, PASSWORD_DEFAULT);
    $update = db()->prepare('UPDATE teacher_table SET password = ? WHERE id = ?');
    $update->bind_param('si', $hash, $teacher['id']);
    $update->execute();
}

if ($valid) {
    session_regenerate_id(true);
    $_SESSION['user_id'] = (int) $teacher['id'];
    $_SESSION['user_name'] = $teacher['adsoyad'];
    $_SESSION['role'] = 'teacher';
    header('Location: ogretmen/adminMain.php');
    exit;
}

header('Location: admin_login.php?error=' . urlencode('Bilgiler yanlis.'));
exit;
