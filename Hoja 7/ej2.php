<?php

class rectangulo{
    public $base;
    public $altura;

    public function calcularArea(){
        echo "El area del rectangulo es " . $this->base * $this->altura . ".";
    }
}

$miRectangulo = new rectangulo();
$miRectangulo->base = 10;
$miRectangulo->altura = 5;
$miRectangulo->calcularArea()

?>