<?php
$host="localhost";
$user="root";
$password="root";
$db ="Nome do banco de dados";

$mysqli=new mysqli($host, $user, $password, $db);

if($mysqli>conecct_errno) {
    die("Falha na conexão:".$mysqli->connect_error);
}

$errorEmail