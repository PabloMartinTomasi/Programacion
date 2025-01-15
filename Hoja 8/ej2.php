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
$tarea1->fechaLimite = "Viernes 17 de Enero";
$tarea1->estado = "No completada";
$tareas[] = $tarea1;

$tarea2 = new Tarea();
$tarea2->nombre = "Ejercicio de Matematicas";
$tarea2->descripcion = "Haz las siguientes ecuaciones sin el uso de la calculadora";
$tarea2->fechaLimite = "Lunes 20 de Enero";
$tarea2->estado = "No completada";
$tareas[] = $tarea2;

$tarea3 = new Tarea();
$tarea3->nombre = "Leer el libro mandado en clase";
$tarea3->descripcion = "Tener que leerte los primeros 5 capitulos";
$tarea3->fechaLimite = "Miércoles 22 de Enero";
$tarea3->estado = "No completada";
$tareas[] = $tarea3;


echo "Lista de tareas antes de realizar cambios:\n";
foreach ($tareas as $tarea) {
    $tarea->mostrarTarea();
}


$tareas[0]->marcarComoCompletada();


$tareas[1]->editarDescripcion("Haz las siguientes ecuaciones sin el uso de la calculadora, pero si ves que no puedes utilizala");


echo "\nLista de tareas después de realizar cambios:\n";
foreach ($tareas as $tarea) {
    $tarea->mostrarTarea();
}

?>