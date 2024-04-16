<?php
require_once('Banco.class.php');

class Usuarios{
    public $id;
    public $nome;
    public $email;
    public $senha;

    public function Listar(){
        $sql = "SELECT * FROM usuarios";
        $banco = Banco::conectar();
        $comando = $banco->prepare($sql);
        $comando->execute();

        $arr_resultado = $comando->fetchAll(PDO::FETCH_ASSOC);
        Banco::desconectar();

        return $arr_resultado;
    }

    public function Cadastrar(){
        $sql = "INSERT INTO usuarios(nome,email,senha) 
        VALUES (?,?,?)";
        $banco = Banco::conectar();
        $comando = $banco->prepare($sql);

        $hash = hash("sha256", $this->senha);

        $comando->execute([$this->nome, $this->email, $hash]);
        Banco::desconectar();
        return $comando->rowCount();
    }

    public function Modificar(){
        $sql = "UPDATE usuarios SET nome=?,email=?,senha=?  WHERE id=?";
        $banco = Banco::conectar();
        $comando = $banco->prepare($sql);
        $comando->execute([$this->id, $this->nome, $this->email, $this->senha]);
        Banco::desconectar();
        return $comando->rowCount();
    }

    public function Remover(){
        $sql = "DELETE FROM usuarios WHERE id = ?";
        $banco = Banco::conectar();
        $comando = $banco->prepare($sql);
        $comando->execute([$this->id]);
        Banco::desconectar();
        return $comando->rowCount();
    }

    public function Logar(){
        $sql = "SELECT * FROM usuarios WHERE email = ? AND senha = ?";
        $banco = Banco::conectar();
        $comando = $banco->prepare($sql);
        $hash = hash('sha256', $this->senha);
        $comando->execute([$this->email, $hash]);

        $arr_resultado = $comando->fetchAll(PDO::FETCH_ASSOC);
        Banco::desconectar();

        return $arr_resultado;
    }
}


?>