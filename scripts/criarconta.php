<?php
session_start();

$host = "localhost";
$user = "root";
$password = "root";
$db = "login_system"; 
$mysqli = new mysqli($host, $user, $password, $db);



$erroEmail = "";
$erroSenha = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = trim($_POST["email"]);
    $senha = trim($_POST["senha"]);
    $valido = true;

    if (strlen($senha) < 6) {
        $erroSenha = "A senha deve ter pelo menos 6 caracteres.";
        $valido = false;
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $erroEmail = "E-mail inválido.";
        $valido = false;
    }


    if ($valido) {
        echo "<script>alert('Formulário enviado com sucesso!');</script>";
        header("Location: inicio.php");
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Validação em PHP</title>
</head>
<body>
    <form id="formulario" method="POST" action="">
        <label for="email">E-mail:</label>
        <input type="text" name="email" id="email" required>
        <span id="erroEmail" style="color:red;">
            <?php if (!empty($erroEmail)) echo $erroEmail; ?>
        </span>
        <br><br>

        <label for="senha">Senha:</label>
        <input type="password" name="senha" id="senha" required>
        <span id="erroSenha" style="color:red;">
            <?php if (!empty($erroSenha)) echo $erroSenha; ?>
        </span>
        <br><br>

        <button type="submit">Enviar</button>
    </form>
</body>
</html>