<?php
session_start();
require '../database/conexao.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $senha_atual = $_POST['senha_atual'];
    $nova_senha = $_POST['nova_senha'];
    $confirmar_senha = $_POST['confirmar_senha'];

    if ($nova_senha !== $confirmar_senha) {
        header("Location: ../gerenciadores/admin.php?status=error&message=Senhas não coincidem.");
        exit();
    }

    $nome = $_SESSION['nome'];
    $sql = "SELECT senha FROM usuarios WHERE nome = ?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$nome]);
    $senha_db = $stmt->fetchColumn();

    if ($senha_atual === $senha_db) {
        $sql = "UPDATE usuarios SET senha = ? WHERE nome = ?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$nova_senha, $nome]);

        $redirect_url = $_SESSION['admin'] ? "../gerenciadores/admin.php?status=success&message=Senha trocada com sucesso." : "../index.php?status=success&message=Senha trocada com sucesso.";
        header("Location: $redirect_url");
    } else {
        $redirect_url = $_SESSION['admin'] ? "../gerenciadores/admin.php?status=error&message=Senha atual incorreta." : "../index.php?status=error&message=Senha atual incorreta.";
        header("Location: $redirect_url");
        exit('Senha atual incorreta.');
    }
    exit();
}
?>
