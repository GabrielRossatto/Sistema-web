<?php
    $servername = "localhost";
    $username = "root";
    $password = "root";
    $database = "users";

    $conn = new mysqli($servername, $username, $password, $database);

    // Conexão com o banco de dados
    if($conn->connect_error) {
        die("Conexão falhou: " . $conn->connect_error);
    }
?>