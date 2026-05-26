// Função para abrir a barra de navegação
function abrirNavBar() {
    const navbar = document.getElementById("navbarPet");
    navbar.style.display = "flex";
}

// Função para fechar a barra de navegação
function fecharNavBar() {
    const navbar = document.getElementById("navbarPet");
    navbar.style.display = "none";
}

// Função para alternar (abrir/fechar) a barra de navegação
function alternarNavBar() {
    const navbar = document.getElementById("navbarPet");
    if (navbar.style.display === "none" || navbar.style.display === "") {
        abrirNavBar();
    } else {
        fecharNavBar();
    }
}

// Função para mostrar apenas os links da pasta views (cadastros)
function mostrarCadastros() {
    const listViews = document.getElementById("list-views");
    const listTables = document.getElementById("list-tables");
    
    listViews.style.display = "flex";
    listTables.style.display = "none";
}

// Função para mostrar apenas os links da pasta tables (tabelas)
function mostrarTabelas() {
    const listViews = document.getElementById("list-views");
    const listTables = document.getElementById("list-tables");
    
    listViews.style.display = "none";
    listTables.style.display = "flex";
}
