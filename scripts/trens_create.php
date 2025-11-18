<?php
include 'conexao.php';

if(isset($_POST['submit'])) {
    $codigo = $_POST['codigo'];
    $modelo = $_POST['modelo'];
    $capacidade = $_POST['capacidade'];

    $sql = "INSERT INTO trens (codigo, modelo, capacidade) VALUES ('$codigo', '$modelo', $capacidade)";
    if($conn->query($sql)) {
        header("Location: trens_index.php");
    } else {
        echo "Erro: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Adicionar Trem</title>
</head>
<body>
<h2>Adicionar Trem</h2>
<form method="post">
    Código: <input type="text" name="codigo" required><br><br>
    Modelo: <input type="text" name="modelo"><br><br>
    Capacidade: <input type="number" name="capacidade"><br><br>
    <input type="submit" name="submit" value="Salvar">
</form>
<a href="trens_index.php">Voltar</a>
</body>
</html>