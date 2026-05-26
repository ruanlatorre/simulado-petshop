<?php
require_once("../db/conection.php");

$movimentacao = null;

if (isset($_GET["id"])) {
    $id = $_GET["id"];

    $sql = "SELECT * FROM movimentacao WHERE idmovimentacao = ?";
    $stmt = mysqli_prepare($conexao, $sql);
    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "i", $id);
        if (mysqli_stmt_execute($stmt)) {
            $result = mysqli_stmt_get_result($stmt);
            $movimentacao = mysqli_fetch_assoc($result);
        }
        mysqli_stmt_close($stmt);
    }
}
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Movimentação</title>
    <link rel="stylesheet" href="../assets/css/form.css">
</head>

<body>
    <?php include("../components/navbar.php"); ?>
    <form action="" method="post">
        <input type="hidden" name="idmovimentacao"
            value="<?php echo isset($movimentacao) ? $movimentacao['idmovimentacao'] : ''; ?>">

        <label for="tipo">Tipo de Movimentação:</label>
        <select id="tipo" name="tipo" required>
            <option value="">Selecione o tipo</option>
            <option value="entrada" <?php echo (isset($movimentacao) && $movimentacao['tipo_mov'] === 'entrada') ? 'selected' : ''; ?>>Entrada</option>
            <option value="saida" <?php echo (isset($movimentacao) && $movimentacao['tipo_mov'] === 'saida') ? 'selected' : ''; ?>>Saída</option>
        </select><br><br>

        <label for="categoria">Categoria:</label>
        <input type="text" id="categoria" name="categoria"
            value="<?php echo isset($movimentacao) ? $movimentacao['categoria'] : ''; ?>" required readonly><br><br>

        <label for="produto">Produto:</label>
        <input type="text" id="produto" name="produto"
            value="<?php echo isset($movimentacao) ? $movimentacao['produto'] : ''; ?>" required readonly><br><br>

        <label for="quantidade">Quantidade:</label>
        <input type="number" id="quantidade" name="quantidade"
            value="<?php echo isset($movimentacao) ? $movimentacao['quantidade'] : ''; ?>" required><br><br>

        <button type="submit">Atualizar Movimentação</button>
    </form>
</body>

</html>

<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['idmovimentacao'] ?? '';
    $tipo = $_POST['tipo'] ?? '';
    $categoria = $_POST['categoria'] ?? '';
    $produto = $_POST['produto'] ?? '';
    $quantidade = $_POST['quantidade'] ?? '';

    // Buscar a quantidade anterior da movimentação para ajustar o estoque corretamente
    $sql_prev = "SELECT quantidade, tipo_mov FROM movimentacao WHERE idmovimentacao = ?";
    $stmt_prev = mysqli_prepare($conexao, $sql_prev);
    $prev_qty = 0;
    $prev_type = '';
    if ($stmt_prev) {
        mysqli_stmt_bind_param($stmt_prev, "i", $id);
        mysqli_stmt_execute($stmt_prev);
        $res_prev = mysqli_stmt_get_result($stmt_prev);
        if ($row_prev = mysqli_fetch_assoc($res_prev)) {
            $prev_qty = (int)$row_prev['quantidade'];
            $prev_type = $row_prev['tipo_mov'];
        }
        mysqli_stmt_close($stmt_prev);
    }

    $sql = "UPDATE movimentacao SET tipo_mov = ?, categoria = ?, produto = ?, quantidade = ? WHERE idmovimentacao = ?";
    $stmt = mysqli_prepare($conexao, $sql);
    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "sssii", $tipo, $categoria, $produto, $quantidade, $id);
        if (mysqli_stmt_execute($stmt)) {
            // Ajustar estoque da respectiva tabela de produto com base na diferença!
            $diff = (int)$quantidade - $prev_qty;
            if ($diff != 0 || $tipo !== $prev_type) {
                // 1. Reverter estoque anterior
                $sql_rev = "";
                switch ($categoria) {
                    case 'brinquedos':
                        $sql_rev = ($prev_type === 'entrada')
                            ? "UPDATE brinquedos SET quantidade = quantidade - ? WHERE nome_brinquedo = ?"
                            : "UPDATE brinquedos SET quantidade = quantidade + ? WHERE nome_brinquedo = ?";
                        break;
                    case 'higiene':
                        $sql_rev = ($prev_type === 'entrada')
                            ? "UPDATE produtos_higiene SET quantidade = quantidade - ? WHERE marca_produto = ?"
                            : "UPDATE produtos_higiene SET quantidade = quantidade + ? WHERE marca_produto = ?";
                        break;
                    case 'medicamentos':
                        $sql_rev = ($prev_type === 'entrada')
                            ? "UPDATE medicamentos SET quantidade = quantidade - ? WHERE nome_medicamento = ?"
                            : "UPDATE medicamentos SET quantidade = quantidade + ? WHERE nome_medicamento = ?";
                        break;
                    case 'racao':
                        $sql_rev = ($prev_type === 'entrada')
                            ? "UPDATE racoes SET quantidade = quantidade - ? WHERE marca_racao = ?"
                            : "UPDATE racoes SET quantidade = quantidade + ? WHERE marca_racao = ?";
                        break;
                }
                if (!empty($sql_rev)) {
                    $stmt_rev = mysqli_prepare($conexao, $sql_rev);
                    if ($stmt_rev) {
                        mysqli_stmt_bind_param($stmt_rev, "is", $prev_qty, $produto);
                        mysqli_stmt_execute($stmt_rev);
                        mysqli_stmt_close($stmt_rev);
                    }
                }

                // 2. Aplicar estoque novo
                $sql_new = "";
                switch ($categoria) {
                    case 'brinquedos':
                        $sql_new = ($tipo === 'entrada')
                            ? "UPDATE brinquedos SET quantidade = quantidade + ? WHERE nome_brinquedo = ?"
                            : "UPDATE brinquedos SET quantidade = quantidade - ? WHERE nome_brinquedo = ?";
                        break;
                    case 'higiene':
                        $sql_new = ($tipo === 'entrada')
                            ? "UPDATE produtos_higiene SET quantidade = quantidade + ? WHERE marca_produto = ?"
                            : "UPDATE produtos_higiene SET quantidade = quantidade - ? WHERE marca_produto = ?";
                        break;
                    case 'medicamentos':
                        $sql_new = ($tipo === 'entrada')
                            ? "UPDATE medicamentos SET quantidade = quantidade + ? WHERE nome_medicamento = ?"
                            : "UPDATE medicamentos SET quantidade = quantidade - ? WHERE nome_medicamento = ?";
                        break;
                    case 'racao':
                        $sql_new = ($tipo === 'entrada')
                            ? "UPDATE racoes SET quantidade = quantidade + ? WHERE marca_racao = ?"
                            : "UPDATE racoes SET quantidade = quantidade - ? WHERE marca_racao = ?";
                        break;
                }
                if (!empty($sql_new)) {
                    $stmt_new = mysqli_prepare($conexao, $sql_new);
                    if ($stmt_new) {
                        mysqli_stmt_bind_param($stmt_new, "is", $quantidade, $produto);
                        mysqli_stmt_execute($stmt_new);
                        mysqli_stmt_close($stmt_new);
                    }
                }
            }

            echo "Movimentação atualizada com sucesso!";
        } else {
            echo "Erro ao atualizar movimentação: " . mysqli_error($conexao);
        }
        mysqli_stmt_close($stmt);
    }
    header("Location: ../tables/movimentacao.php");
    exit;
}
?>
