<?php
error_reporting(E_ALL);

class Tarea {
    public $nombre;
    public $descripcion;
    public $fechaLimite;
    public $estado;

    public function marcarComoCompletada() {
        $this->estado = "Completada";
    }

    public function editarDescripcion($nuevaDescripcion) {
        $this->descripcion = $nuevaDescripcion;
    }

    public function mostrarTarea() {
        echo "Nombre: {$this->nombre}\n";
        echo "Descripción: {$this->descripcion}\n";
        echo "Fecha límite: {$this->fechaLimite}\n";
        echo "Estado: {$this->estado}\n";
        echo "----------------------------\n";
    }
}


$tareas = [];

$tarea1 = new Tarea();
$tarea1->nombre = "Ejercicios 1 de PHP";
$tarea1->descripcion = "Ejercicio de Programación";
$tarea1->fechaLimite = "Viernes 14 de Marzo";
$tarea1->estado = "No completada";
$tareas[] = $tarea1;

$tarea2 = new Tarea();
$tarea2->nombre = "Ejercicio de ";
$tarea2->descripcion = "Crear una API para la gestión de usuarios";
$tarea2->fechaLimite = "Lunes 17 de Marzo";
$tarea2->estado = "No completada";
$tareas[] = $tarea2;

$tarea3 = new Tarea();
$tarea3->nombre = "Revisión de código";
$tarea3->descripcion = "Revisar y refactorizar el código del proyecto";
$tarea3->fechaLimite = "Miércoles 19 de Marzo";
$tarea3->estado = "No completada";
$tareas[] = $tarea3;


echo "Lista de tareas antes de realizar cambios:\n";
foreach ($tareas as $tarea) {
    $tarea->mostrarTarea();
}


$tareas[0]->marcarComoCompletada();


$tareas[1]->editarDescripcion("Crear una API RESTful con autenticación");


echo "\nLista de tareas después de realizar cambios:\n";
foreach ($tareas as $tarea) {
    $tarea->mostrarTarea();
}

?>
