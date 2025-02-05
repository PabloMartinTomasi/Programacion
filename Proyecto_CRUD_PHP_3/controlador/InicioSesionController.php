<?php
require_once '../modelo/class_inicio_sesion.php';

class InicioSesionController {
    private $modelo;

    public function __construct() {
        $this->modelo = new Inicio_sesion();
    }

    public function crear_usuario($usuario, $contrasena, $rol) {
        $this->modelo->crear_usuario($usuario, $contrasena, $rol);
    }

    public function listarUsuarios() {
        return $this->modelo->obtener_cliente_registrados();
    }

    public function obtenerUsuariosPorID($id_usuario) {
        return $this->modelo->obtenerUsuariosPorID($id_usuario);
    }

    public function actualizar($id_usuario, $usuario, $contrasena, $rol) {
        $this->modelo->actualizar($id_usuario, $usuario, $contrasena, $rol);
    }

    public function eliminarUsuario($id_usuario) {
        $this->modelo->eliminarUsuario($id_usuario);
    }

    public function iniciarSesion($usuario, $contrasena, $esAdmin){
        $this->modelo->iniciarSesion($usuario, $contrasena, $esAdmin);
    }
}
?>
