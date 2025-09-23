<?php
session_start();

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>RAILTRACK</title>
  <link rel="stylesheet" href="../styles/pstyle.css">
</head>

<body>
  <div class="containerd">
    <h1>INÍCIO</h1>
    <hr>

    <br>

    <div class="menu-item">
      <a href="historico.php"><img src="../assets/historico.jpg" alt="Histórico"></a>
      <p>HISTÓRICO DE ROTAS</p>

    </div>

    <div class="menu-item">
      <a href="../public/destinos.html"><img src="../assets/treminicio.jpg" alt="Destinos e Horários"></a>
      <p>DESTINOS E HORÁRIOS</p>

    </div>

    <div class="menu-item">
      <a href="../public/rotas.html"><img src="../assets/rotas.jpg" alt="Manutenção"></a>
      <p>ROTAS</p>
    </div>

    <div class="menu-item">
      <a href="../public/manutencao.html"><img src="../assets/manutencao.jpg" alt="Manutenção"></a>
      <p>MANUTENÇÃO</p>
    </div>

    <div class="menu-item">
      <a href="../public/relatorios.html"><img src="../assets/relatorioseanalises.jpg" alt="Relatórios e Análises"></a>
      <p>RELATÓRIOS E ANÁLISES</p>
    </div>

    <div class="menu-item">
      <a href="alerts.php"><img src="../assets/alertsenots.jpg" alt="Alertas e Notificações"></a>
      <p>ALERTAS E NOTIFICAÇÕES</p>
    </div>
  </div>

</body>

</html>