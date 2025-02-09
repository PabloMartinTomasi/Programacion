<?php
require_once '../modelo/class_tareas.php'; //Decimos que hes necesario tener las 2 funciones que hemos hecho en el archivo de class_tareas.php

class TareasController{
    private $modelo;

    public function __construct() {
        $this->modelo = new Tareas();
    }

    public function crear_tarea($id_usuario, $nombre_tarea, $descripcion_tarea, $estado_tarea){//Nos va a servir para cuando el cliente, el formulario tenga que añadir una nueva tarea
        $this->modelo->crear_tarea($id_usuario, $nombre_tarea, $descripcion_tarea, $estado_tarea);
    }

    public function obtener_tareas(){//Nos va a servir para poder ver las tareas que tiene que hacer el cliente
        return $this->modelo->obtener_tareas();
    }
}
?>