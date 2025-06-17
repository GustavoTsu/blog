<?php
require_once "../conexao.php";
session_start();

$nome = $_GET['username'];
$nome_completo = $_GET['nome_completo'];
$senha = $_GET['senha'];
$confirmar_senha = $_GET['confirmar_senha'];

if ($nome == "" || $nome_completo == "" || $senha == "" || $confirmar_senha == "") {
    $_SESSION["erro"] = "*Você precisa preencher todos os campos";
    header("Location: cadastro.php");
    exit();
}

if ($senha != $confirmar_senha) {
    $_SESSION["erro"] = "*Senhas não são iguais";
    header("Location: cadastro.php");
    exit();
}

$sql = "SELECT id FROM usuario WHERE nick_name = '$nome'";
$comando = mysqli_prepare($conexao, $sql);
mysqli_stmt_execute($comando);
$resultado = mysqli_stmt_get_result($comando);

$bd_dados = mysqli_fetch_assoc($resultado);
mysqli_stmt_close($comando);

if ($bd_dados) {
    $_SESSION["erro"] = "*O nome " . $nome . " já está sendo utilizado" ;
    header("Location: cadastro.php");
    exit();
} 
else {
    $sql = "INSERT INTO usuario (nick_name, nome, senha) VALUES (?, ?, ?)";
    $comando = mysqli_prepare($conexao, $sql);
    mysqli_stmt_bind_param($comando, 'sss', $nome, $nome_completo, $senha);
    mysqli_stmt_execute($comando);
    mysqli_stmt_close($comando);
    header("Location: sucesso.php");
    exit();
}






?>