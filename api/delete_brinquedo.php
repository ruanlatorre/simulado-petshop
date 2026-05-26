<?php
require_once("../db/conection.php");

if (isset($_GET["id"])) {
    $id = $_GET["id"];

    $sql = "DELETE FROM brinquedos WHERE idbrinquedos = ?";

    $stmt = mysqli_prepare($conexao, $sql);
    mysqli_stmt_bind_param($stmt, "i", $id);

    if (mysqli_stmt_execute($stmt)) {
        echo "Brinquedo deletado com sucesso!";
    } else {
        echo "Erro ao deletar brinquedo: " . mysqli_error($conexao);
    }
    header("Location: ../tables/brinquedos.php");
}
?>
