<?php
require '../database/conexao.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $cell = $_POST['cell'];
    $cargo = $_POST['cargo'];

    $sql = "UPDATE funcionarios SET nome = :nome, email = :email, cell = :cell, cargo = :cargo WHERE id = :id";
    $stmt = $conn->prepare($sql);

    $stmt->bindParam(':id', $id);
    $stmt->bindParam(':nome', $nome);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':cell', $cell);
    $stmt->bindParam(':cargo', $cargo);

    if ($stmt->execute()) {
        header('Location: ../gerenciadores/funcionarios.php?sucesso=SE');
    } else {
        header('Location: ../gerenciadores/funcionarios.php?sucesso=NE');
    }
} else {
    header('Location: ../gerenciadores/funcionarios.php?sucesso=NE');
}
?>
