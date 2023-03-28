<?php
abstract class Crud{
    protected $tabela;
    public abstract function inserir();
    public abstract function atualizar($campo, $id);
}
?>