<?php

class ConversorMoneda{
    public $n1;

    public function convertirDolaresAEuros(){
        echo "Para hacer la conversion de " . $this->n1 . "$ a x €. Es de " . $this->n1 * 0.98 . "€.\n";
    }
    public function convertirEurosADolares(){
        echo "Para hacer la conversion de " . $this->n1 . "€ a x $. Es de " . $this->n1 / 0.98 . "$.\n";
    }
}

$miConversorMoneda = new ConversorMoneda();
$miConversorMoneda->n1 = 1;

$miConversorMoneda->convertirDolaresAEuros();
$miConversorMoneda->convertirEurosADolares();

?>