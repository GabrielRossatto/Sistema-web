

<?php 

    include_once("conn.php");


    $login = $_POST['email'];
    $senha = $_POST['senha'];


    $sql = "SELECT usuario.id, usuario.nome, senha.hash
            FROM usuario
            JOIN senha ON usuario.senha_id = senha.id
            WHERE usuario.nome = '$login' OR usuario.email = '$login'"; 

    $result = $conn->query($sql);

    if($result->num_rows === 1) {
        $row = $result->fetch_assoc();
        $hashSenha = $row['hash'];
    

        if(password_verify($senha, $hashSenha)) {
            header("Location: inicio.php");
            
            

        } else {
            
            echo '<a href="tela_login.html">Credenciais inválidas! Tente novamente!</a>';
        }
        
    } else {
        echo "Usuário não encontrado!";
    }
    


    $conn->close();


?>