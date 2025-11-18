<?php
$host = "localhost";
$user = "root";
$pass = "";

$db_rail = "railtrack_db";
$conn_rail = new mysqli($host, $user, $pass, $db_rail);
if ($conn_rail->connect_error) {
    die("Falha na conexão com RailTrack: " . $conn_rail->connect_error);
}

$db_sens = "sensores";
$conn_sens = new mysqli($host, $user, $pass, $db_sens);
if ($conn_sens->connect_error) {
    die("Falha na conexão com Sensores: " . $conn_sens->connect_error);
}