<?php
require_once '../config/conexion.php'; // Conexión a la base de datos

class IniciarSesion {
    private $conexion;

    public function __construct() {
        $this->conexion = new Conexion();
    }

    public function iniciar_sesion($email, $contrasena) {//Nos sirve para que el usuario pueda iniciar sesión en su cuenta
        $query = "SELECT * FROM usuarios WHERE email = ?";//Sentencia para poder observar la cuenta del usuario en concreto
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

    public function registrar_usuario($email, $nombre, $contrasena){//Nos sirve para poder registrar a un nuevo usuario
        $encriptar_contrasena = password_hash($contrasena, PASSWORD_DEFAULT);//Nos sirve para poder encriptar la contraseña, y así poder iniciar sesion en un futuro

        $query = "INSERT INTO usuarios (email, nombre, contrasena) VALUES (?, ?, ?)";//Sentencia para poder insertar al usuario que se este registrando
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