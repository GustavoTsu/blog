<?php
    session_start()
?>


<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="../css/login.css">

</head>

<body>
    <img src="../imagens/16410-851222204.png" alt=""> Ainda não sei o
    <hr>
    <div id="login">
        <h1>Cadastro</h1>
        <form action="saida.php">
            <p>Nome de Usuário</p>
            <input name="username" type="text" placeholder="Fulano123">
            
            <p>Nome Completo</p>
            <input name="nome_completo" type="text" placeholder="Fulano da Silva">
            
            <p>Senha</p>
            <input name="senha" type="password" placeholder="Digite sua senha">
            
            <p>Confirmar Senha</p>
            <input name="confirmar_senha" type="password" placeholder="Repita sua senha">

            <?php 
                require_once "../erro_login.php";    
            ?>

            <div id="div_butao">
                <button type="submit">Cadastrar</button>
                <a href="../login/login.php">Já tem conta? faça <span id="link">Login</span></a>
            </div>
        </form>
    </div>
</body>


</html>