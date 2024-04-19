<?php
require_once('Banco.class.php');

class Produto{
    public $id;
    public $foto;
    public $nome;
    public $preco;
    public $estoque;
    public $id_categoria;
    public $id_usuario_resp;
    public $descricao;

    public function ListarTudo(){
        $sql = "SELECT * FROM produtos";
        $banco = Banco::conectar();
        $comando = $banco->prepare($sql);
        $comando->execute();

        $arr_resultado = $comando->fetchAll(PDO::FETCH_ASSOC);
        Banco::desconectar();

        return $arr_resultado;
    }

    public function ListarPorId(){
        $sql = "SELECT * FROM produtos";
        $banco = Banco::conectar();
        $comando = $banco->prepare($sql);
        $comando->execute();

        $arr_resultado = $comando->fetchAll(PDO::FETCH_ASSOC);
        Banco::desconectar();

        return $arr_resultado;
    }

    public function CadastrarSemFoto(){
        $sql = "INSERT INTO produtos(nome, preco, estoque, id_categoria, id_usuario_resp, descricao) 
        VALUES (?, ?, ?, ?, ?, ?)";
        $banco = Banco::conectar();
        $comando = $banco->prepare($sql);
        $comando->execute([$this->nome, $this->preco, $this->estoque, $this->id_categoria, $this->id_usuario_resp, $this->descricao]);
        Banco::desconectar();
        return $comando->rowCount();
    }

    public function CadastrarComFoto(){
        $sql = "INSERT INTO produtos(foto, nome, preco, estoque, id_categoria, id_usuario_resp, descricao) 
        VALUES (?, ?, ?, ?, ?, ?, ?)";
        $banco = Banco::conectar();
        $comando = $banco->prepare($sql);
        $comando->execute([$this->foto, $this->nome, $this->preco, $this->estoque, $this->id_categoria, $this->id_usuario_resp, $this->descricao]);
        Banco::desconectar();
        return $comando->rowCount();
    }

    public function Modificar(){
        $sql = "UPDATE produtos SET nome=?, preco=?, estoque=?, id_categoria=?, id_usuario_resp=?, descricao=?  WHERE id=?";
        $banco = Banco::conectar();
        $comando = $banco->prepare($sql);
        $comando->execute([$this->nome, $this->preco, $this->estoque, $this->id_categoria, $this->id_usuario_resp, $this->descricao, $this->id]);
        Banco::desconectar();
        return $comando->rowCount();
    }

    public function Remover(){
        $sql = "DELETE FROM produtos WHERE id = ?";
        $banco = Banco::conectar();
        $comando = $banco->prepare($sql);
        $comando->execute([$this->id]);
        Banco::desconectar();
        return $comando->rowCount();
    }
}


?>