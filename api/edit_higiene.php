<?php
require_once("../db/conection.php");

if (isset($_GET["id"])) {
    $id = $_GET["id"];

    $sql = "SELECT * FROM produtos_higiene WHERE idprodutohigiene = ?";
    $stmt = mysqli_prepare($conexao, $sql);
    mysqli_stmt_bind_param($stmt, "i", $id);

    if (mysqli_stmt_execute($stmt)) {
        $result = mysqli_stmt_get_result($stmt);
        $higiene = mysqli_fetch_assoc($result);
    } else {
        echo "Erro ao buscar produto de higiene: " . mysqli_error($conexao);
        exit;
    }
}
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Produto de Higiene</title>
    <link rel="stylesheet" href="../assets/css/form.css">
</head>

<body>
    <?php include("../components/navbar.php"); ?>
    <form action="" method="post">
        <input type="hidden" name="idprodutohigiene"
            value="<?php echo isset($higiene) ? $higiene['idprodutohigiene'] : ''; ?>">

        <label for="marca_produto">Marca do Produto:</label>
        <input type="text" id="marca_produto" name="marca_produto"
            value="<?php echo isset($higiene) ? $higiene['marca_produto'] : ''; ?>" required><br><br>

        <label for="tipo_produto">Tipo do Produto:</label>
        <input type="text" id="tipo_produto" name="tipo_produto"
            value="<?php echo isset($higiene) ? $higiene['tipo_produto'] : ''; ?>" required><br><br>

        <label for="peso_produto">Peso do Produto:</label>
        <input type="number" id="peso_produto" name="peso_produto"
            value="<?php echo isset($higiene) ? $higiene['peso_produto'] : ''; ?>" required><br><br>

        <label for="unidade_medida">Unidade de Medida:</label>
        <input type="text" id="unidade_medida" name="unidade_medida"
            value="<?php echo isset($higiene) ? $higiene['unidade_medida'] : ''; ?>" required><br><br>

        <label for="tipo_animal">Tipo de Animal:</label>
        <input type="text" id="tipo_animal" name="tipo_animal"
            value="<?php echo isset($higiene) ? $higiene['tipo_animal'] : ''; ?>" required><br><br>

        <button type="submit">Atualizar Produto</button>
    </form>
</body>

</html>

<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['idprodutohigiene'] ?? '';
    $marca_produto = $_POST['marca_produto'] ?? '';
    $tipo_produto = $_POST['tipo_produto'] ?? '';
    $peso_produto = $_POST['peso_produto'] ?? '';
    $unidade_medida = $_POST['unidade_medida'] ?? '';
    $tipo_animal = $_POST['tipo_animal'] ?? '';

    $sql = "UPDATE produtos_higiene SET marca_produto = ?, tipo_produto = ?, peso_produto = ?, unidade_medida = ?, tipo_animal = ? WHERE idprodutohigiene = ?";
    $stmt = mysqli_prepare($conexao, $sql);
    mysqli_stmt_bind_param($stmt, "sssssi", $marca_produto, $tipo_produto, $peso_produto, $unidade_medida, $tipo_animal, $id);

    if (mysqli_stmt_execute($stmt)) {
        echo "Produto de higiene atualizado com sucesso!";
    } else {
        echo "Erro ao atualizar produto de higiene: " . mysqli_error($conexao);
    }
    header("Location: ../tables/higiene.php");
    exit;
}
?>