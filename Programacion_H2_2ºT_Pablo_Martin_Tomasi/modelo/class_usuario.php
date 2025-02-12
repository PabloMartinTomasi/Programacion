<?php
require_once '../config/conexion.php'; // Conexión a la base de datos

class IniciarSesion {
    private $conexion;

    public function __construct() {
        $this->conexion = new Conexion();
    }

    public function iniciar_sesion($email, $contrasena) {
        $query = "SELECT * FROM usuarios WHERE email = ?";
        $stmt = $this->conexion->conexion->prepare($query);
        
        if ($stmt === false) {
            die('Error al preparar la consulta: ' . $this->conexion->conexion->error);
        }

        $stmt->bind_param("s", $email);
    
        $stmt->execute();
        $resultado = $stmt->get_result();
        
        if ($resultado->num_rows > 0) {
            $emailDB = $resultado->fetch_assoc();
            if (password_verify($contrasena, $emailDB['contrasena'])) {
                return $emailDB;
            } else {
                return null;
            }
        } else {
            return null;
        }

        $stmt->close();
        $this->conexion->conexion->close();
    }

    public function registrar_usuario($email, $nombre, $contrasena){
        $encriptar_contrasena = password_hash($contrasena, PASSWORD_DEFAULT);

        $query = "INSERT INTO usuarios (email, nombre, contrasena) VALUES (?, ?, ?)";
        $stmt = $this->conexion->conexion->prepare($query);
        $stmt->bind_param("sss", $email, $nombre, $encriptar_contrasena);

        if ($stmt->execute()) {
            return "Usuario registrado con éxito";
        } else {
            return "Error al registrar el usuario";
        }
    }
}
?>