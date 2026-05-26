<?php
require_once("../db/conection.php");
 if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome_brinquedo = $_POST['nome_brinquedo'] ?? '';
    $peso_brinquedo = $_POST['peso_brinquedo'] ?? '';
    $unidade_medida = $_POST['unidade_medida'] ?? '';
    $tipo_brinquedo = $_POST['tipo_brinquedo'] ?? '';
    $tipo_animal = $_POST['tipo_animal'] ?? '';
    $quantidade_brinquedo = $_POST['quantidade'] ?? $_POST['quantidade_brinquedo'] ?? 0;

    $sql = "INSERT INTO brinquedos (nome_brinquedo, peso_brinquedo, unidade_medida, tipo_brinquedo, tipo_animal, quantidade) VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = mysqli_prepare($conexao, $sql);
    mysqli_stmt_bind_param($stmt, "sssssi", $nome_brinquedo, $peso_brinquedo, $unidade_medida, $tipo_brinquedo, $tipo_animal, $quantidade_brinquedo);

    if (mysqli_stmt_execute($stmt)) {
        if ((int)$quantidade_brinquedo < 20) {
            echo "<script>alert('Erro: O estoque está abaixo de 20 unidades!'); window.location.href = '../views/brinquedos.php';</script>";
            exit;
        }
        echo "Brinquedo adicionado com sucesso!";
    } else {
        echo "Erro ao adicionar brinquedo: " . mysqli_error($conexao);
    }
    header("Location: ../views/brinquedos.php");
 }
?>