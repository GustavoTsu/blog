<?php
require_once "../conexao.php";
session_start();
$id = $_SESSION['id'];
$post_id=  $_POST['post_id'];


$conteudo = $_POST['comentario'];
$usuario_id = $id; 


    $sql = "INSERT INTO comentario (conteudo, post_id, usuario_id) VALUES (?, ?, ?)";
    $stmt = mysqli_prepare($conexao, $sql);
    mysqli_stmt_bind_param($stmt, "sii", $conteudo, $post_id, $usuario_id);
    mysqli_stmt_execute($stmt);
    header("Location: post.php?id=$post_id");
    ?>