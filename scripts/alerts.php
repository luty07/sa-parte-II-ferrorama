<?php
// Lista de alertas
$alertas = [
    "Novo horário para o trajeto ‘Setor 2 ➤ Setor 5’ a partir de 01/05.",
    "Trem do trajeto ‘Setor 4 ➤ Setor 2’ está com check up em andamento.",
    "Trem do trajeto ‘Setor 5 ➤ Setor 1’ terá um atraso de aproximadamente 15 minutos.",
    "O trem do trajeto ‘Setor 1 ➤ Setor 3’ chega à plataforma em 5 min.",
    "Relatório do dia 28/03 disponível na aba Relatório e análises."
];
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Alertas e Notificações</title>
  <link rel="stylesheet" href="../styles/pstyle.css">
</head>

<body>
  <div id="cabecalho">
    <a href="inicio.php"><button>↩</button></a>
  </div>
  
  <div class="app-container">
    <header id="headerr">
      <section>
        <h1 id="titulo">ALERTAS E NOTIFICAÇÕES 🔔</h1>
      </section>
    </header>
    <hr>

    <main id="alertsList">
      <?php foreach ($alertas as $texto): ?>
        <section>
        <div class="alert-item">
          <div class="timeline"></div>
          <div class="alert-text"><?= htmlspecialchars($texto) ?></div>
        </div>
      </section>
      <?php endforeach; ?>
    </main>

    <div style="margin-top:20px;">
      <form method="post">
        <button type="submit" name="refresh" id="refreshBtn">🔄 Atualizar</button>
      </form>
      <?php if (isset($_POST['refresh'])): ?>
        <p id="updatedMessage" style="color:green;">Lista atualizada!</p>
      <?php endif; ?>
    </div>
  </div>
</body>

</html>