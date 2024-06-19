<?php require '../require/part1.php'; ?>
<?php require '../database/conexao.php'; ?>

<div class="container mt-5">
    <div class="row">
        <div class="col-md-4 mb-4">
            <div class="card text-center shadow-sm" style="height: 100%;">
                <div class="card-header bg-primary text-white d-flex justify-content-center align-items-center">
                    <i class="bi bi-box-seam me-2"></i> Gerencie o estoque
                </div>
                <div class="card-body bg-light-green">
                    <p style='font-size: 20px;' class="card-text">Aqui você pode adicionar, editar e deletar itens do estoque</p>
                    <a href="estoque.php" class="btn btn-primary">Abrir</a>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="card text-center shadow-sm" style="height: 100%;">
                <div class="card-header bg-primary text-white d-flex justify-content-center align-items-center">
                    <i class="bi bi-clipboard-data me-2"></i> Quantidade de categorias
                </div>
                <div class="card-body bg-light-green d-flex justify-content-center align-items-center">
                    <?php
                    $sql = "SELECT COUNT(id) AS total_categorias FROM categoria_estoque";
                    $result = $conn->query($sql);

                    if ($result->rowCount() > 0) {
                        $row = $result->fetch();
                        echo "<p style='font-size: 50px;' class='card-title'>" . $row["total_categorias"] . "</p>";
                    } else {
                        echo "<p class='text-muted'>Não há categorias na tabela.</p>";
                    }
                    ?>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="card text-center shadow-sm" style="height: 100%;">
                <div class="card-header bg-primary text-white d-flex justify-content-center align-items-center">
                    <i class="bi bi-bar-chart me-2"></i> Total de itens
                </div>
                <div class="card-body bg-light-green d-flex justify-content-center align-items-center">
                    <?php
                    $sql = "SELECT SUM(quantidade) AS total_quantidade FROM armazem";
                    $result = $conn->query($sql);

                    if ($result->rowCount() > 0) {
                        $row = $result->fetch();
                        echo "<p style='font-size: 50px;' class='card-title'>" . $row["total_quantidade"] . "</p>";
                    } else {
                        echo "<p class='text-muted'>Não há itens no estoque.</p>";
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 mb-4">
            <div class="card text-center shadow-sm" style="height: 100%;">
                <div class="card-header bg-primary text-white d-flex justify-content-center align-items-center">
                    <i class="bi bi-chart-bar me-2"></i> Quantidade de animais por dieta
                </div>
                <div class="card-body bg-light-green">
                    <table class="table table-success table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>Categoria</th>
                                <th>Quantidade de Itens</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $sql = "SELECT ce.nome_categoria, COUNT(a.nome_item) AS quantidade FROM armazem a JOIN categoria_estoque ce ON a.categoria = ce.id GROUP BY ce.nome_categoria DESC";
                            $result = $conn->query($sql);

                            if ($result->rowCount() > 0) {
                                while ($row = $result->fetch()) {
                                    echo "<tr>";
                                    echo "<td>" . $row["nome_categoria"] . "</td>";
                                    echo "<td>" . $row["quantidade"] . "</td>";
                                    echo "</tr>";
                                }
                            } else {
                                echo "<tr><td>-</td><td>0</td></tr>";
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
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

    .card-body.bg-light-green {
        background-color: #a8d5ba;
        /* Fundo Verde Claro dos cartões */
    }

    .card-header {
        border-bottom: none;
    }

    .btn-primary {
        background-color: #445f48;
        /* Botões */
        border: none;
    }

    .btn-primary:hover {
        background-color: #567d5f;
    }

    .bg-primary {
        background-color: #445f48 !important;
        /* Ajustando classes bg-primary */
    }
</style>