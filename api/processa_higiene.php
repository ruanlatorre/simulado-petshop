<?php

require_once("../db/conection.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    $marca_produto = $_POST['marca_produto'] ?? '';
    $peso_produto = $_POST['peso_produto'] ?? '';
    $unidade_medida = $_POST['unidade_medida'] ?? '';
    $tipo_produto = $_POST['tipo_produto'] ?? '';
    $tipo_animal = $_POST['tipo_animal'] ?? '';
    $quantidade_produto = $_POST['quantidade'] ?? $_POST['quantidade_produto'] ?? 0;

    $sql = "INSERT INTO produtos_higiene (marca_produto, tipo_produto, peso_produto, unidade_medida, tipo_animal, quantidade) VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = mysqli_prepare($conexao, $sql);
    mysqli_stmt_bind_param($stmt, "sssssi", $marca_produto, $tipo_produto, $peso_produto, $unidade_medida, $tipo_animal, $quantidade_produto);

    if (mysqli_stmt_execute($stmt)) {
        if ((int)$quantidade_produto < 20) {
            echo "<script>alert('Erro: O estoque está abaixo de 20 unidades!'); window.location.href = '../views/higiene.php';</script>";
            exit;
        }
        echo "Produto de higiene adicionado com sucesso!";
    } else {
        echo "Erro ao adicionar produto de higiene: " . mysqli_error($conexao);
    }
    header("Location: ../views/higiene.php");
}
?>