# Testes de Software - PetManager

Este documento descreve os testes de integração e validação de dados realizados no sistema PetManager.

## 1. Conexao com o Banco de Dados
- Objetivo: Garantir que o sistema consegue estabelecer uma conexao segura e estavel com o banco de dados MySQL 'petshop_db'.
- Metodo: Chamada direta utilizando 'db/conection.php' com a porta de conexao correspondente.
- Resultado: Aprovado. A conexao foi estabelecida com sucesso.

## 2. Validacao de Limite de Estoque Baixo (Menor que 20)
- Objetivo: Validar se os processadores do backend conseguem identificar se a quantidade em estoque cadastrada ou resultante de uma movimentacao e menor que 20.
- Metodo: Condicionais simples de comparacao (int)$quantidade < 20.
- Resultado: Aprovado. O script exibe com sucesso um alerta alert() do JavaScript impedindo ou alertando o usuario, e redireciona de volta para a pagina de origem.

## 3. Integridade de Dados com Prepared Statements
- Objetivo: Testar o cadastro de um novo produto (Higiene) utilizando Prepared Statements do MySQLi, garantindo que o banco de dados receba todas as colunas de forma segura contra SQL Injection.
- Metodo: Insercao de dados simulados utilizando mysqli_prepare, mysqli_stmt_bind_param e limpeza imediata dos dados apos o teste.
- Resultado: Aprovado. O registro foi inserido de forma segura no banco de dados e limpo logo em seguida para manter o ambiente estável.

## 4. Atualizacao Dinamica e Alerta apos Movimentacao de Estoque
- Objetivo: Verificar se, apos registrar uma entrada ou saida de mercadoria, o sistema consulta o novo saldo do estoque e dispara um erro se o saldo estiver abaixo de 20.
- Metodo: Execucao da query SQL de UPDATE seguida de uma query SQL de SELECT com prepared statements para leitura do estoque final do respectivo produto.
- Resultado: Aprovado. A movimentacao altera corretamente o estoque no banco de dados e dispara o alerta contendo o saldo atualizado caso fique abaixo de 20 unidades.

## Como Executar os Testes Automatizados
Voce pode rodar a suite de testes de integracao que foi criada para o sistema de duas maneiras simples:

1. Pelo navegador de preferencia:
http://localhost/simulado_petshop/

