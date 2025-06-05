<?php
session_start();  // обязательно
include 'header.php';

// Проверяем роль безопасно
$role = $_SESSION['role'] ?? '';

?>
<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Административная панель управления пользователями в MathSolver.">
  <title>Админ-панель — MathSolver</title>
  <link rel="stylesheet" href="css/dark-theme.css">
</head>
<body>
  <main class="main-content">
    <div class="container">
      <h1>Административная панель</h1>

      <?php if ($role === 'admin'): ?>
        <section class="admin-table">
          <h2>Список пользователей</h2>
          <table>
            <thead>
              <tr>
                <th>ID</th>
                <th>Имя</th>
                <th>Email</th>
                <th>Роль</th>
                <th>Действия</th>
              </tr>
            </thead>
            <tbody>
              <?php
              include 'db.php';
              $result = mysqli_query($conn, "SELECT id, username, email, role FROM users");
              if (!$result) {
                  die('Ошибка запроса к БД: ' . mysqli_error($conn));
              }
              while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>
                        <td>{$row['id']}</td>
                        <td>{$row['username']}</td>
                        <td>{$row['email']}</td>
                        <td>{$row['role']}</td>
                        <td>
                          <a href='edit_user.php?id={$row['id']}' class='btn-small'>Редактировать</a>
                          <a href='delete_user.php?id={$row['id']}' class='btn-small danger' onclick=\"return confirm('Удалить пользователя?')\">Удалить</a>
                        </td>
                      </tr>";
              }
              ?>
            </tbody>
          </table>
        </section>
      <?php else: ?>
        <p>⛔ У вас нет прав администратора.</p>
      <?php endif; ?>
    </div>
  </main>
  <?php include 'footer.php'; ?>
</body>
</html>
