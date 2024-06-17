<?php
require '../database/conexao.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];

    $sql = "DELETE FROM armazem WHERE id = :id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':id', $id);

    if ($stmt->execute()) {
        header("Location: ../gerenciadores/estoque.php");
        exit();
    } else {
        echo "Erro ao deletar item.";
    }
}
?>
