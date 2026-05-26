<?php
    require_once("../db/conection.php");

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        
        $nome_medicamento = $_POST['nome_medicamento'] ?? '';
        $unidade_medida = $_POST['unidade_medida'] ?? '';
        $tipo_sintoma = $_POST['tipo_sintoma'] ?? '';
        $peso_recomendado = $_POST['peso_recomendado'] ?? '';
        $tipo_animal = $_POST['tipo_animal'] ?? '';
        $quantidade_medicamento = $_POST['quantidade'] ?? $_POST['quantidade_medicamento'] ?? 0;

        $sql = "INSERT INTO medicamentos (nome_medicamento, unidade_medida, tipo_sintoma, peso_recomendado, tipo_animal, quantidade) VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = mysqli_prepare($conexao, $sql);
        mysqli_stmt_bind_param($stmt, "sssssi", $nome_medicamento, $unidade_medida, $tipo_sintoma, $peso_recomendado, $tipo_animal, $quantidade_medicamento);

        if (mysqli_stmt_execute($stmt)) {
            if ((int)$quantidade_medicamento < 20) {
                echo "<script>alert('Erro: O estoque está abaixo de 20 unidades!'); window.location.href = '../views/medicamentos.php';</script>";
                exit;
            }
            echo "Medicamento adicionado com sucesso!";
        } else {
            echo "Erro ao adicionar medicamento: " . mysqli_error($conexao);
        }
        header("Location: ../views/medicamentos.php");
    }