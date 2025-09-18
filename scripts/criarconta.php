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