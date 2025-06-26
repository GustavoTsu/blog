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



$sql_total = "SELECT COUNT(*) AS total FROM curtida WHERE posts_id = ?";
$stmt_total = mysqli_prepare($conexao, $sql_total);
mysqli_stmt_bind_param($stmt_total, "i", $post_id);
mysqli_stmt_execute($stmt_total);
$result_total = mysqli_stmt_get_result($stmt_total);
$total = mysqli_fetch_assoc($result_total)['total'];

echo "
  <form method='get' action='curtir.php'>
    <input type='hidden' name='post_id' value='$post_id'>
    <input type='hidden' name='user_id' value='$usuario_id'>
    <button type='submit' style='background: none; border: none; font-size: 20px; cursor: pointer;'>
      " . ($ja_curtiu ? '❤️' : '♡') . "
    </button>
    <span style='font-size: 14px;'>$total</span>
  </form>
";

mysqli_close($conexao);

header

?>