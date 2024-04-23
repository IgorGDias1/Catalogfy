<?php

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    require_once('classes/Usuario.class.php');

    $u = new Usuarios();
    $u->nome = strip_tags($_POST['nome']);
    $u->email = strip_tags($_POST['email']);
    $u->senha = strip_tags($_POST['senha']);

    // Verificar por dados inválidos:

        if(strlen($u->nome)<=3 || $u->email == "" || $u->senha == ""){
            header('Location: ../index.php?falha=cadastrousuario');
            die();
        }

    if($u->Cadastrar() == 1){
        // Redirecionar de volta a login.php:
       header('Location: ../index.php?sucesso=cadastrousuario');
    }else{
        header('Location: ../index.php?falha=cadastrousuario'); 
    }

}else{
    echo 'Erro. A página deve ser carregada por POST';
}

?>