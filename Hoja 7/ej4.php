<?php

class producto{
    public $nombre;
    public $precio;

    public function  mostrarDetalles(){
        echo "El nombre del producto es " . $this->nombre . " y tiene un precio de " . $this->precio . "€. \n";
    }
}

class electrodomestico extends producto{
    public $consumo;

    public function mostrarDetalles(){
        echo "El nombre del producto es " . $this->nombre . " y tiene un precio de " . $this->precio . "€, y el consumo es " . $this->consumo . ".";
    }
}

$miProducto = new producto();
$miProducto->nombre = "nevera";
$miProducto->precio = 3000;
$miProducto->mostrarDetalles();

$Electrodomestico = new electrodomestico();
$Electrodomestico->nombre = "nevera";
$Electrodomestico->precio = 3000;
$Electrodomestico->consumo = "electricidad";
$Electrodomestico->mostrarDetalles()

?>