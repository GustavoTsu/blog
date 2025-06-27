<?php
session_start();
$user_id = $_SESSION['id'];
if (isset($_SESSION["logado"]) && $_SESSION["logado"] == TRUE) {
  $nome = $_SESSION["nome"];
} else {
  header("Location: ../login/login.php");
}
?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<title>Meus Posts</title>
<link rel="stylesheet" href="../css/feed.css">
<link rel="stylesheet" href="../css/telas-menores.css">

<style>

</style>
</head>
<body>
<?php
require_once "../conexao.php";


$sql = "
SELECT 
  p.id AS id_post,
  p.conteudo,
  p.data_hora,
  p.usuario_id,
  u.nick_name,
  u.foto_perfil,
  i.imagem,
  (SELECT COUNT(*) FROM curtida c WHERE c.posts_id = p.id) AS curtidas,
  (SELECT COUNT(*) FROM comentario WHERE comentario.post_id = p.id) AS comentarios
FROM post p
JOIN usuario u ON p.usuario_id = u.id
LEFT JOIN imagem i ON p.id = i.posts_id
WHERE p.usuario_id = ?
ORDER BY p.data_hora DESC
";

$comando = mysqli_prepare($conexao, $sql);
mysqli_stmt_bind_param($comando, "i", $user_id);
mysqli_stmt_execute($comando);
$resultados = mysqli_stmt_get_result($comando);


require_once "base-post.php";
  
  mysqli_stmt_close($comando);
?>
</body>
</html>
