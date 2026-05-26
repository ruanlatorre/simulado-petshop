<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ração</title>
    <link rel="stylesheet" href="../assets/css/tables.css">
</head>

<body>
    <?php include("../components/navbar.php"); ?>
    <main class="container-tabela">
        <table class="tabela-racao">
        <thead>
            <tr>
                <th>ID</th>
                <th>Marca da Ração</th>
                <th>Tipo da Ração</th>
                <th>Sabor da Ração</th>
                <th>Peso da Ração</th>
                <th>Unidade de Medida</th>
                <th>Tipo de Animal</th>
                <th>Quantidade</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php
            require_once("../db/conection.php");

            $sql = "SELECT * FROM racoes";
            $resultado = mysqli_query($conexao, $sql);

            if (mysqli_num_rows($resultado) > 0) {
                while ($row = mysqli_fetch_assoc($resultado)) {
                    echo "<tr>";
                    echo "<td>" . htmlspecialchars($row['idracoes']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['marca_racao']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['tipo_racao']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['sabor_racao']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['peso_racao']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['unidade_medida']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['tipo_animal']) . "</td>";
                    $qtd = (int)$row['quantidade'];
                    $estoque_baixo = ($qtd < 20) ? '<p style="color: red; font-size: 12px; margin: 4px 0 0 0; font-weight: bold;">⚠️ Estoque Baixo!</p>' : '';
                    echo "<td>" . htmlspecialchars($qtd) . $estoque_baixo . "</td>";
                    echo "<td><a href='../api/edit_racao.php?id=" . $row['idracoes'] . "'>Editar</a> | <a href='../api/delete_racao.php?id=" . $row['idracoes'] . "'>Excluir</a></td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td>Nenhuma ração encontrada.</td></tr>";
            }

            mysqli_close($conexao);
            ?>
        </tbody>
    </table>
    </main>
</body>

</html>