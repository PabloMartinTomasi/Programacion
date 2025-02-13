<?php
require_once '../modelo/class_tareas.php'; //Decimos que hes necesario tener las 2 funciones que hemos hecho en el archivo de class_tareas.php

class TareasController{
    private $modelo;

    public function __construct() {
        $this->modelo = new Tareas();
    }

    public function crear_tarea($nombre_tarea, $descripcion_tarea, $estado_tarea, $email){//Nos va a servir para cuando el cliente, el formulario tenga que añadir una nueva tarea
        $this->modelo->crear_tarea($nombre_tarea, $descripcion_tarea, $estado_tarea, $email);
    }

    public function obtener_tareas($email){//Nos sivre para poder ver las tareas de un usuario en concreto
        if (empty($email)) {
            return 'Por favor, complete todos los campos.';
        }

        $tareas  = $this->modelo->obtener_tareas($email);

        if (!empty($tareas)) {
            return $tareas;
        } else {
            return 'No hay tareas disponibles para este usuario.';
        }
    }

    public function elimnar_tarea($id_tarea){//Nos sirve para poder eliminar una tarea poniendo, el id de dicha tarea
        $this->modelo->elimnar_tarea($id_tarea);
    }

    public function actualizar_tarea($id_tarea, $estado_tarea){//Nos sirve para actulizar el estado de una tarea
        $this->modelo->actualizar_tarea($id_tarea, $estado_tarea);
    }
}
?>