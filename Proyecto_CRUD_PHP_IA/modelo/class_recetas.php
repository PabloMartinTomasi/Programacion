<?php
require_once '../config/conexion.php';

class Recetas {
    private $conexion;

    public function __construct() {
        $this->conexion = new Conexion();
    }

    public function CrearReceta($titulo, $descripcion) {
        $query = "INSERT INTO receta (titulo, descripcion) VALUES (?, ?)";
        $stmt = $this->conexion->conexion->prepare($query);
        $stmt->bind_param("ss", $titulo, $descripcion);

        if ($stmt->execute()) {
            return true;
        } else {
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
            return [];
        }
    }

    public function editarReceta($titulo, $descripcion, $id_receta){
        $query = "UPDATE receta SET titulo = ?, descripcion = ? WHERE id_receta = ?";
        $stmt = $this->conexion->conexion->prepare($query);
        $stmt->bind_param("ssi", $titulo, $descripcion, $id_receta);

        if ($stmt->execute()) {
            echo "Socio actualizado con éxito.";
        } else {
            echo "Error al actualizar socio: " . $stmt->error;
        }

        $stmt->close();
    }

    public function eliminarReceta($id_receta){
        $query = "DELETE FROM receta WHERE id_receta = ?";
        $stmt = $this->conexion->conexion->prepare($query);
        $stmt->bind_param("i", $id_receta);

        if ($stmt->execute()) {
            echo "Socio eliminado con éxito.";
        } else {
            echo "Error al eliminar socio: " . $stmt->error;
        }

        $stmt->close();
    }
}
?>
