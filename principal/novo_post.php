<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Criar Post</title>
  <style>
    body {
      background-color: #927f70;
      font-family: Arial, sans-serif;
      display: flex;
      flex-direction: column;
      align-items: center;
      padding-top: min(60px, 6vh);
    }

    #caixona {
      background-color: white;
      width: 60%;
      min-width: 280px;
      max-width: 600px;
      margin: 20px auto;
      padding: 20px;
      border-radius: 10px;
      box-shadow: rgba(0, 0, 0, 0.3) 3px 3px 3px;
    }

    h2 {
      color: black;
      margin: 0.5vh 0 2vh 0;
      font-size: 1.8em;
      text-align: center;
    }

    form {
      display: flex;
      flex-direction: column;
      padding: 0 5%;
    }

    textarea {
      width: 100%;
      min-height: 120px;
      padding: 10px;
      border-radius: 5px;
      border: 1px solid #ddd;
      margin-bottom: 2vh;
      font-size: 0.9em;
      resize: vertical;
    }

    input[type="file"] {
      margin-bottom: 2vh;
      font-size: 0.8em;
    }

    button {
      font-size: 0.9em;
      border-radius: 5px;
      border-style: none;
      margin-top: 1vh;
      width: 100%;
      height: 40px;
      background-color: lightcoral;
      color: white;
      box-shadow: rgba(0, 0, 0, 0.3) 3px 3px 3px;
      cursor: pointer;
    }

    button:hover {
      background-color: rgb(240, 110, 110);
      box-shadow: none;
      color: rgb(247, 247, 247);
    }
  </style>
</head>
<body>
  <div id="caixona">
    <h2>Novo Post</h2>
    <form action="criar_post.php" method="post" enctype="multipart/form-data">
      <textarea name="conteudo" placeholder="Escreva algo..." required></textarea>
      <input type="file" name="imagem" accept="image/*">
      <button type="submit">Publicar</button>
    </form>
  </div>
</body>
</html>