<?php

include "../includes/db_connect.php";
include "../src/Auth.php";
include "../src/User.php";

session_start();

if($_SERVER['REQUEST_METHOD'] == "POST"){
    $user = new User($conn);
    $auth = new Auth();

    $loggedInUser = $user-> login($_POST['email'], $_POST['password']);
    if($loggedInUser) {
        $auth -> loginUser($loggedInUser);
        header("Location: dashboard.php");
    } else{
        echo "Login Falhou!";
    }
}

?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>

    <form method="POST" action="login.php">
        <input type="email" name="email" placeholder="Email" required>
        <input type="password" name="password" placeholder="Senha" required>
        <button type="submit">Login</button>
    </form>
    
</body>
</html>