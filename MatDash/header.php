<?php
if (session_status() === PHP_SESSION_NONE) session_start();
?>
<link rel="stylesheet" href="css/dark-theme.css">
<header class="site-header">
  <nav class="nav">
    <div class="nav-logo">
      <a href="index.php">🧠 MathSolver</a>
    </div>
    <ul class="nav-links">
      <li><a href="index.php">Главная</a></li>
      <li><a href="solve.php">Решения</a></li>
      <li><a href="about.php">О проекте</a></li>
      <?php if (isset($_SESSION['username'])): ?>
        <li><a href="profile.php">Профиль</a></li>
        <?php if ($_SESSION['role'] === 'admin'): ?>
          <li><a href="admin.php">Админ</a></li>
        <?php endif; ?>
        <li><a href="logout.php" class="logout">Выход</a></li>
      <?php else: ?>
        <li><a href="login.php">Вход</a></li>
        <li><a href="register.php">Регистрация</a></li>
      <?php endif; ?>
    </ul>
  </nav>
</header>
<style>
.site-header {
  background: #000;
  padding: 1rem 2rem;
  position: sticky;
  top: 0;
  z-index: 1000;
  box-shadow: 0 2px 10px rgba(0, 0, 0, 0.6);
}
.nav {
  display: flex;
  justify-content: space-between;
  align-items: center;
}
.nav-logo a {
  font-size: 1.5rem;
  color: #fff;
  font-weight: bold;
  text-decoration: none;
}
.nav-links {
  list-style: none;
  display: flex;
  gap: 1.5rem;
  margin: 0;
}
.nav-links a {
  color: #ccc;
  text-decoration: none;
  font-weight: 500;
  position: relative;
  transition: color 0.3s ease;
}
.nav-links a:hover,
.nav-links a.active {
  color: #007bff;
}
.nav-links a::after {
  content: '';
  position: absolute;
  bottom: -4px;
  left: 0;
  width: 0;
  height: 2px;
  background: #007bff;
  transition: width 0.3s;
}
.nav-links a:hover::after {
  width: 100%;
}
.logout {
  color: #ff4d4f;
}
</style>
