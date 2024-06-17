<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container-fluid">
    <div class="row d-flex justify-content-center align-items-center min-vh-100">
        <div class="col-sm-9 col-md-7 col-lg-4">
            <div id="login-section" class="p-3 rounded shadow">
            <?php 
    if (isset($_GET['success']) && $_GET['success'] === 'no') {
        echo '<div id="alerta-erro" class="alert alert-danger alert-dismissible fade show" role="alert">
            <span id="mensagem-erro">Email ou senha incorretos. Por favor, tente novamente.</span>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close" onclick="fecharAlerta(\'alerta-erro\')"></button>
        </div>';
    }
?>
                <div id="logo-section" class="d-flex align-items-center justify-content-center mb-3">
                    <img src="../imgs/logo.png" alt="Logo do Zoológico" class="img-fluid me-2" style="height: 100px;">
                    <h1 class="mb-0">Zoo Compass</h1>
                </div>
                <form method="POST" class="needs-validation " novalidate  id="formulario"  action="../verify/logar.php">
                    <h2 class="text-center mb-4">Login</h2>
                    <div class="mb-3">
                        <input class="form-control" id="nome" name="email" type="text" placeholder="Email" required>
                        <div class="invalid-feedback">Por favor, insira seu Email.</div>
                    </div>
                    <div class="mb-3">
                        <input class="form-control" id="senha" name="senha" type="password" placeholder="Senha" required>
                        <div class="invalid-feedback">Por favor, insira sua senha.</div>
                    </div>
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <input class="btn btn-primary" type="submit" value="Entrar" name="submit">
                        <div class="form-check">
                            <input class="form-check-input" novalidate type="checkbox" id="mostrarSenha" onclick="msenha()">
                            <label class="form-check-label" novalidate for="mostrarSenha">Mostrar senha</label>
                        </div>
                    </div>
                    <p class="text-center mb-0">Ainda não tem uma conta? <a href="../cadastro/cadastro.php" class="link-cadastro">Cadastre-se aqui</a></p>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"></script>
<script src="script.js"></script>
</body>
</html>
