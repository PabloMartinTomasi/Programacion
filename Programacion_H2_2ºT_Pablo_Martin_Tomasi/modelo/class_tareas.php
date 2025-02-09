<?php
require_once '../config/conexion.php'; //Ponemos esto para poder estra conectados a la BBDD, y no tener que estar escribiendolo siempre

class Tareas{
    private $conexion;

    public function __construct(){
        $this->conexion = new Conexion();
    }

    public function crear_tarea($id_usuario, $nombre_tarea, $descripcion_tarea, $estado_tarea){ //Function para poder crear una nueva tarea
        $query_tarea = "INSERT INTO tareas (id_usuario, nombre_tarea, descripcion_tarea, estado_tarea) 
                VALUES (?, ?, ?, ?)"; //Con este insert into, vamos a crear una nueva tarea con el id de usuario que hemos selcionado
        $stmt = $this->conexion->conexion->prepare($query_tarea);
        $stmt->bind_param("isss", $id_usuario, $nombre_tarea, $descripcion_tarea, $estado_tarea);

        if ($stmt->execute()) {
            return "Tarea creada con éxito";
        } else {
            throw new Exception("Error al crear la tarea: " . $stmt->error);
        }

        $stmt->close();
    }

    public function obtener_tareas(){//Function para poder obervar las tareas de un usuario con solo saber su id del usuario
        $query = "SELECT * FROM tareas";//Nos va a servir mostrar al cliente con el id usuario que tiene sus tareas
        $resultado = $this->conexion->conexion->query($query);
        $tareas = [];
        while ($fila = $resultado->fetch_assoc()){
            $tareas[] = $fila;
        }
        return $tareas;
    }
}

?>