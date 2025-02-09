<?php
require_once '../modelo/class_tareas.php';

class TareasController{
    private $modelo;

    public function __construct() {
        $this->modelo = new Tareas();
    }

    public function crear_tarea($id_usuario, $nombre_tarea, $descripcion_tarea, $estado_tarea){
        $this->modelo->crear_tarea($id_usuario, $nombre_tarea, $descripcion_tarea, $estado_tarea);
    }

    public function obtener_tareas($id_usuario){
        $this->modelo->obtener_tareas($id_usuario);
    }
}
?>