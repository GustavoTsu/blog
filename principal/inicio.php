<?php
require_once "../conexao.php";
session_start();
if (isset($_SESSION["logado"]) && $_SESSION["logado"] == TRUE) {
    $nome = $_SESSION["nome"];
} else {
    header("Location: ../login/login.php");
}
$id = $_SESSION['id'];
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/login.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cherry+Bomb+One&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/barra_pesquisa.css">
    <link rel="stylesheet" href="../css/principal.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">




    <style>

    </style>
</head>

<body>
    <header>
        <div id="espacar">
            <div id='direitalogo'>
                <img src="../imagens/sarue.png" alt="">
                <span class="nome">Os Sarues</span>
            </div>

            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
            <div id='pesquisa'>
                <div id="lupa">
                    <form class="example" action="pesquisa.php" target="principal">
                        <input type="text" placeholder="Pesquisar" name="pesquisa">
                        <button type="submit"><i class="fa fa-search"></i></button>
                    </form>
                </div>
            </div>
        </div>
        
    </header>
    
    <div id="caxa">
        <div id="menu">
            <ul>
                <a href="feed.php" target="principal"><li><span><i class="fas fa-home"></i> Página Inicial</span></li></a>
                <a href="minhas_curtidas.php" target="principal"><li><span><i class="fas fa-heart"></i> Curtidos</span></li></a>
                <a href="meus_posts.php" target="principal"><li><span><i class="fas fa-star"></i> Meus Posts</span></li></a>
                <a href="novo_post.php" target="principal"><li><span><i class="fa fa-pen"></i> Novo Post</span></li></a>
            </ul>

            <div class='sair'><div><img src="../imagens/usu.png" alt=""><span class='nome'><?=$nome?></span></div> <a class='nome' id="logout" href="logout.php">Sair</a></div>
        
        </div>

        <iframe src="feed.php" id='principal' name="principal">



        </iframe>
    </div>

</body>

</html>