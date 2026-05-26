<?php
require_once("../db/conection.php");

if (isset($_GET["id"])) {
    $id = $_GET["id"];

    $sql = "SELECT * FROM racoes WHERE idracoes = ?";
    $stmt = mysqli_prepare($conexao, $sql);
    mysqli_stmt_bind_param($stmt, "i", $id);

    if (mysqli_stmt_execute($stmt)) {
        $result = mysqli_stmt_get_result($stmt);
        $racao = mysqli_fetch_assoc($result);
    } else {
        echo "Erro ao buscar ração: " . mysqli_error($conexao);
        exit;
    }
}
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Ração</title>
    <link rel="stylesheet" href="../assets/css/form.css">
</head>

<body>
    <?php include("../components/navbar.php"); ?>
    <form action="" method="post">
        <input type="hidden" name="idracoes"
            value="<?php echo isset($racao) ? $racao['idracoes'] : ''; ?>">

        <label for="marca_racao">Marca da Ração:</label>
        <input type="text" id="marca_racao" name="marca_racao"
            value="<?php echo isset($racao) ? $racao['marca_racao'] : ''; ?>" required><br><br>

        <label for="tipo_racao">Tipo da Ração:</label>
        <input type="text" id="tipo_racao" name="tipo_racao"
            value="<?php echo isset($racao) ? $racao['tipo_racao'] : ''; ?>" required><br><br>

        <label for="sabor_racao">Sabor da Ração:</label>
        <input type="text" id="sabor_racao" name="sabor_racao"
            value="<?php echo isset($racao) ? $racao['sabor_racao'] : ''; ?>" required><br><br>

        <label for="peso_racao">Peso da Ração:</label>
        <input type="number" step="0.01" id="peso_racao" name="peso_racao"
            value="<?php echo isset($racao) ? $racao['peso_racao'] : ''; ?>" required><br><br>

        <label for="unidade_medida">Unidade de Medida:</label>
        <input type="text" id="unidade_medida" name="unidade_medida"
            value="<?php echo isset($racao) ? $racao['unidade_medida'] : ''; ?>" required><br><br>

        <label for="tipo_animal">Tipo de Animal:</label>
        <input type="text" id="tipo_animal" name="tipo_animal"
            value="<?php echo isset($racao) ? $racao['tipo_animal'] : ''; ?>" required><br><br>

        <button type="submit">Atualizar Ração</button>
    </form>
</body>

</html>

<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['idracoes'] ?? '';
    $marca_racao = $_POST['marca_racao'] ?? '';
    $tipo_racao = $_POST['tipo_racao'] ?? '';
    $sabor_racao = $_POST['sabor_racao'] ?? '';
    $peso_racao = $_POST['peso_racao'] ?? '';
    $unidade_medida = $_POST['unidade_medida'] ?? '';
    $tipo_animal = $_POST['tipo_animal'] ?? '';

    $sql = "UPDATE racoes SET marca_racao = ?, tipo_racao = ?, sabor_racao = ?, peso_racao = ?, unidade_medida = ?, tipo_animal = ? WHERE idracoes = ?";
    $stmt = mysqli_prepare($conexao, $sql);
    mysqli_stmt_bind_param($stmt, "ssssssi", $marca_racao, $tipo_racao, $sabor_racao, $peso_racao, $unidade_medida, $tipo_animal, $id);

    if (mysqli_stmt_execute($stmt)) {
        echo "Ração atualizada com sucesso!";
    } else {
        echo "Erro ao atualizar ração: " . mysqli_error($conexao);
    }
    header("Location: ../tables/racao.php");
    exit;
}
?>
