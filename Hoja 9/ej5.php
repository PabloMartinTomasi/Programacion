<?php

class Empleado{
    private $nombre;
    private $sueldo;
    private $puesto;

    public function __construct($nombre, $sueldo, $puesto){
        $this->nombre = $nombre;
        $this->sueldo = $sueldo;
        $this->puesto = $puesto;
    }

    public function setSueldo($nuevoSueldo){
        return $this->sueldo += $nuevoSueldo;
    }

    public function getSueldo(){
        echo "El nuevo sueldo de {$this->nombre}, es {$this->sueldo}€\n";
    }

    public function mostrarDetalles(){
        echo "Nombre: {$this->nombre} | Sueldo: {$this->sueldo} | Puesto : {$this->puesto}\n";
    }
}

class Manager extends Empleado{
    private $departamento;

    public function __construct($nombre, $sueldo, $puesto, $departamento){
        parent:: __construct($nombre, $sueldo, $puesto);
        $this->departamento = $departamento;
    }

    public function revisarEmpleado(Empleado $empleado){
        echo "Empleado: {$this->nombre} | Puesto: {$this->puesto} | "
    }
}


?>