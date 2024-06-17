<?php
require '../database/conexao.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $nome_item = $_POST['nome_item'];
    $quantidade = $_POST['quantidade'];
    $categoria = $_POST['categoria'];

    $sql = "UPDATE armazem SET nome_item = :nome_item, quantidade = :quantidade, categoria = :categoria WHERE id = :id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':id', $id);
    $stmt->bindParam(':nome_item', $nome_item);
    $stmt->bindParam(':quantidade', $quantidade);
    $stmt->bindParam(':categoria', $categoria);

    if ($stmt->execute()) {
        header("Location: ../gerenciadores/estoque.php");
        exit();
    } else {
        echo "Erro ao editar item.";
    }
}
?>
