<?php
require_once '../config/conexion.php'; //Ponemos esto para poder estra conectados a la BBDD, y no tener que estar escribiendolo siempre

class Tareas
{
    private $conexion;

    public function __construct(){
        $this->conexion = new Conexion();
    }

    public function crear_tarea($nombre_tarea, $descripcion_tarea, $estado_tarea, $email){//Nos sirve para poder insertar una nueva tarea, al usuario de la seeión iniciada
        $query_tarea = "INSERT INTO tareas (nombre_tarea, descripcion_tarea, estado_tarea, email) 
                        SELECT ?, ?, ?, email
                        FROM usuarios
                        WHERE email = ?";//Es la sentencia para poder insertar la nueva tarea

        $stmt = $this->conexion->conexion->prepare($query_tarea);

        if (!$stmt) {
            throw new Exception("Error al preparar la consulta: " . $this->conexion->conexion->error);
        }

        $stmt->bind_param("ssss", $nombre_tarea, $descripcion_tarea, $estado_tarea, $email);

        if ($stmt->execute()) {
            $stmt->close();
            return "Tarea creada con éxito";
        } else {
            $stmt->close();
            throw new Exception("Error al crear la tarea: " . $stmt->error);
        }
        $stmt->close();//Nos sirve para poder cerrar la sentencia
        $this->conexion->conexion->close();
    }


    public function obtener_tareas($email){//Nos sirve para poder ver las tareas de un usuario en concreto, cuando ese usuario iniciar sesión
        $query = "SELECT * FROM tareas WHERE email = ?";//Es la sentencia para poder ver las tareas de un usuario e concreto
        $stmt = $this->conexion->conexion->prepare($query);

        if (!$stmt) {
            throw new Exception("Error en la preparación de la consulta: " . $this->conexion->conexion->error);
        }

        $stmt->bind_param("s", $email);
        $stmt->execute();

        $resultado = $stmt->get_result();
        $tareas = [];

        while ($fila = $resultado->fetch_assoc()) {
            $tareas[] = $fila;
        }

        $stmt->close();
        return is_array($tareas) ? $tareas : [];//Nos va a mostrar las tareas del usuario
    }

    public function elimnar_tarea($id_tarea){//Nos sirve para poder eliminar una tarea cuando esta acabada
        $query = "DELETE FROM tareas WHERE id_tarea = ?";//Sentencia para poder eliminar la tarea con solo poner el id de la tarea
        $stmt = $this->conexion->conexion->prepare($query);
        $stmt->bind_param("i", $id_tarea);

        if ($stmt->execute()) {
            return "Tarea eliminda con éxito";
        } else {
            return "Error al eliminar la tarea";
        }
    }

    public function actualizar_tarea($id_tarea, $estado_tarea){//Esto nos va a servir en el js, para poder actulizar el estado de la tara. desde el archivo de lista_tareas.php 
        $query = "UPDATE tareas SET estado_tarea = ? WHERE id_tarea = ?";//Es la sentencia para poder actulizar el estado de la tarea
        $stmt = $this->conexion->conexion->prepare($query);
        
        if (!$stmt) {
            throw new Exception("Error en la preparación de la consulta: " . $this->conexion->conexion->error);
        }
    
        $stmt->bind_param("si", $estado_tarea, $id_tarea);

        $resultado = $stmt->execute();
        $stmt->close();

        return $resultado;
    }    
}
