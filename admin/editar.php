<?php

// Verificar se a sessão não existe:
  session_start();
  if(!isset($_SESSION['usuario'])){
      header('Location: ../painel.php');
      die();
  }



if(!isset($_GET['id'])){
    // Redirecionar:
    header('Location: ../painel.php'); 
}else{
    require_once("actions/classes/Produto.class.php");
    $p = new Produto();
    $p->id = $_GET['id'];
    $dados = $p->ListarPorID()[0];    
}



?>



<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Formulário de Edição</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>
  <div class="container">
    <h1>Formulário de Edição</h1>
    <form action="actions/editar_produto.php" method="POST">
      <div class="form-group">
        <label for="nome">Nome:</label>
        <input type="text" value="<?=$dados['nome'];?>" class="form-control" id="nome" name="nome">
      </div>
      <div class="form-group">
        <label for="preco">Preço:</label>
        <input type="number" value="<?=$dados['preco'];?>" class="form-control" id="preco" name="preco">
      </div>
      <div class="form-group">
        <label for="estoque">Estoque:</label>
        <input type="number" value="<?=$dados['estoque'];?>" class="form-control" id="estoque" name="estoque">
      </div>
      <div class="form-group">
        <label for="categoria">Categoria:</label>
        <input type="number" value="<?=$dados['id_categoria'];?>" class="form-control" id="categoria" name="id_categoria">
      </div>
      <div class="form-group">
        <label for="descricao">Descrição:</label>
        <input type="text" value="<?=$dados['descricao'];?>" class="form-control" id="descricao" name="descricao">
      </div>

      <input type="hidden" name="id" value="<?=$dados['id'];?>"/>

      <button type="submit" class="btn btn-primary">Editar</button>
    </form>
  </div>
 
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
  <?php

    include_once('includes/alertas.include.php');

  ?>
</body>
</html>