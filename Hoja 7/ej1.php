<?php

class persona{
    public $nombre;
    public $edad;
    public $genero;

    public function presentar(){
        echo "El nombre de la persona es " . $this->nombre. " su edad es de " . $this->edad . " años, y el su genero es " . $this->genero . ".";
    }
}

$Perona = new persona();
$Perona->nombre = "Juan Pedro";
$Perona->edad = 25;
$Perona->genero = "hombre";
$Perona->presentar()

?>