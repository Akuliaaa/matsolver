<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();
require_once 'db.php'; // подключение к базе данных

// Проверка на отправку формы
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $password = $_POST['password'] ?? '';
    $confirm = $_POST['confirm_password'] ?? '';

    // Проверка заполненности полей
    if (!$username || !$email || !$password || !$confirm) {
        $_SESSION['error'] = 'Пожалуйста, заполните все поля';
        header('Location: register.php');
        exit();
    }

    // Проверка совпадения паролей
    if ($password !== $confirm) {
        $_SESSION['error'] = 'Пароли не совпадают';
        header('Location: register.php');
        exit();
    }

    // Проверка существования пользователя
    $stmt = $pdo->prepare('SELECT id FROM users WHERE email = ?');
    $stmt->execute([$email]);
    if ($stmt->fetch()) {
        $_SESSION['error'] = 'Пользователь с таким email уже существует';
        header('Location: register.php');
        exit();
    }

    // Хеширование пароля
    $hash = password_hash($password, PASSWORD_BCRYPT);

    // Сохранение в базу данных
    $stmt = $pdo->prepare('INSERT INTO users (username, email, password, role) VALUES (?, ?, ?, "user")');
    if ($stmt->execute([$username, $email, $hash])) {
        $_SESSION['success'] = 'Регистрация прошла успешно! Войдите в аккаунт.';
        header('Location: login.php');
    } else {
        $_SESSION['error'] = 'Ошибка регистрации. Попробуйте снова.';
        header('Location: register.php');
    }
} else {
    header('Location: register.php');
    exit();
}
