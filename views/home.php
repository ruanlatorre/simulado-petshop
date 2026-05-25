<?php session_start(); require_once("../db/conection.php"); ?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home - PetManager</title>
</head>
<body>
    <p>Bem vindo, <?php echo isset($_SESSION['email_usuario']) ? $_SESSION['email_usuario'] : 'Visitante'; ?>!</p>
    <?php include("../components/navbar.php"); ?>
</body>
</html>