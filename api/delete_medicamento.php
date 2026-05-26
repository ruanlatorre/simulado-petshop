<?php
require_once("../db/conection.php");

if (isset($_GET["id"])) {
    $id = $_GET["id"];

    $sql = "DELETE FROM medicamentos WHERE idmedicamentos = ?";

    $stmt = mysqli_prepare($conexao, $sql);
    mysqli_stmt_bind_param($stmt, "i", $id);

    if (mysqli_stmt_execute($stmt)) {
        echo "Medicamento deletado com sucesso!";
    } else {
        echo "Erro ao deletar medicamento: " . mysqli_error($conexao);
    }
    header("Location: ../tables/medicamento.php");
}
?>
