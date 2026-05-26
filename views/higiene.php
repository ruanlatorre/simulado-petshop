<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produtos de Higiene</title>
    <link rel="stylesheet" href="../assets/css/form.css">
</head>

<body>
    <?php include("../components/navbar.php"); ?>
    <form action="../api/processa_higiene.php" method="post">
        <input type="hidden" name="action" value="<?php echo isset($_GET['id']) ?>">

        <label for="marca_produto">Marca do Produto:</label>
        <input type="text" id="marca_produto" name="marca_produto" required>

        <label for="tipo_produto">Tipo do Produto:</label>
        <input type="text" id="tipo_produto" name="tipo_produto" required>

        <label for="peso_produto">Peso do Produto:</label>
        <input type="text" id="peso_produto" name="peso_produto" required>

        <label for="unidade_medida">Unidade de Medida:</label>
        <select id="unidade_medida" name="unidade_medida" required>
            <option value="">Selecione...</option>
            <option value="kg">Quilograma</option>
            <option value="g">Grama</option>
            <option value="l">Litro</option>
            <option value="ml">Mililitro</option>
        </select>

        <label for="tipo_animal">Tipo de Animal:</label>
        <input type="text" id="tipo_animal" name="tipo_animal" required>

        <label for="quantidade">Quantidade:</label>
        <input type="number" id="quantidade" name="quantidade" required>

        <button type="submit">Adicionar Produto de Higiene</button>
    </form>
</body>

</html>