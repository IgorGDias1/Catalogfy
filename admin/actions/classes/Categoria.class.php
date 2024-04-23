<?php
require_once('Banco.class.php');

class Categoria{
    public $id;
    public $nome;

    public function Listar(){
        $sql = "SELECT * FROM categorias";
        $banco = Banco::conectar();
        $comando = $banco->prepare($sql);
        $comando->execute();
        $arr_resultado = $comando->fetchAll(PDO::FETCH_ASSOC);
        Banco::desconectar();
        return $arr_resultado;
    }

    public function Cadastrar(){
        $sql = "INSERT INTO categorias(nome) 
        VALUES (?)";
        $banco = Banco::conectar();
        $comando = $banco->prepare($sql);
        try{
            $comando->execute([$this->nome]);
            Banco::desconectar();
            return $comando->rowCount();
        }catch(PDOException $e){
            Banco::desconectar();
            return 0;
        }
    }

    public function Modificar(){
        $sql = "UPDATE categorias SET nome=? WHERE id=?";
        $banco = Banco::conectar();
        $comando = $banco->prepare($sql);
        try{
            $comando->execute([$this->nome, $this->id]);
            Banco::desconectar();
            return $comando->rowCount();
        }catch(PDOException $e){
            Banco::desconectar();
            return 0;
        }
    }

    public function Remover(){
        $sql = "DELETE FROM categorias WHERE id = ?";
        $banco = Banco::conectar();
        $comando = $banco->prepare($sql);
        $comando->execute([$this->id]);
        Banco::desconectar();
        return $comando->rowCount();
    }
}


?>