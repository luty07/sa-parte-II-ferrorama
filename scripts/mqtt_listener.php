<?php
require("phpMQTT.php"); 
require("conexao.php");  

use Bluerhinos\phpMQTT;

$server = "f518a08331f047ffaba17f3a43c5066c.s1.eu.hivemq.cloud"; 
$port = 8883;
$username = "placa2-helena"; 
$password = "Helena2025";   
$client_id = "railtrack_php_client_" . rand();

$mqtt = new phpMQTT($server, $port, $client_id);

if(!$mqtt->connect(true, NULL, $username, $password)){
    exit("Falha ao conectar ao broker MQTT\n");
}

echo "Conectado ao broker!\n";

$topics = [
    "railtrack/sensores/S1" => ["qos" => 0, "function" => null],
    "railtrack/sensores/s2" => ["qos" => 0, "function" => null],
    "railtrack/sensores/S3" => ["qos" => 0, "function" => null],
    "railtrack/sensores/S4" => ["qos" => 0, "function" => null],
];

$callback = function($topic, $msg){
    global $conn_sens;

    echo "Mensagem recebida no tópico [$topic]: $msg\n";

    $data = json_decode($msg, true); 

    if($data === null){
        echo "Erro: JSON inválido\n";
        return;
    }

  
    if(!isset($data['id_sensor']) || !isset($data['valor']) || !isset($data['timestamp'])){
        echo "Mensagem incompleta, ignorada\n";
        return;
    }

    $stmt = $conn_sens->prepare("INSERT INTO dados (id_sensor, valor, data_hora) VALUES (?, ?, ?)");
    $stmt->bind_param("ids", $data['id_sensor'], $data['valor'], $data['timestamp']);

    if($stmt->execute()){
        echo "Dados salvos com sucesso!\n";
    } else {
        echo "Erro ao salvar no banco: " . $stmt->error . "\n";
    }

    $stmt->close();
};

foreach($topics as $t => $v){
    $topics[$t]["function"] = $callback;
}


$mqtt->subscribe($topics);

while($mqtt->proc()){
  
}

$mqtt->close();
?>