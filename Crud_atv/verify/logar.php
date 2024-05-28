<?php
session_start();

if (isset($_POST['submit'])) {
    if (isset($_POST['nome']) && !empty($_POST['nome']) && isset($_POST['senha']) && !empty($_POST['senha'])) {
        require '../database/conexao.php';
        $nome = $_POST['nome'];
        $senha = $_POST['senha'];

        echo "Nome: $nome, Senha: $senha <br>";

        $sql = 'SELECT * FROM usuarios WHERE nome = :nome AND senha = :senha';
        $resultado = $conn->prepare($sql);
        $resultado->bindValue(':nome', $nome);
        $resultado->bindValue(':senha', $senha);
        $resultado->execute();

        if ($resultado->rowCount() > 0) {
            $dado = $resultado->fetch();
            $_SESSION['id'] = $dado['id'];
            $_SESSION['nome'] = $dado['nome'];
            $_SESSION['cargo'] = $dado['cargo'];

            if ($dado['cargo'] == 1) {
                header('Location: ../admin.php');
            } else {
                header('Location: ../index.php');
            }
            exit;
        } else {
            header('Location: ../login/login.php?success=no');
            exit;
        }
    }
}
?>
