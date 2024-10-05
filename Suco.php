<?php
require_once 'Bebida.php';

class Suco extends Bebida {
    private $sabor;

    public function getSabor() {
        return $this->sabor;
    }

    public function setSabor($sabor) {
        $this->sabor = $sabor;
    }

    public function mostrarBebida() {
        return "Suco: Nome - " . $this->getNome() . ", Preço - " . $this->getPreco() . ", Sabor - " . $this->getSabor();
    }

    public function verificarPreco($preco) {
        return $preco < 2.5;
    }
}
?>
