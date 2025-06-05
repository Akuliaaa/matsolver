<?php
session_start();
require_once 'db.php'; // Подключение к базе

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = trim($_POST['email'] ?? '');
    $password = $_POST['password'] ?? '';

    if (!$email || !$password) {
        $_SESSION['error'] = 'Введите email и пароль';
        header('Location: login.php');
        exit();
    }

    $stmt = $pdo->prepare('SELECT id, username, password, role FROM users WHERE email = ?');
    $stmt->execute([$email]);
    $user = $stmt->fetch();

    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['username'] = $user['username'];
        $_SESSION['role'] = $user['role'];

        $_SESSION['success'] = 'Вы вошли в систему';
        header('Location: profile.php'); // Или на главную
    } else {
        $_SESSION['error'] = 'Неверный логин или пароль';
        header('Location: login.php');
    }
} else {
    header('Location: login.php');
    exit();
}
