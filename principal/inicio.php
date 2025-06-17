<?php
    require_once "../conexao.php";
    session_start();
    if (isset($_SESSION["logado"]) && $_SESSION["logado"] == TRUE) {
        $nome = $_SESSION["nome"];
    }
    else {
        header("Location: ../login/login.php");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 
        echo $nome;
    ?>    
</body>
</html>