<?php
session_start();
$user_id = $_SESSION['id'];
?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<title>Meus Posts</title>
<link rel="stylesheet" href="../css/feed.css">

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
  i.imagem,
  (SELECT COUNT(*) FROM curtida c WHERE c.posts_id = p.id) AS curtidas,
  (SELECT COUNT(*) FROM comentario WHERE comentario.post_id = p.id) AS comentarios
FROM curtida cu
JOIN post p ON cu.posts_id = p.id
JOIN usuario u ON p.usuario_id = u.id
LEFT JOIN imagem i ON p.id = i.posts_id
WHERE cu.usuario_id = ?
ORDER BY p.data_hora DESC;
";

$comando = mysqli_prepare($conexao, $sql);
mysqli_stmt_bind_param($comando, "i", $user_id);
mysqli_stmt_execute($comando);
$resultados = mysqli_stmt_get_result($comando);


while ($post = mysqli_fetch_assoc($resultados)) {
  $id = $post['id_post'];
  $conteudo = $post['conteudo'];
  $autor = $post['nick_name'];
  $data = date('d/m/Y H:i', strtotime($post['data_hora']));
  $curtidas = $post['curtidas'];
  $comentarios = $post['comentarios'];
  $imagem = $post['imagem'];
  $autor_id = $post['usuario_id'];

  echo "<div class='caixa-post' >
  
    <div class='autor'><span class='n_autor'>$autor</span><span id='ponto'>•</span> <span class='data-postagem'>$data</span></div>
    
    <div class='conteudo-post'>
      <p>$conteudo</p>";

  if ($imagem != NULL)  { 
  echo "<img src='../imagens/$imagem' alt='Imagem do post' />";
  }

  echo "</div>
    <div class='rodape-post'>";
    echo "        <iframe scrolling='no'
            src='curtida.php?post_id=$id&user_id=$user_id>'>
        </iframe>";
  echo  "<a href='post.php?id=$id' title='Ver post completo'>
      <span>💬 $comentarios comentários</span>
    </a>
    </div></div>";

}

mysqli_stmt_close($comando);
?>
</body>
</html>
