<?php
require_once '../config/conexion.php';

class Recetas {
    private $conexion;

    public function __construct() {
        $this->conexion = new Conexion();
    }

    public function CrearReceta($titulo, $descripcion) {
        $query = "INSERT INTO receta(titulo, descripcion) VALUES (?, ?)";
        $stmt = $this->conexion->conexion->prepare($query);
        $stmt->bind_param("ss", $titulo, $descripcion);

        if ($stmt->execute()) {
            return true;
        } else {
            echo "Error al agregar la receta: " . $stmt->error;
            return false;
        }

        $stmt->close();
    }
    
    public function obtenerRecetas() {
        try {
            $query = "SELECT * FROM receta";
            $resultado = $this->conexion->conexion->query($query);
            $recetas = [];
            while ($fila = $resultado->fetch_assoc()) {
                $recetas[] = $fila;
            }
            return $recetas;
        } catch (Exception $e) {
            echo "Error al obtener las recetas: " . $e->getMessage();
        }
    }
}
?>
