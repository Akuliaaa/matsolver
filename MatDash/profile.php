<?php
session_start();
require_once 'db.php';
include 'header.php';
?>

<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Личный кабинет пользователя MathSolver: настройки, история решений, управление аккаунтом.">
  <title>Профиль — MathSolver</title>
  <link rel="stylesheet" href="css/dark-theme.css">
</head>
<body>
<main class="main-content">
  <div class="container">
    <h1>Личный кабинет</h1>

    <?php if (isset($_SESSION['username'])): ?>
      <section class="profile-box">
        <h2>Привет, <?= htmlspecialchars($_SESSION['username']) ?>!</h2>
        <p><strong>Email:</strong> <?= htmlspecialchars($_SESSION['email']) ?? 'Не указан' ?></p>
        <p><strong>Роль:</strong> <?= htmlspecialchars($_SESSION['role']) ?></p>

        <div class="profile-actions">
          <a href="edit_profile.php" class="btn-primary">Редактировать профиль</a>
          <a href="change_password.php" class="btn-primary">Сменить пароль</a>
          <a href="logout.php" class="btn-secondary">Выйти</a>
        </div>
      </section>

      <section class="history-section">
        <h2>История решений</h2>
        <?php
          $stmt = $pdo->prepare("SELECT expression, result, created_at FROM solutions WHERE user_id = ? ORDER BY created_at DESC LIMIT 10");
          $stmt->execute([$_SESSION['user_id']]);
          $solutions = $stmt->fetchAll();
        ?>
        <?php if ($solutions): ?>
          <ul class="history-list">
            <?php foreach ($solutions as $s): ?>
              <li>
                <strong><?= htmlspecialchars($s['expression']) ?></strong> = <?= htmlspecialchars($s['result']) ?>
                <small>(<?= $s['created_at'] ?>)</small>
              </li>
            <?php endforeach; ?>
          </ul>
        <?php else: ?>
          <p>У вас пока нет решений.</p>
        <?php endif; ?>
      </section>
    <?php else: ?>
      <p>Для доступа к профилю <a href="login.php">войдите в систему</a>.</p>
    <?php endif; ?>
  </div>
</main>
<?php include 'footer.php'; ?>
</body>
</html>
