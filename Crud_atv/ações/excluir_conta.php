<?php
session_start();
require 'database/conexao.php'; // Adiciona o arquivo de conexão com o banco de dados

$nome = $_SESSION['nome'];
$sql = "DELETE FROM usuarios WHERE nome = ?";
$stmt = $conn->prepare($sql); // Usa a variável $conn do arquivo de conexão
$stmt->execute([$nome]);

session_destroy();

echo 'Conta excluída com sucesso.';
header("Location: login/login.php");
exit;
?>
