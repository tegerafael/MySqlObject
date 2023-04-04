<?php
abstract class Crud{
    protected $tabela;
    public abstract function inserir();
    public abstract function atualizar($campo, $id);

    public function listar(){
        $selectSQL = "SELECT * FROM {$this->tabela}";
        return Conexao::query($selectSQL);
    }
}
?>