<?php

session_start();

if ($_SESSION['admin'] !== true) {
    header('Location: ../login/login.php');
    exit;
}

include_once '../database/conexao.php';

// Query para obter as informações do usuário
$sql = "SELECT * FROM usuarios WHERE nome = :nome";
$stmt = $conn->prepare($sql);
$stmt->bindParam(':nome', $_SESSION['nome']);
$stmt->execute();
$user = $stmt->fetch(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administração</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../require/style.css">
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="admin.php">
                <img src="../imgs/logo.png" alt="Logo do Zoológico" height="45"> Zoo Compass
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav ms-auto">

                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="admin_animais.php">Gerenciar Animais</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="admin_estoque.php">Gerenciar Estoque</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="admin_funcionarios.php">Gerenciar Funcionários</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <?php echo ($_SESSION['nome']); ?>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" id="navbardropmenu" aria-labelledby="navbarDropdownMenuLink">
                            <li><a class="dropdown-item drophover" href="#" data-bs-toggle="modal" data-bs-target="#informacaoModal">Conta</a></li>
                            <li><a class="dropdown-item drophover" href="#" data-bs-toggle="modal" data-bs-target="#trocarSenhaModal">Trocar Senha</a></li>
                            <li><a class="dropdown-item drophover" href="#" data-bs-toggle="modal" data-bs-target="#excluirContaModal">Excluir Conta</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item drophover" href="../login/logout.php">Sair</a></li>
                            <li><a class="dropdown-item drophover" href="../index.php">Modo Usuário</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="main-content" style="left: 0;">
        <div class="d-flex justify-content-center pt-4">
            <?php
            if (isset($_GET['success']) && $_GET['success'] === 'senha') {
                echo '<div style="font-size: 18px" id="alerta-erro" class="alert alert-danger alert-dismissible fade show col-sm-9 col-md-7 col-lg-3 text-center" role="alert">
                    <span id="mensagem-erro">Tenha certeza de colocar a senha correta</span>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close" onclick="fecharAlerta(\'alerta-erro\')"></button>
                </div>';
            }
            ?>
        </div>

        <style>
            .modal-header,
            .modal-footer {
                background-color: #445f48;
                /* Ajustando fundo do cabeçalho e rodapé dos modais */
                color: #ffffff;
                /* Texto branco para contraste */
            }

            .modal-body {
                background-color: #567d5f;
                /* Fundo Principal dos modais */
                color: #ffffff;
                /* Texto branco para contraste */
            }
        </style>
</body>

</html>