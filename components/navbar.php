<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/navbar.css">
    <script src="../assets/js/script.js"></script>
</head>

<body>
    <button class="toggle-nav-btn" onclick="alternarNavBar()">☰ Menu de Navegação</button>
    <nav class="navbar-pet" id="navbarPet" style="display: none;">
        <div class="nav-folders">
            <button class="folder-btn active" id="btn-cadastros" onclick="mostrarCadastros()">📂 Pasta: Cadastros (Views)</button>
            <button class="folder-btn" id="btn-tabelas" onclick="mostrarTabelas()">📁 Pasta: Tabelas (Tables)</button>
        </div>

        <ul class="lista-links-pet" id="list-views">
            <li class="link-pet"><a href="../views/medicamentos.php">Medicamentos</a></li>
            <li class="link-pet"><a href="../views/racao.php">Rações</a></li>
            <li class="link-pet"><a href="../views/higiene.php">Produtos de Higiene</a></li>
            <li class="link-pet"><a href="../views/brinquedos.php">Brinquedos</a></li>
            <li class="link-pet"><a href="../views/movimentacao.php">Movimentações</a></li>
            <li class="link-pet"><a href="../auth/logout.php" class="btn-sair">Sair</a></li>
        </ul>

        <ul class="lista-links-pet" id="list-tables" style="display: none;">
            <li class="link-pet"><a href="../tables/brinquedos.php">Tabela de Brinquedos</a></li>
            <li class="link-pet"><a href="../tables/racao.php">Tabela de Rações</a></li>
            <li class="link-pet"><a href="../tables/medicamento.php">Tabela de Medicamentos</a></li>
            <li class="link-pet"><a href="../tables/higiene.php">Tabela de Produtos de Higiene</a></li>
            <li class="link-pet"><a href="../tables/movimentacao.php">Tabela de Movimentações</a></li>
            <li class="link-pet"><a href="../auth/logout.php" class="btn-sair">Sair</a></li>
        </ul>
    </nav>
</body>

</html>