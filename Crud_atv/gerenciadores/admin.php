<?php
 require '../require/part1.php'
?>
        <div class="container mt-5">
            <div class="row">

            <div class="col-md-4 mb-4">
            <div class="card text-center shadow-sm" style="height: 100%;">
                <div class="card-header bg-primary text-white d-flex justify-content-center align-items-center">
                    <i class="fas fa-paw">&#xf1b0;</i> Animais
                </div>
                <div class="card-body bg-light-green">
                    <p style='font-size: 20px;' class="card-text">Gerencie os animais do zoológico.</p>
                    <a href="admin_animais.php" class="btn btn-primary">Abrir</a>
                </div>
            </div>
            </div>

            <div class="col-md-4 mb-4">
            <div class="card text-center shadow-sm" style="height: 100%;">
                <div class="card-header bg-primary text-white d-flex justify-content-center align-items-center">
                    <i class="bi bi-box-seam me-2"></i> Estoque
                </div>
                <div class="card-body bg-light-green">
                    <p style='font-size: 20px;' class="card-text">Gerencie o estoque do zoológico.</p>
                    <a href="admin_estoque.php" class="btn btn-primary">Abrir</a>
                </div>
            </div>
            </div>
                
            <div class="col-md-4 mb-4">
            <div class="card text-center shadow-sm" style="height: 100%;">
                <div class="card-header bg-primary text-white d-flex justify-content-center align-items-center">
                    <i class="bi bi-people me-2"></i> Funcionários
                </div>
                <div class="card-body bg-light-green">
                    <p style='font-size: 20px;' class="card-text">Gerencie os funcionários do zoológico.</p>
                    <a href="admin_funcionarios.php" class="btn btn-primary">Abrir</a>
                </div>
            </div>
            </div>

            </div>
        </div>

<?php
 require '../require/part2.php'
?>

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