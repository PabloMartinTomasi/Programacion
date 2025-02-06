<?php
require_once '../config/conexion.php';

class Usuario {
    private $conexion;

    public function __construct() {
        $this->conexion = new Conexion();
    }

    public function CrearCuenta($nombre_usuario, $telefono, $email, $contrasena) {
        $query = "INSERT INTO usuarios (nombre_usuario, telefono, email, contrasena) VALUES (?, ?, ?, ?)";
        $stmt = $this->conexion->conexion->prepare($query);
        $stmt->bind_param("ssss", $nombre_usuario, $telefono, $email, $contrasena);

        if ($stmt->execute()) {
            echo "Usuario creado con éxito.";
        } else {
            echo "Error al crear usuario: " . $stmt->error;
        }

        $stmt->close();
    }

    public function obtenerUsurio() {
        $query = "SELECT * FROM usuarios";
        $resultado = $this->conexion->conexion->query($query);
        $usuarios = [];
        while ($fila = $resultado->fetch_assoc()) {
            $usuarios[] = $fila;
        }
        return $usuarios;
    }

    public function obtenerUsurioo($nombre_usuario) {
        $query = "SELECT * FROM usuarios 
                    where nombre_usuario = ? ";
        $stmt = $this->conexion->conexion->prepare($query);
        $stmt->bind_param("s", $nombre_usuario);
        $stmt->execute();
        $resultado = $stmt->get_result();
        return $resultado->fetch_assoc();
    }

}
?>
