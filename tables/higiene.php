<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produtos de Higiene</title>
    <link rel="stylesheet" href="../assets/css/tables.css">
</head>

<body>
    <?php include("../components/navbar.php"); ?>
    <main class="container-tabela">
        <table class="tabela-higiene">
        <thead>
            <tr>
                <th>ID</th>
                <th>Marca do Produto</th>
                <th>Tipo do Produto</th>
                <th>Peso do Produto</th>
                <th>Unidade de Medida</th>
                <th>Tipo de Animal</th>
                <th>Quantidade</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody style="border: 1px solid black;">
            <?php
            require_once("../db/conection.php");

            $sql = "SELECT * FROM produtos_higiene";
            $resultado = mysqli_query($conexao, $sql);

            if (mysqli_num_rows($resultado) > 0) {
                while ($row = mysqli_fetch_assoc($resultado)) {
                    echo "<tr>";
                    echo "<td>" . htmlspecialchars($row['idprodutohigiene']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['marca_produto']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['tipo_produto']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['peso_produto']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['unidade_medida']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['tipo_animal']) . "</td>";
                    $qtd = (int)$row['quantidade'];
                    $estoque_baixo = ($qtd < 20) ? '<p style="color: red; font-size: 12px; margin: 4px 0 0 0; font-weight: bold;">⚠️ Estoque Baixo!</p>' : '';
                    echo "<td>" . htmlspecialchars($qtd) . $estoque_baixo . "</td>";
                    echo "<td><a href='../api/edit_higiene.php?id=" . $row['idprodutohigiene'] . "'>Editar</a> | <a href='../api/delete_higiene.php?id=" . $row['idprodutohigiene'] . "'>Excluir</a></td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td>Nenhum produto de higiene encontrado.</td></tr>";
            }

            mysqli_close($conexao);
            ?>
        </tbody>

    </table>
    </main>
</body>

</html>