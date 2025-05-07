<?php
class Marca {
    public $codigo;
    public $descricao;

    public function __construct($codigo, $descricao) {
        $this->codigo = $codigo;
        $this->descricao = $descricao;
    }
}
?>