<?php
require_once '../config/conexion.php'; // Conexión a la base de datos

class IniciarSesion {
    private $conexion;

    public function __construct() {
        $this->conexion = new Conexion();
    }

    public function crear_usuario($email, $usuario, $contrasena){
        $query = "INSERT INTO usuarios (email, usuario, contrasena)
                VALUES (?, ?, ?)"; //Hacemos un insert into para la tabla del usuario, para obtener sus datos

        $stmt = $this->conexion->conexion->prepare($query);
        $stmt->bind_param("sss",$email, $usuario, $contrasena);

        if ($stmt->execute()) {
            return "Usuario creado con éxito";
        } else {
            throw new Exception("Error al crear el usuario: " . $stmt->error);
        }

        $stmt->close();
    }

    public function iniciar_sesion($usuario, $contrasena) {
        $query = "SELECT * FROM usuarios WHERE usuario = ?";
        $stmt = $this->conexion->conexion->prepare($query);
        $stmt->bind_param("s", $usuario);
        $stmt->execute();
        $resultado = $stmt->get_result();
    
        if ($resultado->num_rows > 0) {
            $usuarioDB = $resultado->fetch_assoc();
    
            if (password_verify($contrasena, $usuarioDB['contrasena'])) {
                return $usuarioDB;
            } else {
                echo "Contraseña incorrecta.";
            }
        } else {
            echo "Usuario no encontrado.";
        }
    
        return null;
    }    
}
?>
