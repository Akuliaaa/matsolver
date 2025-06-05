<?php include 'header.php'; ?>
<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Вход в систему MathSolver. Используйте вашу учетную запись для входа.">
  <title>Вход — MathSolver</title>
  <link rel="stylesheet" href="css/dark-theme.css">
</head>
<body>
  <main class="main-content">
    <div class="container">
      <h1>Вход</h1>

      <form action="login_handler.php" method="post" class="form-box">
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>

        <label for="password">Пароль:</label>
        <input type="password" id="password" name="password" required>

        <button type="submit" class="btn-primary">Войти</button>
      </form>

      <p class="info-text">Нет аккаунта? <a href="register.php">Зарегистрируйтесь</a></p>
    </div>
  </main>
  <?php include 'footer.php'; ?>
</body>
</html>
