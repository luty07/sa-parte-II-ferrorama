<?php
include 'conexao.php';
$id = $_GET['id'];

$result = $conn->query("SELECT * FROM trens WHERE id=$id");
$row = $result->fetch_assoc();

if(isset($_POST['submit'])) {
    $codigo = $_POST['codigo'];
    $modelo = $_POST['modelo'];
    $capacidade = $_POST['capacidade'];

    $sql = "UPDATE trens SET codigo='$codigo', modelo='$modelo', capacidade=$capacidade WHERE id=$id";
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
    <title>Editar Trem</title>
</head>
<body>
<h2>Editar Trem</h2>
<form method="post">
    Código: <input type="text" name="codigo" value="<?php echo $row['codigo']; ?>" required><br><br>
    Modelo: <input type="text" name="modelo" value="<?php echo $row['modelo']; ?>"><br><br>
    Capacidade: <input type="number" name="capacidade" value="<?php echo $row['capacidade']; ?>"><br><br>
    <input type="submit" name="submit" value="Atualizar">
</form>
<a href="trens_index.php">Voltar</a>
</body>
</html>