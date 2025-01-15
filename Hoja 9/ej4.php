<?php

class Vehiculo{
    private $marca;
    private $modelo;

    public function __construct($marca, $modelo){
        $this->marca = $marca;
        $this->modelo = $modelo;
    }

    public function encender(){
        echo "El vehículo está encendido.\n";
    }

    public function mostrarDetalles(){
        echo "Marca: {$this->marca} | Modelo: {$this->modelo}";
    }
}

class Coche extends Vehiculo{
    private $combustible;

    public function __construct($marca, $modelo, $combustible){
        parent:: __construct($marca, $modelo);
        $this->combustible = ["Gasolina", "Diésel", "Eléctrico"];
        $this->combustible = $combustible;
    }

    public function mostrarDetalles(){
        parent::mostrarDetalles();
        echo " | Combustible: {$this->combustible}\n";
    }
}


$vehivulo = new Vehiculo("Tesla", "Model 3");
$vehivulo->encender();


$coche = new Coche("Tesla", "Model 3", "Eléctrico");
$coche->mostrarDetalles();

?>