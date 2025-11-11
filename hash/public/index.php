<?php
session_start();
?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>

<body>

    <div class="container">

    <h1> Bem-vindo ao CRUD com Foto </h1>

    <?php if (isset($_SESSION['user_id'])): ?>

        <p>Olá,<?php echo htmlspecialchars($_SESSION['username']);?>! Você está Logado! </p> 
        <a href="dashboard.php">Ir para o dashboard.</a>
        <a href="logout.php">Fazer logout.</a>

    <?php else: ?>
        <p>Por favor faça seu <a href="login.php">Login</a> ou faça seu 
        <a href="register.php">Registro</a></p>

    <?php endif; ?>


    </div>

</body>

</html>