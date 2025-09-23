<?php
session_start();

if (!isset($_SESSION['historicoRotas'])) {
    $_SESSION['historicoRotas'] = [];
}

$historico = $_SESSION['historicoRotas'];

function acessarRota($nome) {
    global $historico;

    $achou = false;
    foreach ($historico as $i => $item) {
        if ($item['nome'] === $nome) {
            $historico[$i]['contador']++;
            
            $item = $historico[$i];
            array_splice($historico, $i, 1);
            array_unshift($historico, $item);
            $achou = true;
            break;
        }
    }

    if (!$achou) {
        array_unshift($historico, [ "nome" => $nome, "contador" => 1 ]);
    }

    $_SESSION['historicoRotas'] = $historico;
}

// Se clicou em algum botão
if (isset($_GET['rota'])) {
    acessarRota($_GET['rota']);
    header("Location: historico.php"); // evita reenvio do GET
    exit();
}

// Prepara listas
$recentes = array_slice($historico, 0, 10);

$ordenadas = $historico;
usort($ordenadas, function($a, $b) {
    return $b['contador'] - $a['contador'];
});
$top5 = array_slice($ordenadas, 0, 5);
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8">
  <title>RAILTRACK</title>
  <link rel="stylesheet" href="../styles/pstyle.css">
</head>

<body>
  <div id="cabecalho">
  	<a href="inicio.php"><button>↩</button></a>
  </div>
  
  <h2>HISTÓRICO DE ROTAS</h2>
  <hr>
  <br>

  <div id="botoes-rotas">
    <a href="?rota=Setor 1 ➤ Setor 3"><button class="botao-rota">Setor 1 ➤ Setor 3</button></a>
    <a href="?rota=Setor 2 ➤ Setor 5"><button class="botao-rota">Setor 2 ➤ Setor 5</button></a>
    <a href="?rota=Setor 4 ➤ Setor 2"><button class="botao-rota">Setor 4 ➤ Setor 2</button></a>
    <a href="?rota=Setor 5 ➤ Setor 1"><button class="botao-rota">Setor 5 ➤ Setor 1</button></a>
  </div>
  <hr>

  <div class="lista-container">
    <h3>Mais Recentes</h3>
    <hr id="recacess">
    <ul id="lista-recentes">
      <?php foreach ($recentes as $i => $r): ?>
        <li><?= ($i+1) . ". " . htmlspecialchars($r['nome']) ?></li>
      <?php endforeach; ?>
    </ul>
  </div>

  <div class="lista-container">
    <h3>Mais Acessadas</h3>
    <hr id="recacess">
    <ul id="lista-acessadas">
      <?php foreach ($top5 as $i => $r): ?>
        <li><?= ($i+1) . ". " . htmlspecialchars($r['nome']) . " — " . $r['contador'] . "x" ?></li>
      <?php endforeach; ?>
    </ul>
  </div>
  <br>
</body>

</html>
