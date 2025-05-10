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

    public function registrar_usuario($email, $nombre, $contrasena) {//funcion para poder registrar a un nuevo usuario
        // Verificar si el email ya está registrado
        $query_email = "SELECT email FROM usuarios WHERE email = ?";//Sentencia para poder verificar si el email ya esta registrado o no
        $stmt_email = $this->conexion->conexion->prepare($query_email);
        $stmt_email->bind_param("s", $email);
        $stmt_email->execute();
        $stmt_email->store_result();
    
        if ($stmt_email->num_rows > 0) {
            return "Error: El correo ya está registrado.";
        }
    
        $stmt_email->close(); // Cerrar la consulta previa
    
        $encriptar_contrasena = password_hash($contrasena, PASSWORD_DEFAULT);// Encriptar la contraseña
    
        $query = "INSERT INTO usuarios (email, nombre, contrasena) VALUES (?, ?, ?)";//Si el email, no esta registrado se inserta el cliente
        $stmt = $this->conexion->conexion->prepare($query);
        $stmt->bind_param("sss", $email, $nombre, $encriptar_contrasena);
    
        if ($stmt->execute()) {
            return "Usuario registrado con éxito";
        } else {
            return "Error al registrar el usuario.";
        }
    }
    
}
?>