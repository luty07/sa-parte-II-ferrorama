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

$erroEmail = "";
$erroSenha = "";
$email = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = trim($_POST["email"]);
    $senha = trim($_POST["senha"]);
    $valido = true;

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

            if (password_verify($senha, $usuario['senha'])) {
                $_SESSION['usuario_id'] = $usuario['id'];
                
                
                header("Location: public/inicio.php"); 
                exit;
            } else {
                $erroSenha = "Senha incorreta.";
            }
        } else {
            $erroEmail = "Usuário não encontrado.";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h2>Login</h2>
    <form method="POST" action="">
        <label>Email:</label><br>
        <input type="text" name="email" value="<?= htmlspecialchars($email) ?>"><br>
        <span class="erro"><?= $erroEmail ?></span><br>

        <label>Senha:</label><br>
        <input type="password" name="senha"><br>
        <span class="erro"><?= $erroSenha ?></span><br><br>

        <button type="submit">Entrar</button>
    </form>
</body>
</html>
