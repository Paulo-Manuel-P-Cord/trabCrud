<?php
session_start();
require '../database/conexao.php'; // Adiciona o arquivo de conexão com o banco de dados

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $senha_atual = $_POST['senha_atual'];
    $nova_senha = $_POST['nova_senha'];
    $confirmar_senha = $_POST['confirmar_senha'];

    if ($nova_senha !== $confirmar_senha) {
        header("Location: ../gerenciadores/admin.php?success=senha");
    }
    $nome = $_SESSION['nome'];
    $sql = "SELECT senha FROM usuarios WHERE nome = ?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$nome]);
    $senha_db = $stmt->fetchColumn();

    // Debug: Verificar o tipo de dados e valores
    var_dump($senha_atual);
    var_dump($senha_db);
    echo "<br>";

    if ($senha_atual === $senha_db) { // Comparação simples de senhas em texto plano
        $sql = "UPDATE usuarios SET senha = ? WHERE nome = ?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$nova_senha, $nome]);

        if($_SESSION['admin'] = true){
            header("Location:../gerenciadores/admin.php");
        }else{
        header("Location: ../index.php");
        }
    } else {
        if($_SESSION['admin'] = true){
            header('location: ../gerenciadores/admin.php?');
        die('Senha atual incorreta.');
    }
    }}
?>
