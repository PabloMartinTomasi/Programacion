<?php 
require_once '../config/conexion.php';

class Inicio_sesion{
    private $conexion;

    public function __construct() {
        $this->conexion = new Conexion();
    }

    public function crear_usuario($usuario, $contrasena, $rol) {
        $contrasena_cifrada = password_hash($contrasena, PASSWORD_DEFAULT);

        $query = "INSERT INTO eventos (usuario, contrasena, rol) VALUES (?, ?, ?)";
        $stmt = $this->conexion->conexion->prepare($query);
        $stmt->bind_param("sss", $usuario, $contrasena_cifrada, $rol);

        if ($stmt->execute()) {
            echo "Cuenta del cliente agregada con éxito";
        } else {
            echo "Error al agregar la cuenta del nuevo cliente: " . $stmt->error;
        }

        $stmt->close();
    }

    public function obtener_cliente_registrados() {
        $query = "SELECT * FROM usuarios";
        $resultado = $this->conexion->conexion->query($query);
        $usuarios = [];
        while ($fila = $resultado->fetch_assoc()) {
            $usuarios[] = $fila;
        }
        return $usuarios;
    }

    public function obtenerUsuariosPorID($id_usuario){
        $query = "SELECT * FROM usuarios WHERE id_usuario = ?";
        $stmt = $this->conexion->conexion->prepare($query);
        $stmt->bind_param("i", $id_usuario);
        $stmt->execute();
        $resultado = $stmt->get_result();
        return $resultado->fetch_assoc();
    }

    public function actualizar($id_usuario, $usuario, $contrasena, $rol){
        $contrasena_cifrada = password_hash($contrasena, PASSWORD_DEFAULT);

        $query = "UPDATE usuarios SET usuario = ?, contrasena = ?, rol = ? WHERE id_usuario = ?";
        $stmt = $this->conexion->conexion->prepare($query);
        $stmt->bind_param("sssi", $usuario, $contrasena_cifrada, $rol, $id_usuario);

        if ($stmt->execute()){
            echo "Usuario actualizado con éxito.";
        } else{
            echo "Error al actualizar el usuario: {$stmt->error}"; 
        }

        $stmt->close();
    }

    public function eliminarUsuario($id_usuario){
        $query = "DELETE FROM usuarios WHERE id_usuario = ?";
        $stmt = $this->conexion->conexion->prepare($query);
        $stmt->bind_param("i", $id_usuario);

        if ($stmt->execute()){
            echo "Usuario eliminado con éxito.";
        } else{
            echo "Error al eliminar evento: {$stmt->error}";
        }

        $stmt->close();
    }

    public function iniciarSesion($usuario, $contrasena, $esAdmin) {
        $usuarioBD = $this->getUsuarioPorNombre($usuario);

        if ($usuarioBD) {
            if ($esAdmin && $usuarioBD['rol'] == 'Admin') {
                return ['exito' => true, 'usuario' => $usuarioBD];
            } elseif (!$esAdmin && password_verify($contrasena, $usuarioBD['contrasena'])) {
                return ['exito' => true, 'usuario' => $usuarioBD];
            } else {
                return ['exito' => false, 'error' => 'Usuario o contraseña incorrectos'];
            }
        }
        return ['exito' => false, 'error' => 'Usuario no encontrado'];
    }
    
    private function getUsuarioPorNombre($usuario){
        $query = "SELECT * FROM usuarios WHERE usuario = ?";
        $stmt = $this->conexion->conexion->prepare($query);
        $stmt->bind_param("s", $usuario);
        $stmt->execute();
        $resultado = $stmt->get_result();
    
        return $resultado->fetch_assoc();
    }    
}
?>
