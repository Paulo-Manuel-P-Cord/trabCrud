<?php
require '../database/conexao.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $especie = $_POST['especie'];
    $dieta = $_POST['dieta'];
    $habitat = $_POST['habitat'];
    $quantidade = $_POST['quantidade'];
    $origem = $_POST['origem'];

    $sql = "UPDATE animais SET Espécie = :especie, Dieta = :dieta, Habitat = :habitat, quantidade = :quantidade, Origem = :origem WHERE id = :id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':id', $id);
    $stmt->bindParam(':especie', $especie);
    $stmt->bindParam(':dieta', $dieta);
    $stmt->bindParam(':habitat', $habitat);
    $stmt->bindParam(':quantidade', $quantidade);
    $stmt->bindParam(':origem', $origem);

    try {
        $stmt->execute();
        header("Location: ../gerenciadores/animais.php"); 
        exit();
    } catch (PDOException $e) {
        echo "Erro: " . $e->getMessage();
    }
}
?>
