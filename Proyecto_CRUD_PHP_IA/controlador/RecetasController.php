<?php
require_once '../modelo/class_recetas.php';

class RecetasController {
    private $modelo;

    public function __construct() {
        $this->modelo = new Recetas();
    }

    public function CrearReceta($titulo, $descripcion){
        $this->modelo->CrearReceta($titulo, $descripcion);
    }
    
    public function obtenerRecetas(){
        return $this->modelo->obtenerRecetas();
    }
}
?>
