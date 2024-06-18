<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zoo Conpass</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
            padding-top: 56px;
        }
        .hero-section {
            background: url('imgs/teste.jpg') no-repeat center center;
            background-size: cover;
            color: white;
            text-align: center;
            padding: 100px 0;
        }
        .hero-section h1 {
            font-size: 4rem;
        }
        .section {
            padding: 60px 0;
        }
        .navbar-light .navbar-nav .nav-link {
            color: white;
        }
        .navbar-light .navbar-nav .nav-link:hover {
            color: #b3e5cc;
        }
        .navbar-light .navbar-brand {
            color: white;
        }
        .navbar-light .navbar-brand:hover {
            color: #b3e5cc;
        }
        .footer {
            background: #2e7d32;
            padding: 20px 0;
            text-align: center;
            color: white;
        }
        .btn-primary {
            background-color: #388e3c;
            border-color: #388e3c;
        }
        .btn-primary:hover {
            background-color: #2e7d32;
            border-color: #2e7d32;
        }
        .bg-light {
            background-color: #f0f4c3 !important;
        }
        .navbar-light .navbar-toggler {
            border-color: rgba(255, 255, 255, 0.1);
        }
        .navbar-light .navbar-toggler-icon {
            background-image: url("data:image/svg+xml;charset=utf8,%3Csvg viewBox='0 0 30 30' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath stroke='rgba%28255, 255, 255, 0.5%29' stroke-width='2' stroke-linecap='round' stroke-miterlimit='10' d='M4 7h22M4 15h22M4 23h22'/%3E%3C/svg%3E");
        }
    </style>
</head>
<body>
<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: login/login.php");
    exit;
}
?>
    <nav class="navbar navbar-expand-lg navbar-light bg-success fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Zoo Conpass</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="#home">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="#animals">Animais</a></li>
                    <li class="nav-item"><a class="nav-link" href="#events">Eventos</a></li>
                    <li class="nav-item"><a class="nav-link" href="#contact">Contato</a></li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <?php echo htmlspecialchars($_SESSION['nome']); ?>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownMenuLink">
                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#trocarSenhaModal">Trocar Senha</a></li>
                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#excluirContaModal">Excluir Conta</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="login/logout.php">Sair</a></li>
                            <?php
                            if ($_SESSION['cargo'] == 1){
                                echo "<li><a class='dropdown-item' href='gerenciadores/admin.php'>Modo Admin</a></li>";
                            }
                            ?>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
<section id="home" class="hero-section">
    <div class="container">
        <h1>Bem-vindo ao Zoo Conpass</h1>
        <p>Venha descobrir o mundo dos animais conosco!</p>
    </div>
</section>
<section id="animals" class="section bg-light">
    <div class="container">
        <h2 class="text-center">Nossos Animais</h2>
        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <img src="imgs/leao.jpg" class="card-img-top" alt="Leão">
                    <div class="card-body">
                        <h5 class="card-title">Leão</h5>
                        <p class="card-text">O rei da selva!</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <img src="imgs/elefante.jpg" class="card-img-top" alt="Elefante">
                    <div class="card-body">
                        <h5 class="card-title">Elefante</h5>
                        <p class="card-text">O gigante gentil.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <img src="imgs/girafa.jpg" class="card-img-top" alt="Girafa">
                    <div class="card-body">
                        <h5 class="card-title">Girafa</h5>
                        <p class="card-text">O animal mais alto do mundo.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section id="events" class="section">
    <div class="container">
        <h2 class="text-center">Eventos</h2>
        <p class="text-center">Fique por dentro dos nossos próximos eventos.</p>
        <ul class="list-group">
            <li class="list-group-item">Passeio noturno - 24 de Junho</li>
            <li class="list-group-item">Encontro com os cuidadores - 1 de Julho</li>
            <li class="list-group-item">Dia da alimentação dos animais - 8 de Julho</li>
        </ul>
    </div>
</section>
<section id="contact" class="section bg-light">
    <div class="container">
        <h2 class="text-center">Contato</h2>
        <p class="text-center">Entre em contato conosco para mais informações.</p>
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <form>
                    <div class="mb-3">
                        <label for="name" class="form-label">Nome</label>
                        <input type="text" class="form-control" id="name" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" required>
                    </div>
                    <div class="mb-3">
                        <label for="message" class="form-label">Mensagem</label>
                        <textarea class="form-control" id="message" rows="4" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Enviar</button>
                </form>
            </div>
        </div>
    </div>
</section>
<footer class="footer">
    <div class="container">
        <p>&copy; 2024 Zoo Conpass. Todos os direitos reservados.</p>
    </div>
</footer>
<!-- Modals -->
<div class="modal fade" id="trocarSenhaModal"  tabindex="-1" aria-labelledby="trocarSenhaModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content" style="background-color: #f0f4c3">
            <div class="modal-header">
                <h5 class="modal-title" id="trocarSenhaModalLabel">Trocar Senha</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="ações/trocar_senha.php?cargo=1" method="POST">
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
<div class="modal fade" id="excluirContaModal" tabindex="-1" aria-labelledby="excluirContaModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content" style="background-color: #f0f4c3">
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
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"></script>
</body>
</html>
