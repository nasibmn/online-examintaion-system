<?php
session_start();

function db(): mysqli
{
    static $connection = null;
    if ($connection instanceof mysqli) {
        return $connection;
    }

    $host = getenv('DB_HOST') ?: 'localhost';
    $user = getenv('DB_USER') ?: 'root';
    $pass = getenv('DB_PASS') ?: '';
    $name = getenv('DB_NAME') ?: 'userinformation';
    $port = (int) (getenv('DB_PORT') ?: 3306);

    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
    $connection = new mysqli($host, $user, $pass, $name, $port);
    $connection->set_charset('utf8mb4');
    return $connection;
}

function require_login(string $role): void
{
    if (!isset($_SESSION['user_id'], $_SESSION['role']) || $_SESSION['role'] !== $role) {
        $login = $role === 'teacher' ? '../admin_login.php' : '../user_login.php';
        header('Location: ' . $login);
        exit;
    }
}

