<?php

// Verificar se a página foi carregada por POST:
    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        require_once('actions/classes/Usuario.class.php');
        $u = new Usuarios();
        $u->email = $_POST['email'];
        $u->senha = $_POST['senha'];

        $resultado = $u->Logar();

        if(count($resultado) == 1){
            session_start();
            $_SESSION['usuario'] = $resultado[0];
            header('Location: painel.php');
        }else{
            header('Location: index.php?sucesso=falhalogin');
        }

    }else{
        echo "<h3>A página deve ser carregada por POST</h3>";
    }

?>