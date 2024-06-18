<?php
session_start();
require 'database/conexao.php'; 

$nome = $_SESSION['nome'];
$sql = "DELETE FROM usuarios WHERE nome = ?";
$stmt = $conn->prepare($sql);
$stmt->execute([$nome]);

session_destroy();

echo 'Conta excluída com sucesso.';
header("Location: login/login.php");
exit;
?>
