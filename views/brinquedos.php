<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Brinquedos</title>
</head>
<body>
    <form action="../api/processa_brinquedo.php" method="post">
        <input type="hidden" name="action" value="<?php echo isset($_GET['id']) ?>">

        <label for="nome_brinquedo">Nome do Brinquedo:</label>
        <input type="text" id="nome_brinquedo" name="nome_brinquedo" required>

        <label for="tipo_brinquedo">Tipo de Brinquedo:</label>
        <input type="text" id="tipo_brinquedo" name="tipo_brinquedo" required>

        <label for="material">Material:</label>
        <input type="text" id="material" name="material" required>

        <label for="tamanho">Tamanho:</label>
        <input type="text" id="tamanho" name="tamanho" required>

        <label for="tipo_animal">Tipo de Animal:</label>
        <button type="submit">Adicionar Brinquedo</button>
    </form>
</body>
</html>