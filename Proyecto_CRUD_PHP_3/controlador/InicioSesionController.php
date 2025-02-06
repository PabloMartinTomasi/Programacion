<?php
require_once '../modelo/class_inicio_sesion.php';

class InicioSesionController {
    private $modelo;

    public function __construct() {
        $this->modelo = new Inicio_sesion();
    }

    public function crear_usuario($usuario, $contrasena, $rol) {
        try {
            $this->modelo->crear_usuario($usuario, $contrasena, $rol);
            return ['exito' => true, 'mensaje' => 'Usuario creado exitosamente'];
        } catch (Exception $e) {
            return ['exito' => false, 'mensaje' => $e->getMessage()];
        }
    }

    public function listarUsuarios(){
        $usuarios = $this->modelo->obtenerUsuarios();

        if ($usuarios === false) {
            return [];
        }

        return $usuarios;
    }

    public function obtenerUsuariosPorID($id_usuario) {
        try {
            return ['exito' => true, 'usuario' => $this->modelo->obtenerUsuariosPorID($id_usuario)];
        } catch (Exception $e) {
            return ['exito' => false, 'mensaje' => $e->getMessage()];
        }
    }

    public function actualizar($id_usuario, $usuario, $contrasena, $rol) {
        try {
            $this->modelo->actualizar($id_usuario, $usuario, $contrasena, $rol);
            return ['exito' => true, 'mensaje' => 'Usuario actualizado con éxito'];
        } catch (Exception $e) {
            return ['exito' => false, 'mensaje' => $e->getMessage()];
        }
    }

    public function eliminarUsuario($id_usuario) {
        try {
            $this->modelo->eliminarUsuario($id_usuario);
            return ['exito' => true, 'mensaje' => 'Usuario eliminado con éxito'];
        } catch (Exception $e) {
            return ['exito' => false, 'mensaje' => $e->getMessage()];
        }
    }

    public function iniciarSesion($usuario, $contrasena, $esAdmin) {
        try {
            $resultado = $this->modelo->iniciarSesion($usuario, $contrasena, $esAdmin);

            if ($resultado['exito']) {
                return ['exito' => true, 'usuario' => $resultado['usuario']];
            } else {
                return ['exito' => false, 'mensaje' => $resultado['error']];
            }
        } catch (Exception $e) {
            return ['exito' => false, 'mensaje' => 'Error en el proceso de inicio de sesión: ' . $e->getMessage()];
        }
    }
}
?>
