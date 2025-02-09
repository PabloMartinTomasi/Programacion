<?php
require_once '../config/conexion.php';

class Tareas{
    private $conexion;

    public function __construct(){
        $this->conexion = new Conexion();
    }

    public function crear_tarea($id_usuario, $nombre_tarea, $descripcion_tarea, $estado_tarea){
        $query_tarea = "INSERT INTO tareas(id_usuario, nombre_tarea, descripcion_tarea, estado_tarea)
                    SELECT id_usuario, (?, ?, ?)
                    FROM usuarios
                    WHERE id_usuario = ?";
        $stmt = $this->conexion->conexion->prepare($query_tarea);
        $stmt->bind_param("isss", $id_usuario, $nombre_tarea, $descripcion_tarea, $estado_tarea);

        if ($stmt->execute()) {
            return "Tarea creada con éxito";
        } else {
            throw new Exception("Error al crear la tarea: " . $stmt->error);
        }

        $stmt->close();
    }

    public function obtener_tareas($id_usuario){
        $query = "SELECT * FROM tareas";
        $stmt = $this->conexion->conexion->prepare($query);
        $stmt->bind_param("i", $id_usuario);
        $stmt->execute();
        $resultado = $stmt->get_result();
        return $resultado->fetch_assoc();
    }
}

?>