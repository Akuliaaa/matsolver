<?php include 'header.php'; ?>
<main class="main-content">
  <div class="container">
    <h1>Решение математических выражений</h1>
    <p>Введите любое выражение: <code>2*(3+4)^2</code>, <code>sqrt(16)</code>, <code>sin(pi / 4)</code> и др.</p>

    <form id="solve-form" class="solve-form">
      <input type="text" id="expression" placeholder="Введите выражение..." required autocomplete="off">
      <button type="submit">Решить</button>
    </form>

    <div id="result" class="result-box fade-in"></div>

    <section class="history-section">
      <h2>📜 История решений</h2>
      <ul id="history" class="history-list"></ul>
    </section>
  </div>
</main>

<?php include 'footer.php'; ?>

<script src="https://cdnjs.cloudflare.com/ajax/libs/mathjs/11.8.0/math.min.js"></script>
<script>
  const form = document.getElementById('solve-form');
  const resultBox = document.getElementById('result');
  const historyList = document.getElementById('history');
  const input = document.getElementById('expression');

  // Загружаем историю из localStorage
  const stored = JSON.parse(localStorage.getItem('history') || '[]');
  stored.forEach(expr => appendToHistory(expr.expression, expr.result));

  form.addEventListener('submit', function(e) {
    e.preventDefault();
    const expr = input.value.trim();
    if (!expr) return;

    try {
      const result = math.evaluate(expr);
      resultBox.innerHTML = `<strong>Результат:</strong> ${result}`;
      appendToHistory(expr, result);

      // Сохраняем в localStorage
      stored.push({ expression: expr, result: result });
      if (stored.length > 20) stored.shift(); // храним последние 20
      localStorage.setItem('history', JSON.stringify(stored));

    } catch (err) {
      resultBox.innerHTML = `<span class="error">Ошибка: ${err.message}</span>`;
    }

    input.value = '';
  });

  function appendToHistory(expr, result) {
    const li = document.createElement('li');
    li.innerHTML = `<code>${expr}</code> = <strong>${result}</strong>`;
    historyList.prepend(li);
  }
</script>
