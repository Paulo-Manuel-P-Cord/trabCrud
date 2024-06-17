<?php
require '../database/conexao.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome_item = $_POST['nome_item'];
    $quantidade = $_POST['quantidade'];
    $categoria = $_POST['categoria'];

    $sql = "INSERT INTO armazem (nome_item, quantidade, categoria) VALUES (:nome_item, :quantidade, :categoria)";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':nome_item', $nome_item);
    $stmt->bindParam(':quantidade', $quantidade);
    $stmt->bindParam(':categoria', $categoria);

    if ($stmt->execute()) {
        header("Location: ../gerenciadores/estoque.php");
        exit();
    } else {
        echo "Erro ao adicionar item.";
    }
}
?>
