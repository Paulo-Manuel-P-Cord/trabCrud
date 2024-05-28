<?php


if(isset($_POST['submit'])){

    // Obtendo os dados do formulário
    $nome = $_POST['nome'];
    $senha = $_POST['senha'];
    $email = $_POST['email'];
    $cell = $_POST['cell'];
    $cpf = $_POST['cpf'];
    $data_nascimento = $_POST['data_nascimento'];
    
    // Verificando os dados do formulário
    echo "Nome: $nome, Senha: $senha, Email: $email, Cell: $cell, CPF: $cpf, Data de Nascimento: $data_nascimento <br>";

    // Conexão com o banco de dados
    require '../database/conexao.php';

    // Consulta SQL para inserção dos dados
    $sql = 'INSERT INTO usuarios (nome, senha, email, cell, cpf, nasc) VALUES (:nome, :senha, :email, :cell, :cpf, :data_nascimento)';

    // Preparar a consulta
    $resultado = $conn->prepare($sql);
    
    // Bind dos parâmetros
    $resultado->bindValue(':nome', $nome);
    $resultado->bindValue(':senha', $senha);
    $resultado->bindValue(':email', $email);
    $resultado->bindValue(':cell', $cell);
    $resultado->bindValue(':cpf', $cpf);
    $resultado->bindValue(':data_nascimento', $data_nascimento);

    // Executar a consulta
    if($resultado->execute()){
        echo "Cadastro realizado com sucesso!";
        // Redirecionar para a página de login
        header('Location: ../login/login.php?success=ok');
        exit;
    }else{
        echo "Erro ao cadastrar usuário";
        // Redirecionar de volta para a página de cadastro
        header('Location: ../cadastro/cadastro.php?success=no');
        exit;
    }
}else{
    echo "Formulário não submetido"; // Mensagem de depuração
}
?>
