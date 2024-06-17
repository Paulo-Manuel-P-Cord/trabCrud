<?php
session_start();

// Verifica se o formulário foi submetido
if (isset($_POST['submit'])) {
    // Verifica se os campos de e-mail e senha foram preenchidos
    if (isset($_POST['email']) && !empty($_POST['email']) && isset($_POST['senha']) && !empty($_POST['senha'])) {
        require '../database/conexao.php';
        $email = $_POST['email'];
        $senha = $_POST['senha'];

        // Verifica o e-mail e a senha no banco de dados
        $sql = 'SELECT * FROM usuarios WHERE email = :email AND senha = :senha';
        $resultado = $conn->prepare($sql);
        $resultado->bindValue(':email', $email);
        $resultado->bindValue(':senha', $senha);
        $resultado->execute();

        // Se encontrar um usuário com o e-mail e senha fornecidos
        if ($resultado->rowCount() > 0) {
            $dado = $resultado->fetch();
            $_SESSION['id'] = $dado['id'];
            $_SESSION['nome'] = $dado['nome'];
            $_SESSION['cargo'] = $dado['cargo'];

            // Verifica o cargo do usuário
            if ($dado['cargo'] == 1) {
                // Se for administrador, define a sessão 'admin' como true
                $_SESSION['admin'] = true;
                header('Location: ../gerenciadores/admin.php');
            } elseif ($dado['cargo'] == 0) {
                // Se for um usuário comum, define a sessão 'admin' como false
                $_SESSION['admin'] = false;
                header('Location: ../index.php');
            }
            exit;
        } else {
            // Se não encontrar o usuário, redireciona de volta para a página de login
            header('Location: ../login/login.php?success=no');
            exit;
        }
    } else {
        // Se os campos de e-mail e senha não foram preenchidos, redireciona de volta para a página de login
        header('Location: ../login/login.php?success=no');
        exit;
    }
}

// Se não houver submissão de formulário, verifica se o usuário está autenticado e é um administrador
if (!isset($_SESSION['nome']) || $_SESSION['cargo'] != 1) {
    // Se não estiver autenticado como administrador, redireciona de volta para a página de login
    header("Location: ../login/login.php");
    exit;
}
?>
