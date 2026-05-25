<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Brinquedos</title>
</head>
<body>
    <table class="tabela-brinquedos" style="border-collapse: collapse;">
        <thead style="border: 1px solid black;">
            <th>Nome do Brinquedo</th>
            <th>Tipo de Brinquedo</th>
            <th>Material</th>
            <th>Tamanho</th>
            <th>Ações</th>
        </thead>
        <tbody style="border: 1px solid black;">
            <?php
            require_once("../db/conection.php");

            $sql = "SELECT * FROM brinquedos";
            $resultado = mysqli_query($conexao, $sql);

            if (mysqli_num_rows($resultado) > 0) {
                while ($row = mysqli_fetch_assoc($resultado)) {
                    echo "<tr>";
                    echo "<td>" . htmlspecialchars($row['idbrinquedos']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['nome_brinquedo']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['tipo_brinquedo']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['material']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['tamanho']) . "</td>";
                    echo "<td><a href='edit_brinquedo.php?id=" . $row['idbrinquedos'] . "'>Editar</a> | <a href='delete_brinquedo.php?id=" . $row['idbrinquedos'] . "'>Excluir</a></td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='5'>Nenhum brinquedo encontrado.</td></tr>";
            }
            ?>
        </tbody>
</body>
</html>