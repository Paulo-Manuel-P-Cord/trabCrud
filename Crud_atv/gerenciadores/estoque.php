<?php
require '../database/conexao.php';
require '../require/part1.php';
?>

<div class="container mt-5">
    <h2 class="mb-4">Gerenciar Estoque</h2>
    
    <!-- voltar -->
    <a class="btn btn-danger mb-4" href="admin_estoque.php">Voltar</a>
    <!-- Adicionar Item -->
    <button class="btn btn-primary mb-4" data-bs-toggle="modal" data-bs-target="#adicionarItemModal">Adicionar Item</button>

    <!-- Visualizar Estoque -->
    <div class="table-responsive">
        <table class="table table-success table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome do Item</th>
                    <th>Categoria</th>
                    <th>Quantidade</th>
                    
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Obter dados do estoque
                $sql = "SELECT a.id, a.nome_item, a.quantidade, c.nome_categoria AS categoria FROM armazem a JOIN categoria_estoque c ON a.categoria = c.id";
                $stmt = $conn->query($sql);
                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    echo "<tr>
                            <td>{$row['id']}</td>
                            <td>{$row['nome_item']}</td>
                            <td>{$row['categoria']}</td>
                            <td>{$row['quantidade']}</td>
                            
                            <td>
                                <button class='btn btn-primary btn-sm' data-bs-toggle='modal' data-bs-target='#editarItemModal{$row['id']}'>Editar</button>
                                <button class='btn btn-danger btn-sm' data-bs-toggle='modal' data-bs-target='#deletarItemModal{$row['id']}'>Deletar</button>
                            </td>
                          </tr>";

                    // Modal para editar item
                    echo "<div class='modal fade' id='editarItemModal{$row['id']}' tabindex='-1' aria-labelledby='editarItemModalLabel{$row['id']}' aria-hidden='true'>
                            <div class='modal-dialog'>
                                <div class='modal-content'>
                                    <div class='modal-header' style='border-bottom-width: 0px;'>
                                        <h5 class='modal-title' id='editarItemModalLabel{$row['id']}'>Editar Item</h5>
                                        <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                                    </div>
                                    <form action='../ações/editar_item.php' method='POST' class='needs-validation' novalidate>
                                        <div class='modal-body'>
                                            <input type='hidden' name='id' value='{$row['id']}'>
                                            <div class='mb-3'>
                                                <label for='nome_item' class='form-label'>Nome do Item</label>
                                                <input type='text' class='form-control' id='nome_item' name='nome_item' value='{$row['nome_item']}' required>
                                                <div class='invalid-feedback'>Por favor, insira um nome.</div>
                                            </div>
                                            <div class='mb-3'>
                                                <label for='quantidade' class='form-label'>Quantidade</label>
                                                <input type='number' class='form-control' id='quantidade' name='quantidade' value='{$row['quantidade']}' required>
                                                <div class='invalid-feedback'>Por favor, insira uma quantidade.</div>
                                            </div>
                                            <div class='mb-3'>
                                                <label for='categoria' class='form-label'>Categoria</label>
                                                <select class='form-control' id='categoria' name='categoria' required>";
                                                
                                                $sql_categoria = "SELECT * FROM categoria_estoque";
                                                $stmt_categoria = $conn->query($sql_categoria);
                                                while ($categoria = $stmt_categoria->fetch(PDO::FETCH_ASSOC)) {
                                                    $selected = ($categoria['id'] == $row['categoria']) ? 'selected' : '';
                                                    echo "<option value='{$categoria['id']}' $selected>{$categoria['nome_categoria']}</option>";
                                                }

                    echo "                      </select>
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

                    // Modal para deletar item
                    echo "<div class='modal fade' id='deletarItemModal{$row['id']}' tabindex='-1' aria-labelledby='deletarItemModalLabel{$row['id']}' aria-hidden='true'>
                            <div class='modal-dialog'>
                                <div class='modal-content'>
                                    <div class='modal-header' style='border-bottom-width: 0px;'>
                                        <h5 class='modal-title' id='deletarItemModalLabel{$row['id']}'>Deletar Item</h5>
                                        <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                                    </div>
                                    <form action='../ações/deletar_item.php' method='POST'>
                                        <div class='modal-body'>
                                            <input type='hidden' name='id' value='{$row['id']}'>
                                            <p>Tem certeza de que deseja deletar o item <strong>{$row['nome_item']}</strong>?</p>
                                        </div>
                                        <div class='modal-footer' style='border-top-width: 0px;'>
                                            <button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>Cancelar</button>
                                            <button type='submit' class='btn btn-danger'>Deletar</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                          </div>";
                }
                ?>
            </tbody>
        </table>
    </div>
</div>

<!-- Modal Adicionar Item -->
<div class="modal fade" id="adicionarItemModal" tabindex="-1" aria-labelledby="adicionarItemModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" style='border-bottom-width: 0px;'>
                <h5 class="modal-title" id="adicionarItemModalLabel">Adicionar Item</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="../ações/adicionar_item.php" method="POST" class="needs-validation" >
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="nome_item" class="form-label">Nome do Item</label>
                        <input type="text" class="form-control" id="nome_item" name="nome_item" required>
                        <div class="invalid-feedback">Por favor, insira um nome.</div>
                    </div>
                    <div class="mb-3">
                        <label for="quantidade" class="form-label">Quantidade</label>
                        <input type="number" class="form-control" id="quantidade" name="quantidade" required>
                        <div class="invalid-feedback">Por favor, insira uma quantidade.</div>
                    </div>
                    <div class="mb-3">
                        <label for="categoria" class="form-label">Categoria</label>
                        <select class="form-control" id="categoria" name="categoria" required>
                            <?php
                            $sql = "SELECT * FROM categoria_estoque";
                            $result = $conn->query($sql);

                            while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                                echo "<option value='" . $row['id'] . "'>" . $row['nome_categoria'] . "</option>";
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="modal-footer" style='border-top-width: 0px;'>
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary">Adicionar</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php require '../require/part2.php'; ?>

<!-- Bootstrap Icons -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.0/font/bootstrap-icons.min.css">

<!-- Custom Styles -->
<style>
    body {
        background-color: #567d5f; /* Fundo Principal */
        color: #ffffff; /* Texto branco para contraste */
    }

    .card-body.bg-light-green {
        background-color: #a8d5ba; /* Fundo Verde Claro dos cartões */
    }

    .card-header {
        border-bottom: none;
    }

    .btn-primary {
        background-color: #445f48; /* Botões */
        border: none;
    }

    .btn-primary:hover {
        background-color: #567d5f;
    }

    .bg-primary {
        background-color: #445f48 !important; /* Ajustando classes bg-primary */
    }
    .modal-header, .modal-footer {
        background-color: #445f48; /* Ajustando fundo do cabeçalho e rodapé dos modais */
        color: #ffffff; /* Texto branco para contraste */
    }
    .modal-body{
        background-color: #567d5f; /* Fundo Principal dos modais */
        color: #ffffff; /* Texto branco para contraste */
    }
</style>
<script>
$(document).ready(function() {
    // Validar formulário de editar animal
    $('#editarAnimalModal form').submit(function(event) {
        var form = $(this)[0];
        if (!form.checkValidity()) {
            event.preventDefault();
            event.stopPropagation();
        }
        form.classList.add('was-validated');
    });
});
</script>
