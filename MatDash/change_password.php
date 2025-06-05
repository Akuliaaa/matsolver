<?php include 'header.php'; ?>
<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Смена пароля для пользователей MathSolver. Безопасность и контроль вашего аккаунта.">
  <title>Смена пароля — MathSolver</title>
  <link rel="stylesheet" href="css/dark-theme.css">
</head>
<body>
  <main class="main-content">
    <div class="container">
      <h1>Смена пароля</h1>

      <?php if (isset($_SESSION['username'])): ?>
        <form action="change_password_handler.php" method="post" class="form-box">
          <label for="old_password">Текущий пароль:</label>
          <input type="password" id="old_password" name="old_password" required>

          <label for="new_password">Новый пароль:</label>
          <input type="password" id="new_password" name="new_password" minlength="6" required>

          <label for="confirm_password">Повторите новый пароль:</label>
          <input type="password" id="confirm_password" name="confirm_password" required>

          <button type="submit" class="btn-primary">Сменить пароль</button>
        </form>
        <p class="info-text">🔐 Пароль должен содержать минимум 6 символов и отличаться от предыдущего.</p>
      <?php else: ?>
        <p>Чтобы сменить пароль, необходимо <a href="login.php">войти</a>.</p>
      <?php endif; ?>

    </div>
  </main>
  <?php include 'footer.php'; ?>
</body>
</html>
