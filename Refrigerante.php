<?php
require_once 'Bebida.php';

class Refrigerante extends Bebida {
    private $retornavel;

    public function getRetornavel() {
        return $this->retornavel;
    }

    public function setRetornavel($retornavel) {
        $this->retornavel = $retornavel;
    }

    public function mostrarBebida() {
        return "Refrigerante: Nome - " . $this->getNome() . ", Preço - " . $this->getPreco() . ", Retornável - " . ($this->getRetornavel() ? "Sim" : "Não");
    }

    public function verificarPreco($preco) {
        return $preco < 5;
    }
}
?>
