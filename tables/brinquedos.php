<?php require_once("../db/conection.php"); ?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Brinquedos</title>
    <link rel="stylesheet" href="../assets/css/tables.css">
</head>

<body>
    <?php include("../components/navbar.php"); ?>
    <main class="container-tabela">
        <table class="tabela-brinquedos">
        <thead>
            <th>ID</th>
            <th>Nome do Brinquedo</th>
            <th>Peso</th>
            <th>Unidade de Medida</th>
            <th>Tipo de Brinquedo</th>
            <th>Tipo de Animal</th>
            <th>Quantidade</th>
            <th>Ações</th>
        </thead>
        <tbody>
            <?php
            $sql = "SELECT * FROM brinquedos";
            $resultado = mysqli_query($conexao, $sql);
            if (mysqli_num_rows($resultado) > 0) {
                while ($row = mysqli_fetch_assoc($resultado)) {
                    echo "<tr>";
                    echo "<td>" . htmlspecialchars($row['idbrinquedos']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['nome_brinquedo']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['peso_brinquedo']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['unidade_medida']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['tipo_brinquedo']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['tipo_animal']) . "</td>";
                    $qtd = (int)$row['quantidade'];
                    $estoque_baixo = ($qtd < 20) ? '<p style="color: red; font-size: 12px; margin: 4px 0 0 0; font-weight: bold;">⚠️ Estoque Baixo!</p>' : '';
                    echo "<td>" . htmlspecialchars($qtd) . $estoque_baixo . "</td>";

                    echo "<td><a href='../api/edit_brinquedo.php?id=" . $row['idbrinquedos'] . "'>Editar</a> | <a href='../api/delete_brinquedo.php?id=" . $row['idbrinquedos'] . "'>Excluir</a></td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td>Nenhum brinquedo encontrado.</td></tr>";
            }
            ?>
        </tbody>
    </table>
    </main>
</body>

</html>