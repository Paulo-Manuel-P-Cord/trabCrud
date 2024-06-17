<?php require '../require/part1.php'; ?>
<?php require '../database/conexao.php'; ?>

<div class="container mt-5">
    <div class="row d-flex justify-content-center align-items-center">
        <div class="col-md-6 mb-4">
            <div class="card text-center shadow-sm" style="height: 100%;">
                <div class="card-header bg-primary text-white d-flex justify-content-center align-items-center">
                    <i class="bi bi-people me-2"></i> Gerencie os funcionários
                </div>
                <div class="card-body bg-light-green">
                    <p style='font-size: 20px;' class="card-text">Aqui você pode adicionar, editar e deletar os funcionários</p>
                    <a href="funcionarios.php" class="btn btn-primary">Abrir</a>
                </div>
                </div>
        </div>
        <div class="col-md-6 mb-4">
            <div class="card text-center shadow-sm" style="height: 100%;">
                <div class="card-header bg-primary text-white d-flex justify-content-center align-items-center">
                    <i class="bi bi-clipboard-data me-2"></i> Quantidade de funcionários
                </div>
                <div class="card-body bg-light-green d-flex justify-content-center align-items-center">
                    <?php
                    $sql = "SELECT COUNT(id) AS total_funcionarios FROM funcionarios";
                    $result = $conn->query($sql);

                    if ($result->rowCount() > 0) {
                        $row = $result->fetch();
                        echo "<p style='font-size: 50px;' class='card-title'>" . $row["total_funcionarios"] . "</p>";
                    } else {
                        echo "<p class='text-muted'>Não há funcionários na tabela.</p>";
                    }
                    ?>
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
</style>
