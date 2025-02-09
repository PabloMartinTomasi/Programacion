<?php
require_once '../modelo/class_usuario.php';

class UsuarioController {
    private $modelo;

    public function __construct() {
        $this->modelo = new Usuario();
    }

    public function CrearCuenta($nombre_usuario, $telefono, $email, $contrasena) {
        $this->modelo->CrearCuenta($nombre_usuario, $telefono, $email, $contrasena);
    }

    public function obtenerUsurioo(){
        $this->modelo->obtenerUsurio();
    }

    public function obtenerUsurio($nombre_usuario) {
        return $this->modelo->obtenerUsurioo($nombre_usuario);
    }
}
?>
