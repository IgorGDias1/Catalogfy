<?php

// Verificar se a sessão não existe:
    session_start();
    if(!isset($_SESSION['usuario'])){
        echo "Você não está logado!";
        die();
    }


if(isset($_GET['id'])){
    // Apagar:
    require_once('classes/Produto.class.php');
    $p = new Produto();
    // Obtendo o id da URL:
    $p->id = $_GET['id'];
    if($p->Apagar() == 1){
        // Redirecionar de volta ao index.php:
        header('Location: ../painel.php?sucesso=removerproduto');
    }else{
        header('Location: ../painel.php?falha=removerproduto');
    }
}else{
    echo "Erro! Informe o ID a ser apagado!";
}


?>