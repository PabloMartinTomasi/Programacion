<?php
error_reporting(E_ALL);

class empleado{
    public $nombre;
    public $sueldo;
    public $aniosExperiencia;

    public function calcularBonus(){
        $bonus = ($this->aniosExperiencia / 2) * 0.5 * $this->sueldo;
        return $bonus;
    }

    public function mostrarDetalles(){
        echo "Nombre del empleado: {$this->nombre}\n";
        echo "Sueldo: {$this->sueldo}\n";
        echo "Años de experiencia: {$this->aniosExperiencia}";
    }
}

class consultor extends empleado{
    public $horasPorProyecto;
    public function calcularBonus(){
        $bonus = ($this->aniosExperiencia / 2) * 0.5 * $this->sueldo;
        if ($this->horasPorProyecto > 100){
            $bonus += 0.1 * $this->sueldo;
        }
        return $bonus;
    }
}



?>