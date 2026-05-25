<?php
    $host = '127.0.0.1';
    $usuario = 'root';
    $senha = '';
    $nome_banco = 'petshop_db';
    $porta = 3306;

    $conexao = mysqli_connect($host, $usuario, $senha, $nome_banco, $porta);

    if (! $conexao) {
        die("Falha na conexão: " . mysqli_connect_error());
    }
?>