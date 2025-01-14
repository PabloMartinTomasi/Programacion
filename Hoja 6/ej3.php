<?php

class vehiculo{
    public $marca;
    public function encender(){
        echo "El vehículo de la marca " . $this->marca . " se ha encendido. \n";
    }
}

class coche extends vehiculo{
    public $modelo;
}

$miVehiculo = new vehiculo;
$miVehiculo->marca = "Cordoba";
$miVehiculo->encender();


$coche = new coche();
$coche->marca = "Seat";
$coche->modelo = "Ibiza";
echo "El coche de la marca " . $coche->marca . " y del modelo " . $coche->modelo . ".\n";
$coche->encender();
?>