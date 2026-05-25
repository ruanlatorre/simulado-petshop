<?php
session_start();
require_once("../db/conection.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $marca_racao = $_POST['marca_racao'] ?? '';
    $peso_racao  = $_POST['peso_racao'] ?? '';
    $unidade_medida = $_POST['unidade_medida'] ?? '';
    $sabor_racao = $_POST['sabor_racao'] ?? '';
    $tipo_racao = $_POST['tipo_racao'] ?? '';
    $tipo_animal = $_POST['tipo_animal'] ?? '';
    $quantidade_racao = $_POST['quantidade_racao'] ?? '';

    $sql = "INSERT INTO racoes (marca_racao, tipo_racao, peso_racao, unidade_medida, tipo_animal) VALUES (?, ?, ?, ?, ?)";
    $stmt = mysqli_prepare($conexao, $sql);
    mysqli_stmt_bind_param($stmt, "sssss", $marca_racao, $tipo_racao, $peso_racao, $unidade_medida, $tipo_animal);

    if (mysqli_stmt_execute($stmt)) {
        echo "Ração adicionada com sucesso!";
    } else {
        echo "Erro ao adicionar ração: " . mysqli_error($conexao);
    }
    header("Location: ../views/racoes.php");
}
?>