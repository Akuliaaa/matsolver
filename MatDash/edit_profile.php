<?php
session_start();
require 'db_connect.php';

if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit;
}

$username = $_SESSION['user'];
$stmt = $conn->prepare("SELECT * FROM users WHERE username = ?");
$stmt->bind_param("s", $username);
$stmt->execute();
$user = $stmt->get_result()->fetch_assoc();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $new_email = trim($_POST['email']);

    // Обновление аватара
    if (!empty($_FILES['avatar']['name'])) {
        $avatar = $_FILES['avatar'];
        $ext = pathinfo($avatar['name'], PATHINFO_EXTENSION);
        $avatar_name = uniqid() . '.' . $ext;
        move_uploaded_file($avatar['tmp_name'], 'uploads/' . $avatar_name);
    } else {
        $avatar_name = $user['avatar'];
    }

    $stmt = $conn->prepare("UPDATE users SET email = ?, avatar = ? WHERE username = ?");
    $stmt->bind_param("sss", $new_email, $avatar_name, $username);
    $stmt->execute();
    header("Location: profile.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Редактирование профиля</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <header>
        <h1>Редактировать профиль</h1>
        <a href="profile.php">Назад</a>
    </header>
    <main>
        <form method="post" enctype="multipart/form-data">
            <label>Email: <input type="email" name="email" value="<?= htmlspecialchars($user['email']) ?>" required></label><br>
            <label>Аватар: <input type="file" name="avatar" accept="image/*"></label><br>
            <?php if ($user['avatar']): ?>
                <img src="uploads/<?= htmlspecialchars($user['avatar']) ?>" width="100" alt="Аватар">
            <?php endif; ?>
            <button type="submit">Сохранить изменения</button>
        </form>
    </main>
</body>
</html>
