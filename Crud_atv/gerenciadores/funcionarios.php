<?php
require '../database/conexao.php';
require '../require/part1.php';
?>

<div class="container ">
    <div class="d-flex">
        <h2 class="mb-4">Gerenciar Funcionários</h2>
        <?php
        // alerta funcionario adicionar
        if (isset($_GET['sucesso']) && $_GET['sucesso'] === 'S') {
            echo '<div id="alerta-erro" class="alert alert-success alert-dismissible fade show col-lg-4" style="margin-left: 10px;" role="alert">
                <span>Funcionário adicionado com sucesso</span>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close" onclick="fecharAlerta(\'alerta-erro\')"></button>
                </div>';
        }
        if (isset($_GET['sucesso']) && $_GET['sucesso'] === 'N') {
            echo '<div id="alerta-erro" class="alert alert-danger alert-dismissible fade show col-lg-4" style="margin-left: 10px;" role="alert">
                <span>Funcionário não foi adicionado</span>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close" onclick="fecharAlerta(\'alerta-erro\')"></button>
                </div>';
        }
        // alerta funcionario deletar
        if (isset($_GET['sucesso']) && $_GET['sucesso'] === 'SD') {
            echo '<div id="alerta-erro" class="alert alert-success alert-dismissible fade show col-lg-4" style="margin-left: 10px;" role="alert">
                <span>Funcionário deletado com sucesso</span>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close" onclick="fecharAlerta(\'alerta-erro\')"></button>
                </div>';
        }
        if (isset($_GET['sucesso']) && $_GET['sucesso'] === 'ND') {
            echo '<div id="alerta-erro" class="alert alert-danger alert-dismissible fade show col-lg-4" style="margin-left: 10px;" role="alert">
                <span>Não foi possível deletar funcionário</span>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close" onclick="fecharAlerta(\'alerta-erro\')"></button>
                </div>';
        }
        // alerta funcionario atualizar
        if (isset($_GET['sucesso']) && $_GET['sucesso'] === 'SE') {
            echo '<div id="alerta-erro" class="alert alert-success alert-dismissible fade show col-lg-4" style="margin-left: 10px;" role="alert">
                <span>Funcionário foi atualizado com sucesso</span>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close" onclick="fecharAlerta(\'alerta-erro\')"></button>
                </div>';
        }
        if (isset($_GET['sucesso']) && $_GET['sucesso'] === 'NE') {
            echo '<div id="alerta-erro" class="alert alert-danger alert-dismissible fade show col-lg-4" style="margin-left: 10px;" role="alert">
                <span>Não foi possível atualizar funcionário</span>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close" onclick="fecharAlerta(\'alerta-erro\')"></button>
                </div>';
        }
        ?>
    </div>
    <!-- Voltar -->
    <a class="btn btn-primary mb-4" href="admin_funcionarios.php">Voltar</a>
    <!-- Adicionar Funcionário -->
    <button class="btn btn-primary mb-4" data-bs-toggle="modal" data-bs-target="#adicionarFuncionarioModal">Adicionar Funcionário</button>

    <!-- Visualizar Funcionários -->
    <div class="table-responsive">
        <table class="table table-success table-bordered ">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Email</th>
                    <th>Celular</th>
                    <th>Cargo</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Obter dados dos funcionários
                $sql = "SELECT * FROM funcionarios";
                $stmt = $conn->query($sql);
                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    echo "<tr>
                            <td>{$row['id']}</td>
                            <td>{$row['nome']}</td>
                            <td>{$row['email']}</td>
                            <td>{$row['cell']}</td>
                            <td>{$row['cargo']}</td>
                            <td>
                                <button class='btn btn-primary btn-sm' data-bs-toggle='modal' data-bs-target='#editarFuncionarioModal{$row['id']}'>Editar</button>
                                <button class='btn btn-danger btn-sm' data-bs-toggle='modal' data-bs-target='#deletarFuncionarioModal{$row['id']}'>Deletar</button>
                            </td>
                          </tr>";

                    // Modal para editar funcionário
                    echo "<div class='modal fade' id='editarFuncionarioModal{$row['id']}' tabindex='-1' aria-labelledby='editarFuncionarioModalLabel{$row['id']}' aria-hidden='true'>
                            <div class='modal-dialog'>
                                <div class='modal-content bg-primary'>
                                    <div class='modal-header' style='border-bottom-width: 0px;'>
                                        <h5 class='modal-title' id='editarFuncionarioModalLabel{$row['id']}'>Editar Funcionário</h5>
                                        <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                                    </div>
                                    <form action='../ações/editar_funcionario.php' method='POST'>
                                        <div class='modal-body'>
                                            <input type='hidden' name='id' value='{$row['id']}'>
                                            <div class='mb-3'>
                                                <label for='nome' class='form-label'>Nome</label>
                                                <input type='text' class='form-control' id='nome' name='nome' value='{$row['nome']}' required>
                                            </div>
                                            <div class='mb-3'>
                                                <label for='email' class='form-label'>Email</label>
                                                <input type='email' class='form-control' id='email' name='email' value='{$row['email']}' required>
                                            </div>
                                            <div class='mb-3'>
                                                <label for='cell' class='form-label'>Celular</label>
                                                <input type='text' class='form-control' id='cell' name='cell' value='{$row['cell']}' required>
                                            </div>
                                            <div class='mb-3'>
                                                <label for='cargo' class='form-label'>Cargo</label>
                                                <input type='text' class='form-control' id='cargo' name='cargo' value='{$row['cargo']}' required>
                                            </div>
                                        </div>
                                        <div class='modal-footer' style='border-top-width: 0px;'>
                                            <button type='button' class='btn btn-danger' data-bs-dismiss='modal'>Cancelar</button>
                                            <button type='submit' class='btn btn-primary'>Salvar mudanças</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                          </div>";

                    // Modal para deletar funcionário
                    echo "<div class='modal fade' id='deletarFuncionarioModal{$row['id']}' tabindex='-1' aria-labelledby='deletarFuncionarioModalLabel{$row['id']}' aria-hidden='true'>
                            <div class='modal-dialog'>
                                <div class='modal-content bg-primary'>
                                    <div class='modal-header' style='border-bottom-width: 0px;'>
                                        <h5 class='modal-title' id='deletarFuncionarioModalLabel{$row['id']}'>Deletar Funcionário</h5>
                                        <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                                    </div>
                                    <div class='modal-body'>
                                        Tem certeza que deseja deletar o funcionário {$row['nome']}?
                                    </div>
                                    <div class='modal-footer' style='border-top-width: 0px;'>
                                        <button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>Cancelar</button>
                                        <a href='../ações/deletar_funcionario.php?id={$row['id']}' class='btn btn-danger'>Deletar</a>
                                    </div>
                                </div>
                            </div>
                          </div>";
                }
                ?>
            </tbody>
        </table>
    </div>

    <!-- Modal Adicionar Funcionário -->
    <div class="modal fade" id="adicionarFuncionarioModal" tabindex="-1" aria-labelledby="adicionarFuncionarioModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content bg-primary">
                <div class="modal-header" style="border-bottom-width: 0px;">
                    <h5 class="modal-title" id="adicionarFuncionarioModalLabel">Adicionar Funcionário</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="../ações/adicionar_funcionario.php" class="needs-validation" novalidate method="POST">
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="nome" class="form-label">Nome</label>
                            <input type="text" class="form-control" id="nome" name="nome" required>
                            <div class="invalid-feedback">Por favor, insira um nome.</div>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                            <div class="invalid-feedback">Por favor, insira um email.</div>
                        </div>
                        <div class="mb-3">
                            <label for="cell" class="form-label">Celular</label>
                            <input type="text" class="form-control" id="cell" name="cell" onkeypress="$(this).mask('(00) 00000-0000')" required>
                            <div class="invalid-feedback">Por favor, insira um celular.</div>
                        </div>
                        <div class="mb-3">
                            <label for="cargo" class="form-label">Cargo</label>
                            <option type="text" class="form-control" id="cargo" name="cargo" required>1</option>
                            <div class="invalid-feedback">Por favor, insira um cargo.</div>
                        </div>
                    </div>
                    <div class="modal-footer" style="border-top-width: 0px;">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-primary">Adicionar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php require '../require/part2.php'; ?>

<!-- Bootstrap Icons -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.0/font/bootstrap-icons.min.css">

<!-- Custom Styles -->
<style>
    body {
        background-color: #567d5f;
        /* Fundo Principal */
        color: #ffffff;
        /* Texto branco para contraste */
    }

    .card-body.bg-secondary,
    .modal-body.bg-secondary,
    .modal-footer.bg-secondary,
    .table-bordered tbody.bg-secondary {
        background-color: green;
        /* Fundo escuro para modais */
        color: #ffffff;
        /* Texto branco para contraste */
    }

    .modal-header,
    .modal-content {
        background-color: green;
        /* Fundo escuro para o cabeçalho do modal */
        color: #ffffff;
        /* Texto branco para contraste */
    }

    .card-header,
    .bg-primary,
    .table thead.bg-primary {
        background-color: #445f48;
        /* Ajustando classes bg-primary */
        color: #ffffff;
        /* Texto branco para contraste */
    }

    .btn-danger {
        background-color: #980000;
    }

    .btn-primary {
        background-color: #445f48;
        /* Botões */
        border: none;
    }

    .btn-primary:hover {
        background-color: #567d5f;
    }

    .btn-success,
    .btn-danger {
        border: none;
    }

    .btn-success:hover {
        background-color: #6fbf73;
    }

    .btn-danger:hover {
        background-color: #f75c5c;
    }

    .table-hover tbody tr:hover {
        background-color: #d9e9dd;
        /* Fundo verde mais claro ao passar o mouse */
    }

    .form-label {
        color: #000000;
        /* Títulos e rótulos em preto para melhor contraste */
    }


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
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var forms = document.querySelectorAll('.needs-validation');

        Array.prototype.slice.call(forms)
            .forEach(function(form) {
                form.addEventListener('submit', function(event) {
                    if (!form.checkValidity()) {
                        event.preventDefault();
                        event.stopPropagation();
                    }

                    form.classList.add('was-validated');
                }, false);
            });
    });
</script>