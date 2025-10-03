<?php

include "../includes/db_connect.php";
include "../src/Auth.php";
include "../src/User.php";

session_start();
$auth = new Auth();
$user = new User($conn);

if (!$auth->isLoggedIn()) {
    header("Location: login.php");
    exit();
}

$currentUser = $user->getUserById($_SESSION['user_id']);

?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>dashboard</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>

<body>

    <div>
        <h1> Bem-vindo, <?php echo htmlspecialchars($_SESSION['username']); ?></h1>
        <br><br>
        <img src="../uploads/<?php echo htmlspecialchars($currentUser['foto_perfil']); ?>" alt="Foto de Perfil" style="width: 150px; height: 150px; border-radius:50%;">
        <br>
        <div>
            <br>
            <a href="upload_foto.php"> Trocar Foto de Perfil</a>
            <br>
            <a href="logout.php">Sair</a>
            <br>
            <a href="index.php">Home</a>
        </div>
    </div>

</body>

</html>