<?php

class circulo{
    public $radio;

    public function calcularArea(){
        echo "El area del circulo es " . $this->radio . ". ";
    }
}

$miCirculo = new circulo();
$miCirculo->radio = 3.14*5*5;

$miCirculo->calcularArea();

?>