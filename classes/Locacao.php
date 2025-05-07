<?php
class Locacao {
    public $codigo;
    public $veiculo;
    public $cliente;
    public $data_inicio;
    public $data_fim;

    public function __construct($codigo, $veiculo, $cliente, $data_inicio, $data_fim = null) {
        $this->codigo = $codigo;
        $this->veiculo = $veiculo;
        $this->cliente = $cliente;
        $this->data_inicio = $data_inicio;
        $this->data_fim = $data_fim;
    }
}
?>