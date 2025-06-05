<?php include 'header.php'; ?>
<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Регистрация нового пользователя в системе MathSolver. Создайте аккаунт и начните решать!">
  <title>Регистрация — MathSolver</title>
  <link rel="stylesheet" href="css/dark-theme.css">
</head>
<body>
  <main class="main-content">
    <div class="container">
      <h1>Регистрация</h1>

      <form action="register_handler.php" method="post" class="form-box">
        <label for="username">Имя пользователя:</label>
        <input type="text" id="username" name="username" required>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>

        <label for="password">Пароль:</label>
        <input type="password" id="password" name="password" minlength="6" required>

        <label for="confirm_password">Подтвердите пароль:</label>
        <input type="password" id="confirm_password" name="confirm_password" required>

        <button type="submit" class="btn-primary">Зарегистрироваться</button>
      </form>

      <p class="info-text">Уже есть аккаунт? <a href="login.php">Войти</a></p>
    </div>
  </main>
  <?php include 'footer.php'; ?>
</body>
</html>
