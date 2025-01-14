<?php

class empleado{
    public $nombre;
    public $sueldo;

    public function mostrarDetalles(){
        echo "El empleado " . $this->nombre . " tiene un sueldo de " . $this->sueldo . " €. \n";
    }
}

class gerente extends empleado{
    public $departamento;
    public function mostrarDetalles(){
        echo "El empleado " . $this->nombre . " tiene un sueldo de " . $this->sueldo . " € y el departamento es " . $this->departamento . ".";
    }
}


$miEmpleado = new empleado;
$miEmpleado->nombre = "Juan";
$miEmpleado->sueldo = 1500;
$miEmpleado->mostrarDetalles();


$gerente = new gerente();
$gerente->nombre = "Juan";
$gerente->sueldo = 3000;
$gerente->departamento = "Administracion";
$gerente->mostrarDetalles()

?>