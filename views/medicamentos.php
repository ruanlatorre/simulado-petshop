

<?php session_start(); require_once("../db/conection.php"); ?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Medicamentos - PetManager</title>
</head>
<body>
    <form action="../api/processa_medicamento.php" method="post">
        <input type="hidden" name="action" value="<?php echo isset($_GET['id']) ?>">

        <label for="nome_medicamento">Nome do Medicamento:</label>
        <input type="text" id="nome_medicamento" name="nome_medicamento" required>

        <label for="unidade_medida">Unidade de Medida:</label>
        <input type="text" id="unidade_medida" name="unidade_medida" required>

        <label for="tipo_sintoma">Tipo de Sintoma:</label>
        <input type="text" id="tipo_sintoma" name="tipo_sintoma" required>

        <label for="peso_recomendado">Peso Recomendado:</label>
        <input type="number" id="peso_recomendado" name="peso_recomendado" step="0.01" required>

        <label for="tipo_animal">Tipo de Animal:</label>
        <input type="text" id="tipo_animal" name="tipo_animal" required>

        <button type="submit">Adicionar Medicamento</button>
    </form>
</body>
</html>