<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Medicamentos - PetManager</title>
    <link rel="stylesheet" href="../assets/css/tables.css">
</head>

<body>
    <?php include("../components/navbar.php"); ?>
    <main class="container-tabela">
        <table class="tabela-medicamentos">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome do Medicamento</th>
                    <th>Unidade de Medida</th>
                    <th>Tipo de Sintoma</th>
                    <th>Peso Recomendado</th>
                    <th>Tipo de Animal</th>
                    <th>Quantidade</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php
                require_once("../db/conection.php");

                $sql = "SELECT *FROM medicamentos";
                $resultado = mysqli_query($conexao, $sql);

                if (mysqli_num_rows($resultado) > 0) {
                    while ($row = mysqli_fetch_assoc($resultado)) {
                        echo "<tr>";
                        echo "<td>" . htmlspecialchars($row['idmedicamentos']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['nome_medicamento']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['unidade_medida']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['tipo_sintoma']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['peso_recomendado']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['tipo_animal']) . "</td>";
                        $qtd = (int)$row['quantidade'];
                        $estoque_baixo = ($qtd < 20) ? '<p style="color: red; font-size: 12px; margin: 4px 0 0 0; font-weight: bold;">⚠️ Estoque Baixo!</p>' : '';
                        echo "<td>" . htmlspecialchars($qtd) . $estoque_baixo . "</td>";
                        echo "<td><a href='../api/edit_medicamento.php?id=" . $row['idmedicamentos'] . "'>Editar</a> | <a href='../api/delete_medicamento.php?id=" . $row['idmedicamentos'] . "'>Excluir</a></td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td>Nenhum medicamento encontrado.</td></tr>";
                }

                mysqli_close($conexao);
                ?>
            </tbody>
        </table>
    </main>
</body>

</html>