# Requisitos de Infraestrutura - PetManager

Este documento descreve os requisitos de infraestrutura e ambiente necessários para hospedar, implantar e executar o sistema PetManager (Sistema de Gestão de Estoque do PetShop).

## 1. Servidor Web (Web Server)
- Servidor recomendado: Apache 2.4 ou superior / Nginx 1.18 ou superior.
- Modulo necessario: mod_rewrite (ativo por padrao na maioria dos servidores).
- Porta de operacao padrao: Porta 80 (HTTP) e/ou Porta 443 (HTTPS).

## 2. Ambiente de Execucao (Backend)
- Interpretador: PHP 7.4 ou superior (Recomendado PHP 8.1 ou superior).
- Extensoes PHP obrigatorias:
  * mysqli (obrigatoria para a conexao e Prepared Statements).
  * session (para controle e validacao do fluxo de login e logout).
  * json (para integracoes futuras e tratamento de dados).

## 3. Servidor de Banco de Dados (Database Server)
- SGDB Recomendado: MySQL 5.7 ou superior / MariaDB 10.3 ou superior.
- Portas de operacao: Porta 3306 (MySQL padrão).
- Armazenamento: InnoDB (mecanismo usado nas tabelas para suportar transacoes e chaves estrangeiras com seguranca).

## 4. Ambiente de Desenvolvimento Local (XAMPP / WampServer)
Para rodar e testar o sistema localmente em ambiente Windows ou Linux, e necessario possuir uma suite integrada ativa:
- XAMPP v7.4.x ou superior (ja contem Apache, PHP com mysqli e MySQL/MariaDB integrados).
- Diretorio de publicacao padrao: c:/xampp/htdocs/

## 5. Requisitos de Hardware Recomendados (Servidor de Producao)
Para um sistema leve baseado em PHP e MySQLi estruturado, os requisitos sao de baixo custo:
- Processador: 1 vCPU ou superior.
- Memoria RAM: 1 GB ou superior.
- Armazenamento: 10 GB de disco (SSD recomendado para velocidade de leitura/gravacao no banco de dados).

## 6. Requisitos de Hardware para o Cliente (Usuario Final)
O sistema opera diretamente no navegador, exigindo recursos minimos da maquina cliente:
- Navegador Web moderno com suporte a JavaScript ativo (Google Chrome, Mozilla Firefox, Microsoft Edge ou Safari).
- Resolução de tela mínima: 1024x768 pixels.
