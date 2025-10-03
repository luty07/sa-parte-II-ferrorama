<?php

include "../includes/db_connect.php";
include "../src/User.php";

session_start();

if($_SERVER['REQUEST_METHOD'] == "POST"){
    $user = new User($conn);
    
    $user ->register($_POST['nome'],$_POST['email'],$_POST['password']);
    header("Location: login.php");
}

?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>

    <form method="POST" action="register.php">
        <input type="nome" name="nome" placeholder="Seu Nome" required>
        <input type="email" name="email" placeholder="Email" required>
        <input type="password" name="password" placeholder="Senha" required>
        <button type="submit">Register</button>
    </form>
    
</body>
</html>