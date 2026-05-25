<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Medicamentos - PetManager</title>
</head>

<body>
    <table class="tabela-medicamentos" style="border-collapse: collapse;">
        <thead style="border: 1px solid black;">
            <th>Nome do Medicamento</th>
            <th>Unidade de Medida</th>
            <th>Tipo de Sintoma</th>
            <th>Peso Recomendado</th>
            <th>Tipo de Animal</th>
            <th>Ações</th>
        </thead>
        <tbody style="border: 1px solid black;">
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
                    echo "<td><a href='edit_medicamento.php?id=" . $row['idmedicamentos'] . "'>Editar</a> | <a href='delete_medicamento.php?id=" . $row['idmedicamentos'] . "'>Excluir</a></td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='5'>Nenhum medicamento encontrado.</td></tr>";
            }

            mysqli_close($conexao);
            ?>
        </tbody>
    </table>
</body>

</html>