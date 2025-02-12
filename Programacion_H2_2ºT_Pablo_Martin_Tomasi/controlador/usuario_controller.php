<?php
require_once '../modelo/class_usuario.php';

class IniciarSesionController {
    private $modelo;

    public function __construct() {
        $this->modelo = new IniciarSesion();
    }

    public function iniciar_sesion($email, $contrasena) {
        if (empty($email) || empty($contrasena)) {
            return 'Por favor, complete todos los campos.';
        }

        $emailDB = $this->modelo->iniciar_sesion($email, $contrasena);

        if ($emailDB !== null) {
            return $emailDB;
        } else {
            return 'Credenciales incorrectas';
        }
    }

    public function registrar_usuario($email, $nombre, $contrasena){
        if (empty($email) || empty($nombre) || empty($contrasena)) {
            return 'Por favor, complete todos los campos.';
        }
        $resultado = $this->modelo->registrar_usuario($email, $nombre, $contrasena);
        return $resultado;
    }
}
?>