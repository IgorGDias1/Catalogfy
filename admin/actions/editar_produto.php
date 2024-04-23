<?php

// Verificar se a sessão não existe:
    session_start();
    if(!isset($_SESSION['usuario'])){
        echo "Você não está logado!";
        die();
    }



if($_SERVER['REQUEST_METHOD'] === 'POST'){
    require_once('classes/Produto.class.php');

    $p = new Produto();
    $p->id = strip_tags($_POST['id']);
    $p->nome = strip_tags($_POST['nome']);
    $p->preco = strip_tags($_POST['preco']);
    $p->estoque = strip_tags($_POST['estoque']);
    $p->id_categoria = strip_tags($_POST['id_categoria']);
    $p->descricao = strip_tags($_POST['descricao']);

    // Verificar por dados inválidos:

    if(strlen($p->nome)<=3 || $p->preco == "" || $p->estoque == ""){
        header('Location: ../painel.php?falha=editarproduto');
        die();
    }

    if($p->Modificar() == 1){
        // Redirecionar de volta a index.php:
        header('Location: ../painel.php?sucesso=editarproduto');
    }else{
        header('Location: ../painel.php?falha=editarproduto');
    }

}else{
    echo 'Erro. A página deve ser carregada por POST';
}

?>