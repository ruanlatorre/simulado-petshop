<?php
require_once("../db/conection.php");

$categoria = $_POST['categoria'] ?? $_GET['categoria'] ?? '';
$resultado = null;

if (!empty($categoria)) {
    switch ($categoria) {
        case 'brinquedos':
            $sql = "SELECT idbrinquedos, nome_brinquedo FROM brinquedos";
            break;
        case 'higiene':
            $sql = "SELECT idprodutohigiene, marca_produto FROM produtos_higiene";
            break;
        case 'medicamentos':
            $sql = "SELECT idmedicamentos, nome_medicamento FROM medicamentos";
            break;
        case 'racao':
            $sql = "SELECT idracoes, marca_racao FROM racoes";
            break;
        default:
            $sql = "";
    }

    if (!empty($sql)) {
        $resultado = mysqli_query($conexao, $sql);
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['registrar_movimentacao'])) {
    $tipo_mov = $_POST['tipo'] ?? '';
    $quantidade = $_POST['quantidade'] ?? '';
    $categoria = $_POST['categoria'] ?? '';
    $produto = $_POST['produto'] ?? '';


    $sql = "INSERT INTO movimentacao (tipo_mov, categoria, produto, quantidade) VALUES (?, ?, ?, ?)";
    $stmt = mysqli_prepare($conexao, $sql);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "sssi", $tipo_mov, $categoria, $produto, $quantidade);
        if (mysqli_stmt_execute($stmt)) {
            echo "Movimentação processada com sucesso!";


            $sql_update = "";
            switch ($categoria) {
                case 'brinquedos':
                    $sql_update = ($tipo_mov === 'entrada')
                        ? "UPDATE brinquedos SET quantidade = quantidade + ? WHERE nome_brinquedo = ?"
                        : "UPDATE brinquedos SET quantidade = quantidade - ? WHERE nome_brinquedo = ?";
                    break;
                case 'higiene':
                    $sql_update = ($tipo_mov === 'entrada')
                        ? "UPDATE produtos_higiene SET quantidade = quantidade + ? WHERE marca_produto = ?"
                        : "UPDATE produtos_higiene SET quantidade = quantidade - ? WHERE marca_produto = ?";
                    break;
                case 'medicamentos':
                    $sql_update = ($tipo_mov === 'entrada')
                        ? "UPDATE medicamentos SET quantidade = quantidade + ? WHERE nome_medicamento = ?"
                        : "UPDATE medicamentos SET quantidade = quantidade - ? WHERE nome_medicamento = ?";
                    break;
                case 'racao':
                    $sql_update = ($tipo_mov === 'entrada')
                        ? "UPDATE racoes SET quantidade = quantidade + ? WHERE marca_racao = ?"
                        : "UPDATE racoes SET quantidade = quantidade - ? WHERE marca_racao = ?";
                    break;
            }

            if (!empty($sql_update)) {
                $stmt_update = mysqli_prepare($conexao, $sql_update);
                if ($stmt_update) {
                    mysqli_stmt_bind_param($stmt_update, "is", $quantidade, $produto);
                    mysqli_stmt_execute($stmt_update);
                    mysqli_stmt_close($stmt_update);
                }
            }

            // Verificação simples se o estoque do produto está menor que 20
            $sql_check = "";
            switch ($categoria) {
                case 'brinquedos':
                    $sql_check = "SELECT quantidade FROM brinquedos WHERE nome_brinquedo = ?";
                    break;
                case 'higiene':
                    $sql_check = "SELECT quantidade FROM produtos_higiene WHERE marca_produto = ?";
                    break;
                case 'medicamentos':
                    $sql_check = "SELECT quantidade FROM medicamentos WHERE nome_medicamento = ?";
                    break;
                case 'racao':
                    $sql_check = "SELECT quantidade FROM racoes WHERE marca_racao = ?";
                    break;
            }

            if (!empty($sql_check)) {
                $stmt_check = mysqli_prepare($conexao, $sql_check);
                if ($stmt_check) {
                    mysqli_stmt_bind_param($stmt_check, "s", $produto);
                    mysqli_stmt_execute($stmt_check);
                    $res_check = mysqli_stmt_get_result($stmt_check);
                    if ($row_check = mysqli_fetch_assoc($res_check)) {
                        $estoque_atual = (int)$row_check['quantidade'];
                        if ($estoque_atual < 20) {
                            echo "<script>alert('Erro: O estoque deste produto está abaixo de 20 unidades! Estoque atual: " . $estoque_atual . "'); window.location.href = '../views/movimentacao.php';</script>";
                            exit;
                        }
                    }
                    mysqli_stmt_close($stmt_check);
                }
            }
        } else {
            echo "Erro ao processar movimentação: " . mysqli_error($conexao);
        }
        mysqli_stmt_close($stmt);
    }

    header("Location: ../views/movimentacao.php");
    exit;
}
?>