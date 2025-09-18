<?php
session_start();

$host = "localhost";
$user = "root";
$password = "root";
$db = "login_system";


$mysqli = new mysqli($host, $user, $password, $db);

if ($mysqli->connect_error) {
    die("Falha na conexão: " . $mysqli->connect_error);
}

$erroEmail="";
$erroSenha="";
$email="";
$valido = true;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = trim($_POST["email"]);
    $senha = trim($_POST["senha"]);
    $valido=true;

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $erroEmail = "E-mail inválido.";
        $valido = false;
    }

    if (strlen($senha) < 6) {
        $erroSenha = "A senha deve ter pelo menos 6 caracteres.";
        $valido = false;
    }

    if ($valido) {
        $stmt = $mysqli->prepare("SELECT id, senha FROM usuarios WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $resultado = $stmt->get_result();

        if ($resultado->num_rows === 1) {
            $usuario = $resultado->fetch_assoc();

           if ($resultado->num_rows > 0) {
            $_SESSION['usuario'] = $email;
            header("Location: scripts/inicio.php"); // redireciona
            exit();
        } else {
            $erroSenha = "E-mail ou senha incorretos.";
        }
    }
}
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel ="stylesheet" href="styles/pstyle.css">
    <script src="scripts/senha.php"></script>
    <style>
        .erro {
            color: red;
            font-size: 0.9em;
        }
    </style>
</head>
<body>
      <div class="container">
        <h1>RailTrack</h1>
        <img id="ft" src="assets/trem.png" alt="">

    <form id="formulario" method="POST" action="">
        <label>Email:</label><br>
        <input type="text" name="email" value="<?= isset($email) ? htmlspecialchars($email) : '' ?>"><br>
        <span class="erro"><?= $erroEmail ?></span><br>

        <label>Senha:</label><br>
        <input type="password" name="senha"><br>
        <span class="erro"><?= $erroSenha ?></span><br><br>

        <button type="submit">Login</button>
    </form>
        <a href="public/recsenha.html">Esqueci minha senha</a>

        <a href="public/criarconta.html">Criar Conta</a>
</body>
</html>
