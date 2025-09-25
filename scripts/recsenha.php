<?php
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RAILTRACK</title>
    <link rel="stylesheet" href="../styles/pstyle.css">
    <script src="../scripts/senharec.js"></script>
</head>
<body>
    <div class="container">
        <h1>Recuperar Senha</h1>

        <form id="formulario" method="post" action="codemail.php">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email">
            <div class="error" id="erroEmail"></div>

            <button type="submit">Enviar</button>
        </form>

        <a href="../index.php">Voltar</a>
    </div>
</body>
</html>