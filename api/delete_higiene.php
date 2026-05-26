<?php
require_once("../db/conection.php");

if (isset($_GET["id"])) {
    $id = $_GET["id"];

    $sql = "DELETE FROM produtos_higiene WHERE idprodutohigiene = ?";

    $stmt = mysqli_prepare($conexao, $sql);
    mysqli_stmt_bind_param($stmt, "i", $id);

    if (mysqli_stmt_execute($stmt)) {
        echo "Produto de higiene deletado com sucesso!";
    } else {
        echo "Erro ao deletar produto de higiene: " . mysqli_error($conexao);
    }
    header("Location: ../tables/higiene.php");

}
?>