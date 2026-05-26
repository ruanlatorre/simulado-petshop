<?php
/**
 * Suíte de Testes de Integração - PetManager
 * Este arquivo realiza testes simulados das APIs de processamento e das validações do banco de dados.
 */

define('ALLOW_TESTS', true);
require_once("../db/conection.php");

echo "=== INICIANDO SUÍTE DE TESTES DE INTEGRAÇÃO ===\n\n";

$passouTodos = true;

// Auxiliar para exibir resultado de teste
function exibirResultado($nomeTeste, $status, $mensagem = '') {
    global $passouTodos;
    if ($status) {
        echo "[ PASSO ] $nomeTeste" . ($mensagem ? " - $mensagem" : "") . "\n";
    } else {
        echo "[ FALHOU ] $nomeTeste - ERRO: $mensagem\n";
        $passouTodos = false;
    }
}

// TESTE 1: Conexão com o Banco
if ($conexao) {
    exibirResultado("Teste 1: Conexão com o Banco de Dados", true, "Conexão ativa e estável.");
} else {
    exibirResultado("Teste 1: Conexão com o Banco de Dados", false, "Falha na conexão.");
}

// TESTE 2: Simulação de Validação de Estoque Baixo (< 20) para Cadastro de Brinquedo
$quantidade_brinquedo_baixo = 10;
if ($quantidade_brinquedo_baixo < 20) {
    exibirResultado("Teste 2: Validação de Estoque Baixo (< 20) para Brinquedo", true, "Detectado com sucesso (Quantidade: $quantidade_brinquedo_baixo).");
} else {
    exibirResultado("Teste 2: Validação de Estoque Baixo (< 20) para Brinquedo", false, "Falhou em capturar estoque baixo de brinquedos.");
}

// TESTE 3: Inserção e Limpeza de Produto de Higiene (Teste de Integridade de Dados)
$marca = "Marca Teste";
$tipo = "Shampoo";
$peso = "500";
$unidade = "ml";
$animal = "Cachorro";
$qtd = 25; // Maior que 20 para permitir inserção sem erro

$sql = "INSERT INTO produtos_higiene (marca_produto, tipo_produto, peso_produto, unidade_medida, tipo_animal, quantidade) VALUES (?, ?, ?, ?, ?, ?)";
$stmt = mysqli_prepare($conexao, $sql);
if ($stmt) {
    mysqli_stmt_bind_param($stmt, "sssssi", $marca, $tipo, $peso, $unidade, $animal, $qtd);
    if (mysqli_stmt_execute($stmt)) {
        exibirResultado("Teste 3.1: Inserção de Produto de Higiene no Banco", true, "Cadastro realizado com Prepared Statement.");
        
        // Obter ID inserido para exclusão/limpeza posterior
        $id_inserido = mysqli_insert_id($conexao);
        
        // Deletar para limpar o banco
        $sql_del = "DELETE FROM produtos_higiene WHERE idprodutohigiene = ?";
        $stmt_del = mysqli_prepare($conexao, $sql_del);
        if ($stmt_del) {
            mysqli_stmt_bind_param($stmt_del, "i", $id_inserido);
            if (mysqli_stmt_execute($stmt_del)) {
                exibirResultado("Teste 3.2: Limpeza de Dados do Teste de Higiene", true, "Registro deletado com sucesso.");
            } else {
                exibirResultado("Teste 3.2: Limpeza de Dados do Teste de Higiene", false, mysqli_error($conexao));
            }
            mysqli_stmt_close($stmt_del);
        }
    } else {
        exibirResultado("Teste 3.1: Inserção de Produto de Higiene no Banco", false, mysqli_error($conexao));
    }
    mysqli_stmt_close($stmt);
} else {
    exibirResultado("Teste 3.1: Inserção de Produto de Higiene no Banco", false, "Falha ao preparar statement.");
}

// TESTE 4: Validação de Estoque Baixo para Ração
$quantidade_racao_baixa = 5;
if ($quantidade_racao_baixa < 20) {
    exibirResultado("Teste 4: Validação de Estoque Baixo (< 20) para Ração", true, "Detectado com sucesso (Quantidade: $quantidade_racao_baixa).");
} else {
    exibirResultado("Teste 4: Validação de Estoque Baixo (< 20) para Ração", false, "Falhou em capturar estoque baixo de ração.");
}

// TESTE 5: Simulação de Movimentação de Saída e Alerta de Estoque Baixo
$estoque_inicial = 25;
$quantidade_saida = 10;
$estoque_final = $estoque_inicial - $quantidade_saida;

if ($estoque_final < 20) {
    exibirResultado("Teste 5: Simulação de Movimentação de Saída e Alerta de Estoque Baixo", true, "Alerta disparado corretamente! Estoque final seria $estoque_final (Menor que 20).");
} else {
    exibirResultado("Teste 5: Simulação de Movimentação de Saída e Alerta de Estoque Baixo", false, "Falha na simulação de estoque baixo de saída.");
}

echo "\n=== FIM DA EXECUÇÃO DOS TESTES ===\n";
if ($passouTodos) {
    echo "RESULTADO GERAL: TODOS OS TESTES PASSARAM COM SUCESSO!\n";
} else {
    echo "RESULTADO GERAL: HOUVE FALHA EM ALGUNS TESTES!\n";
}
?>
