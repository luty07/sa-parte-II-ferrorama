<?php

include "../includes/db_connect.php";
include "../src/User.php";

session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$user = new User($conn);
$currentUser = $user -> getUserById($_SESSION['user_id']);

if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES["foto_perfil"])){
    $target_dir = "../uploads/";
    $target_file = $target_dir . basename($_FILES["foto_perfil"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    $check = getimagesize($_FILES["foto_perfil"]["tmp_name"]);
    if ($check !== false){
        $uploadOK = 1;
    }else{
        echo "O arquivo não é uma imagem.";
        $uploadOK = 0;
    }

    if($_FILES["foto_perfil"]["size"] > 500000){
        echo " Imagem muito pesada para o sistema. ";
        $uploadOk = 0;
    }

    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"){
        echo(" Desculpe, só aceitamos JPG, JPEG e PNG. ");
        $uploadOk = 0;
    }

    if ($uploadOk == 0){
        echo "Desculpe seu arquivo não foi enviado.";
    }else{
        if(move_uploaded_file($_FILES["foto_perfil"]["tmp_name"], $target_file)){
            $user -> updateProfilePic($_SESSION['user_id'], basename($_FILES['foto_perfil']["name"]));
            header("Location: dashboard.php");

        }else{
            echo "Desculpa houve algum erro no envio.";
        }
    }


}


?>




<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload de Foto de Perfil</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>

<body>
    
    <form action="upload_foto.php" method="POST" enctype="multipart/form-data">

        <h2>Upload de Foto:</h2>
        <input type="file" name="foto_perfil" required>
        <button type="submit">Upload</button>

        <br>
        <a href="index.php">Home</a>
    </form>

</body>