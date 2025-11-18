<?php
include 'conexao.php';
$id = $_GET['id'];

$conn->query("DELETE FROM trens WHERE id=$id");

header("Location: trens_index.php");
?>