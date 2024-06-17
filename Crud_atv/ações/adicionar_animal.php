<?php
require '../database/conexao.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $especie = $_POST['especie'];
    $dieta = $_POST['dieta'];
    $habitat = $_POST['habitat'];
    $quantidade = $_POST['quantidade'];
    $origem = $_POST['origem'];

    $sql = "INSERT INTO animais (Espécie, Dieta, Habitat, quantidade, Origem) VALUES (:especie, :dieta, :habitat, :quantidade, :origem)";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':especie', $especie);
    $stmt->bindParam(':dieta', $dieta);
    $stmt->bindParam(':habitat', $habitat);
    $stmt->bindParam(':quantidade', $quantidade);
    $stmt->bindParam(':origem', $origem);

    try {
        $stmt->execute();
        header("Location: ../gerenciadores/animais.php"); // Redirecionar de volta à página principal após adicionar
        exit();
    } catch (PDOException $e) {
        echo "Erro: " . $e->getMessage();
    }
}
?>
