<?php
require_once "../conexao.php";
session_start();

$nome = $_POST['username'];
$email = $_POST['email'];
$senha = $_POST['senha'];
$confirmar_senha = $_POST['confirmar_senha'];

if (strlen($email) > 40) {
    $_SESSION["erro"] = "*Email muito grande";
    header("Location: cadastro.php");
    exit();
}


if (strlen($nome) > 14) {
    $_SESSION["erro"] = "*NickName não pode ser maior que 14 caracteres";
    header("Location: cadastro.php");
    exit();
}

if (strlen($senha) > 30) {
    $_SESSION["erro"] = "*Senha maior que 30 caracteres";
    header("Location: cadastro.php");
    exit();
}

if ($nome == "" || $email == "" || $senha == "" || $confirmar_senha == "") {
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
$sql = "SELECT id FROM usuario WHERE email = '$email'";
$comando = mysqli_prepare($conexao, $sql);
mysqli_stmt_execute($comando);
$resultado = mysqli_stmt_get_result($comando);

$bd_dados = mysqli_fetch_assoc($resultado);
mysqli_stmt_close($comando);

if ($bd_dados) {
    $_SESSION["erro"] = "*O email " . $nome . " já tem conta vinculada" ;
    header("Location: cadastro.php");
    exit();
} 
else {
    $sql = "INSERT INTO usuario (nick_name, email, senha) VALUES (?, ?, ?)";
    $comando = mysqli_prepare($conexao, $sql);
    mysqli_stmt_bind_param($comando, 'sss', $nome, $email, $senha);
    mysqli_stmt_execute($comando);
    mysqli_stmt_close($comando);

    if (!empty($_FILES['foto_perfil']['name'])) {
        $pasta = "../imagens/";
        $extensao = pathinfo($_FILES['foto_perfil']['name'], PATHINFO_EXTENSION);
        $nome_arquivo = uniqid() . '.' . $extensao; // Nome único com ID do usuário
        $caminho = $pasta . $nome_arquivo;

        move_uploaded_file($_FILES['foto_perfil']['tmp_name'], $caminho);
        $sql_img = "UPDATE usuario SET foto_perfil = ? WHERE email = ?";
        $stmt_img = mysqli_prepare($conexao, $sql_img);
        mysqli_stmt_bind_param($stmt_img, "ss", $nome_arquivo, $email);
        mysqli_stmt_execute($stmt_img);
        $_SESSION['foto_perfil'] = $nome_arquivo;
    }
    }
    
    header("Location: sucesso.php");
    exit();







?>