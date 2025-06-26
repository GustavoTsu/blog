<?php
    session_start();

    require_once "../conexao.php";

    $post_id = $_GET['post_id'] ;
    $usuario_id = $_GET['user_id'];



    //verifica se já curtiu
    $sql = "SELECT * FROM curtida WHERE posts_id = ? AND usuario_id = ?";
    $stmt = mysqli_prepare($conexao, $sql);
    mysqli_stmt_bind_param($stmt, "ii", $post_id, $usuario_id);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $ja_curtiu = mysqli_num_rows($result) > 0;

    if ($ja_curtiu) {
    $sql = "DELETE FROM curtida WHERE posts_id = ? AND usuario_id = ?";
    } else {
    $sql = "INSERT INTO curtida (posts_id, usuario_id) VALUES (?, ?)";
    }
    $stmt = mysqli_prepare($conexao, $sql);
    mysqli_stmt_bind_param($stmt, "ii", $post_id, $usuario_id);
    mysqli_stmt_execute($stmt);

    header("Location: curtida.php?post_id=$post_id&user_id=$usuario_id");
?>