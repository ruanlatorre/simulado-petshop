<?php
require_once("../db/conection.php");

if (isset($_GET["id"])) {
    $id = $_GET["id"];

    $sql = "SELECT * FROM brinquedos WHERE idbrinquedos = ?";
    $stmt = mysqli_prepare($conexao, $sql);
    mysqli_stmt_bind_param($stmt, "i", $id);

    if (mysqli_stmt_execute($stmt)) {
        $result = mysqli_stmt_get_result($stmt);
        $brinquedo = mysqli_fetch_assoc($result);
    } else {
        echo "Erro ao buscar brinquedo: " . mysqli_error($conexao);
        exit;
    }
}
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Brinquedo</title>
    <link rel="stylesheet" href="../assets/css/form.css">
</head>

<body>
    <?php include("../components/navbar.php"); ?>
    <form action="" method="post">
        <input type="hidden" name="idbrinquedos"
            value="<?php echo isset($brinquedo) ? $brinquedo['idbrinquedos'] : ''; ?>">

        <label for="nome_brinquedo">Nome do Brinquedo:</label>
        <input type="text" id="nome_brinquedo" name="nome_brinquedo"
            value="<?php echo isset($brinquedo) ? $brinquedo['nome_brinquedo'] : ''; ?>" required><br><br>

        <label for="peso_brinquedo">Peso do Brinquedo:</label>
        <input type="number" step="0.01" id="peso_brinquedo" name="peso_brinquedo"
            value="<?php echo isset($brinquedo) ? $brinquedo['peso_brinquedo'] : ''; ?>" required><br><br>

        <label for="unidade_medida">Unidade de Medida:</label>
        <input type="text" id="unidade_medida" name="unidade_medida"
            value="<?php echo isset($brinquedo) ? $brinquedo['unidade_medida'] : ''; ?>" required><br><br>

        <label for="tipo_brinquedo">Tipo do Brinquedo:</label>
        <input type="text" id="tipo_brinquedo" name="tipo_brinquedo"
            value="<?php echo isset($brinquedo) ? $brinquedo['tipo_brinquedo'] : ''; ?>" required><br><br>

        <label for="tipo_animal">Tipo de Animal:</label>
        <input type="text" id="tipo_animal" name="tipo_animal"
            value="<?php echo isset($brinquedo) ? $brinquedo['tipo_animal'] : ''; ?>" required><br><br>

        <label for="quantidade">Quantidade:</label>
        <input type="number" id="quantidade" name="quantidade"
            value="<?php echo isset($brinquedo) ? $brinquedo['quantidade'] : ''; ?>" required><br><br>

        <button type="submit">Atualizar Brinquedo</button>
    </form>
</body>

</html>

<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['idbrinquedos'] ?? '';
    $nome_brinquedo = $_POST['nome_brinquedo'] ?? '';
    $peso_brinquedo = $_POST['peso_brinquedo'] ?? '';
    $unidade_medida = $_POST['unidade_medida'] ?? '';
    $tipo_brinquedo = $_POST['tipo_brinquedo'] ?? '';
    $tipo_animal = $_POST['tipo_animal'] ?? '';
    $quantidade = $_POST['quantidade'] ?? '';

    $sql = "UPDATE brinquedos SET nome_brinquedo = ?, peso_brinquedo = ?, unidade_medida = ?, tipo_brinquedo = ?, tipo_animal = ?, quantidade = ? WHERE idbrinquedos = ?";
    $stmt = mysqli_prepare($conexao, $sql);
    mysqli_stmt_bind_param($stmt, "sssssii", $nome_brinquedo, $peso_brinquedo, $unidade_medida, $tipo_brinquedo, $tipo_animal, $quantidade, $id);

    if (mysqli_stmt_execute($stmt)) {
        echo "Brinquedo atualizado com sucesso!";
    } else {
        echo "Erro ao atualizar brinquedo: " . mysqli_error($conexao);
    }
    header("Location: ../tables/brinquedos.php");
    exit;
}
?>
