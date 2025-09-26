<?php
session_start();

$host = "localhost";
$user = "root";
$password = "root";
$db = "railtrack_db";

$mysqli = new mysqli($host, $user, $password, $db);

if ($mysqli->connect_error) {
    die("Falha na conexão: " . $mysqli->connect_error);
}

$erroEmail = "";
$erroSenha = "";
$email = "";
$valido = true;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = trim($_POST["email"]);
    $senha = trim($_POST["senha"]);
    $valido = true;

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $erroEmail = "E-mail inválido.";
        $valido = false;
    }

    if (empty($senha)) {
        $erroSenha = "A senha é obrigatória.";
        $valido = false;
    }

    if ($valido) {
        $stmt = $mysqli->prepare("SELECT id, senha FROM usuarios WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $resultado = $stmt->get_result();

        if ($resultado->num_rows === 1) {
            $usuario = $resultado->fetch_assoc();

            if ($senha === $usuario['senha']) {
                $_SESSION['usuario_id'] = $usuario['id'];
                $_SESSION['usuario_email'] = $email;
                header("Location: scripts/boasvindas.php");
                exit();
            } else {
                $erroSenha = "Senha incorreta.";
            }
        } else {
            $erroEmail = "E-mail não encontrado.";
        }
        
        $stmt->close();
    }
}

$mysqli->close();
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
        <img id="ft" src="assets/trem.png">
        
        <form method="POST" action="">
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" name="email" id="email" value="<?= htmlspecialchars($email) ?>" required>
               <br> <span class="erro"><?= $erroEmail ?></span>
            </div>

            <div class="form-group">
                <label for="senha">Senha:</label>
                <input type="password" name="senha" id="senha" required>
               <br> <span class="erro"><?= $erroSenha ?></span>
            </div>

            <button type="submit">Login</button>
        </form>
        
        <div class="links">
            <a href="scripts/recsenha.php">Esqueci minha senha</a>
            <br>
            <a href="scripts/criarconta.php">Criar Conta</a>
        </div>
    </div>
</body>
</html>