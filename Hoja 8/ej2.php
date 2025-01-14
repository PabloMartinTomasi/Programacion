<?php
error_reporting(E_ALL);

class tarea{
    public $nombre;
    public $descripcion;
    public $fechaLimite;
    public $estado;

    public function marcarComoCompletada(){
        echo "{$this->estado}: completada.\n";
    }
    public function editarDescripcion($nuevaDescripcion){
        echo "La descripción de la tarea a sido modificada.\n Antes era: {$this->descripcion}\n Y ahora la nueva descripción es: {$nuevaDescripcion}\n";
    }
    public function mostrarTarea(){
        echo "Nombre: {$this->nombre}\n";
        echo "Descripción: {$this->descripcion}\n";
        echo "Fecha limite: {$this->fechaLimite}\n";
        echo "Estado: {$this->estado}";
    }
}


$tarea=["Ejercicio 1", "Ejercicio 2", "Ejercicio 3", "Ejercicio 4", "Ejercicio 5"];

$Tarea = new tarea;

$Tarea->nombre=[];
$Tarea->descripcion="Ejercicio de Programación";
$Tarea->fechaLimite="Viernes 14 de Marzo";
$Tarea->estado="No completada";

$Tarea->marcarComoCompletada()

?>