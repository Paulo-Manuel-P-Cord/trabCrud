<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Usuário</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>

    <!-- Estilo personalizado -->
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="container">
        <div class="row d-flex justify-content-center align-items-center min-vh-100">
            <div class="col-md-6">
                <?php
                if (isset($_GET['error']) && $_GET['error'] === 'emailErro') {
                    echo '<div id="alerta-erro" class="alert alert-danger alert-dismissible fade show" role="alert">
            <span id="mensagem-erro">Email Já está em uso. Por favor, tente novamente.</span>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close" onclick="fecharAlerta(\'alerta-erro\')"></button>
        </div>';
                }
                if (isset($_GET['error']) && $_GET['error'] === 'cellErro') {
                    echo '<div id="alerta-erro" class="alert alert-danger alert-dismissible fade show" role="alert">
            <span id="mensagem-erro">Numero de Celular Já está em uso. Por favor, tente novamente.</span>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close" onclick="fecharAlerta(\'alerta-erro\')"></button>
        </div>';
                }
                if (isset($_GET['error']) && $_GET['error'] === 'cpfErro') {
                    echo '<div id="alerta-erro" class="alert alert-danger alert-dismissible fade show" role="alert">
            <span id="mensagem-erro">CPF Já está em uso. Por favor, tente novamente.</span>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close" onclick="fecharAlerta(\'alerta-erro\')"></button>
        </div>';
                }
                ?>
                <form method="POST" class="needs-validation" id="formulario" novalidate action="../verify/cadastro.php">
                    <h1>Cadastro de Usuário</h1>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="nome" class="form-label">Nome completo*</label>
                            <input type="text" class="form-control" id="nome" name="nome" placeholder="Digite seu nome completo" required>
                            <div class="invalid-feedback">
                                Por favor, insira seu nome.
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="senha" class="form-label">Senha*</label>
                            <input type="password" class="form-control" id="senha" name="senha" placeholder="Digite sua senha" minlength="6" required>
                            <div class="invalid-feedback">
                                A senha deve ter pelo menos 6 caracteres.
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="email" class="form-label">Email*</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="Digite seu email" required>
                            <div class="invalid-feedback">
                                Por favor, insira um endereço de email válido.
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="cell" class="form-label">Celular*</label>
                            <input type="text" class="form-control" id="cell" name="cell" placeholder="Digite seu celular" minlength="15" onkeypress="$(this).mask('(00) 00000-0000')" required>
                            <div class="invalid-feedback">
                                Por favor, insira um número de celular válido.
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="cpf" class="form-label">CPF*</label>
                        <input type="text" class="form-control" id="cpf" name="cpf" placeholder="Digite seu CPF" minlength="14" onkeypress="$(this).mask('000.000.000-00')" required>
                        <div class="invalid-feedback">
                            Por favor, insira um CPF válido.
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="data_nascimento" class="form-label">Data de Nascimento*</label>
                        <input type="date" class="form-control" id="data_nascimento" name="data_nascimento" required>
                        <div class="invalid-feedback">
                            Por favor, insira sua data de nascimento.
                        </div>
                    </div>
                    <input type="submit" name="submit" class="btn btn-primary btn-cadastrar">
                    <p class="text-center mt-3 mb-0">Já tem uma conta? <a href="../login/login.php" class="link-cadastro">Faça login aqui</a></p>
                </form>
            </div>
        </div>
    </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- JavaScript para validação -->
    <script src="script.js"></script>
</body>

</html>