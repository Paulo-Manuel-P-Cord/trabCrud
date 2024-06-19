<?php
require '../database/conexao.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $cell = $_POST['cell'];
    $cargo = $_POST['cargo'];

    $sql = "INSERT INTO funcionarios (nome, email, cell, cargo) VALUES (:nome, :email, :cell, :cargo)";
    $stmt = $conn->prepare($sql);

    $stmt->bindParam(':nome', $nome);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':cell', $cell);
    $stmt->bindParam(':cargo', $cargo);
    $stmt->execute();
    if ($stmt->execute()) {
        header('Location: ../gerenciadores/funcionarios.php?sucesso=S');
    } else {
        header('Location: ../gerenciadores/funcionarios?sucesso=N');
    }
} else {
    header('Location: ../gerenciadores/funcionarios?sucesso=N');
}
