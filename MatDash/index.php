<?php include 'header.php'; ?>
<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="MathSolver — онлайн-инструмент для решения математических выражений и обучения.">
  <title>Главная — MathSolver</title>
  <link rel="stylesheet" href="css/dark-theme.css">
  <style>
    .hero {
      text-align: center;
      padding: 4rem 2rem;
      background: linear-gradient(135deg, #000 0%, #111 100%);
      border-radius: 12px;
      box-shadow: 0 0 40px rgba(0, 0, 0, 0.6);
      animation: fadeIn 1s ease-in;
    }
    .hero h1 {
      font-size: 3rem;
      margin-bottom: 1rem;
      color: #fff;
    }
    .hero p {
      font-size: 1.2rem;
      color: #aaa;
      margin-bottom: 2rem;
    }
    .hero a {
      margin: 0 0.5rem;
    }
    .features {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
      gap: 5rem 5rem;
      margin-top: 3rem;
    }
    .btn-primary, .btn-secondary{
      color: #4da3ff;
      text-decoration: none;
    }
    .feature-box {
      background: #111;
      border-radius: 10px;
      padding: 2rem;
      text-align: center;
      border: 1px solid #222;
      transition: 0.3s ease;
    }
    .feature-box:hover {
      border-color: #4da3ff;
      transform: translateY(-4px);
    }
    .feature-box h3 {
      color: #4da3ff;
    }
    @keyframes fadeIn {
      from {opacity: 0; transform: translateY(20px);}
      to {opacity: 1; transform: translateY(0);}
    }
  </style>
</head>
<body>
  <main class="main-content">
    <div class="container">
      <section class="hero">
        <h1>Добро пожаловать в MathSolver</h1>
        <p>Решай математические выражения, учись и совершенствуйся!</p>
        <a href="solve.php" class="btn-primary">Попробовать решение</a>
        <a href="register.php" class="btn-secondary">Создать аккаунт</a>
      </section>

      <section class="features">
        <div class="feature-box">
          <h3>Быстрое решение</h3>
          <p>Мгновенный расчет любых выражений с пошаговыми пояснениями.</p>
        </div>
        <div class="feature-box">
          <h3>Профиль пользователя</h3>
          <p>История решений, настройки и управление аккаунтом.</p>
        </div>
        <div class="feature-box">
          <h3>Админ-панель</h3>
          <p>Гибкий контроль над пользователями и содержимым сайта.</p>
        </div>
        <div class="feature-box">
          <h3>Адаптивный интерфейс</h3>
          <p>Идеален как для компьютеров, так и мобильных устройств.</p>
        </div>
      </section>
    </div>
  </main>
  <?php include 'footer.php'; ?>
</body>
</html>
