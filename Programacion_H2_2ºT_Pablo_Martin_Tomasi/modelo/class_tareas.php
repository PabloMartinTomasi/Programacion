<?php
require_once '../config/conexion.php'; // Incluimos la conexión a la base de datos para evitar repetir código en cada consulta

class Tareas
{
    private $conexion;

    public function __construct(){
        // Creamos una instancia de la conexión a la base de datos al inicializar la clase
        $this->conexion = new Conexion();
    }

    public function crear_tarea($nombre_tarea, $descripcion_tarea, $estado_tarea, $email){
        // Método para insertar una nueva tarea para un usuario específico.
        
        $query_tarea = "INSERT INTO tareas (nombre_tarea, descripcion_tarea, estado_tarea, email) 
                        VALUES (?, ?, ?, ?)"; // Consulta SQL para insertar una nueva tarea

        $stmt = $this->conexion->conexion->prepare($query_tarea);

        if (!$stmt) {
            // Si hay un error al preparar la consulta, lanzamos una excepción
            throw new Exception("Error al preparar la consulta: " . $this->conexion->conexion->error);
        }

        // Asociamos los parámetros a la consulta SQL para evitar inyecciones SQL
        $stmt->bind_param("ssss", $nombre_tarea, $descripcion_tarea, $estado_tarea, $email);

        if ($stmt->execute()) {
            $stmt->close();
            return "Tarea creada con éxito";
        } else {
            $stmt->close();
            throw new Exception("Error al crear la tarea: " . $stmt->error);
        }
    }

    public function obtener_tareas($email){
        // Método para obtener todas las tareas de un usuario específico

        $query = "SELECT * FROM tareas WHERE email = ?"; // Consulta para obtener las tareas de un usuario
        $stmt = $this->conexion->conexion->prepare($query);

        if (!$stmt) {
            throw new Exception("Error en la preparación de la consulta: " . $this->conexion->conexion->error);
        }

        // Asociamos el parámetro email a la consulta
        $stmt->bind_param("s", $email);
        $stmt->execute();

        // Obtenemos los resultados de la consulta
        $resultado = $stmt->get_result();
        $tareas = [];

        // Recorremos las filas obtenidas y las almacenamos en un array
        while ($fila = $resultado->fetch_assoc()) {
            $tareas[] = $fila;
        }

        $stmt->close();
        return $tareas;
    }

    public function eliminar_tarea($id_tarea){
        // Método para eliminar una tarea por su ID

        $query = "DELETE FROM tareas WHERE id_tarea = ?"; //Consulta para eliminar una tarea específica
        $stmt = $this->conexion->conexion->prepare($query);

        if (!$stmt) {
            throw new Exception("Error en la preparación de la consulta: " . $this->conexion->conexion->error);
        }

        // Asociamos el ID de la tarea a la consulta.
        $stmt->bind_param("i", $id_tarea);

        if ($stmt->execute()) {
            $stmt->close();
            return "Tarea eliminada con éxito"; //Mensaje de éxito si al elimianr se hizo correctamente
        } else {
            $stmt->close();
            return "Error al eliminar la tarea"; //Mensaje de error si al eliminar falla
        }
    }

    public function actualizar_tarea($id_tarea, $estado_tarea){
        // Método para actualizar el estado de una tarea

        $query = "UPDATE tareas SET estado_tarea = ? WHERE id_tarea = ?"; // Consulta para actualizar el estado de una tarea
        $stmt = $this->conexion->conexion->prepare($query);

        if (!$stmt) {
            throw new Exception("Error en la preparación de la consulta: " . $this->conexion->conexion->error);
        }

        // Asociamos los parámetros del nuevo estado y del  ID de la tarea
        $stmt->bind_param("si", $estado_tarea, $id_tarea);

        $resultado = $stmt->execute();
        $stmt->close();

        return $resultado;
    }    
}
