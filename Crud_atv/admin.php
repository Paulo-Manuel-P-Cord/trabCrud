<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administração</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            overflow-x: hidden; /* Evita rolagem horizontal */
        }

        .sidebar {
            position: fixed;
            top: 0;
            left: 0;
            bottom: 0;
            z-index: 100; /* Z-index para colocar a sidebar sobre o conteúdo */
            padding: 56px 0 0; /* Espaçamento superior e inferior, compensa a barra de navegação */
            background-color: #f8f9fa;
            width: 250px; /* Largura da sidebar */
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }

        .sidebar ul.nav flex-column {
            padding-left: 0;
            margin-bottom: 0;
            list-style: none;
        }

        .sidebar ul.nav.flex-column li.nav-item a.nav-link {
            color: #343a40;
        }

        .sidebar ul.nav.flex-column li.nav-item a.nav-link:hover {
            background-color: #dee2e6;
        }

        .main-content {
            margin-left: 250px; /* Ajusta o conteúdo principal para acomodar a sidebar */
            padding: 20px;
        }

        @media (max-width: 768px) {
            .main-content {
                margin-left: 0; /* Para telas menores, remove a margem */
            }
        }
    </style>
</head>

<body>
    <?php
    session_start();
    if (!isset($_SESSION['nome'])) {
        header("Location: login/login.php");
        exit;
    }
    ?>

    <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Zoo Conpass</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <?php echo htmlspecialchars($_SESSION['nome']); ?>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownMenuLink">
                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#informacaoModal">Conta</a></li>
                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#trocarSenhaModal">Trocar Senha</a></li>
                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#excluirContaModal">Excluir Conta</a></li>

                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="login/logout.php">Sair</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

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
        <div class="container mt-5">
            <div class="row">
                <div class="col-md-4">
                    <div class="card text-center">
                        <div class="card-header">
                            Animais
                        </div>
                        <div class="card-body">
                            <p class="card-text">Gerencie os animais do zoológico.</p>
                            <a href="animais.php" class="btn btn-primary">Abrir</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card text-center">
                        <div class="card-header">
                            Estoque
                        </div>
                        <div class="card-body">
                            <p class="card-text">Gerencie o estoque do zoológico.</p>
                            <a href="estoque.php" class="btn btn-primary">Abrir</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card text-center">
                        <div class="card-header">
                            Funcionários
                        </div>
                        <div class="card-body">
                            <p class="card-text">Gerencie os funcionários do zoológico.</p>
                            <a href="funcionarios.php" class="btn btn-primary">Abrir</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Modals -->

    <!-- Informação Sobre Conta Modal -->
    <div class="modal fade" id="informacaoModal" tabindex="-1" aria-labelledby="informacaoModalLabel" aria-hidden="true">
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
       





    <!-- Trocar Senha Modal -->
    <div class="modal fade" id="trocarSenhaModal" tabindex="-1" aria-labelledby="trocarSenhaModalLabel" aria-hidden="true">
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
                            <input type="password" class="form-control" id="confirmarSenha" name="confirmar_senha" required>
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
    <div class="modal fade" id="excluirContaModal" tabindex="-1" aria-labelledby="excluirContaModalLabel" aria-hidden="true">
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

    


</body>

</html>