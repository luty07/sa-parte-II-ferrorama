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

