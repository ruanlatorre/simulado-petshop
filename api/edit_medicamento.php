<?php
require_once("../db/conection.php");

if (isset($_GET["id"])) {
    $id = $_GET["id"];

    $sql = "SELECT * FROM medicamentos WHERE idmedicamentos = ?";
    $stmt = mysqli_prepare($conexao, $sql);
    mysqli_stmt_bind_param($stmt, "i", $id);

    if (mysqli_stmt_execute($stmt)) {
        $result = mysqli_stmt_get_result($stmt);
        $medicamento = mysqli_fetch_assoc($result);
    } else {
        echo "Erro ao buscar medicamento: " . mysqli_error($conexao);
        exit;
    }
}
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Medicamento</title>
    <link rel="stylesheet" href="../assets/css/form.css">
</head>

<body>
    <?php include("../components/navbar.php"); ?>
    <form action="" method="post">
        <input type="hidden" name="idmedicamentos"
            value="<?php echo isset($medicamento) ? $medicamento['idmedicamentos'] : ''; ?>">

        <label for="nome_medicamento">Nome do Medicamento:</label>
        <input type="text" id="nome_medicamento" name="nome_medicamento"
            value="<?php echo isset($medicamento) ? $medicamento['nome_medicamento'] : ''; ?>" required><br><br>

        <label for="unidade_medida">Unidade de Medida:</label>
        <input type="text" id="unidade_medida" name="unidade_medida"
            value="<?php echo isset($medicamento) ? $medicamento['unidade_medida'] : ''; ?>" required><br><br>

        <label for="tipo_sintoma">Tipo de Sintoma:</label>
        <input type="text" id="tipo_sintoma" name="tipo_sintoma"
            value="<?php echo isset($medicamento) ? $medicamento['tipo_sintoma'] : ''; ?>" required><br><br>

        <label for="peso_recomendado">Peso Recomendado:</label>
        <input type="number" step="0.01" id="peso_recomendado" name="peso_recomendado"
            value="<?php echo isset($medicamento) ? $medicamento['peso_recomendado'] : ''; ?>" required><br><br>

        <label for="tipo_animal">Tipo de Animal:</label>
        <input type="text" id="tipo_animal" name="tipo_animal"
            value="<?php echo isset($medicamento) ? $medicamento['tipo_animal'] : ''; ?>" required><br><br>

        <button type="submit">Atualizar Medicamento</button>
    </form>
</body>

</html>

<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['idmedicamentos'] ?? '';
    $nome_medicamento = $_POST['nome_medicamento'] ?? '';
    $unidade_medida = $_POST['unidade_medida'] ?? '';
    $tipo_sintoma = $_POST['tipo_sintoma'] ?? '';
    $peso_recomendado = $_POST['peso_recomendado'] ?? '';
    $tipo_animal = $_POST['tipo_animal'] ?? '';

    $sql = "UPDATE medicamentos SET nome_medicamento = ?, unidade_medida = ?, tipo_sintoma = ?, peso_recomendado = ?, tipo_animal = ? WHERE idmedicamentos = ?";
    $stmt = mysqli_prepare($conexao, $sql);
    mysqli_stmt_bind_param($stmt, "sssssi", $nome_medicamento, $unidade_medida, $tipo_sintoma, $peso_recomendado, $tipo_animal, $id);

    if (mysqli_stmt_execute($stmt)) {
        echo "Medicamento atualizado com sucesso!";
    } else {
        echo "Erro ao atualizar medicamento: " . mysqli_error($conexao);
    }
    header("Location: ../tables/medicamento.php");
    exit;
}
?>