<?php
class Cliente {
    public $cpf;
    public $nome;
    public $endereco;

    public function __construct($cpf, $nome, $endereco) {
        $this->cpf = $cpf;
        $this->nome = $nome;
        $this->endereco = $endereco;
    }
}
?>