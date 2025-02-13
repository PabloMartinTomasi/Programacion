<?php
require_once '../modelo/class_usuario.php';//Decimos que es necesario el class usuario

class IniciarSesionController {
    private $modelo;

    public function __construct() {
        $this->modelo = new IniciarSesion();
    }

    public function iniciar_sesion($email, $contrasena) {//Nos sirve para poder iniciar sesion en la cuenta de un usuario
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

    public function registrar_usuario($email, $nombre, $contrasena){//Nos sirve para que un usuario se pueda registra
        if (empty($email) || empty($nombre) || empty($contrasena)) {
            return 'Por favor, complete todos los campos.';
        }
        $resultado = $this->modelo->registrar_usuario($email, $nombre, $contrasena);
        return $resultado;
    }
}
?>