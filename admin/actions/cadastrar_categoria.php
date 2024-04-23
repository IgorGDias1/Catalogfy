<?php

// Verificar se a pessoa está ou não logada:
    session_start();
    if(!isset($_SESSION['usuario'])){
        echo "Falha! Você precisa estar logado(a).";
        die();
    }

// Verificar se a página esta sendo carregada por POST:
    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        require_once('classes/Categoria.class.php');
        $c = new Categoria();
        $c->nome = $_POST['categoria'];

        // Verificar por dados inválidos:

            if(strlen($c->nome)<=3 ){
                header('Location: ../painel.php?falha=cadastrocategoria');
                die();
            }

        if($c->Cadastrar() == 1){
            header('Location: ../painel.php?sucesso=cadastrocategoria');
        }else{
            header('Location: ../painel.php?falha=cadastrocategoria');
        }
    }else{
        echo "Essa página deve ser carregada por POST";
    }

?>