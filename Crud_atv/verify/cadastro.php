<?php
if(isset($_POST['submit'])){
    $nome = $_POST['nome'];
    $senha = $_POST['senha'];
    $email = $_POST['email'];
    $cell = $_POST['cell'];
    $cpf = $_POST['cpf'];
    $data_nascimento = $_POST['data_nascimento'];

    require '../database/conexao.php';

    // Consulta para verificar se o email já existe
    $consultaemail = $conn->prepare('SELECT COUNT(*) as total FROM usuarios WHERE email = :email');
    $consultacell = $conn->prepare('SELECT COUNT(*) as total FROM usuarios WHERE cell = :cell');
    $consultacpf = $conn->prepare('SELECT COUNT(*) as total FROM usuarios WHERE cpf = :cpf');
        $consultaemail->bindValue(':email', $email);
        $consultacell->bindValue(':cell', $cell);
        $consultacpf->bindValue(':cpf', $cpf);

        $consultaemail->execute();
        $consultacell->execute();
        $consultacpf->execute();

        $resultadoemail = $consultaemail->fetch();
        $resultadocell = $consultacell->fetch();
        $resultadocpf = $consultacpf->fetch();
        if($resultadoemail['total'] > 0){
            header('Location: ../cadastro/cadastro.php?error=emailErro');
            exit;
        }
        if($resultadocell['total'] > 0){
            header('Location: ../cadastro/cadastro.php?error=cellErro');
            exit;
        }
        if($resultadocpf['total'] > 0){
            header('Location: ../cadastro/cadastro.php?error=cpfErro');
            exit;
        }


    // Se o email não existe, proceda com a inserção
    $sql = 'INSERT INTO usuarios (nome, senha, email, cell, cpf, nasc) VALUES (:nome, :senha, :email, :cell, :cpf, :data_nascimento)';
    
    $resultado = $conn->prepare($sql);
    
    $resultado->bindValue(':nome', $nome);
    $resultado->bindValue(':senha', $senha);
    $resultado->bindValue(':email', $email);
    $resultado->bindValue(':cell', $cell);
    $resultado->bindValue(':cpf', $cpf);
    $resultado->bindValue(':data_nascimento', $data_nascimento);

    if($resultado->execute()){
        echo "Cadastro realizado com sucesso!";
        header('Location: ../login/login.php?success=ok');
        exit;
    }else{
        header('Location: ../cadastro/cadastro.php?error=unknown');
        exit;
    }
}else{
    echo "Não deu certo";
}

?>
