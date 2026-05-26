<?php
require_once("../db/conection.php");

if (isset($_GET["id"])) {
    $id = $_GET["id"];

    $sql = "DELETE FROM racoes WHERE idracoes = ?";

    $stmt = mysqli_prepare($conexao, $sql);
    mysqli_stmt_bind_param($stmt, "i", $id);

    if (mysqli_stmt_execute($stmt)) {
        echo "Ração deletada com sucesso!";
    } else {
        echo "Erro ao deletar ração: " . mysqli_error($conexao);
    }
    header("Location: ../tables/racao.php");
}
?>
