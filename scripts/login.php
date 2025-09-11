<?php
$host="localhost";
$user="root";
$password="root";
$db ="Nome do banco de dados";

$mysqli=new mysqli($host, $user, $password, $db);

if($mysqli>connect_error) {
    die("Falha na conexão:".$mysqli->connect_error);
}

$errorEmail="";
$erroSenha="";

if($_SERVER["REQUEST_METHOD"]=="POST"){

    $email=trim($_POST["email"]);
    $senha=trim($_POST["senha"]);
}

if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
    $erroEmail="E-mai inválido.";
    $valido=false;
}

if(strlen($senha)<6){
    $erroSenha+"A senha deve ter pelo menos 6 caracteres.";
    $valido:false;
}

  if ($valido) {
        
        $stmt = $mysqli->prepare("SELECT id, senha FROM usuarios WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $resultado = $stmt->get_result();
  }
