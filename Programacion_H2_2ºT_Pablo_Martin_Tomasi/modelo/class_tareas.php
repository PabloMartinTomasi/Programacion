<?php
require_once '../config/conexion.php'; //Ponemos esto para poder estra conectados a la BBDD, y no tener que estar escribiendolo siempre

class Tareas{
    private $conexion;

    public function __construct(){
        $this->conexion = new Conexion();
    }

    public function crear_tarea($nombre_tarea, $descripcion_tarea, $estado_tarea, $email) {
        $query_tarea = "INSERT INTO tareas (nombre_tarea, descripcion_tarea, estado_tarea, email) 
                        VALUES (?, ?, ?, ?)"; // Se elimina el WHERE y se usa ? para email
        
        $stmt = $this->conexion->conexion->prepare($query_tarea);
    
        if (!$stmt) {
            throw new Exception("Error al preparar la consulta: " . $this->conexion->conexion->error);
        }
    
        $stmt->bind_param("ssss", $nombre_tarea, $descripcion_tarea, $estado_tarea, $email); // Corregido: 4 parámetros
    
        if ($stmt->execute()) {
            $stmt->close();
            return "Tarea creada con éxito";
        } else {
            $stmt->close();
            throw new Exception("Error al crear la tarea: " . $stmt->error);
        }
    }
    

    public function obtener_tareas($email){//Function para poder obervar las tareas de un usuario con solo saber su id del usuario
        $query = "SELECT * FROM tareas WHERE email = ?";
        $stmt = $this->conexion->conexion->prepare($query);

        if ($stmt === false){
            die("Error en la preparación de la consulta: " . $this->conexion->conexion->error);
        }
        $stmt->bind_param("s", $email);
        $stmt->execute();

        $resulatado = $stmt->get_result();
        $tareas=[];

        while ($fila = $resulatado->fetch_assoc()){
            $tareas[]=$fila;
        }

        $stmt->close();
        return $resulatado->fetch_assoc();
    }

    public function elimnar_tarea($id_tarea){
        $query = "DELETE FROM tareas WHERE id_tarea = ?";
        $stmt = $this->conexion->conexion->prepare($query);
        $stmt->bind_param("i", $id_tarea);

        if ($stmt->execute()) {
            return "Tarea eliminda con éxito";
        } else {
            return "Error al eliminar la tarea";
        }
    }
}

?>