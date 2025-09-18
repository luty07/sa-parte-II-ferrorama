<?php
$host = "localhost";
$user = "root";
$password = "root";
$db = "login_system"; //banco criado.
$mysqli = new mysqli($host, $user, $password, $db);



if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = trim($_POST["email"]);
    $erroEmail = "";



 if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $erroEmail = "E-mail inválido.";

    } else {

        header("Location: codemail.html");
        exit();
    }
}
?>    

<!DOCTYPE html>
<html lang="pt-br">
<head>
    
    <meta charset="UTF-8">
    <title>Validação de E-mail</title>
</head>

<body>

    <form id="formulario" method="POST" action="">
        <label for="email">E-mail:</label>
        <input type="text" name="email" id="email" required>
        <span id="erroEmail" style="color:red;">

            <?php if (!empty($erroEmail)) echo $erroEmail; ?>

        </span>
        <br><br>
        <button type="submit">Enviar</button>
    </form>
</body>
</html>