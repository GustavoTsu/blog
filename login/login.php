<?php
session_start();
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

</head>
<body>

    <body>
        <header>
            <img src="../imagens/sarue.png" alt=""> 
            <span class="nome">Os Sarues</span>
            
        </header>
        <div id="login">
            <h1>Login</h1>
            <form action="saida.php">
                <p>NickName ou Email</p>
                <input id="usu" name="username" type="text" placeholder="Fulano123">
    
                <p>Senha</p>
                <input id="sen" name="senha" type="password" placeholder="Digite sua senha">

                <?php 
                    require_once "../erro_login.php"
                ?>

                <div id="div_butao">
                    <button type="submit">Entrar</button>
                    <a href="../cadastro/cadastro.php">Não tem uma conta? <span id="link">Cadastrar-se</span></a>
                </div>
            </form>
        </div>
    </body>
</body>
</html>