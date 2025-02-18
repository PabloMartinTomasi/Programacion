<?php
require_once '../config/conexion.php';

class Recetas{
    private $conexion;

    public function __construct() {
        $this->conexion = new Conexion();
    }

    public function CrearRecetas($nombre_receta, $ingredientes, $descripcion, $tiempo){
        $query = "INSERT INTO receta(nombre_receta, ingredientes, descripcion, tiempo) VALUE (?, ?, ?, ?)";
        $stmt = $this->conexion->conexion->prepare($query);
        $stmt->bind_param("ssss", $nombre_receta, $ingredientes, $descripcion, $tiempo);

        if ($stmt->execute()) {
            echo "Receta agregada con éxito.";
        } else {
            echo "Error al agregar la receta: " . $stmt->error;
        }

        $stmt->close();
    }
    
    public function obtenerRecetas(){
        $query = "SELECT * FROM receta";
        $resultado = $this->conexion->conexion->query($query);
        $recetas = [];
        while ($fila = $resultado->fetch_assoc()) {
            $recetas[] = $fila;
        }
        return $recetas;
    }
}
?>
