<?php
require_once("../db/conection.php");
 if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome_brinquedo = $_POST['nome_brinquedo'] ?? '';
    $peso_brinquedo = $_POST['peso_brinquedo'] ?? '';
    $unidade_medida = $_POST['unidade_medida'] ?? '';
    $tipo_brinquedo = $_POST['tipo_brinquedo'] ?? '';
    $tipo_animal = $_POST['tipo_animal'] ?? '';
    $quantidade_brinquedo = $_POST['quantidade_brinquedo'] ?? '';

    
    $sql = "INSERT INTO brinquedos (nome_brinquedo, peso_brinquedo, unidade_medida, tipo_brinquedo, tipo_animal) VALUES (?, ?, ?, ?, ?)";
    $stmt = mysqli_prepare($conexao, $sql);
    mysqli_stmt_bind_param($stmt, "sssss", $nome_brinquedo, $peso_brinquedo, $unidade_medida, $tipo_brinquedo, $tipo_animal);

    if (mysqli_stmt_execute($stmt)) {
        echo "Brinquedo adicionado com sucesso!";
    } else {
        echo "Erro ao adicionar brinquedo: " . mysqli_error($conexao);
    }
    header("Location: ../views/brinquedos.php");
 }
?>