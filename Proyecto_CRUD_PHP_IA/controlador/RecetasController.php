<?php
require_once '../modelo/class_socio.php';

class RecetasController {
    private $modelo;

    public function __construct() {
        $this->modelo = new Recetas();
    }

    public function CrearRecetas($nombre_receta, $ingredientes, $descripcion, $tiempo){
        $this->modelo->CrearRecetas($nombre_receta, $ingredientes, $descripcion, $tiempo);
    }
    
    public function obtenerRecetas(){
        return $this->modelo->obtenerRecetas();
    }
}
?>
