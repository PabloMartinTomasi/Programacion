<?php
require_once '../modelo/class_iniciar_sesion.php'; // Importa la clase modelo

class IniciarSesionController {
    private $modelo;

    public function __construct() {
        $this->modelo = new IniciarSesion();
    }

    public function crear_usuario($email, $usuario, $contrasena){
        $this->modelo->crear_usuario($email, $usuario, $contrasena);
    }

    public function iniciar_sesion($usuario, $contrasena) {
        if (empty($usuario) || empty($contrasena)) {
            return null;
        }
        return $this->modelo->iniciar_sesion($usuario, $contrasena);
    }
}
?>
