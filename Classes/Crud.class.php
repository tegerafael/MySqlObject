<?php
abstract class Crud{
    protected $tabela;
    public abstract function inserir();
    public abstract function atualizar($campo, $id);

    public function listar(){
        $selectSQL = "SELECT * FROM {$this->tabela}";
        return Conexao::query($selectSQL);
    }

    public function buscar($campo, $id){
        $selectSQL = "SELECT * FROM {$this->tabela} WHERE $campo = {$id}";
        $dados = Conexao::query($selectSQL);
        return $dados->fetch_object();
    }

    public function deletar($campo, $id){
        $selectSQL = "DELETE FROM {$this->tabela} WHERE $campo = {$id}";
        return Conexao::query($selectSQL);
    }
}
?>