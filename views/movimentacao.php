<?php require_once("../api/processa_movimentacao.php"); ?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../assets/css/tables.css">
    <link rel="stylesheet" href="../assets/css/form.css">
</head>

<body>

    <?php include("../components/navbar.php"); ?>

    <form action="../api/processa_movimentacao.php" method="post" id="movimentacaoForm">
        <input type="hidden" name="action" value="<?php echo isset($_GET['id']) ?>">
        <label for="tipo">Tipo de Movimentação:</label>
        <select id="tipo" name="tipo" required>
            <option value="">Selecione o tipo</option>
            <option value="entrada" <?php echo (($_POST['tipo'] ?? '') === 'entrada') ? 'selected' : ''; ?>>Entrada
            </option>
            <option value="saida" <?php echo (($_POST['tipo'] ?? '') === 'saida') ? 'selected' : ''; ?>>Saída</option>
        </select>

        <label for="categoria">Categoria:</label>
        <select id="categoria" name="categoria" required onchange="location.href='?categoria='+this.value">
            <option value="">Selecione uma categoria</option>
            <option value="brinquedos" <?php echo (($categoria ?? '') === 'brinquedos') ? 'selected' : ''; ?>>Brinquedos</option>
            <option value="higiene" <?php echo (($categoria ?? '') === 'higiene') ? 'selected' : ''; ?>>Higiene</option>
            <option value="medicamentos" <?php echo (($categoria ?? '') === 'medicamentos') ? 'selected' : ''; ?>>Medicamentos</option>
            <option value="racao" <?php echo (($categoria ?? '') === 'racao') ? 'selected' : ''; ?>>Ração</option>
        </select>

        <label for="produto">Produto:</label>
        <select id="produto" name="produto" required>
            <option value="">Selecione um produto</option>
            <?php
            if (!empty($resultado) && mysqli_num_rows($resultado) > 0) {
                while ($row = mysqli_fetch_assoc($resultado)) {
                    $nome = '';
                    if (isset($row['nome_brinquedo'])) {
                        $nome = $row['nome_brinquedo'];
                    } elseif (isset($row['marca_produto'])) {
                        $nome = $row['marca_produto'];
                    } elseif (isset($row['nome_medicamento'])) {
                        $nome = $row['nome_medicamento'];
                    } elseif (isset($row['marca_racao'])) {
                        $nome = $row['marca_racao'];
                    }

                    echo "<option value='" . htmlspecialchars($nome) . "'>" . htmlspecialchars($nome) . "</option>";
                }
            }
            ?>
        </select>

        <label for="quantidade">Quantidade:</label>
        <input type="number" id="quantidade" name="quantidade"
            value="<?php echo htmlspecialchars($_POST['quantidade'] ?? ''); ?>" required>

        <input type="hidden" name="registrar_movimentacao" value="1">
        <button type="submit">Adicionar Movimentação</button>
    </form>
</body>

</html>