<?php require '../require/part1.php'; ?>
<?php require '../database/conexao.php'; ?>

<div class="container mt-5">
    <div class="row">
        <div class="col-md-4 mb-4">
            <div class="card text-center shadow-sm" style="height: 100%;">
                <div class="card-header bg-primary text-white d-flex justify-content-center align-items-center">
                    <i class="fas fa-paw">&#xf1b0;</i> Gerencie os animais
                </div>
                <div class="card-body bg-light-green">
                    <p style='font-size: 20px;' class="card-text">Aqui você pode adicionar, editar e deletar os animais</p>
                    <a href="animais.php" class="btn btn-primary">Abrir</a>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="card text-center shadow-sm" style="height: 100%;">
                <div class="card-header bg-primary text-white d-flex justify-content-center align-items-center">
                    <i class="bi bi-clipboard-data me-2"></i> Quantidade de espécies
                </div>
                <div class="card-body bg-light-green d-flex justify-content-center align-items-center">
                    <?php
                    $sql = "SELECT COUNT(id) AS total_especies FROM animais";
                    $result = $conn->query($sql);

                    if ($result->rowCount() > 0) {
                        $row = $result->fetch();
                        echo "<p style='font-size: 50px;' class='card-title'>" . $row["total_especies"] . "</p>";
                    } else {
                        echo "<p class='text-muted'>Não há espécies na tabela.</p>";
                    }
                    ?>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="card text-center shadow-sm" style="height: 100%;">
                <div class="card-header bg-primary text-white d-flex justify-content-center align-items-center">
                    <i class="bi bi-bar-chart me-2"></i> Total de animais
                </div>
                <div class="card-body bg-light-green d-flex justify-content-center align-items-center">
                    <?php
                    $sql = "SELECT SUM(quantidade) AS total_quantidade FROM animais";
                    $result = $conn->query($sql);

                    if ($result->rowCount() > 0) {
                        $row = $result->fetch();
                        echo "<p style='font-size: 50px;' class='card-title'>" . $row["total_quantidade"] . "</p>";
                    } else {
                        echo "0";
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
    <!-- Tabela de quantidade de animais por dieta -->
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
                                <th>Dieta</th>
                                <th>Quantidade</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $sql = "SELECT ta.dieta, COUNT(a.id) AS quantidade FROM animais a JOIN tipoanimal ta ON a.Dieta = ta.id GROUP BY ta.dieta ORDER BY quantidade DESC";
                            $result = $conn->query($sql);

                            if ($result->rowCount() > 0) {
                                while ($row = $result->fetch()) {
                                    echo "<tr>";
                                    echo "<td>" . $row["dieta"] . "</td>";
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
        color: #ffffff;
    }

    .card-body.bg-light-green {
        background-color: #a8d5ba;
    }

    .card-header {
        border-bottom: none;
    }

    .btn-primary {
        background-color: #445f48;
        border: none;
    }

    .btn-primary:hover {
        background-color: #567d5f;
    }

    .bg-primary {
        background-color: #445f48 !important;
    }
</style>