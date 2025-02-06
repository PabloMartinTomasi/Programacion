<?php
require_once '../config/conexion.php';

class Inicio_sesion
{
    private $conexion;

    public function __construct()
    {
        $this->conexion = new Conexion();
    }

    public function crear_usuario($usuario, $contrasena, $rol)
    {
        if (!in_array($rol, ['admin', 'user'])) {
            throw new Exception("Rol no válido. Debe ser 'admin' o 'user'.");
        }

        $query = "INSERT INTO usuarios (usuario, contrasena, rol) VALUES (?, ?, ?)";
        $stmt = $this->conexion->conexion->prepare($query);
        $stmt->bind_param("sss", $usuario, $contrasena, $rol);

        if ($stmt->execute()) {
            return "Cuenta del usuario agregada con éxito";
        } else {
            throw new Exception("Error al agregar la cuenta del usuario: " . $stmt->error);
        }

        $stmt->close();
    }

    public function obtenerUsuarios()
    {
        $query = "SELECT id_usuario, usuario, contrasena, rol FROM usuarios";
        $resultado = $this->conexion->conexion->query($query);

        if ($resultado === false) {
            die("Error en la consulta de usuarios: " . $this->conexion->conexion->error);
        }

        $usuarios = [];
        while ($fila = $resultado->fetch_assoc()) {
            $usuarios[] = $fila;
        }


        return $usuarios;
    }


    public function obtenerUsuariosPorID($id_usuario)
    {
        $query = "SELECT * FROM usuarios WHERE id_usuario = ?";
        $stmt = $this->conexion->conexion->prepare($query);
        $stmt->bind_param("i", $id_usuario);
        $stmt->execute();
        $resultado = $stmt->get_result();
        return $resultado->fetch_assoc();
    }

    public function actualizar($id_usuario, $usuario, $password, $rol)
    {
        if (!in_array($rol, ['admin', 'user'])) {
            throw new Exception("Rol no válido. Debe ser 'admin' o 'user'.");
        }

        $query = "UPDATE usuarios SET usuario = ?, contrasena = ?, rol = ? WHERE id_usuario = ?";
        $stmt = $this->conexion->conexion->prepare($query);
        $stmt->bind_param("sssi", $usuario, $contrasena, $rol, $id_usuario);

        if ($stmt->execute()) {
            return "Usuario actualizado con éxito.";
        } else {
            throw new Exception("Error al actualizar el usuario: {$stmt->error}");
        }

        $stmt->close();
    }

    public function eliminarUsuario($id_usuario)
    {
        $query = "DELETE FROM usuarios WHERE id_usuario = ?";
        $stmt = $this->conexion->conexion->prepare($query);
        $stmt->bind_param("i", $id_usuario);

        if ($stmt->execute()) {
            return "Usuario eliminado con éxito.";
        } else {
            throw new Exception("Error al eliminar usuario: {$stmt->error}");
        }

        $stmt->close();
    }

    public function iniciarSesion($usuario, $contrasena, $esAdmin) {
        $usuarioBD = $this->getUsuarioPorNombre($usuario);
    
        if (!$usuarioBD) {
            return ['exito' => false, 'error' => 'Usuario no encontrado'];
        }

        $rolUsuario = strtolower($usuarioBD['rol']);

        if ($esAdmin) {
            if ($rolUsuario === 'admin') {
                return ['exito' => true, 'usuario' => $usuarioBD];
            } else {
                return ['exito' => false, 'error' => 'Acceso denegado. Solo el Admin tiene acceso.'];
            }
        }

        if ($rolUsuario === 'user' && password_verify($contrasena, $usuarioBD['contrasena'])) {
            return ['exito' => true, 'usuario' => $usuarioBD];
        } else {
            return ['exito' => false, 'error' => 'Usuario o contraseña incorrectos'];
        }
    
        if (password_verify($password, $usuarioBD['contrasena'])) {
            echo "Coincide";
            exit();
            return ['exito' => true, 'usuario' => $usuarioBD];
        } else {
            echo "No coincide";
            exit();
            return ['exito' => false, 'error' => 'Contraseña incorrecta'];
        }
    }
    

    private function getUsuarioPorNombre($usuario)
    {
        $query = "SELECT * FROM usuarios WHERE usuario = ?";
        $stmt = $this->conexion->conexion->prepare($query);
        $stmt->bind_param("s", $usuario);
        $stmt->execute();
        $resultado = $stmt->get_result();

        if ($resultado->num_rows > 0) {
            return $resultado->fetch_assoc();
        } else {
            return null;
        }
    }
}
