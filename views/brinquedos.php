<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Brinquedos</title>
    <link rel="stylesheet" href="../assets/css/form.css">
</head>

<body>
    <?php include("../components/navbar.php"); ?>
    <form action="../api/processa_brinquedo.php" method="post">
        <input type="hidden" name="action" value="<?php echo isset($_GET['id']) ?>">

        <label for="nome_brinquedo">Marca do Brinquedo:</label>
        <input type="text" id="nome_brinquedo" name="nome_brinquedo" required>

        <label for="peso_brinquedo">Peso do Brinquedo:</label>
        <input type="number" id="peso_brinquedo" name="peso_brinquedo" required>

        <label for="unidade_medida">Unidade de Medida:</label>
        <input type="text" id="unidade_medida" name="unidade_medida" required>

        <label for="tipo_brinquedo">Tipo do Brinquedo:</label>
        <input type="text" id="tipo_brinquedo" name="tipo_brinquedo" required>

        <label for="tipo_animal">Tipo de Animal:</label>
        <input type="text" id="tipo_animal" name="tipo_animal" required>

        <label for="quantidade">Quantidade:</label>
        <input type="number" id="quantidade" name="quantidade" required>

        <button type="submit">Adicionar Brinquedo</button>
    </form>
</body>

</html>