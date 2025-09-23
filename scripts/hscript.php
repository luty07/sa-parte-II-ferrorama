<?php
$mensagens = [
    "setor1" => [
        "titulo" => "SETOR 1 ▶ SETOR 3",
        "status" => "TUDO CERTO!<br>NENHUMA MANUTENÇÃO PROGRAMADA!",
        "imagem" => "/mnt/data/f88758d1-242e-4af9-a19d-8a9837c3d568.png"
    ],
    "setor2" => [
        "titulo" => "SETOR 2 ▶ SETOR 5",
        "status" => "Acidente nos trilhos, fechado temporariamente para conserto de trens e do trilho.<br>Previsão para normalização: 10 dias úteis.",
        "imagem" => "/mnt/data/7bebb151-a8bb-4073-9992-3cb9e2db0055.png"
    ],
    "setor3" => [
        "titulo" => "SETOR 4 ▶ SETOR 2",
        "status" => "Check up realizado a cada 6 meses para garantir a segurança dos trilhos, dos trens e dos passageiros.<br>Previsão para normalização: 3 dias úteis.",
        "imagem" => "/mnt/data/7dbc8ec3-ddff-40fe-ad02-19e3795cbd1e.png"
    ],
    "setor4" => [
        "titulo" => "SETOR 5 ▶ SETOR 1",
        "status" => "TUDO CERTO!<br>NENHUMA MANUTENÇÃO PROGRAMADA!",
        "imagem" => "/mnt/data/8678d6c1-e856-44c6-8fd5-f2325ab7e57c.png"
    ]
];

$setorSelecionado = $_GET["setor"] ?? null;
$data = $mensagens[$setorSelecionado] ?? null;
?>



<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Manutenção Ferroviária</title>
</head>
<body>
    <div class="container" <?php if ($data) echo 'style="display:none;"'; ?>>
        <h1>Selecione um Setor</h1>
        <ul>
            <li><a href="?setor=setor1">Setor 1</a></li>
            <li><a href="?setor=setor2">Setor 2</a></li>
            <li><a href="?setor=setor3">Setor 3</a></li>
            <li><a href="?setor=setor4">Setor 4</a></li>
        </ul>
    </div>

    <?php if ($data): ?>
        <div id="info">
            <h2><?= $data["titulo"] ?></h2>
            <div class="mensagem"><?= $data["status"] ?></div>
            <img src="<?= $data["imagem"] ?>" alt="imagem do setor" />
            <div class="footer">
                <img src="/mnt/data/b7cb1583-8a4d-4e81-9703-eb8a1617cecc.png" alt="trem" class="trem" />
                <a href="index.php">VOLTAR À MANUTENÇÃO</a>
            </div>
        </div>
    <?php endif; ?>
</body>
</html>
