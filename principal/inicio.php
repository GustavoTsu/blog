<?php
require_once "../conexao.php";
session_start();
if (isset($_SESSION["logado"]) && $_SESSION["logado"] == TRUE) {
    $nome = $_SESSION["nome"];
} else {
    header("Location: ../login/login.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/login.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cherry+Bomb+One&display=swap" rel="stylesheet">
    <style>
                body {
            background-color: gray;
        }
    </style>
</head>

<body>
        <header>
            <img src="../imagens/sarue.png" alt=""> 
            <span id="nome">Os Sarues</span>
            
        </header>
        <hr>


        div

</body>

</html> 