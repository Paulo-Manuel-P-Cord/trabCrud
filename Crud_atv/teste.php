<?php
session_start();
if (!isset($_SESSION['nome'])) {
    header("Location: login/login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administração</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
    body {
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        background-color: #567d5f; /* Um tom de verde mais escuro */
        color: #333; /* Um tom escuro de cinza para o texto */
    }

    .sidebar {
        position: fixed;
        top: 60px; /* Ajuste a altura da margem superior aqui */
        left: 0;
        bottom: 0;
        z-index: 100;
        padding-top: 4rem;
        background-color: #6e9b77; /* Um tom de verde escuro para a barra lateral */
        width: 250px;
        box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        transition: all 0.3s;
    }

    .sidebar ul.nav.flex-column {
        padding-left: 0;
        margin-bottom: 0;
        list-style: none;
    }

    .sidebar ul.nav.flex-column li.nav-item a.nav-link {
        color: #f8f9fa; /* Um tom claro para os links na barra lateral */
    }

    .sidebar ul.nav.flex-column li.nav-item a.nav-link:hover {
        background-color: #88b892; /* Um tom mais escuro de verde para destacar o hover */
    }

    .main-content {
        margin-left: 250px;
        padding: 20px;
        transition: all 0.3s;
    }

    .navbar {
        background-color: #6e9b77; /* Um tom de verde para a barra de navegação */
        box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
    }

    #navbardropmenu {
        background-color: #6e9b77; /* Um tom de verde para a barra de navegação */
        box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
    }

    .drophover:hover {
        background-color: #88b892; /* Um tom mais escuro de verde para destacar o hover */
    }

    .modal-content {
        background-color: #7ca887; /* Um tom de verde escuro para os modais */
        border: none;
        box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
    }

    .modal-header {
        border-bottom: none;
        background-color: #6e9b77; /* Um tom de verde para o cabeçalho do modal */
        color: #f8f9fa; /* Um tom claro para o texto no cabeçalho do modal */
    }

    .modal-footer {
        border-top: none;
        background-color: #6e9b77; /* Um tom de verde para o rodapé do modal */
        color: #f8f9fa; /* Um tom claro para o texto no rodapé do modal */
    }

    .sidebar-brand {
        color: #f8f9fa; /* Cor do texto do título na barra lateral */
        padding: 15px 20px;
        font-size: 24px;
        text-align: center;
    }

    .sidebar-brand img {
        width: 100px; /* Redimensionando a logo */
        display: block;
        margin: auto;
        margin-bottom: 15px; /* Adicionando um espaçamento abaixo da logo */
        border-radius: 50%; /* Tornando a logo redonda */
    }

    .sidebar ul.nav.flex-column li.nav-item {
        padding-top: 10px; /* Adicione um espaço de 10px acima de cada item */
        font-size: 20px;
    }

    .navbar {
        margin-top: 0; /* Remova a margem superior da barra de navegação */
    }

    .sidebar {
        position: fixed;
        top: 55px; /* Ajuste a altura da margem superior da barra lateral */
        left: 0;
        bottom: 0;
        z-index: 100;
        background-color: #6e9b77; /* Um tom de verde escuro para a barra lateral */
        width: 250px;
        box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        transition: all 0.3s;
    }

    .main-content {
    position: absolute;
    top: 60px; /* altura da navbar */
    left: 0px; /* largura da sidebar */
    right: 0;
    bottom: 0;
    padding: 7px;
    transition: all 0.3s;
}
</style>
</style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light fixed-top">
        <div class="container-fluid">
        <a class="navbar-brand" href="#">
                <img src="imgs/logo.png" alt="Logo do Zoológico" height="45"> Zoo Compass
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
                aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            <?php echo htmlspecialchars($_SESSION['nome']); ?>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" id="navbardropmenu" aria-labelledby="navbarDropdownMenuLink">
                            <li><a class="dropdown-item drophover" href="#" data-bs-toggle="modal"
                                    data-bs-target="#informacaoModal">Conta</a></li>
                            <li><a class="dropdown-item drophover" href="#" data-bs-toggle="modal"
                                    data-bs-target="#trocarSenhaModal">Trocar Senha</a></li>
                            <li><a class="dropdown-item drophover" href="#" data-bs-toggle="modal"
                                    data-bs-target="#excluirContaModal">Excluir Conta</a></li>

                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item drophover" href="login/logout.php">Sair</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
<div>
    <div class="sidebar">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="animais.php">Gerenciar Animais</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="estoque.php">Gerenciar Estoque</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="funcionarios.php">Gerenciar Funcionários</a>
            </li>
        </ul>
    </div>
    <div class="main-content">
            <p>rgergergergre</p>
    </div>
</div>
    <!-- Modals -->

    <!-- Informação Sobre Conta Modal -->
    <div class="modal fade" id="informacaoModal" tabindex="-1" aria-labelledby="informacaoModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="informacaoModalLabel">Informações da sua conta</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Conteúdo do modal -->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                    <button type="button" class="btn btn-primary">Salvar mudanças</button>
                </div>
            </div>
        </div>
    </div>

    <!-- TrocarSenha Modal -->
    <div class="modal fade" id="trocarSenhaModal" tabindex="-1" aria-labelledby="trocarSenhaModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="trocarSenhaModalLabel">Trocar Senha</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="trocar_senha.php" method="POST">
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="senhaAtual" class="form-label">Senha Atual</label>
                            <input type="password" class="form-control" id="senhaAtual" name="senha_atual" required>
                        </div>
                        <div class="mb-3">
                            <label for="novaSenha" class="form-label">Nova Senha</label>
                            <input type="password" class="form-control" id="novaSenha" name="nova_senha" required>
                        </div>
                        <div class="mb-3">
                            <label for="confirmarSenha" class="form-label">Confirmar Nova Senha</label>
                            <input type="password" class="form-control" id="confirmarSenha" name="confirmar_senha"
                                required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-primary">Salvar mudanças</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Excluir Conta Modal -->
    <div class="modal fade" id="excluirContaModal" tabindex="-1" aria-labelledby="excluirContaModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="excluirContaModalLabel">Excluir Conta</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="excluir_conta.php" method="POST">
                    <div class="modal-body">
                        <p>Tem certeza que deseja excluir sua conta? Esta ação não pode ser desfeita.</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-danger">Excluir</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- JavaScript do Bootstrap e dependências -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"></script>

