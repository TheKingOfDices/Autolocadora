<?php
class Veiculo {
    public $placa;
    public $marca;
    public $descricao;

    public function __construct($placa, $marca, $descricao) {
        $this->placa = $placa;
        $this->marca = $marca;
        $this->descricao = $descricao;
    }
}
?>