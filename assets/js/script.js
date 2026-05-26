function abrirNavBar() {
    const navbar = document.getElementById("navbarPet");
    navbar.style.display = "flex";
}

function fecharNavBar() {
    const navbar = document.getElementById("navbarPet");
    navbar.style.display = "none";
}

function alternarNavBar() {
    const navbar = document.getElementById("navbarPet");
    if (navbar.style.display === "none" || navbar.style.display === "") {
        abrirNavBar();
    } else {
        fecharNavBar();
    }
}

function mostrarCadastros() {
    const listViews = document.getElementById("list-views");
    const listTables = document.getElementById("list-tables");
    const btnCadastros = document.getElementById("btn-cadastros");
    const btnTabelas = document.getElementById("btn-tabelas");

    listViews.style.display = "flex";
    listTables.style.display = "none";

    if (btnCadastros && btnTabelas) {
        btnCadastros.innerHTML = "📂 Pasta: Cadastros (Views)";
        btnTabelas.innerHTML = "📁 Pasta: Tabelas (Tables)";
        btnCadastros.classList.add("active");
        btnTabelas.classList.remove("active");
    }
}


function mostrarTabelas() {
    const listViews = document.getElementById("list-views");
    const listTables = document.getElementById("list-tables");
    const btnCadastros = document.getElementById("btn-cadastros");
    const btnTabelas = document.getElementById("btn-tabelas");

    listViews.style.display = "none";
    listTables.style.display = "flex";

    if (btnCadastros && btnTabelas) {
        btnCadastros.innerHTML = "📁 Pasta: Cadastros (Views)";
        btnTabelas.innerHTML = "📂 Pasta: Tabelas (Tables)";
        btnCadastros.classList.remove("active");
        btnTabelas.classList.add("active");
    }
}
