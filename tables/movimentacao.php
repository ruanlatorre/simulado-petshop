<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Movimentação - PetManager</title>
    <link rel="stylesheet" href="../assets/css/tables.css">
</head>

<body>
    <?php include("../components/navbar.php"); ?>
    <main class="container-tabela">
        <table class="tabela-movimentacao">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Tipo de Movimentação</th>
                    <th>Categoria</th>
                    <th>Produto</th>
                    <th>Quantidade</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php
                require_once("../db/conection.php");

                $sql = "SELECT * FROM movimentacao";
                $resultado = mysqli_query($conexao, $sql);

                if (mysqli_num_rows($resultado) > 0) {
                    while ($row = mysqli_fetch_assoc($resultado)) {
                        echo "<tr>";
                        echo "<td>" . htmlspecialchars($row['idmovimentacao']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['tipo_mov']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['categoria']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['produto']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['quantidade']) . "</td>";
                        echo "<td> <a href='../api/delete_movimentacao.php?id=" . htmlspecialchars($row['idmovimentacao']) . "'>Excluir</a> | <a href='../views/movimentacao.php?id=" . htmlspecialchars($row['idmovimentacao']) . "'>Editar</a>" . "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td>Nenhuma movimentação encontrada.</td></tr>";
                }

                mysqli_close($conexao);
                ?>
            </tbody>
        </table>
    </main>
</body>

</html>