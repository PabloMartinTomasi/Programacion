<?php
error_reporting(E_ALL);

class Empleado{
    public $nombre;
    public $sueldo;
    public $aniosExperiencia;

    public function calcularBonus(){
        return floor($this->aniosExperiencia / 2)*0.05*$this->sueldo;
    }

    public function mostrarDetalles(){
        echo "EMPLEADO\n";
        echo "Nombre del empleado: {$this->nombre}\n";
        echo "Sueldo: {$this->sueldo}€\n";
        echo "Años de experiencia: {$this->aniosExperiencia}\n";
        echo "Bonus: {$this->calcularBonus()}€\n\n";
    }
}

class Consultor extends Empleado{
    public $horasPorProyecto;

    public function calcularBonus(){
        $bonusBase = floor($this->aniosExperiencia / 2)*0.05*$this->sueldo;

        if ($this->horasPorProyecto > 100){
            $bonusAdicional = 0.1*$this->sueldo;
            return $bonusBase + $bonusAdicional;
        }
        return $bonusBase;
    }
    public function mostrarDetalles(){
        echo "CONSULTOR\n";
        echo "Nombre del consultor: {$this->nombre}\n";
        echo "Sueldo: {$this->sueldo}€\n";
        echo "Años de experiencia: {$this->aniosExperiencia}\n";
        echo "Bonus: {$this->calcularBonus()}€\n";
        echo "Horas de proyecto: {$this->horasPorProyecto} horas";
    } 
}


$Empleado=new Empleado;

$Empleado->nombre="Juan";
$Empleado->sueldo=1500;
$Empleado->aniosExperiencia=3;

$Empleado->mostrarDetalles();



$Consultor = new Consultor();

$Consultor->nombre = "Luis";
$Consultor->sueldo = 2000;
$Consultor->aniosExperiencia = 4;
$Consultor->horasPorProyecto = 120; 

$Consultor->mostrarDetalles(); 

?>