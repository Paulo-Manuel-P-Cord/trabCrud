<?php
require '../database/conexao.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "DELETE FROM funcionarios WHERE id = :id";
    $stmt = $conn->prepare($sql);
    
    $stmt->bindParam(':id', $id);

    if ($stmt->execute()) {
        header('Location: ../gerenciadores/funcionarios.php?sucesso=SD');
    } else {
        header('Location: ../gerenciadores/funcionarios.php?sucesso=ND');
    }
} else {
    header('Location: ../gerenciadores/funcionarios.php?sucesso=ND');
}
?>
