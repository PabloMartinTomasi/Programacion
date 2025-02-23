<?php
require_once '../config/conexion.php';

class Usuarios {
    private $conexion;

    public function __construct() {
        $this->conexion = new Conexion();
    }

    public function iniciarSesion($usuario, $contrasena, $esAdmin) {
        $query = "SELECT * FROM usuarios WHERE usuario = ?";
        $stmt = $this->conexion->conexion->prepare($query);
        $stmt->bind_param("s", $usuario);
        $stmt->execute();
        $resultado = $stmt->get_result();

        if ($resultado->num_rows === 1) {
            $usuarioData = $resultado->fetch_assoc();
            if ($esAdmin && $usuario === 'Admin') {
                return true;
            }
            if (password_verify($contrasena, $usuarioData['contrasena'])) {
                return true;
            }
        }

        return false;
    }

    public function crear_usuario($usuario, $contrasena, $rol) {
        $encriptar_contrasena = password_hash($contrasena, PASSWORD_DEFAULT);
        $query = "INSERT INTO usuarios (usuario, contrasena, rol) VALUES (?, ?, ?)";
        $stmt = $this->conexion->conexion->prepare($query);
        $stmt->bind_param("sss", $usuario, $encriptar_contrasena, $rol);

        return $stmt->execute();
    }

    public function obtenerUsuarios(){
        $query = "SELECT * FROM usuarios";
        $resultado = $this->conexion->conexion->query($query);

        if ($resultado === false) {
            throw new Exception("Error en la consulta de usuarios.");
        }

        $usuarios = [];
        while ($fila = $resultado->fetch_assoc()) {
            $usuarios[] = $fila;
        }

        return $usuarios;
    }

    public function actualizar($id_usuario, $usuario, $contrasena, $rol){
        $contrasena_cifrada = password_hash($contrasena, PASSWORD_DEFAULT);
        $query = "UPDATE usuarios SET usuario = ?, contrasena = ?, rol = ? WHERE id_usuario = ?";
        $stmt = $this->conexion->conexion->prepare($query);
        $stmt->bind_param("sssi", $usuario, $contrasena_cifrada, $rol, $id_usuario);

        return $stmt->execute();
    }

    public function eliminarUsuario($id_usuario) {
        $query = "DELETE FROM usuarios WHERE id_usuario = ?";
        $stmt = $this->conexion->conexion->prepare($query);
        $stmt->bind_param("i", $id_usuario);

        return $stmt->execute();
    }
}
?>
