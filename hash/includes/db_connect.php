<?php

    $servername = "localhost";
    $username = "root";
    $password = "root";
    $db = "railtrack_db";

    try {
        $conn = new PDO("mysql: host=$servername;dbname=$dbname", $username, $password);
        $conn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch(PDOException $e){
        echo "Conexão falhou, erro: " . $e->getMessage();
    }

?>