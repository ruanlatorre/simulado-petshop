<?php
    require_once("../db/conection.php");

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        
        $nome_medicamento = $_POST['nome_medicamento'] ?? '';
        $unidade_medida = $_POST['unidade_medida'] ?? '';
        $tipo_sintoma = $_POST['tipo_sintoma'] ?? '';
        $peso_recomendado = $_POST['peso_recomendado'] ?? '';
        $tipo_animal = $_POST['tipo_animal'] ?? '';
        $quantidade_medicamento = $_POST['quantidade_medicamento'] ?? '';

        $sql = "INSERT INTO medicamentos (nome_medicamento, unidade_medida, tipo_sintoma, peso_recomendado, tipo_animal) VALUES (?, ?, ?, ?, ?)";
        $stmt = mysqli_prepare($conexao, $sql);
        mysqli_stmt_bind_param($stmt, "sssss", $nome_medicamento, $unidade_medida, $tipo_sintoma, $peso_recomendado, $tipo_animal);

        if (mysqli_stmt_execute($stmt)) {
            echo "Medicamento adicionado com sucesso!";
        } else {
            echo "Erro ao adicionar medicamento: " . mysqli_error($conexao);
        }
        header("Location: ../views/medicamentos.php");
    }