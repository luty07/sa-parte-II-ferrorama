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
$erroNome = "";
$mensagemSucesso = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = trim($_POST["nome"]);
    $email = trim($_POST["email"]);
    $senha = trim($_POST["senha"]);
    $valido = true;

    // Validação de nome
    if (empty($nome)) {
        $erroNome = "Nome é obrigatório.";
        $valido = false;
    } elseif (strlen($nome) < 2) {
        $erroNome = "Nome deve ter pelo menos 2 caracteres.";
        $valido = false;
    }

    // Validação de email
    if (empty($email)) {
        $erroEmail = "E-mail é obrigatório.";
        $valido = false;
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $erroEmail = "E-mail inválido.";
        $valido = false;
    }

    // Validação de senha
    if (empty($senha)) {
        $erroSenha = "Senha é obrigatória.";
        $valido = false;
    } elseif (strlen($senha) < 6) {
        $erroSenha = "A senha deve ter pelo menos 6 caracteres.";
        $valido = false;
    }

    if ($valido) {
        // Verificar se email já existe
        $stmt = $mysqli->prepare("SELECT id FROM usuarios WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();
        
        if ($result->num_rows > 0) {
            $erroEmail = "Este e-mail já está cadastrado.";
        } else {
            // Inserir novo usuário
            $stmt = $mysqli->prepare("INSERT INTO usuarios (nome, email, senha) VALUES (?, ?, ?)");
            $stmt->bind_param("sss", $nome, $email, $senha);
            
            if ($stmt->execute()) {
                $mensagemSucesso = "<script>alert('Conta criada com sucesso!');</script>";
                echo "<script>
                    setTimeout(function() {
                        window.location.href = '../index.php';
                    }, 2000);
                </script>";
            } else {
                $mensagemSucesso = "<script>alert('Erro ao criar conta.');</script>";
            }
            $stmt->close();
        }
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Criar Conta - RailTrack</title>
    <link rel="stylesheet" href="../styles/pstyle.css">
    <style>
        .erro { color: red; font-size: 0.9em; }
        .links a { color: white; margin: 10px; display: inline-block; }
        section { margin-top: 20px; }
    </style>
</head>
<body>
    <div class="container">
        <h1>Criar Conta</h1>
        <img id="ft" src="../assets/trem.png">
        
        <?php echo $mensagemSucesso; ?>
        
        <section>
            <form method="POST" action="">
                <div>
                    <label for="nome">Nome:</label>
                    <input type="text" name="nome" id="nome" 
                           value="<?php echo isset($_POST['nome']) ? htmlspecialchars($_POST['nome']) : ''; ?>" 
                           required>
                    <span class="erro"><?php echo $erroNome; ?></span>
                </div>

                <div>
                    <label for="email">E-mail:</label>
                    <input type="email" name="email" id="email" 
                           value="<?php echo isset($_POST['email']) ? htmlspecialchars($_POST['email']) : ''; ?>" 
                           required>
                    <span class="erro"><?php echo $erroEmail; ?></span>
                </div>

                <div>
                    <label for="senha">Senha:</label>
                    <input type="password" name="senha" id="senha" required>
                    <span class="erro"><?php echo $erroSenha; ?></span>
                </div>

                <button type="submit">Criar Conta</button>
            </form>
        </section>
        
        <div class="links">
            <a href="../index.php">Voltar para Login</a>
        </div>
    </div>
</body>
</html>