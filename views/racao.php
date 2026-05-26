<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ração</title>
    <link rel="stylesheet" href="../assets/css/form.css">
</head>
<body>
    <?php include("../components/navbar.php"); ?>
    <form action="../api/processa_racao.php" method="post">
        <input type="hidden" name="id" value="<?php echo isset($racao) ?>">

        <label for="marca_racao">Marca da Ração:</label>
        <input type="text" id="marca_racao" name="marca_racao" required><br><br>

        <label for="tipo_racao">Tipo da Ração:</label>
        <input type="text" id="tipo_racao" name="tipo_racao" required><br><br>

        <label for="sabor_racao">Sabor da Ração:</label>
        <input type="text" id="sabor_racao" name="sabor_racao" required><br><br>

        <label for="peso_racao">Peso da Ração:</label>
        <input type="number" id="peso_racao" name="peso_racao" required><br><br>

        <label for="unidade_medida">Unidade de Medida:</label>
        <input type="text" id="unidade_medida" name="unidade_medida" required><br><br>

        <label for="tipo_animal">Tipo de Animal:</label>
        <input type="text" id="tipo_animal" name="tipo_animal" required><br><br>

        <label for="quantidade">Quantidade:</label>
        <input type="number" id="quantidade" name="quantidade" required><br><br>

        <button type="submit">Adicionar Ração</button>
    </form>
</body>
</html>