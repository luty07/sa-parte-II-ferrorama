<?php
include 'conexao.php';

$result = $conn->query("SELECT * FROM trens");
?>

<!DOCTYPE html>
<html>
<head>
    <title>RailTrack - Trens</title>
</head>
<body>
<h2>Trens Cadastrados</h2>
<a href="trens_create.php">Adicionar Trem</a>
<table border="1" cellpadding="5">
    <tr>
        <th>ID</th>
        <th>Código</th>
        <th>Modelo</th>
        <th>Capacidade</th>
        <th>Ações</th>
    </tr>
    <?php while($row = $result->fetch_assoc()) { ?>
    <tr>
        <td><?php echo $row['id']; ?></td>
        <td><?php echo $row['codigo']; ?></td>
        <td><?php echo $row['modelo']; ?></td>
        <td><?php echo $row['capacidade']; ?></td>
        <td>
            <a href="trens_update.php?id=<?php echo $row['id']; ?>">Editar</a> |
            <a href="trens_delete.php?id=<?php echo $row['id']; ?>" onclick="return confirm('Excluir este trem?')">Excluir</a>
        </td>
    </tr>
    <?php } ?>
</table>
</body>
</html>