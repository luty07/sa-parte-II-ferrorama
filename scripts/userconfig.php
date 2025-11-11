<?php
session_start();

// Simulação de dados do usuário (substitua por consulta ao banco de dados)
$user = [
    'nome' => 'João',
    'email' => 'joao@email.com',
    'data_cadastro' => '2024-06-01'
];

// Verifica se o usuário está logado (exemplo simples)
if (!isset($_SESSION['usuario_id'])) {
    header('Location: login.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Página do Usuário</title>
    <style>
        body { font-family: Arial, sans-serif; background: #f5f5f5; }
        .container { max-width: 400px; margin: 50px auto; background: #fff; padding: 30px; border-radius: 8px; box-shadow: 0 2px 8px #ccc; }
        h2 { text-align: center; }
        .info { margin: 20px 0; }
        .info label { font-weight: bold; }
    </style>
</head>
<body>
    <div class="container">
        <h2>Bem-vindo, <?php echo htmlspecialchars($user['nome']); ?>!</h2>
        <div class="info">
            <p><label>Nome:</label> <?php echo htmlspecialchars($user['nome']); ?></p>
            <p><label>Email:</label> <?php echo htmlspecialchars($user['email']); ?></p>
            <p><label>Data de Cadastro:</label> <?php echo htmlspecialchars($user['data_cadastro']); ?></p>
        </div>
        <a href="logout.php">Sair</a>
    </div>
</body>
</html>