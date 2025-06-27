<?php
while ($post = mysqli_fetch_assoc($resultados)) {
    $id = $post['id_post'];
    $conteudo = $post['conteudo'];
    $autor = $post['nick_name'];
    $data = date('d/m/Y H:i', strtotime($post['data_hora']));
    $comentarios = $post['comentarios'];
    $imagem = $post['imagem'];
    $autor_id = $post['usuario_id'];
    $foto_perfil = $post['foto_perfil'] ?? 'usu.png';
    
    echo "<div class='caixa-post' >
    
      <div class='autor'><img src='../imagens/$foto_perfil' class='foto_perfil'><span class='n_autor'>$autor</span><span id='ponto'>•</span> <span class='data-postagem'>$data</span></div>
      
      <div class='conteudo-post'>
        <p>$conteudo</p>";
  
    if ($imagem != NULL)  { 
    echo "<div id='div-img'><img src='../imagens/$imagem' alt='Imagem do post'></div>";
    }
  
    echo "</div>
      <div class='rodape-post'>";
      echo " <iframe scrolling='no' src='curtida.php?post_id=$id&user_id=$user_id'>
          </iframe>";
    echo  "<a href='post.php?id=$id' title='Ver post completo'>
        <span>💬 $comentarios comentários</span>
      </a>
      </div></div>";
    }
?>

<img src="">