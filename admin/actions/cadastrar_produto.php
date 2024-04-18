<?php

// Verificar a sessão:
    session_start();
    if(!isset($_SESSION['usuario'])){
        echo "Falha! Você precisa estar logado(a).";
        die();
    }

    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        require_once('classes/Produto.class.php');
        $p = new Produto();
        $p->nome = strip_tags($_POST['nome']);
        $p->preco = strip_tags($_POST['preco']);
        $p->estoque = strip_tags($_POST['estoque']);
        $p->id_categoria = strip_tags($_POST['id_categoria']);
        $p->descricao = strip_tags($_POST['descricao']);
        $p->id_usuario_resp = $_SESSION['usuario']['id'];

        // Verificar se está chegando uma foto do formulário:
            if($_FILES['foto']['size']>0){
                $destino = "../img/";
                $novo_nome = hash_file('md5', $_FILES['foto']['tmp_file']);
                
            }else{
                echo 'Não existe uma foto';
            }
    }

?>