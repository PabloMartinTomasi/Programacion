<?php
require_once '../modelo/class_usuarios.php';

class UsuarioController {
    private $modelo;

    public function __construct() {
        $this->modelo = new Usuarios();
    }

    public function crear_usuario($usuario, $contrasena, $rol){
        $this->modelo->crear_usuario($usuario, $contrasena, $rol);
    }

    public function listarUsuarios() {
        return $this->modelo->obtenerUsuarios();
    }

    public function actualizar($id_usuario, $usuario, $contrasena, $rol){
        $this->modelo->actualizar($id_usuario, $usuario, $contrasena, $rol);
    }

    public function eliminarUsuario($id_usuario){
        $this->modelo->eliminarUsuario($id_usuario);
    }

    public function iniciarSesion($usuario, $contrasena, $esAdmin) {
        try {
            $resultado = $this->modelo->iniciarSesion($usuario, $contrasena, $esAdmin);
            if ($resultado) {
                return ['exito' => true, 'usuario' => $usuario];
            } else {
                return ['exito' => false, 'mensaje' => 'Credenciales incorrectas'];
            }
        } catch (Exception $e) {
            return ['exito' => false, 'mensaje' => $e->getMessage()];
        }
    }
}
?>