<?php
require_once '../config/conexion.php'; // Conexión a la base de datos

class IniciarSesion {
    private $conexion;

    public function __construct() {
        $this->conexion = new Conexion();
    }

    public function iniciar_sesion($usuario, $contrasena) {
        $query = "SELECT * FROM usuarios WHERE usuario = ?";
        $stmt = $this->conexion->conexion->prepare($query);
        $stmt->bind_param("s", $usuario);
        $stmt->execute();
        $resultado = $stmt->get_result();
    
        // Depuración: Ver si se encuentra algún usuario
        if ($resultado->num_rows > 0) {
            $usuarioDB = $resultado->fetch_assoc();
            var_dump($usuarioDB); // Verifica qué datos trae el usuario
    
            if (password_verify($contrasena, $usuarioDB['contrasena'])) {
                return $usuarioDB;
            } else {
                echo "Contraseña incorrecta."; // Depuración
            }
        } else {
            echo "Usuario no encontrado."; // Depuración
        }
    
        return null;
    }    
}
?>
