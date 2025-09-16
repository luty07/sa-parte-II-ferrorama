<?php
$host = "localhost";
$user = "root";
$password = "root";
$db = "login_system"; 
$mysqli = new mysqli($host, $user, $password, $db);

if($mysqli->connect_error) {
    die("Falha na conexão: " . $mysqli->connect_error);
}

$erroEmail = "";
$erroSenha = "";
$valido = true;

if($_SERVER["REQUEST_METHOD"] == "POST"){

    $email = trim($_POST["email"]);
    $senha = trim($_POST["senha"]);

    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $erroEmail = "E-mail inválido.";
        $valido = false;
    }

    if(strlen($senha) < 6){
        $erroSenha = "A senha deve ter pelo menos 6 caracteres.";
        $valido = false;
    }

    if($valido){
        $stmt = $mysqli->prepare("SELECT id, senha FROM usuarios WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $resultado = $stmt->get_result();

        if($resultado->num_rows === 1){
            $usuario = $resultado->fetch_assoc();

            if(password_verify($senha, $usuario['senha'])){
                session_start();
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
    <style>
        .erro { color: red; font-size: 0.9em; }
    </style>
</head>
<body>
    <form method="POST" action="">
        <label>Email:</label><br>
        <input type="text" name="email" value="<?= isset($email) ? htmlspecialchars($email) : '' ?>"><br>
        <span class="erro"><?= $erroEmail ?></span><br>

        <label>Senha:</label><br>
        <input type="password" name="senha"><br>
        <span class="erro"><?= $erroSenha ?></span><br><br>

        <button type="submit">Login</button>
    </form>
</body>
</html>
