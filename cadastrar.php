<?php

    include_once('conn.php');
    
    // Pega os valores do formulário
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];


    $hashSenha = password_hash($senha, PASSWORD_DEFAULT);
    $sqlSenha = "INSERT INTO senha (senha, hash) VALUES ('$senha', '$hashSenha')";

    if ($conn->query($sqlSenha) === TRUE) {
        
        $id_senha = $conn->insert_id;
    
        
        $sqlUsuario = "INSERT INTO usuario (nome, email, senha_id) VALUES ('$nome', '$email', '$id_senha')";
    
        if ($conn->query($sqlUsuario) === TRUE) {
            echo "Cadastro realizado com sucesso!";
        } else {
            echo "Erro ao cadastrar usuário: " . $conn->error;
        }
    } else {
        echo "Erro ao cadastrar senha: " . $conn->error;
    }
    
    $conn->close();
    
?>