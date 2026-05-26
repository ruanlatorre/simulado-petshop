<?php
session_start();
require_once("../db/conection.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    if (!isset($_POST['email']) || !isset($_POST['senha'])) {

        $email = $_POST['email'] ?? '';
        $senha = $_POST['senha'] ?? '';

        $sql = "SELECT * FROM petshop_db WHERE email = ? AND senha = ?";
        $stmt = mysqli_prepare($conexao, $sql);
        mysqli_stmt_bind_param($stmt, "ss", $email, $senha);

        if (mysqli_stmt_execute($stmt)) {
            $_SESSION['email_usuario'] = $email;
            $resultado = mysqli_stmt_get_result($stmt);
            if (mysqli_num_rows($resultado) > 0) {
                echo "Login bem-sucedido!";
            } else {

                echo "Email ou senha incorretos.";
            }
        } else {
            echo "Erro ao executar a consulta: " . mysqli_error($conexao);
        }
    }
    header("Location: ../views/home.php");
}
?>