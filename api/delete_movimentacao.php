<?php
require_once("../db/conection.php");

$id = $_GET['id'] ?? '';

if (!empty($id)) {
    $sql = "DELETE FROM movimentacao WHERE idmovimentacao = ?";
    $stmt = mysqli_prepare($conexao, $sql);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "i", $id);
        if (mysqli_stmt_execute($stmt)) {
            header("Location: ../tables/movimentacao.php");
        } else {
            echo "Erro ao deletar movimentação: " . mysqli_error($conexao);
        }
        mysqli_stmt_close($stmt);
    }
}
exit;
?>