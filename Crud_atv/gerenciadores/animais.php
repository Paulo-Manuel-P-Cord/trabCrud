<?php
require '../database/conexao.php';
require '../require/part1.php';
?>

<div class="container mt-5 text-white">
    <h2 class="mb-4">Gerenciar Animais</h2>

    <!-- voltar -->
    <a class="btn btn-primary mb-4" href="admin_animais.php">Voltar</a>
    <!-- Adicionar Animal -->
    <button class="btn btn-primary mb-4" data-bs-toggle="modal" data-bs-target="#adicionarAnimalModal">Adicionar Animal</button>

    <!-- Visualizar Animais -->
    <div class="table-responsive">
        <table class="table table-success table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Espécie</th>
                    <th>Dieta</th>
                    <th>Habitat</th>
                    <th>Quantidade</th>
                    <th>Origem</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Obter dados dos animais
                $sql = "SELECT a.id, a.Espécie, t.dieta AS Dieta, a.Habitat, a.quantidade, a.Origem FROM animais a JOIN tipoanimal t ON a.Dieta = t.id";
                $stmt = $conn->query($sql);
                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    echo "<tr>
                            <td>{$row['id']}</td>
                            <td>{$row['Espécie']}</td>
                            <td>{$row['Dieta']}</td>
                            <td>{$row['Habitat']}</td>
                            <td>{$row['quantidade']}</td>
                            <td>{$row['Origem']}</td>
                            <td>
                                <button class='btn btn-primary btn-sm' data-bs-toggle='modal' data-bs-target='#editarAnimalModal{$row['id']}'>Editar</button>
                                <button class='btn btn-danger btn-sm' data-bs-toggle='modal' data-bs-target='#deletarAnimalModal{$row['id']}'>Deletar</button>
                            </td>
                          </tr>";

                    // Modal para editar animal
                    echo "<div class='modal fade' id='editarAnimalModal{$row['id']}' tabindex='-1' aria-labelledby='editarAnimalModalLabel{$row['id']}' aria-hidden='true'>
                            <div class='modal-dialog'>
                                <div class='modal-content'>
                                    <div class='modal-header' <div class='modal-header' style='border-bottom-width: 0px;'>
                                        <h5 class='modal-title' id='editarAnimalModalLabel{$row['id']}'>Editar Animal</h5>
                                        <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                                    </div>
                                    <form action='../ações/editar_animal.php' method='POST' class='needs-validation' novalidate>
                                        <div class='modal-body'>
                                            <input type='hidden' name='id' value='{$row['id']}'>
                                            <div class='mb-3'>
                                                <label for='especie' class='form-label'>Espécie</label>
                                                <input type='text' class='form-control' id='especie' name='especie' value='{$row['Espécie']}' required>
                                                <div class='invalid-feedback'>Por favor, insira um nome.</div>
                                            </div>
                                            <div class='mb-3'>
                                                <label for='dieta' class='form-label'>Dieta</label>
                                                <select class='form-control' id='dieta' name='dieta' required>";

                    $sql_dieta = "SELECT * FROM tipoanimal";
                    $stmt_dieta = $conn->query($sql_dieta);
                    while ($dieta = $stmt_dieta->fetch(PDO::FETCH_ASSOC)) {
                        $selected = ($dieta['id'] == $row['Dieta']) ? 'selected' : '';
                        echo "<option value='{$dieta['id']}' $selected>{$dieta['dieta']}</option>";
                    }

                    echo "                      </select>
                                            </div>
                                            <div class='mb-3'>
                                                <label for='habitat' class='form-label'>Habitat</label>
                                                <input type='text' class='form-control' id='habitat' name='habitat' value='{$row['Habitat']}' required>
                                                <div class='invalid-feedback'>Por favor, insira um habitat.</div>
                                            </div>
                                            <div class='mb-3'>
                                                <label for='quantidade' class='form-label'>Quantidade</label>
                                                <input type='number' class='form-control' id='quantidade' name='quantidade' value='{$row['quantidade']}' required>
                                                <div class='invalid-feedback'>Por favor, insira uma quantidade.</div>
                                            </div>
                                            <div class='mb-3'>
                                                <label for='origem' class='form-label'>Origem</label>
                                                <input type='text' class='form-control' id='origem' name='origem' value='{$row['Origem']}' required>
                                                <div class='invalid-feedback'>Por favor, insira uma origem.</div>
                                            </div>
                                        </div>
                                        <div class='modal-footer' <div class='modal-header' style='border-top-width: 0px;'>
                                            <button type='button' class='btn btn-danger' data-bs-dismiss='modal'>Cancelar</button>
                                            <button type='submit' class='btn btn-primary'>Salvar mudanças</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                          </div>";

                    // Modal para deletar animal
                    echo "<div class='modal fade' id='deletarAnimalModal{$row['id']}' tabindex='-1' aria-labelledby='deletarAnimalModalLabel{$row['id']}' aria-hidden='true'>
                            <div class='modal-dialog'>
                                <div class='modal-content'>
                                    <div class='modal-header' style='border-bottom-width: 0px;'>
                                        <h5 class='modal-title' id='deletarAnimalModalLabel{$row['id']}'>Deletar Animal</h5>
                                        <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                                    </div>
                                    <div class='modal-body'>
                                        Tem certeza que deseja deletar o animal {$row['Espécie']}?
                                    </div>
                                    <div class='modal-footer' <div class='modal-header' style='border-top-width: 0px;'>
                                        <button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>Cancelar</button>
                                        <a href='../ações/deletar_animal.php?id={$row['id']}' class='btn btn-danger'>Deletar</a>
                                    </div>
                                </div>
                            </div>
                          </div>";
                }
                ?>
            </tbody>
        </table>
    </div>

    <!-- Modal Adicionar Animal -->
    <div class="modal fade" id="adicionarAnimalModal" tabindex="-1" aria-labelledby="adicionarAnimalModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header" style="border-bottom-width: 0px;">
                    <h5 class="modal-title" id="adicionarAnimalModalLabel">Adicionar Animal</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="../ações/adicionar_animal.php" class="needs-validation" novalidate method="POST">
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="especie" class="form-label">Espécie</label>
                            <input type="text" class="form-control" id="especie" name="especie" required>
                            <div class="invalid-feedback">Por favor, insira um nome.</div>
                        </div>
                        <div class="mb-3">
                            <label for="dieta" class="form-label">Dieta</label>
                            <select class="form-control" id="dieta" name="dieta" required>
                                <?php
                                $sql_dieta = "SELECT * FROM tipoanimal";
                                $stmt_dieta = $conn->query($sql_dieta);
                                while ($dieta = $stmt_dieta->fetch(PDO::FETCH_ASSOC)) {
                                    echo "<option value='{$dieta['id']}'>{$dieta['dieta']}</option>";
                                }
                                ?>
                            </select>
                            <div class="invalid-feedback">Por favor, selecione uma dieta.</div>
                        </div>
                        <div class="mb-3">
                            <label for="habitat" class="form-label">Habitat</label>
                            <input type="text" class="form-control" id="habitat" name="habitat" required>
                            <div class="invalid-feedback">Por favor, insira um habitat.</div>
                        </div>
                        <div class="mb-3">
                            <label for="quantidade" class="form-label">Quantidade</label>
                            <input type="number" class="form-control" id="quantidade" name="quantidade" required>
                            <div class="invalid-feedback">Por favor, insira uma quantidade.</div>
                        </div>
                        <div class="mb-3">
                            <label for="origem" class="form-label">Origem</label>
                            <input type="text" class="form-control" id="origem" name="origem" required>
                            <div class="invalid-feedback">Por favor, insira uma origem.</div>
                        </div>
                    </div>
                    <div class="modal-footer" style="
    border-top-width: 0px;
">
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


<style>
    body {
        background-color: #567d5f;
        color: #ffffff;
    }

    .card-body.bg-secondary,
    .modal-body.bg-secondary,
    .modal-footer.bg-secondary,
    .table-bordered tbody.bg-secondary {
        background-color: green;
        color: #ffffff;
    }

    .modal-header,
    .modal-content {
        background-color: green;
        color: #ffffff;
    }

    .card-header,
    .bg-primary,
    .table thead.bg-primary {
        background-color: #445f48;
        color: #ffffff;
    }

    .btn-danger {
        background-color: #980000;
    }

    .btn-primary {
        background-color: #445f48;
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
    }

    .form-label {
        color: #000000;
    }

    .modal-content {
        background-color: #567d5f;
        color: #ffffff;
    }

    .modal-header,
    .modal-footer {
        background-color: #445f48;
        color: #ffffff;
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